<?php

namespace App\Http\Controllers;

use Request;
use App\Pegawai;
use App\User;
use App\TunjanganPegawai;
use App\Tunjangan;
use App\Jabatan;
use App\Golongan;
use Validator;
use Input;

class TunjanganPController extends Controller
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
         $tunjanganp =['pegawai_id' => 'required|unique:tunjangan_pegawais',
                'kode_tunjangan' => 'required|unique:tunjangans',
                    'jumlah_anak' => 'required|numeric|min:0',
                    'besaran_uang'=> 'required|numeric|min:0'];
        $message =['pegawai_id.required' => 'Wajib Isi',
                    'pegawai_id.unique' => 'Tunjangan Hanya Bisa 1 Kali',
                    'kode_tunjangan.required' => 'Silahkan Input',
                    'kode_tunjangan.unique' => 'Gunakan kode Lain',
                    'jumlah_anak.required' => 'Silahkan Input',                    
                    'jumlah_anak.numeric'=>'Input Numerik',
                    'jumlah_anak.min'=>'Minimal 0',
                    'besaran_uang.required'=>'Silahkan Input',
                    'besaran_uang.numeric'=>'Input Numerik',
                    'besaran_uang.min'=>'Minimal 0'];
    
            $validate=Validator::make(Input::all(),$tunjanganp,$message);
            if ($validate->fails()) {
                return redirect('tunjanganpegawai/create')->withErrors($validate)->withInput();
            }
            $tunjanganpegawai=Input::all();
            $pegawai=Pegawai::where('id',$tunjanganpegawai['pegawai_id'])->first();
            
            $tunjangan=new Tunjangan ;
            $tunjangan->kode_tunjangan=Input::get('kode_tunjangan') ;
            $tunjangan->jabatan_id=$pegawai->jabatan_id ;
            $tunjangan->golongan_id=$pegawai->golongan_id;
            $tunjangan->status=Input::get('status');
            $tunjangan->jumlah_anak=Input::get('jumlah_anak');
            $tunjangan->besaran_uang=Input::get('besaran_uang');
            $tunjangan->save();

            $tunjanganpegawai=new TunjanganPegawai ;
            $tunjanganpegawai['pegawai_id'] = $pegawai->id;
            $tunjanganpegawai['kode_tunjangan_id'] = $tunjangan->id;
            $tunjanganpegawai->save();
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
        $golongan = Golongan::all();
        $jabatan = Jabatan::all();
        $pegawai = Pegawai::all();
        $tunjanganp = TunjanganPegawai::find($id);
        return view ('TunjanganP.edit',compact('tunjanganp','jabatan','golongan','pegawai'));
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
        $tunjanganpegawai=TunjanganPegawai::where('id',$id)->first();
        if ($tunjanganpegawai->tunjangan->kode_tunjangan != Request('kode_tunjangan')) {
            $rules =['kode_tunjangan' => 'required|unique:tunjangans',
                    'pegawai_id' => 'required',
                    'jumlah_anak' => 'required|numeric|min:0',
                    'besaran_uang'=> 'required|numeric|min:0'];
        }
        elseif ($tunjanganpegawai->pegawai_id != Request('pegawai_id')) {
            $rules =['kode_tunjangan' => 'required',
                    'pegawai_id' => 'required|unique:tunjangan_pegawais',
                    'jumlah_anak' => 'required|numeric|min:0',
                    'besaran_uang'=> 'required|numeric|min:0'];
        }
        else
        {
            $rules =['pegawai_id' => 'required',
                'kode_tunjangan' => 'required',
                    'jumlah_anak' => 'required|numeric|min:0',
                    'besaran_uang'=> 'required|numeric|min:0'];
        }
        $message =['pegawai_id.required' => 'Wajib Isi',
                    'pegawai_id.unique' => 'Tunjangan Hanya Bisa 1 Kali',
                    'kode_tunjangan.required' => 'Silahkan Input',
                    'kode_tunjangan.unique' => 'Gunakan kode Lain',
                    'jumlah_anak.required' => 'Silahkan Input',                    
                    'jumlah_anak.numeric'=>'Input Numerik',
                    'jumlah_anak.min'=>'Minimal 0',
                    'besaran_uang.required'=>'Silahkan Input',
                    'besaran_uang.numeric'=>'Input Numerik',
                    'besaran_uang.min'=>'Minimal 0'];
    
            $validate=Validator::make(Input::all(),$rules,$message);
            if ($validate->fails()) {
                return redirect('tunjanganpegawai/'.$id.'/edit')->withErrors($validate)->withInput();
            }
            $tunjangan=new Tunjangan ;
            $tunjangan = array('kode_tunjangan' =>Input::get('kode_tunjangan'),
                                'status'=>Input::get('status'),
                                'jumlah_anak'=>Input::get('jumlah_anak'),
                                'besaran_uang'=>Input::get('besaran_uang'));
            Tunjangan::where('id',$tunjanganpegawai->kode_tunjangan_id)->update($tunjangan);
            
            $update=Input::all();
            $tunjanganp=TunjanganPegawai::find($id);
            $tunjanganp->update($update);
            return redirect('tunjanganpegawai');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TunjanganPegawai::find($id)->delete();
        return redirect('tunjanganpegawai');
    }
}
