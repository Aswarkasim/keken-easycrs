<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Banner;
use App\Models\Configuration;
use App\Models\Kelas;
use App\Models\Lowongan;
use App\Models\Saran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{

    public function index()
    {
        //

        $data = [
            'banner'    => Banner::get(),
            'post'     => Post::with('category')->paginate(4),
            'kelas'    => Kelas::limit(4)->get(),
            'lowongan'    => Lowongan::limit(4)->get(),
            'kontak'   => Configuration::first(),
            'content'  => 'home/home/index'
        ];
        return view('home/layouts/wrapper', $data);
    }

    public function contact()
    {
        //

        $data = [
            'kontak'   => Configuration::first(),
            'content'  => 'home/home/contact'
        ];
        return view('home/layouts/wrapper', $data);
    }

    //functioon form send saran
    public function sendSaran(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'nohp' => 'required',
            'subjek' => 'required',
            'desc' => 'required'
        ]);
        Saran::create($data);
        Alert::success('Sukses', 'Saran anda telah terkirim');
        return redirect()->back()->with('success', 'Saran anda telah terkirim');
    }
}
