<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class insert extends Controller
{
    public function index(){
return view('create');
}
    
    public function insert(Request $request){

     
      
        
    	$nom = $request->input('nom');
    	$prenom = $request->input('prenom');
    	$cin = $request->input('cin');
    	$adresse = $request->input('adresse');
    	$tel = $request->input('tel');
       
       if ($request->hasfile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'.$extension;
           $file->move('uploads',$filename);
           $photo = $filename;
           $id_user = $request->input('id_user');
        $data=array('nom'=>$nom,'prenom'=>$prenom,'cin'=>$cin,'adresse'=>$adresse,'tel'=>$tel,
            'photo'=>$photo,'id_user'=>$id_user);
        DB::table('professeur')->insert($data);
        echo "record inserted successfully";
        echo '<a href = "/view">Click Here</a> to go back.';
       }else {
        echo "coco";

       }
        
       
            
       
        
        
          


    }
}
