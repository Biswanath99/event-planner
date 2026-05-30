<?php

namespace App\Http\Controllers\Backend;

use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class NewsLettersController extends Controller
{
    public function index()
    {
        $newsletters = NewsLetter::latest()->paginate(5);
        return view('backend.newsLetters.index',compact('newsletters'));
    }

}
