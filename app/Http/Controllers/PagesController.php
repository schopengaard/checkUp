<?php

namespace checkUp\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Get Index Page (/)
    public function getIndex() {
        return view('pages.index');
    }

    // Get About Page (/About)
    public function getSearch() {
        return view('pages.search');
    }
}
