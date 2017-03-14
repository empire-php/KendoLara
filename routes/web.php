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

//Route::get('/', function () {
//    return view('welcome');
//});
// Route::get("/kendo","kendocontroller@datepicker");

Route::get('/', function () {
   return view('welcome');
});
Route::get('/courosel', function () {
   return view('courosel');
});
Route::get('/about', function () {
	$about=['This','is','Laravel'];
   return view('about', compact('about'));
});
Route::get('/datepicker', function () {
   return view('datepicker');
});
Route::get('/grid', function () {
   return view('grid');
});
Route::get('/treeview', function () {
   return view('treeview');
});
Route::get('/tabstrip', function () {
   return view('tabstrip');
});
Route::get('/chart', function () {
   return view('chart');
});
Route::get('/treelist', function () {
   return view('treelist');
});
Route::get('/media', function () {
   return view('media');
});
Route::get('/scheduler', function () {
   return view('scheduler');
});
Route::get('/modal', function () {
   return view('modal');
});
Route::get('/export', function () {
   return view('export');
});