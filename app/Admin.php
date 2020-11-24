<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'tb_adm';
    protected $primaryKey = 'id_admin';
    protected $fillable = ['user_id', 'nama','email', 'nip', 'jenis_kelamin', 'alamat'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
