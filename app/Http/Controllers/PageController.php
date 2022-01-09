<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// This PageController calls out the 'welcome' function and the 'about' function.
class PageController extends Controller
{
    public function welcome() {
        return view ('welcome');
    }

    public function about() {
        return view ('about');
    }
}
