<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriLembur extends Model
{
    protected $table = 'kategori_lemburs';
    protected $fillable = array('kode_lembur','jabatan_id','golongan_id','besaran_uang','created_at','updated');
    protected $visible = array('kode_lembur','jabatan_id','golongan_id','besaran_uang','created_at','updated');

    public function Jabatan()
    {
    	return $this->belongsTo('App\Jabatan','jabatan_id');
    }
    public function Golongan()
    {
    	return $this->belongsTo('App\Golongan','golongan_id');
    }
    public function LemburPegawai()
    {
        return $this->HasMany('App\LemburPegawai', 'kode_lembur_id');
    }
}
