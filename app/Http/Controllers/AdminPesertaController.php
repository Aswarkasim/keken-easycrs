<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPesertaController extends Controller
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
            $peserta = Peserta::where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $peserta = Peserta::latest()->paginate(10);
        }
        $data = [
            'title'   => 'Manajemen Peserta',
            'peserta' => $peserta,
            'content' => 'admin/peserta/index'
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
            'title'   => 'Manajemen Peserta',
            'content' => 'admin/peserta/add'
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
            'bio'              => 'required|min:3',
            'foto'              => 'required:mimes:jpg,png',
        ]);

        //perbaiki upload fotonya
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $file_name = time() . "_" . $foto->getClientOriginalName();

            $storage = 'uploads/pesertas/';
            $foto->move($storage, $file_name);
            $data['foto'] = $storage . $file_name;
        } else {
            $data['foto'] = NULL;
        }

        Peserta::create($data);
        Alert::success('Sukses', 'Peserta telah ditambahkan');
        return redirect('/admin/peserta');
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
            'title'   => 'Manajemen Peserta',
            'peserta' => Peserta::find($id),
            'content' => 'admin/peserta/show'
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
            'title'   => 'Manajemen Peserta',
            'peserta'    => Peserta::find($id),
            'content' => 'admin/peserta/add'
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
        $peserta = Peserta::find($id);
        $data = $request->validate([
            'name'        => 'required',
            'tempat_lahir'        => 'required',
            'tanggal_lahir'        => 'required',
            'gender'        => 'required',
            'agama'              => 'required|min:3',
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
            $data['foto'] = $peserta->foto;
        }

        $peserta->update($data);
        Alert::success('Sukses', 'Peserta telah diubah');
        return redirect('/admin/peserta');
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
        $peserta = Peserta::find($id);
        if ($peserta->foto != '') {
            unlink($peserta->foto);
        }
        $peserta->delete();
        Alert::success('Sukses', 'Peserta sukses dihapus');
        return redirect('/admin/peserta');
    }
}
