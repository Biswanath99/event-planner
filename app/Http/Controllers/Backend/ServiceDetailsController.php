<?php

namespace App\Http\Controllers\Backend;

use App\FileUpload;
use App\Models\{Services,ServiceDetails};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ServiceDetailsController extends Controller
{
    use FileUpload;

    public function index()
    {
        $serviceDetails = ServiceDetails::with('service')->latest()->paginate(5);
        return view('backend.serviceDetails.index', compact('serviceDetails'));
    }

    public function create()
    {
        $services = Services::get();
        return view('backend.serviceDetails.create', compact('services'));
    }

    public function store(Request $request)
    {

        $validated = Validator::make($request->all(), [
            'service_id'  => 'required',
            'title'       => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'description' => 'nullable'
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        DB::beginTransaction();

        try {

            $validated = $validated->validated();
            if($request->hasFile('image')){
                $validated['image'] = $this->customSaveImage($request->file('image'),'service_details/details_image');
            }
            ServiceDetails::create($validated);
            DB::commit();
            return redirect()->route('admin.service-details.index')->with('success', 'Service details created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong.')->withInput();
        }
    }

    public function edit($id)
    {
        $services        =  Services::get();
        $serviceDetails  =  ServiceDetails::with('service')->findOrFail($id);
        return view('backend.serviceDetails.edit', compact('services', 'serviceDetails'));
    }

    public function update(Request $request, $id)
    {
        $serviceDetails  =  ServiceDetails::with('service')->findOrFail($id);

        $validated = Validator::make($request->all(), [
            'service_id'  => 'required',
            'title'       => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'description' => 'nullable'
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        DB::beginTransaction();

        try {

            $validated = $validated->validated();

             if($request->hasFile('image')){
                if ( $serviceDetails->image && file_exists( $serviceDetails->image)) {
                    @unlink( $serviceDetails->image);
                }
                $validated['image'] = $this->customSaveImage($request->file('image'), 'service_details/details_image');
            }

            $serviceDetails->update($validated);
            DB::commit();
            return redirect()->route('admin.service-details.index')->with('success', 'Service details updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.')->withInput();
        }
    }
}
