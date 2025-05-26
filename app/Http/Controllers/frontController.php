<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function details($slug)
    {
        return view('front.details', compact('slug'));
    }

    public function category($slug)
    {
        return view('front.category', compact('slug'));
    }

    public function author($slug)
    {
        return view('front.author', compact('slug'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        return view('front.search', compact('query'));
    }
}
