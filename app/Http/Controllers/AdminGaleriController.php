<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminGaleriController extends Controller
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
            $galeri = Galeri::where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $galeri = Galeri::latest()->paginate(10);
        }
        $data = [
            'title'   => 'Manajemen Galeri',
            'galeri' => $galeri,
            'content' => 'admin/galeri/index'
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
            'title'   => 'Manajemen Galeri',
            'content' => 'admin/galeri/add'
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
            // 'topik'        => 'required',
            // 'desc'              => 'required|min:3',
            'name'                => 'required',
            'gambar'              => 'required',
        ]);

        //perbaiki upload gambarnya
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $file_name = time() . "_" . $gambar->getClientOriginalName();

            $storage = 'uploads/galeris/';
            $gambar->move($storage, $file_name);
            $data['gambar'] = $storage . $file_name;
        } else {
            $data['gambar'] = NULL;
        }

        Galeri::create($data);
        Alert::success('Sukses', 'Galeri telah ditambahkan');
        return redirect('/admin/galeri');
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
            'title'   => 'Manajemen Galeri',
            'galeri'    => Galeri::find($id),
            'content' => 'admin/galeri/add'
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
        $galeri = Galeri::find($id);
        $data = $request->validate([
            // 'topik'         => 'required',
            // 'desc'          => 'required|min:3',
            'gambar'         => 'mimes:jpeg,jpg,png,bmp',
            'name'        => 'required',
        ]);

        //perbaiki upload gambarnya
        if ($request->hasFile('gambar')) {

            if ($galeri->gambar != '') {
                unlink($galeri->gambar);
            }

            $gambar = $request->file('gambar');
            $file_name = time() . "_" . $gambar->getClientOriginalName();

            $storage = 'uploads/galeris/';
            $gambar->move($storage, $file_name);
            $data['gambar'] = $storage . $file_name;
        } else {
            $data['gambar'] = $galeri->gambar;
        }

        $galeri->update($data);
        Alert::success('Sukses', 'Galeri telah diubah');
        return redirect('/admin/galeri');
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
        $galeri = Galeri::find($id);
        if ($galeri->gambar != '' || $galeri != null) {
            unlink($galeri->gambar);
        }
        $galeri->delete();
        Alert::success('Sukses', 'Galeri sukses dihapus');
        return redirect('/admin/galeri');
    }
}
