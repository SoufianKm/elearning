<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Somestre;
use App\Module;
use App\Cour;

class etudiant_controller extends Controller
{
    public function getSemesters(){

    	$semestre= DB::table('somestres')->where('id_filliere', '=', 2)->get();
    	return view('etudiant.etudiant_home',compact('semestre'));
    }

   /* public function getModule($id){
    	//$module = DB::table('module')->where('id_semestre','=',$id);
    	$module =DB::table('select id,libelle from module where id_semestre = ?',[$id]);
    	return view('etudiant.etudiant_home',['modules'=>$module]);
    		//return view('etudiant.etudiant_home',compact('module'));

    }*/

    public function getModule(Request $req){
      $semestre = $req->input('semestre_id');
      $data = Module::where('id_semestre',$semestre)->get();
     return response()->json($data);
     
    }

    public function getCours(Request $req){
      $module = $req->input('module_id');
        $data = Cour::where('id_module',$module)->get();
        return response()->json($data);

    }












}
