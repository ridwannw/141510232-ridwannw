<?php

namespace App\Http\Controllers;

use Request;
use App\LemburPegawai;
use App\Pegawai;
use App\KategoriLembur;
use Validator;

class LemburController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lembur = LemburPegawai::with('KategoriLembur')->paginate(5);
        $kategori = Kategorilembur::all();
        return view('Lembur.index', compact('lembur', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategorilembur::all();
        $pegawai = Pegawai::all();
        return view('lembur.create',compact('kategori','pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori = array (
            'pegawai_id'=>'required|unique:lembur_pegawais',
            'jumlah_jam'=>'required',
            );
        $pesan = array(
            'pegawai_id.required' =>'Harus Diisi broo',
            'jumlah_jam.required' =>'Harus Diisi broo',
            );

        $validation = Validator::make(Request::all(), $kategori, $pesan);

        if($validation->fails())
        {
            return redirect('lembur/create')->withErrors($validation)->withInput();
        }

        $lembur = Request::all();
        LemburPegawai::create($lembur);
        return redirect('lembur');    }

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
        $lembur = LemburPegawai::find($id);
        $kategori = KategoriLembur::all();
        $pegawai = Pegawai::all();
        return view('lembur.edit', compact('lembur','kategori','pegawai'));
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
        $lembur = Request::all();
        $lemper = LemburPegawai::find($id);
        $lemper->update($lembur);
        return redirect('lembur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LemburPegawai::find($id)->delete();
        return redirect('lembur');
    }
}
