<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // This is the function on the HomeController for the admin and the user home page.
    public function index(Request $request)
    {
        $user = Auth::user();
        $home = 'home';

        // If the user has an 'admin' role, it will direct the user to the admin home page.
        if ($user->hasRole('admin')) {
            $home = 'admin.home';
        }
        // If the user has a 'user' role, it will direct the user to the user home page.
        else if ($user->hasRole('user')) {
            $home = 'user.home';
        }
        return redirect()->route($home);
    }
}
