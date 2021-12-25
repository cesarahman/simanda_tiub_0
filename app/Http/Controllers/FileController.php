<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function store()
    {
        $directory = 'assets/upload/file';
        $file = request()->file('file');
        $old = $file->getClientOriginalName();
        $nama = time().$file->getClientOriginalName();
        $file->$nama = $nama;
        $file->move($directory, $file->$nama);
        return \response()->json(['location' => $directory."/".$nama, 'alt'=>$old]);
    }

    public function retrieve()
    {
        return \response('assets/upload/file/'.'183140914111074Coba.pdf');
    }
}
