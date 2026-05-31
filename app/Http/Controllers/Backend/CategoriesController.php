<?php

namespace App\Http\Controllers\Backend;

use App\FileUpload;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    use FileUpload;
    
    public function index()
    {
        $categories = Categories::latest()->paginate(5);
        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'title'       => 'required',
            'slug'        => 'required',
            'image'       => 'nullable|mimes:jpg,png,jpeg|max:2048',
            'description' => 'nullable'
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

       DB::beginTransaction();
        try {

            $validated = $validated->validated();
            if($request->hasFile('image')){
                $validated['image'] = $this->customSaveImage($request->file('image'),'categories/categories_image');
            }
            Categories::create($validated);
            DB::commit();
            return redirect()->route('admin.categories.index')->with('success','Categories created successfully.');
        } catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.categories.index')->with('error','Something went wrong. Please try again later.')->withInput();
        }
    }

    public function edit($id)
    {
        $category = Categories::findOrFail($id);
        return view('backend.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validated = Validator::make($request->all(),[
            'title'       => 'required',
            'slug'        => 'required',
            'image'       => 'nullable|mimes:jpg,png,jpeg|max:2048',
            'description' => 'nullable'
        ]);

         if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
         }


        DB::beginTransaction();
        try {

            $category  = Categories::findOrFail($id);
            $validated = $validated->validated();
            if ($request->hasFile('image')){
                $oldImage = $category->image;
                if (file_exists($oldImage)) @unlink($oldImage);
                $validated['image']= $this->customSaveImage($request->file('image'), 'categories/categories_image');
            }
            $category->update($validated);
            DB::commit();
            return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.categories.index')->with('error', 'Something went wrong. Please try again later.')->withInput();
        }
    }

}
