<?php

namespace App\Http\Controllers;

use App\Record;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ((int)$user->role === (int)config('sleeping_owl.adminRoleName')) {
            return redirect('/admin');
        }

        $records = Record::with('firstProp','secondProp','thirdProp')->limit(10)->get();

        return view('home',['records' => $records]);
    }
}
