<?php

namespace App\Http\Controllers\Backend;

use App\FileUpload;
use App\Models\{Categories,Images};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ImagesController extends Controller
{
     use FileUpload;

    public function index()
    {
        $images = Images::with('category')->latest()->paginate(5);
        return view('backend.images.index', compact('images'));
    }

    public function create()
    {
        $categories = Categories::get();
        return view('backend.images.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'images'      => 'required|array|min:1',
            'images.*'    => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        DB::beginTransaction();

        try {

            $validated = $validated->validated();

            if ($request->hasFile('images')) {

                foreach ($request->file('images') as $image) {

                    $path = $this->customSaveImage($image, 'images/gallery_images');

                    Images::create([
                        'category_id' => $validated['category_id'],
                        'image'       => $path
                    ]);
                }
            }

            DB::commit();

            return redirect()
                ->route('admin.images.index')
                ->with('success', 'Images created successfully.');

        } catch (Exception $e) {

            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Something went wrong.')
                ->withInput();
        }
    }

    public function edit($id)
    {
        $categories = Categories::get();

        // এক category-এর সব images আনবে
        $images = Images::where('category_id', $id)->get();

        $category = Categories::findOrFail($id);

        return view('backend.images.edit', compact('categories', 'images', 'category'));
    }

    public function update(Request $request, $id)
    {
        $image = Images::findOrFail($id);

        $validated = Validator::make($request->all(), [
            'category_id' => 'required',
            'images'      => 'required|array',
            'images.*'    => 'image|mimes:jpg,jpeg,png,webp'
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        DB::beginTransaction();

        try {

            $validated = $validated->validated();

            /**
             * STEP 1: পুরনো category-এর সব images delete
             */
            $oldImages = Images::where('category_id', $image->category_id)->get();

            foreach ($oldImages as $old) {

                if ($old->image && file_exists(public_path($old->image))) {
                    @unlink(public_path($old->image));
                }

                $old->delete();
            }

            /**
             * STEP 2: নতুন images insert
             */
            foreach ($request->file('images') as $file) {

                $path = $this->customSaveImage(
                    $file,
                    'images/gallery_images'
                );

                Images::create([
                    'category_id' => $validated['category_id'],
                    'image'       => $path,
                ]);
            }

            DB::commit();

            return redirect()
                ->route('admin.images.index')
                ->with('success', 'Images replaced successfully.');

        } catch (\Exception $e) {

            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Something went wrong. Please try again later.')
                ->withInput();
        }
    }
}
