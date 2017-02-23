<?php

namespace App\Http\Controllers;

use Request;
use App\Golongan;
use App\Jabatan;
use Validator;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        //
        $golongan = Golongan::all();
        $jabatan = Jabatan::all();
        return view('Golongan.index',compact('golongan','jabatan'));
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
        return view ('Golongan.create',compact('golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $golongan = array (
            'kode_golongan'=>'required|unique:golongans',
            'nama_golongan'=>'required',
            'besaran_uang'=>'required',
            );
        $pesan = array(
            'kode_golongan.required' =>'Need request Object',
            'nama_golongan.required' =>'Need request Object',
            'besaran_uang.required' =>'Need request Object',
            );

        $validation = Validator::make(Request::all(), $golongan, $pesan);

        if($validation->fails())
        {
            return redirect('golongan/create')->withErrors($validation)->withInput();
        }

        $golongan = Request::all();
        Golongan::create($golongan);
        return redirect('jabatan');
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
        $golongan = Golongan::find($id);
        return view ('Golongan.edit',compact('golongan'));
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
        $id = Golongan::find($id);
        if($id->kode_golongan == Request('kode_golongan'))
        {
            $golongan = array (
                    'kode_golongan'=>'required',
                    'nama_golongan'=>'required',
                    'besaran_uang'=>'required',
            );
        }
        else {
            $golongan = array (
                    'kode_golongan'=>'required|unique:golongans',
                    'nama_golongan'=>'required',
                    'besaran_uang'=>'required',
            );
        }
        $pesan = array(
            'kode_golongan.unique' => 'Maaf Sudah Ada',
            'kode_golongan.required' =>'Harus Diisi broo',
            'nama_golongan.required' =>'Harus Diisi broo',
            'besaran_uang.required' =>'Harus Diisi broo',
            );

        $validation = Validator::make(Request::all(), $golongan, $pesan);
        if($validation->fails())
        {
            return redirect('golongan/'.$id.'/edit')->withErrors($validation)->withInput();
        }

        $golong = Request::all();
        $golongan = Golongan::find($id);
        $golongan->update($golong);
        return redirect('golongan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Golongan::find($id)->delete();
        return redirect('golongan');
    }
}
