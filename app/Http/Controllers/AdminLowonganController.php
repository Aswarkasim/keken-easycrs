<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminLowonganController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lowongan = Lowongan::paginate(10);
        $data = [
            'title'   => 'Manajemen Lowongan',
            'lowongan' => $lowongan,
            'content' => 'admin/lowongan/index'
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
            'title'   => 'Manajemen Lowongan',
            'content' => 'admin/lowongan/add'
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
            'title'        => 'required',
            'desc'              => 'required|min:3',
            'cover'              => 'required:mimes:jpg,png',
        ]);

        //perbaiki upload covernya
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $file_name = time() . "_" . $cover->getClientOriginalName();

            $storage = 'uploads/lowongans/';
            $cover->move($storage, $file_name);
            $data['cover'] = $storage . $file_name;
        } else {
            $data['cover'] = NULL;
        }

        Lowongan::create($data);
        Alert::success('Sukses', 'Lowongan telah ditambahkan');
        return redirect('/admin/lowongan');
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
            'title'   => 'Manajemen Lowongan',
            'lowongan'    => Lowongan::find($id),
            'content' => 'admin/lowongan/add'
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
        $lowongan = Lowongan::find($id);
        $data = $request->validate([
            'title'        => 'required',
            'desc'              => 'required|min:3',
            'cover'              => 'mimes:jpg,png',
        ]);

        //perbaiki upload covernya
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $file_name = time() . "_" . $cover->getClientOriginalName();

            $storage = 'uploads/lowongans/';
            $cover->move($storage, $file_name);
            $data['cover'] = $storage . $file_name;
        } else {
            $data['cover'] = $lowongan->cover;
        }

        $lowongan->update($data);
        Alert::success('Sukses', 'Lowongan telah diubah');
        return redirect('/admin/lowongan');
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
         $lowongan = Lowongan::find($id);
         if ($lowongan->cover != '') {
             unlink($lowongan->cover);
         }
         $lowongan->delete();
         Alert::success('Sukses', 'Lowongan sukses dihapus');
         return redirect('/admin/lowongan');
    }
}
