<?php

use App\Http\Controllers\RakBukuController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route:: view('/hello',function () {
//     return 'Hello World';
// });

Route::view('/hello','hello');

Route::get('/coba/{id}',function (string $id) {
    return view('coba', ['id'=>$id]);
});
Route::view('/biodata','biodata');

Route::post('/biodata',function (Request $request) {
   $output="Nama:  $request->nama <br> 
   Email:  $request->email <br>
   No. Hp: $request->no_hp ";
return $output;
});
Route::get('/buku', function(){
    $data=[];
    $data['poin']= 83;
    $data['flag']='2';
    $data['sub_judul']='latihan parsing data di view';
    $data['buku']= ['buku1','buku2','buku3','buku4','buku5'];
    return view('buku/list', $data);
});
Route::resource('rak_buku', RakBukuController::class);