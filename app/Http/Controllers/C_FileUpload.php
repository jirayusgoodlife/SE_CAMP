<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_File as File;
use Illuminate\Support\Facades\Storage;

class C_FileUpload extends Controller
{

    public function index(Request $req){

    }
    //
    public function fileUpload(Request $req){
    // $req->validate([
    // 'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
    // ]);
    $fileModel = new File;
    if($req->file()) {
    $fileName = time().'_'.$req->file->getClientOriginalName();
    $filePath = $req->file('file')->storeAs('uploads', $fileName, 'local');
    $fileModel->name = time().'_'.$req->file->getClientOriginalName();
    $fileModel->file_path = '/storage/' . $filePath;
    $fileModel->save();
    return back()
    ->with('success','File has been uploaded.')
    ->with('file', $fileName);
    }
    }
}
