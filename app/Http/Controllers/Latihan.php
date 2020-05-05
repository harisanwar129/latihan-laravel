<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Latihan extends Controller
{
    public function input()
    {
        return view('input');
    }

    public function proses(Request $request)
    {
        $messages = [
    'required' => ':attribute tolong Untuk Di isi!',
    'min' => ':attribute harus diisi minimal :min karakter ya ',
    'max' => ':attribute harus diisi maksimal :max karakter ya ',
];

        $this->validate($request,[
           'nama' => 'required|min:10|max:20',
           'kelas' => 'required',
           'npm' => 'required|numeric',
           'umur' => 'required|numeric'
        ],$messages);

        return view('proses',['data' => $request]);
    }
}
