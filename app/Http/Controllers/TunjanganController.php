<?php

namespace App\Http\Controllers;

use Request;
use App\Jabatan;
use App\Golongan;
use App\Tunjangan;
use Input;
use Validator;


class TunjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jabatan = Jabatan::all();
        $golongan = Golongan::all();
        $tunjangan = Tunjangan::all();
        return view('Tunjangan.index',compact('jabatan','golongan','tunjangan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        $golongan = Golongan::all();
        $tunjangan = Tunjangan::all();
        return view ('Tunjangan.create',compact('jabatan','golongan','tunjangan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tunjangan = array (
            'kode_tunjangan'=>'required|unique:tunjangans',
            'jabatan_id'=>'required',
            'golongan_id'=>'required',
            'status'=>'required',
            'jumlah_anak'=>'required',
            'besaran_uang'=>'required',
            );
        $pesan = array(
            'kode_tunjangan.required' =>'Harus Diisi broo',
            'jabatan_id.required' =>'Harus Diisi broo',
            'golongan_id.required' =>'Harus Diisi broo',
            'status.required' =>'Harus Diisi broo',
            'jumlah_anak.required' =>'Harus Diisi broo',
            'besaran_uang.required' =>'Harus Diisi broo',
            );

        $validation = Validator::make(Request::all(), $tunjangan, $pesan);

        if($validation->fails())
        {
            return redirect('tunjangan/create')->withErrors($validation)->withInput();
        }
        $tunjangan = Request::all();
        Tunjangan::create($tunjangan);
        return redirect('tunjangan');
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
        $tunjangan= Tunjangan::find($id);
        return view ('Tunjangan.create',compact('tunjangan','jabatan','golongan'));
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

        Tunjangan::find($id)->delete();
        return redirect ('tunjangan');
    }
}
