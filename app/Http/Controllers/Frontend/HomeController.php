<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Cms,Banner,Services,ServiceDetails,Faq};
use Illuminate\Support\Facades\Route;


class HomeController extends Controller
{
    public function index()
    {
        $banners   = Banner::where('status', 'published')->latest()->get();
        $we_do     = Cms::where('slug', 'what-we-do')->where('status', 'published')->first();
        $we_do_ext = $we_do ? json_decode($we_do->extra, true) : [];
        $about     = Cms::where('slug', 'about-us')->where('status', 'published')->first();
        $extra     = $about ? json_decode($about->extra, true) : [];
        $gallery   = Cms::where('slug', 'gallery')->where('status', 'published')->first();
        $gal_ext   = $gallery ? json_decode($gallery->extra, true) : [];
        $services  = Services::latest()->get();
        
        return view('frontend.index', compact('banners','we_do','we_do_ext','about','extra','gallery','gal_ext','services'));
    }

    public function serviceDetails($slug)
    {
        $service        = Services::where('slug', $slug)->firstOrFail();
        $serviceDetails = ServiceDetails::where('service_id', $service->id)->first();
        $services       = Services::all();

        return view('frontend.service-details', compact('service','serviceDetails','services'));
    }

    public function gallery()
    {
        return view('frontend.gallery');
    }

    public function galleryDetails()
    {
        return view('frontend.gallery-details');
    }

    public function aboutUs()
    {
        $about        = Cms::where('slug', 'about-us')->where('status', 'published')->first();
        $extra        = $about ? json_decode($about->extra, true) : [];
        $services     = Cms::where('slug', 'services')->where('status', 'published')->first();
        $services_ext = $services? json_decode($services->extra, true): [];
        $services_card = Services::latest()->get();
        return view('frontend.about-us', compact('about','extra','services','services_ext','services_card'));
    }

    public function contactUs()
    {
        $contact = Cms::where('slug', 'get-in-touch')->where('status', 'published')->first();
        $extra   = $contact ? json_decode($contact->extra, true) : [];
        return view('frontend.contact-us', compact('contact','extra'));
    }

    public function faq()
    {
        $faq         = Cms::where('slug', 'faq')->where('status', 'published')->first();
        $faq_details = Faq::latest()->get();
        return view('frontend.faq',compact('faq','faq_details'));
    }


    public function appointment()
    {
        return view('frontend.appointment');
    }

}
