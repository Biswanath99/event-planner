<?php

namespace App\Http\Controllers\Backend;

use App\FileUpload;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
     use FileUpload;

     public function index()
    {
        $banners = Banner::latest()->paginate(10);
        return view('backend.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('backend.banner.create');
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'sub_title'    => 'nullable|string|max:255',
            'border_image' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'image'        => 'required|mimes:jpg,jpeg,png,webp|max:4096'
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        DB::beginTransaction();
        try {

            $validated = $validated->validated();

            if($request->hasFile('border_image')){
                $validated['border_image'] = $this->customSaveImage($request->file('border_image'),'banner/border_image');
            }

            if($request->hasFile('image')){
                $validated['image'] = $this->customSaveImage($request->file('image'),'banner/banner_image');
            }

            Banner::create($validated);
            DB::commit();
            return redirect()->route('admin.banner.index')->with('success','Banner created successfully.');
        } catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.banner.index')->with('error','Something went wrong. Please try again later.')->withInput();
        }
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('backend.banner.edit', compact('banner'));
    }

    public function update(Request $request,$id)
    {
         $validated = Validator::make($request->all(), [
            'sub_title'    => 'nullable|string|max:255',
            'border_image' => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'image'        => 'nullable|mimes:jpg,jpeg,png,webp|max:4096'
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        DB::beginTransaction();
        try {

            $banner = Banner::findOrFail($id);

            $validated = $validated->validated();

             if ($request->hasFile('image')){
                $oldImage = $banner->image;
                if (file_exists($oldImage)) @unlink($oldImage);
                $validated['image']= $this->customSaveImage($request->file('image'), 'banner/banner_image');
            }

            if ($request->hasFile('border_image')){
                $oldImage =$banner->border_image;
                if (file_exists($oldImage)) @unlink($oldImage);
                $validated['border_image']= $this->customSaveImage($request->file('border_image'), 'banner/border_image');
            }

            $banner->update($validated);
            DB::commit();
            return redirect()->route('admin.banner.index')->with('success','Banner updated successfully.');
        } catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.banner.index')->with('error','Something went wrong. Please try again later.')->withInput();
        }
    }
}
