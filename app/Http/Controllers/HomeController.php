<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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
    public function index()
    {
        return view('home');
    }

    public function verifuser()
    {
        $check = DB::table('users')->where('id',[Auth::id()])->value('type');
        if ($check === "professeur") {
            return view('home');
        }elseif ($check === "etudiant") {
            
        }else{
            return view('homeadmin');
        }
    }
}
