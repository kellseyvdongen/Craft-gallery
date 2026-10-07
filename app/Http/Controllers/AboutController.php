<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $company = 'CraftGallery';
        return view('about-us', compact('company'));
    }
}
