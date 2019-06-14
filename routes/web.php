<?php







/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Begin Home Routes

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//End Home Routes
//Begin Professeur Routes

Route::get('/view', 'ViewProf@index')->name('view');
Route::get('delete/{id}','ViewProf@delete');
Route::get('addprof',function(){
	return view('addprof');
})->name('addprof');
Route::get('/create','insert@index');
Route::post('/create','insert@insert')->name('create');

Route::get('/adminhome',function(){
	return view('adminhome');
});

Route::get('/addprof2','ViewProf@check');
//End Professeur Routes  
//begin upload files
Route::get('/home',"select_multi@index");

Route::get('/select_multi',"select_multi@index");


Route::post('/add_cour',"select_multi@ajouter_cours");


Route::get('/showFiles',"select_multi@showFiles");
//end upload files

Route::post('/select_multi/fetch', 'select_multi@fetch')->name('select_multi.fetch');

Route::post('/select_multi/getSemestre','select_multi@getSemestre')->name('select_multi.getSemestre');

Route::post('/etudiant_controller/getModule', 'etudiant_controller@getModule')->name('etudiant_controller.getModule');

Route::post('/etudiant_controller/getCours', 'etudiant_controller@getCours')->name('etudiant_controller.getCours');
//start etudiant route

Route::get('/etudiant_home',"etudiant_controller@getSemesters");
//Route::get('/etudiant_home',"etudiant_controller@getModule/{id}");

//star user
Route::get('/verifuser',"HomeController@verifuser");
//end user

