<?php

namespace App\Http\Controllers\Backend;

use App\FileUpload;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class ServiceController extends Controller
{
     use FileUpload;

    public function index()
    {
       $services =Services::latest()->paginate(10);
        return view('backend.service.index', compact('services'));
    }

    public function create()
    {
        return view('backend.service.create');
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'name'        => 'required|unique:services,name',
            'slug'        => 'required|unique:services,slug',
            'border_image'=> 'nullable|mimes:jpg,png,jpeg|max:2048',
            'description' => 'nullable'
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        DB::beginTransaction();
        try {
            $validated = $validated->validated();
            if($request->hasFile('border_image')){
                $validated['border_image'] = $this->customSaveImage($request->file('border_image'),'service/border_image');
            }
           Services::create($validated);
            DB::commit();
            return redirect()->route('admin.service.index')->with('success','Service created successfully.');
        } catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.service.index')->with('error','Something went wrong. Please try again later.')->withInput();
        }
    }

    public function edit($id)
    {
        $services =Services::findOrFail($id);
        return view('backend.service.edit', compact('services'));
    }

    public function update(Request $request,$id)
    {
        $validated = Validator::make($request->all(), [

            'name'         => 'required|unique:services,name,' . $id,
            'slug'         => 'required|unique:services,slug,' . $id,
            'border_image' => 'nullable|mimes:jpg,png,jpeg|max:2048',
            'description'  => 'nullable'

        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        DB::beginTransaction();
        try {

            $services   = Services::findOrFail($id);
            $validated = $validated->validated();
            if ($request->hasFile('border_image')){
                $oldImage =$services->border_image;
                if (file_exists($oldImage)) @unlink($oldImage);
                $validated['border_image']= $this->customSaveImage($request->file('border_image'), 'service/border_image');
            }
           $services->update($validated);
            DB::commit();
            return redirect()->route('admin.service.index')->with('success','Service updated successfully.');
        } catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.service.index')->with('error','Something went wrong. Please try again later.')->withInput();
        }
    }
}
