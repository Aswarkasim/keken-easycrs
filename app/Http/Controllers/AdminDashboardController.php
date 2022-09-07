<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Lowongan;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    function index()
    {
        $data = [
            'kelas'   => Kelas::count(),
            'lowongan'   => Lowongan::count(),
            'content' => 'admin/dashboard/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }
}
