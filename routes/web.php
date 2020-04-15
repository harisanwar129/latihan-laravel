<?php
// use App\Dosen;
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
/*
Route::get('/', function () {
    return view('welcome');
});
Route::get('/user/{name?}',function($name=null){
    if($name==null){
 return 'hello';
    }else{
        return 'hello'.$name;
    }
   
})->name('profile');

// Route::get('/coba', function () {
//     return view('coba');
// });
Route::get('/coba',"CobaController@show");
Route::resource('mhs','MhsController');

Route::get('/boostrap', function () {
    return view('boostrap');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/
// Route::get('/read',function(){
// $dosens=Dosen::all();
// foreach($dosens as $dosen){
//     echo $dosen->nama."<br>";
// }
// });
Route::get('/read',function(){
$dosens=App\Dosen::all();
// $dosens=App\Dosen::where('status',1)
//         ->orderBy('nama','asc')->get();
foreach($dosens as $dosen){
    echo $dosen->nama."<br>";
}
});
Route::get('/find',function(){
    // $dosen=App\Dosen::find('333');
    // $dosen=App\Dosen::where('status',1)->first();
    $dosen=App\Dosen::firstWhere('status',1);
    echo $dosen->nama; 
});
Route::get('/insert',function(){
// $dosen= new App\Dosen;
// $dosen->nidn='444';
// $dosen->nama='Dosen D';
// $dosen->save();
$dosen=App\Dosen::create(['nidn'=>'555','nama'=>'Dosen E','keterangan'=>'aktif']);
});

Route::get('/update',function(){
// $dosen=App\Dosen::find('333');
// $dosen->nama='Dosen Ke Tiga';
// $dosen->save();
$dosen=App\Dosen::where('status',0)
        ->update(['keterangan'=>'tidak aktif']);
});

Route::get('/delete',function(){
    // $dosen=App\Dosen::find('555');
    // $dosen->delete();
    $dosen=App\Dosen::destroy('555');
    // $dosen=App\Dosen::where('status',0)->delete();
});
Route::get('/trash',function(){
    $dosens=App\Dosen::onlyTrashed()
    ->get();
    // $dosens=App\Dosen::withTrashed()
    // ->get();
    foreach ($dosens as $dosen){
        echo $dosen->nama.'<br>';
    }
});
Route::get('/restore',function(){
    $dosen=App\Dosen::onlyTrashed()
    // ->where('nidn','444')
    ->restore();

});
Route::get('/forceDelete',function(){
    $dosen=App\Dosen::onlyTrashed()
    // ->where('nidn','444')
    ->forceDelete();

});