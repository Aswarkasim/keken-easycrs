<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Nonstandard\Uuid;
use RealRashid\SweetAlert\Facades\Alert;

class AdminProfileController extends Controller
{
    //
    function index()
    {
        $profile  = DB::table('profiles')->where('id', '1')->first();
        $data = [
            'title'   => 'Profil',
            'profile' => $profile,
            'content' => 'admin/profile/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function update(Request $request)
    {
        $profile  = Profile::find('1')->first();

        $data = $request->validate([
            'desc' => 'required',
            'gambar' => 'required',
        ]);

        //perbaiki upload logonya
        if ($request->hasFile('gambar')) {

            if ($profile->gambar != '') {
                unlink($profile->gambar);
            }

            $gambar = $request->file('gambar');
            $uuid1 = Uuid::uuid4()->toString();
            $uuid2 = Uuid::uuid4()->toString();
            $file_name = $uuid1 . $uuid2 . '.' . $gambar->getClientOriginalExtension();

            $storage = 'uploads/images/';
            $gambar->move($storage, $file_name);
            $data['gambar'] = $storage . $file_name;
        } else {
            $data['gambar'] = $profile->logo;
        }

        $profile->update($data);
        Alert::success('Sukses', 'Profil telah diperbaharui');
        return redirect('/admin/profile');
    }
}
