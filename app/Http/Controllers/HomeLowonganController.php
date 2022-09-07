<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Lowongan;
use Illuminate\Http\Request;

class HomeLowonganController extends Controller
{
    //
    function index()
    {
        $kategori_id = request('kategori_id');

        $lowongan = Lowongan::paginate(9);

        $data = [
            'lowongan'          => $lowongan,
            'kategori'      => Kategori::all(),
            'kategori_detail' => Kategori::find($kategori_id),
            'content'       => 'home/lowongan/index'
        ];
        return view('home/layouts/wrapper', $data);
    }

    function show($id)
    {
        $lowongan = Lowongan::find($id);
        $data = [
            'lowongan'          => $lowongan,
            'kategori'      => Kategori::all(),
            'content'       => 'home/lowongan/show'
        ];
        return view('home/layouts/wrapper', $data);
    }
}
