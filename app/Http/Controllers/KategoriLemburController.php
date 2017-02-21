<?php

namespace App\Http\Controllers;

use Request;
use App\Jabatan;
use App\Golongan;
use App\KategoriLembur;
use Validator;
use Input;

class KategoriLemburController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $golongan =Golongan::all();
        $jabatan =Jabatan::all();
        $kategori = KategoriLembur::all();
        return view('KategoriLembur.index',compact('golongan','jabatan','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $golongan = Golongan::all();
        $jabatan = Jabatan::all();
        $kategori = KategoriLembur::all();
        return view('KategoriLembur.create',compact('golongan','jabatan','kategori  '));
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
            'kode_lembur'=>'required|unique:kategori_lemburs',
            'jabatan_id'=>'required',
            'golongan_id'=>'required',
            'besaran_uang'=>'required',
            );
        $pesan = array(
            'kode_lembur.required' =>'Harus Diisi broo',
            'jabatan_id.required' =>'Harus Diisi broo',
            'golongan_id.required' =>'Harus Diisi broo',
            'besaran_uang.required' =>'Harus Diisi broo',
            );

        $validation = Validator::make(Request::all(), $kategori, $pesan);

        if($validation->fails())
        {
            return redirect('kategori/create')->withErrors($validation)->withInput();
        }
        $kategorilembur = Request::all();
        KategoriLembur::create($kategorilembur);
        return redirect('kategori');
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
        $jabatan = Jabatan::all();
        $golongan = Golongan::all();
        $kategori = KategoriLembur::find($id);
        return view ('KategoriLembur.edit',compact('jabatan','golongan','kategori'));
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
         $kategori = Request::all();
        $kaleminaja = KategoriLembur::find($id);
        $kaleminaja->update($kategori);
        return redirect('kategori');
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
    }
}
