<?php

namespace App\Http\Controllers\Backend;


use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::latest()->paginate(10);
        return view('backend.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('backend.faq.create');
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'title'       => 'required',
            'description' => 'required'
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        DB::beginTransaction();
        try {

            $validated = $validated->validated();
            Faq::create($validated);
            DB::commit();
            return redirect()->route('admin.faq.index')->with('success','FAQ created successfully.');
        } catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.faq.index')->with('error','Something went wrong. Please try again later.')->withInput();
        }
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('backend.faq.edit', compact('faq'));
    }

    public function update(Request $request,$id)
    {
        $validated = Validator::make($request->all(),[
            'title'       => 'required',
            'description' => 'required'
        ]);

        if ($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }

        DB::beginTransaction();
        try {

            $faq       = Faq::findOrFail($id);
            $validated = $validated->validated();
            $faq->update($validated);
            DB::commit();
            return redirect()->route('admin.faq.index')->with('success','FAQ updated successfully.');
        } catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.faq.index')->with('error','Something went wrong. Please try again later.')->withInput();
        }
    }
}
