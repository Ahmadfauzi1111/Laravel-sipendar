<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert ke table user
        $user = new User;
        $user->name = 'admin';
        $user->username = 'admin';
        $user->password = Hash::make('admin');
        $user->level = 'Admin';
        $user->save();
        // //insert ke table admin
        // $request->request->Add(['user_id' => $user->id]);
        // $admin = Admin::create([
        //     'name' =>
        // ]);
        $user->admin()->create([
            'nama' => 'admin',
            'nip' => 'admin',
            'jenis_kelamin' => 'Laki - Laki',
            'alamat' => 'Majalengka'
        ]);
    }
}
