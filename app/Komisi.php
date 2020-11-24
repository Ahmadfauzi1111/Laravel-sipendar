<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komisi extends Model
{
    protected $table = 'tb_kms';
    protected $primaryKey = 'id_komisi';
    protected $fillable = ['user_id', 'nama', 'email','nip', 'jenis_kelamin', 'alamat'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
