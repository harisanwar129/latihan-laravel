<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosens=Dosen::all();
        $trash=Dosen::onlyTrashed()->get();
        return view ('dosen',compact('dosens','trash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dosen=new Dosen;
        $dosen->nidn= $request->get('nidn');
        $dosen->nama= $request->get('nama');
        $dosen->keterangan= $request->get('keterangan');
        $dosen->status= '1';
        $dosen->save();
        return redirect ('dosen')->with('added_success','Data Sudah Berhasil Ditambahakan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dosen=Dosen::getDosen($id);
        return response()->json($dosen);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dosen=Dosen::where('nidn',$request->get('nidn'))
                ->update([
                    'nama'=>$request->get('nama'),
                    'status'=>$request->get('status'),
                    'keterangan'=>$request->get('keterangan')
                ]);
                 return redirect ('dosen')->with('edited_success','Data Sudah Berhasil DiUbah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         $dosen=Dosen::where('nidn',$request->get('nidn'))
                ->delete();
                 return redirect ('dosen')->with('deleted_success','Data Sudah Berhasil Di Hapus');
    }
    public function emptyAll(){
        Dosen::onlyTrashed()
        ->forceDelete();
            return redirect ('dosen')->with('empty_success','Semua data Sudah Berhasil Di Hapus');
    }
    public function restoreAll(){
           Dosen::onlyTrashed()
        ->restore();
            return redirect ('dosen')->with('restore_all_success','Semua data Sudah Berhasil Di Kembalikan');
    }
    public function restore(Request $request){
        Dosen::onlyTrashed()
        ->where('nidn',$request->get('nidn'))
        ->restore();
            return redirect ('dosen')->with('restore_success','Data Sudah Berhasil Di Kembalikan');
    }
    public function forceDelete(Request $request){

 Dosen::onlyTrashed()
        ->where('nidn',$request->get('nidn'))
        ->forceDelete();
            return redirect ('dosen')->with('force_delete_success','Data Sudah Berhasil Di Hapus');
    }
}
