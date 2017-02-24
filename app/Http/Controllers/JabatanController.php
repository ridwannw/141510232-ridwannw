<?php

namespace App\Http\Controllers;

use Request;
use App\Jabatan;
use Validator;
use App\Golongan;


class JabatanController extends Controller
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

        $jabatan = Jabatan::all();
        return view('Jabatan.index',compact('jabatan'));
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
        return view('Jabatan.create',compact('jabatan','golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $jabatan = array (
            'kode_jabatan'=>'required|unique:jabatans',
            'nama_jabatan'=>'required',
            'besaran_uang'=>'required',
            );
        $pesan = array(
            'kode_jabatan.required' =>'Need request Object',
            'nama_jabatan.required' =>'Need request Object',
            'besaran_uang.required' =>'Need request Object',
            );

        $validation = Validator::make(Request::all(), $jabatan, $pesan);

        if($validation->fails())
        {
            return redirect('jabatan/create')->withErrors($validation)->withInput();
        }

        $jabatan = Request::all();
        Jabatan::create($jabatan);
        
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
        $jabatan = Jabatan::find($id);
        return view('Jabatan.edit',compact('jabatan'));
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
         $cariid = Golongan::find($id);
        if($cariid->kode_jabatan == Request('kode_jabatan'))
        {
            $jabatan = array (
                    'kode_jabatan'=>'required',
                    'nama_jabatan'=>'required',
                    'besaran_uang'=>'required',
            );
        }
        else {
            $jabatan = array (
                    'kode_jabatan'=>'required|unique:jabatans',
                    'nama_jabatan'=>'required',
                    'besaran_uang'=>'required',
            );
        }
        $pesan = array(
            'kode_jabatan.unique' => 'Maaf Sudah Ada',
            'kode_jabatan.required' =>'Harus Diisi broo',
            'nama_jabatan.required' =>'Harus Diisi broo',
            'besaran_uang.required' =>'Harus Diisi broo',
            );

        $validation = Validator::make(Request::all(), $jabatan, $pesan);
        if($validation->fails())
        {
            return redirect('jabatan/'.$id.'/edit')->withErrors($validation)->withInput();
        }

        $gol = Request::all();
        $jabatan = Jabatan::find($id);
        $jabatan->update($gol);
        return redirect('jabatan');
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
        Jabatan::find($id)->delete();
        return redirect('jabatan');
    }
}
