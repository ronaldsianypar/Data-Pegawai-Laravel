<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = "pegawai";
    protected $primaryKey = "id";
    protected $fillable = [
    	'id',
    	'nama',
    	'jabatan_id',
    	'alamat',
    	'tgl_lahir'];

    public function jabatan()
    {
    	return $this->belongsTo(Jabatan::class);
    }
}
