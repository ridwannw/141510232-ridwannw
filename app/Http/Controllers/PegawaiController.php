<?php

namespace App\Http\Controllers;

use Request;
use App\Jabatan;
use App\Golongan;
use App\Pegawai;
use App\User;
use Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     use RegistersUsers;
      

    public function index()
    {
        //
        $jabatan =Jabatan::all();
        $golongan = Golongan::all();
        $pegawai =Pegawai::all();
        $user = User::all();
        return view ('Pegawai.index',compact('jabatan','golongan','pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jabatan = Jabatan::all();
        $golongan = Golongan::all();
        $pegawai = Pegawai::all();
        return view ('Pegawai.create',compact('jabatan','golongan','pegawai'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pegawai = array (
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:6|confirmed',
                    'nip'=>'required|unique:pegawais',
                    'jabatan_id'=>'required',
                    'golongan_id'=>'required',
                    'photo'=>'required',
            );
        $pesan = array(
            'nip.unique' => 'Maaf Sudah Ada',
            'jabatan_id.required' =>'Harus Diisi broo',
            'golongan_id.required' =>'Harus Diisi broo',
            'photo.required' =>'Harus Diisi broo',
            );
        

        $validation = Validator::make(Request::all(), $pegawai, $pesan);
        if($validation->fails())
        {
            return redirect('pegawai/create')->withErrors($validation)->withInput();
        }

            $user =  new User ;
            $user ->name=Input::get('name');
            $user ->email=Input::get('email');
            $user ->password=bcrypt(Input::get('password'));
            $user ->type_user=Input::get('type_user');
            $user->save();

       

        if(Input::hasFile('photo'))
        {
            
            $uploaded_photo = Input::file('photo');
            $extension = $uploaded_photo->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'gambar';
            $uploaded_photo->move($destinationPath, $filename);
        

            $tambah = new Pegawai;
            $tambah->nip =Request::get('nip');
            $tambah->user_id = $user->id;
            $tambah->jabatan_id = Request::get('jabatan_id');
            $tambah->golongan_id = Request::get('golongan_id');
            $tambah->photo = $filename;
            $tambah->save();
            return redirect('pegawai');
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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

        $pegawai = Pegawai::find($id);
        $user = User::where('id',$pegawai->user_id)->delete();
        return redirect ('pegawai');
  
    }
}
