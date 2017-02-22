<?php

namespace App\Http\Controllers;

use Request;
use App\Pegawai;
use App\User;
use App\TunjanganPegawai;
use App\Tunjangan;
use Validator;
use Input;

class TunjanganPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pegawai = Pegawai::all();
        $tunjanganp=TunjanganPegawai::all();
        $user = User::all();
        return view ('TunjanganP.index',compact('pegawai','tunjanganp','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pegawai = Pegawai::all();
        $tunjangan=Tunjangan::all();
        $user = User::all();
        return view ('TunjanganP.create',compact('pegawai','tunjangan','user'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tunjanganp = array (
            'kode_tunjangan_id' => 'required',
            'pegawai_id'=>'required',
            );
        $pesan = array(
            'kode_tunjangan_id.required' =>'Harus Diisi broo',
            'pegawai_id.required' =>'Harus Diisi broo',
            );

        $validation = Validator::make(Request::all(), $tunjanganp, $pesan);

        if($validation->fails())
        {
            return redirect('tunjanganpegawai/create')->withErrors($validation)->withInput();
        }

        $tunjanganpegawai = Request::all();
        // dd($tunjangan_pegawai);
        $pegawai = Pegawai::where('id', $tunjanganpegawai['pegawai_id'])->first();

        $check = Tunjangan::where('jabatan_id', $pegawai->jabatan_id)->where('golongan_id', $pegawai->golongan_id)->first();

        if(!isset ($check->id))
        {
            $pegawai = Pegawai::all();
            $tunjangan = Tunjangan::all();
            $error = true;
        return view('TunjanganP.create', compact('pegawai','tunjangan','error'));
        }
        
        $tunjanganpegawai['kode_tunjangan_id'] = $check->id;

        TunjanganPegawai::create($tunjanganpegawai);

        return redirect('tunjanganpegawai');
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
        TunjanganPegawai::find($id);
        return redirect('tunjanganpegawai');
    }
}
