<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'tb_dsn';
    protected $primaryKey = 'id_dosen';
    protected $fillable = ['user_id','nama','email', 'status', 'nip', 'jenis_kelamin', 'alamat'];
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
