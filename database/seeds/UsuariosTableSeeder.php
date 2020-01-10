<?php
    use App\User;
    use Illuminate\Database\Seeder;

    class UsuariosTableSeeder extends Seeder{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run(){
            User::create([
                'id_usuario' => 1,
                'correo' => 'info@elportaldelavilla.com.ar',
                'clave' => \Hash::make('Hotel2020'),
            ]);
        }
    }