<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {
        return redirect('/');

    }

    public function check_auth() {



        if(Auth::check()) {
            // return response()->json('user is logged in');

            $user = Auth::user();
            return response()->json($user);

        } else {
            return response()->json('no user logged in');
        }

    }
}
