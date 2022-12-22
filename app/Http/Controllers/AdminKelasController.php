<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminKelasController extends Controller
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
            $kelas = Kelas::where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $kelas = Kelas::latest()->paginate(10);
        }
        $data = [
            'title'   => 'Manajemen Kelas',
            'kelas' => $kelas,
            'content' => 'admin/kelas/index'
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
            'title'   => 'Manajemen Kelas',
            'content' => 'admin/kelas/add'
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
            'harga'        => 'required',
            'kapasitas'        => 'required',
            'desc'              => 'required|min:3',
            'cover'              => 'required:mimes:jpg,png',
        ]);

        //perbaiki upload covernya
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $file_name = time() . "_" . $cover->getClientOriginalName();

            $storage = 'uploads/kelass/';
            $cover->move($storage, $file_name);
            $data['cover'] = $storage . $file_name;
        } else {
            $data['cover'] = NULL;
        }

        Kelas::create($data);
        Alert::success('Sukses', 'Kelas telah ditambahkan');
        return redirect('/admin/kelas');
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
            'title'   => 'Manajemen Kelas',
            'kelas'    => Kelas::find($id),
            'content' => 'admin/kelas/add'
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
        $kelas = Kelas::find($id);
        $data = $request->validate([
            'name'        => 'required',
            'harga'        => 'required',
            'kapasitas'        => 'required',
            'desc'              => 'required|min:3',
            'cover'              => 'mimes:jpg,png',
        ]);

        //perbaiki upload covernya
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $file_name = time() . "_" . $cover->getClientOriginalName();

            $storage = 'uploads/kelass/';
            $cover->move($storage, $file_name);
            $data['cover'] = $storage . $file_name;
        } else {
            $data['cover'] = $kelas->cover;
        }

        $kelas->update($data);
        Alert::success('Sukses', 'Kelas telah diubah');
        return redirect('/admin/kelas');
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
        $kelas = Kelas::find($id);
        if ($kelas->cover != '') {
            unlink($kelas->cover);
        }
        $kelas->delete();
        Alert::success('Sukses', 'Kelas sukses dihapus');
        return redirect('/admin/kelas');
    }
}
