<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cours;

class select_multi extends Controller
{
    //
     public function index(){

   	$filiere = DB::table("filliere")->pluck("libelle","id");
       $somester = DB::table("somestre")->pluck("libelle","id");
       $module = DB::table("module")->pluck("libelle","id");
            return view('prof.select_multi',compact('filiere','somester','module'));

   }

   public function ajouter_cours(Request $request){
      $cour = new Cours();
      $fileName = $request->file('cours')->getClientOriginalName();
      //$ImageName = $request->file('image')->getClientOriginalName();
      $cour->libelle=$fileName;
     // $cour->id_filiere=$request->input('filiere');
      $cour->id_module=$request->input('module');
      $cour->description=$request->input('description');
     // $cour->image=$ImageName;
      $cour->id_prof=1;
      $cour->save();

      echo "OK OK Ok Ok";
      
       $request->file("cours")->storeAs("public/".$request->input('filiere')."/".$request->input('semestre')."/".$request->input('module')."/1/",$fileName);

     /*  $request->file("image")->storeAs("public/".$request->input('filiere')."/".$request->input('semestre')."/1/",$ImageName);*/
         
   }


   public function showFiles(){

        $files = DB::table('cours')->select('libelle')->get();

        return view('prof.showFiles',compact('files'));

   }
}
