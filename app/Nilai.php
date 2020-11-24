<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Nilai extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'tb_nilai';
    protected $primaryKey = 'id_nilai';
    protected $fillable = ['id_mhs','id_dsn','nilai1','nilai2','nilai3','nilai4'];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa', 'id_mhs');
    }
    public function jadwal()
    {
        return $this->belongsTo('App\Jadwal', 'jadwal_id');
    }
}
