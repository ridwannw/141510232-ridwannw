<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    protected $table ='penggajians';
    protected $fillable = array('id','tunjangan_pegawai_id',
    	'jumlah_jam_lembur',
    	'jumlah_uang_lembur',
    	'gaji_pokok',
    	'total_gaji',
        'status_pengambilan',
    	'tanggal_pengambilan',
    	'petugas_penerima'
    	);
 protected $visible = array('id','tunjangan_pegawai_id',
    	'jumlah_jam_lembur',
    	'jumlah_uang_lembur',
    	'gaji_pokok',
    	'total_gaji',
    	'tanggal_pengambilan',
    	'petugas_penerima'
    	);
  public function TunjanganPegawai() {
        return $this->belongsTo('App\Models\Tunjangan_Pegawai', 'tunjangan_pegawai_id');
    }
}
