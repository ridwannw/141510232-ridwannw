<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TunjanganPegawai extends Model
{
    protected $table = 'tunjangan_pegawais';
    protected $fillable = array('kode_tunjangan_id','pegawai_id','created_at','updated_at');
    protected $visible = array('kode_tunjangan_id','pegawai_id','created_at','updated_at');

    public function Penggajian()
    {
    	return $this->hasMany('App\Penggajian','tunjangan_pegawai_id');
    }
    public function Tunjangan()
    {
    	return $this->belongsTo('App\Tunjangan','kode_tunjangan_id');
    }
    public function Pegawai()
    {
    	return $this->belongsTo('App\Pegawai','pegawai_id');
    }
}
