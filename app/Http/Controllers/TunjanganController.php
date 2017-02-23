<?php

namespace App\Http\Controllers;

use Request;
use App\Jabatan;
use App\Golongan;
use App\Tunjangan;
use App\Pegawai;
use Input;
use Validator;



class TunjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('keuangan');
    }
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
        $pegawai = Pegawai::all();
        return view ('Tunjangan.create',compact('jabatan','golongan','tunjangan','pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                    $tunjangan =['kode_tunjangan' => 'required|unique:tunjangans',
                    'jumlah_anak' => 'required|numeric|min:0',
                    'besaran_uang'=> 'required|numeric|min:0'];
        $message =['kode_tunjangan.required' => 'Silahkan Input',
                    'kode_tunjangan.unique' => 'Gunakan kode Lain',
                    'jumlah_anak.required' => 'Silahkan Input',                    
                    'jumlah_anak.numeric'=>'Input Numerik',
                    'jumlah_anak.min'=>'Minimal 0',
                    'besaran_uang.required'=>'Silahkan Input',
                    'besaran_uang.numeric'=>'Input Numerik',
                    'besaran_uang.min'=>'Minimal 0'];
    
            $validate=Validator::make(Input::all(),$tunjangan,$message);
            if ($validate->fails()) {
                return redirect('tunjangan/create')->withErrors($validate)->withInput();
            }
            $tunjangan=Request::all();
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
