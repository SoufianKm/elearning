<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Cour;
use App\Somestre;
use App\Module;

class select_multi extends Controller
{
    //
     public function index(){

   	$filiere = DB::table("filliere")->pluck("libelle","id");
      /* $somester = DB::table("somestre")->pluck("libelle","id");
       $module = DB::table("module")->pluck("libelle","id");
            return view('home',compact('filiere','somester','module'));*/
            return view('prof.select_multi',compact('filiere'));

   }

   public function fetch(Request $request)
    {
     $filiere = $request->input('filiere_id');
     $data = Somestre::where("id_filliere",$filiere)->get();
     return response()->json($data);
    }

    public function getSemestre(Request $request){
      $semestre = $request->input('semestre_id');
      $data = Module::where('id_semestre',$semestre)->get();
      return response()->json($data);
    }

   public function ajouter_cours(Request $request){
 
        //get file name with extention
          $fileNameWithEX = $request->file('cours')->getClientOriginalName();

         //get file extension 
          $fileExtension = $request->file('cours')->getClientOriginalExtension();

          //get just the file name 
          $fileName = pathinfo($fileNameWithEX,PATHINFO_FILENAME);
 
          // file name to storage
          $fileNameTo_storage = $fileName."_".time().".".$fileExtension;
        
          //testing the extension 
           if($fileExtension == 'pdf'){
              $request->file("cours")->storeAs("public/".$request->input('filiere')."/".$request->input('semestre')."/".$request->input('module')."/".Auth::id(),$fileNameTo_storage);

            }else{
              echo "the file must be PDF file !!";
            
            }

      $ImageName = $request->file('image')->getClientOriginalName();

      $cour = new Cour();
      $cour->libelle=$fileNameTo_storage;
      $cour->id_module=$request->input('module');
      $cour->description=$request->input('description');
      $cour->image=$ImageName;
      $cour->id_prof=Auth::id();
      $cour->save();
      
       

       $request->file("image")->storeAs("public/".$request->input('filiere')."/".$request->input('semestre')."/".$request->input('module')."/".Auth::id(),$ImageName);
      echo "OK OK Ok Ok";
         
   }


   public function showFiles(){

        $files = DB::table('cours')->select('libelle')->get();

        return view('prof.showFiles',compact('files'));

   }
}
