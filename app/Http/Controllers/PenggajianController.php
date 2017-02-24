<?php

namespace App\Http\Controllers;

use Request;
use App\Penggajian;
use App\TunjanganPegawai;
use App\Jabatan;
use App\Golongan;
use App\KategoriLembur;
use App\LemburPegawai;
use App\User;
use App\Tunjangan;
use Input;
use Validator;
use auth;


class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penggajian=Penggajian::OrderBy('created_at','desc')->paginate(4);
        $date=carbon::now();
        return view('Penggajian.index',compact('penggajian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $tunjangan=TunjanganPegawai::paginate(10);
        return view('Penggajian.create',compact('tunjangan'));
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
        $rules =['kode_tunjangan_id' => 'required'];
        $message =['kode_tunjangan_id.required'=>'Penggajian Gagal'];
    
        $validate=Validator::make(Input::all(),$rules,$message);
    if ($validate->fails()) {
        return redirect('Penggajian/create')->withErrors($validate)->withInput();
    }
        $penggajian=Input::all();
         // dd($penggajian);
        $where=TunjanganPegawai::where('id',$penggajian['kode_tunjangan_id'])->first();
        // dd($where);
        $wherepenggajian=Penggajian::where('tunjangan_pegawai_id',$where->id)->first();
        // dd($wherepenggajian);
        $wheretunjangan=Tunjangan::where('id',$where->kode_tunjangan)->first();
        // dd($where);
        $wherepegawai=Pegawai::where('id',$where->user_id)->first();
        // dd($wherepegawai);
        $wherekategorilembur=KategoriLembur::where('id_jabatan',$wherepegawai->kode_lembur)->where('id_golongan',$wherepegawai->id_golongan)->first();
        // dd($wherekategorilembur);
        $wherelemburpegawai=lemburPegawai::where('pegawai_id',$wherepegawai->id)->first();
        // dd($wherelemburpegawai);
        $wherejabatan=Jabatan::where('id',$wherepegawai->jabatan_id)->first();
        // dd($wherejabatan);
        $wheregolongan=Golongan::where('id',$wherepegawai->golongan_id)->first();
        // dd($wheregolongan);
        $wherepenggajianbaru=Penggajian::where('tunjangan_pegawai_id',$where->id)->orderBy('created_at','desc')->first() ;
        // dd($wherepenggajianbaru);
       $now = Carbon::now();
        if(isset($wherepenggajian)){
            if($wherepenggajianbaru->created_at->month==$now->month)
            {
                $tunjangan=tunjangan_pegawai::paginate(10);
                $error=true ;
                return view('penggajian.create',compact('tunjangan','error'));
            }
        }
        $penggajian=new penggajian ;
        if (!isset($wherelemburpegawai)) {
            $nol=0 ;
            $penggajian->jumlah_jam_lembur=$nol;
            $penggajian->jumlah_uang_lembur=$nol ;
            $penggajian->gaji_pokok=$wherejabatan->besaran_uang+$wheregolongan->besaran_uang;
            $penggajian->gaji_total=($wheretunjangan->besaran_uang)+($wherejabatan->besaran_uang+$wheregolongan->besaran_uang);
        $penggajian->id_tunjangan_pegawai=Input::get('id_tunjangan_pegawai');
        $penggajian->petugas_penerima=auth::user()->name ;
        $penggajian->save();
        }
        elseif (!isset($wherelemburpegawai)||!isset($wherekategorilembur)) {
            $nol=0 ;
            $penggajian->jumlah_jam_lembur=$nol;
            $penggajian->jumlah_uang_lembur=$nol ;
            $penggajian->gaji_pokok=$wherejabatan->besaran_uang+$wheregolongan->besaran_uang;
            $penggajian->gaji_total=($wheretunjangan->besaran_uang)+($wherejabatan->besaran_uang+$wheregolongan->besaran_uang);
            $penggajian->id_tunjangan_pegawai=Input::get('id_tunjangan_pegawai');
            $penggajian->petugas_penerima=auth::user()->name ;
            $penggajian->save();
        }
        else{
            $penggajian->jumlah_jam_lembur=$wherelemburpegawai->jumlah_jam;
            $penggajian->jumlah_uang_lembur=$wherelemburpegawai->jumlah_jam*$wherekategorilembur->besaran_uang ;
            $penggajian->gaji_pokok=$wherejabatan->besaran_uang+$wheregolongan->besaran_uang;
            $penggajian->gaji_total=($wheretunjangan->besaran_uang)+($wherejabatan->besaran_uang+$wheregolongan->besaran_uang);
            $penggajian->id_tunjangan_pegawai=Input::get('id_tunjangan_pegawai');
            $penggajian->petugas_penerima=auth::user()->name ;
            $penggajian->save();
            }
            return redirect('penggajian');
    
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
        //
    }
}
