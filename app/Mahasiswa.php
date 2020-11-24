<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'tb_mhs';
    protected $primaryKey = 'id_mahasiswa';
    protected $fillable = ['user_id', 'nama', 'nim', 'Angkatan', 'judulta', 'pembimbing1', 'pembimbing2', 'pembimbingakademik', 'semester','tahun', 'tanggal_lahir', 'jenis_kelamin', 'email', 'alamat', 'file1', 'file2', 'tahap', 'alasan']; 
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function jadwal()
    {
        return $this->hasOne('App\Jadwal', 'id_mhs');
    }
    public function nilai()
    {
        return $this->hasOne('App\Nilai', 'id_mhs');
    }
}
