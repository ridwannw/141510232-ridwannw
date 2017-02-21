<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatans';
    protected $fillable = array('kode_jabatan','nama_jabatan','besaran_uang','created_at','updated_at');
    protected $visible = array('kode_jabatan','nama_jabatan','besaran_uang','created_at','updated_at');

    public function Pegawai()
    {
    	return $this->hasMany('App\Pegawai','jabatan_id');
    }
    public function Kategori_lembur()
    {
    	return $this->hasMany('App\Kategori_lembur','jabatan_id');
    }
    public function Tunjangan()
    {
        return $this->hasMany('App\Tunjangan','jabatan_id');
    }
}
