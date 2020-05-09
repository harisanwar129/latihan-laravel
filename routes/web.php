<?php
use App\Dosen;
use App\Mahasiswa;
use App\Matakuliah;
use App\Post;
use App\Video;
use App\Comment;
use App\Tag;
use App\Taggable;

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
// Route::get('/read',function(){
// $dosens=App\Dosen::all();
// // $dosens=App\Dosen::where('status',1)
// //         ->orderBy('nama','asc')->get();
// foreach($dosens as $dosen){
//     echo $dosen->nama."<br>";
// }
// });
// Route::get('/find',function(){
//     // $dosen=App\Dosen::find('333');
//     // $dosen=App\Dosen::where('status',1)->first();
//     $dosen=App\Dosen::firstWhere('status',1);
//     echo $dosen->nama; 
// });
// Route::get('/insert',function(){
// // $dosen= new App\Dosen;
// // $dosen->nidn='444';
// // $dosen->nama='Dosen D';
// // $dosen->save();
// $dosen=App\Dosen::create(['nidn'=>'555','nama'=>'Dosen E','keterangan'=>'aktif']);
// });

// Route::get('/update',function(){
// // $dosen=App\Dosen::find('333');
// // $dosen->nama='Dosen Ke Tiga';
// // $dosen->save();
// $dosen=App\Dosen::where('status',0)
//         ->update(['keterangan'=>'tidak aktif']);
// });

// Route::get('/delete',function(){
//     // $dosen=App\Dosen::find('555');
//     // $dosen->delete();
//     $dosen=App\Dosen::destroy('555');
//     // $dosen=App\Dosen::where('status',0)->delete();
// });
// Route::get('/trash',function(){
//     $dosens=App\Dosen::onlyTrashed()
//     ->get();
//     // $dosens=App\Dosen::withTrashed()
//     // ->get();
//     foreach ($dosens as $dosen){
//         echo $dosen->nama.'<br>';
//     }
// });
// Route::get('/restore',function(){
//     $dosen=App\Dosen::onlyTrashed()
//     // ->where('nidn','444')
//     ->restore();

// });
// Route::get('/forceDelete',function(){
//     $dosen=App\Dosen::onlyTrashed()
//     // ->where('nidn','444')
//     ->forceDelete();

// });
// //elequent relasitonship
// //one to one
// Route::get('dosen/mhs/{nidn}',function($nidn){
//     return Dosen::find($nidn)->mahasiswa;
// });
// // invers one to one
// Route::get('mhs/dosen/{npm}',function($npm){
//     return Mahasiswa::find($npm)->dosen;
//     // return Mahasiswa::find($npm)->dosen->nama;
// });
// // Route::get('dosen/allMhs/{nidn}',function($nidn){
// //     return Dosen::find($nidn)->allMhs;
// // });
// //one to many
// Route::get('dosen/allMhs/{nidn}',function($nidn){
//     $mhs= Dosen::find($nidn)->allMhs;
//     foreach ($mhs as $mahasiswa){
//         echo $mahasiswa->nama.'<br>';
//     }
//     });
//     // many to many
// Route::get('dosen/matkul/{nidn}',function($nidn){
// return Dosen::find($nidn)->matkul;

// });
// Route::get('matkul/dosen/{kode_matkul}',function($kode_matkul){
// return Matakuliah::find($kode_matkul)->dosens;

// });
// // has one throggt
// Route::get('dosen/krs/{nidn}',function($nidn){
// return Dosen::find($nidn)->oneKrs;

// });
// // has many throught
// Route::get('dosen/manykrs/{nidn}',function($nidn){
// // return Dosen::find($nidn)->manyKrs->where('npm','020202');
// $krs= Dosen::find($nidn)->manyKrs->where('npm','010101');
// foreach ($krs as $mhs ){
//     echo $mhs->npm. ' - '. $mhs->kode_matakuliah.'<br>';
// }

// });

// //polymorphic
// //one to one
// Route::get('post/{id}/comment',function($id){
// return Post::find($id)->comment;

// });      
// Route::get('video/{id}/comment',function($id){
// return Video::find($id)->comment;

// });      
// //one to many
// Route::get('post/{id}/comments',function($id){
// return Post::find($id)->comments;

// });      
// // Route::get('video/{id}/comments',function($id){
// // return Video::find($id)->comments;
// Route::get('video/{id}/comments',function($id){
// $parentPost= Video::find($id);
// $videos=$parentPost->comments;
// echo $parentPost->title;
// echo "<br/>Komentar:<br/>";
// foreach ($videos as $video){
//     echo '- '.$video->content.'<br/>';
// }
// });  

// //many to many
// Route::get('tags/{id}/post',function($id){
// return Post::find($id)->tags;
// }); 
// //many to many
// Route::get('tags/{id}/video',function($id){
// return Video::find($id)->tags;
// }); 
// //insert post
// Route::get('video/{id}/post_comment',function($id){
// $comment= new Comment([
//     'content'=>'ini adalah komentar'
// ]);
// $video=Video::find($id);
// $video->comments()->save($comment);
// }); 
// //update commet
// Route::get('video/{id}/update_comment',function($id){
// $comment=Comment::find($id);
// $comment->content='Update Coment';
// $comment->save();
// }); 
// //Delete commet
// Route::get('video/{id}/delete_comment',function($id){
// $comment=Comment::find($id);
// $comment->delete();
// }); 


//MANY TO MANY
//CREATE
// Route::get('video/create',function(){
// $video=Video::create([
//     'title'=>'Video Ketiga',
//     'path'=>'myVideo_3.mp4'
// ]);
// $tag=Tag::find(2);
// $video->tags()->save($tag);
// }); 


//#############################
//#############################
// --------- TUGAS------------
//#############################
//#############################
//UPDATE
// Route::get('video/{video}/tag/{untag}/ganti/{tag}', function ($video, $untag, $tag) {
//     $video = Video::find($video);
//     $video->tags()->detach($untag);
//     $video->tags()->attach($tag);
// });

//DELETE
// Route::get('video/{video}/untag/{tag}', function ($video, $tag) {
//     $video = Video::find($video);
//     $video->tags()->detach($tag);
// });
Route::get('/', function () {
    return view('welcome');
});
// CRUD + MODAL
Route::resource('dosen','DosenController');
Route::post('dosen/emptyAll','DosenController@emptyAll');
Route::post('dosen/restoreAll','DosenController@restoreAll');
Route::post('dosen/restore','DosenController@restore');
Route::post('dosen/forceDelete','DosenController@forceDelete');




//#############################
//#############################
// --------- TUGAS------------
//#############################
//#############################
Route::get('/input', 'Latihan@input');

Route::post('/proses', 'Latihan@proses');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// auth admin
Route::prefix('admin')->group(function(){
    Route::get('/login','Auth\LoginController@showAdminLoginForm')->name('admin.login');
    Route::post('/login','Auth\LoginController@adminLogin')->name('admin.login.submit');
    Route::post('/logout','Auth\LoginController@logout')->name('admin.logout');

    //dasbord
    Route::get('/dasboard','Admin\HomeController@index')->name('admin.home');

});

