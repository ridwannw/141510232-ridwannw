<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    //
    protected $table = 'pegawais';
    protected $fillable = array('nip','user_id','jabatan_id','golongan_id','photo','created_at','updated_at');
    protected $visible = array('nip','user_id','jabatan_id','golongan_id','photo','created_at','updated_at');

    public function Jabatan()
    {
    	return $this->belongsTo('App\Jabatan','jabatan_id');
    }
    public function Golongan()
    {
    	return $this->belongsTo('App\Golongan','golongan_id');
    }

    public function User()
    {
    	return $this->belongsTo('App\User','user_id');
    }

}
