<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LemburPegawai extends Model
{
    protected $table = 'lembur_pegawais';
    protected $fillable = array('kode_lembur_id','pegawai_id','jumlah_jam','create_at','updated_at');
    protected $visible = array('kode_lembur_id','pegawai_id','jumlah_jam','create_at','updated_at');

    public function pegawai()
    {
    	return $this->belongsTo('App\Pegawai','pegawai_id');
    }
    public function Kategori_lembur()
    {
    	return $this->belongsTo('App\Kategori_lembur','kode_lembur_id');
    }
}
