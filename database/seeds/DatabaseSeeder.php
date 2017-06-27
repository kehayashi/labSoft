<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder {

    public function run() {

         $this->call('TabelaUsersSeeder');
    }

}

class TabelaUsersSeeder extends Seeder {

    public function run() {

        $usuarios = User::get();
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('Y-m-d H:i:s');

        if($usuarios->count() == 0) {
             DB::table('users')->insert([
                'name'  => 'Kendy Hayashi',
                'email' => 'kehayashi@hotmail.com',
                'password' => Hash::make('khayashi12'),
                'tipo_usuario'  => 'Admin',
                'created_at' => $data,
                'updated_at' => $data
            ]);
        }
    }

}
