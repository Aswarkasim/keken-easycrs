<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Kategori;
use App\Models\Kelas;
use Illuminate\Http\Request;

class HomeKelasController extends Controller
{
    //
    function index()
    {
        $kategori_id = request('kategori_id');

        $kelas = Kelas::paginate(9);

        $data = [
            'kelas'          => $kelas,
            'kategori'      => Kategori::all(),
            'kategori_detail' => Kategori::find($kategori_id),
            'content'       => 'home/kelas/index'
        ];
        return view('home/layouts/wrapper', $data);
    }

    function show($id)
    {
        $kelas = Kelas::find($id);
        $data = [
            'kelas'          => $kelas,
            'kategori'      => Kategori::all(),
            'kontak'   => Configuration::first(),
            'content'       => 'home/kelas/show'
        ];
        return view('home/layouts/wrapper', $data);
    }
}
