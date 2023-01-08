<?php

namespace App\Http\Controllers;

use App\Models\Pengajar;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cari = request('cari');
        if ($cari) {
            $pengajar = Pengajar::where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $pengajar = Pengajar::latest()->paginate(10);
        }
        $data = [
            'title'   => 'Manajemen Pengajar',
            'pengajar' => $pengajar,
            'content' => 'admin/pengajar/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $data = [
            'title'   => 'Manajemen Pengajar',
            'content' => 'admin/pengajar/add'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name'        => 'required',
            'tempat_lahir'        => 'required',
            'tanggal_lahir'        => 'required',
            'gender'        => 'required',
            'agama'              => 'required|min:3',
            'sd'              => 'required|min:3',
            'smp'              => 'required|min:3',
            'sma'              => 'required|min:3',
            'kampus'              => 'required|min:3',
            'jurusan'              => 'required',
            'bio'              => 'required|min:3',
            'foto'              => 'required:mimes:jpg,png',
        ]);

        //perbaiki upload fotonya
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $file_name = time() . "_" . $foto->getClientOriginalName();

            $storage = 'uploads/pengajars/';
            $foto->move($storage, $file_name);
            $data['foto'] = $storage . $file_name;
        } else {
            $data['foto'] = NULL;
        }

        Pengajar::create($data);
        Alert::success('Sukses', 'Pengajar telah ditambahkan');
        return redirect('/admin/pengajar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = [
            'title'   => 'Manajemen Pengajar',
            'pengajar' => Pengajar::find($id),
            'content' => 'admin/pengajar/show'
        ];
        return view('admin/layouts/wrapper', $data);
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
        $data = [
            'title'   => 'Manajemen Pengajar',
            'pengajar'    => Pengajar::find($id),
            'content' => 'admin/pengajar/add'
        ];
        return view('admin/layouts/wrapper', $data);
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
        //
        //
        // die('Adakah');
        //
        $pengajar = Pengajar::find($id);
        $data = $request->validate([
            'name'        => 'required',
            'tempat_lahir'        => 'required',
            'tanggal_lahir'        => 'required',
            'gender'        => 'required',
            'agama'              => 'required|min:3',
            'sd'              => 'required|min:3',
            'smp'              => 'required|min:3',
            'sma'              => 'required|min:3',
            'kampus'              => 'required|min:3',
            'jurusan'              => 'required',
            'bio'              => 'required|min:3',
            'foto'              => 'mimes:jpg,png',
        ]);

        //perbaiki upload fotonya
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $file_name = time() . "_" . $foto->getClientOriginalName();

            $storage = 'uploads/images/';
            $foto->move($storage, $file_name);
            $data['foto'] = $storage . $file_name;
        } else {
            $data['foto'] = $pengajar->foto;
        }

        $pengajar->update($data);
        Alert::success('Sukses', 'Pengajar telah diubah');
        return redirect('/admin/pengajar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //
        $pengajar = Pengajar::find($id);
        if ($pengajar->foto != '') {
            unlink($pengajar->foto);
        }
        $pengajar->delete();
        Alert::success('Sukses', 'Pengajar sukses dihapus');
        return redirect('/admin/pengajar');
    }
}
