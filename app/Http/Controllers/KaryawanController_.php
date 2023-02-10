<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    //
    function index()
    {
        $data = karyawan::all();
        return view('karyawan/index')->with('data', $data);
    }
    function detail($id)
    {
        return "<h1> Saya Karyawan dengan ID $id</h1>";
    }
    function create(){

    }
    function delete(){

    }
}
