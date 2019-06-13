<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;



class ViewProf extends Controller
{
    //
    public function index(){
    	$profs = DB::select('select * from professeur');
    	return view('viewprof',['professeurs'=>$profs]);
    	
    }
    public function addprof(){
    	
    }
    public function delete($id){
    	DB::delete('delete from professeur where id_user = ?',[$id]);
    	DB::delete('delete from users where id = ?',[$id]);
    	echo '<a href = "/view">Click Here</a> to go back.';
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect('register');
    }

    public function check(){
    
    $check = DB::table('users')->where('id',[Auth::id()])->value('type');
    // $check2 = $check->toArray();
    $prof = "professeur";

    if ($prof === $check) {
            echo "good work";
             // return redirect('addprof');
            echo '<a href = "/addprof">Click Here</a> to go back.';
    } else {
        
        print_r($check);
        Auth::logout();
        return redirect('register');


    }
    }
    
}
