<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jadwal extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'tb_jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = ['id_mhs', 'id_dsn1', 'id_dsn2', 'id_dsn3', 'id_dsn4', 'nosurat', 'shiftmulai', 'shiftselesai', 'ruang','tanggal','tahap'  ];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa', 'id_mhs');
    }

    public function dosen1()
    {
        return $this->belongsTo('App\Dosen', 'id_dsn1');
    }
    public function dosen2()
    {
        return $this->belongsTo('App\Dosen', 'id_dsn2');
    }
    public function dosen3()
    {
        return $this->belongsTo('App\Dosen', 'id_dsn3');
    }
    public function dosen4()
    {
        return $this->belongsTo('App\Dosen', 'id_dsn4');
    }
    public function kajur()
    {
        return $this->belongsTo('App\Dosen', 'kajur');
    }
    public function nilai()
    {
        return $this->hasOne('App\Nilai', 'jadwal_id');
    }
}
