<?php
    use App\Models\Galeria;
    use Illuminate\Database\Seeder;

    class GaleriasTableSeeder extends Seeder{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run(){
            Galeria::create([
                'id_galeria' => 1,
                'imagen' => 'galeria/1.jpg',
                'posicion' => 1,
                'id_usuario' => 1,
                'id_tipo' => 1,
            ]);
            Galeria::create([
                'id_galeria' => 2,
                'imagen' => 'galeria/1.jpg',
                'posicion' => 1,
                'id_usuario' => 1,
                'id_tipo' => 2,
            ]);
            Galeria::create([
                'id_galeria' => 3,
                'imagen' => 'galeria/1.jpg',
                'posicion' => 2,
                'id_usuario' => 1,
                'id_tipo' => 1,
            ]);
            Galeria::create([
                'id_galeria' => 4,
                'imagen' => 'galeria/2.jpg',
                'posicion' => 2,
                'id_usuario' => 1,
                'id_tipo' => 2,
            ]);
            Galeria::create([
                'id_galeria' => 5,
                'imagen' => 'galeria/1.jpg',
                'posicion' => 3,
                'id_usuario' => 1,
                'id_tipo' => 1,
            ]);
            Galeria::create([
                'id_galeria' => 6,
                'imagen' => 'galeria/2.jpg',
                'posicion' => 3,
                'id_usuario' => 1,
                'id_tipo' => 2,
            ]);
            Galeria::create([
                'id_galeria' => 7,
                'imagen' => 'galeria/1.jpg',
                'posicion' => 4,
                'id_usuario' => 1,
                'id_tipo' => 1,
            ]);
            Galeria::create([
                'id_galeria' => 8,
                'imagen' => 'galeria/2.jpg',
                'posicion' => 4,
                'id_usuario' => 1,
                'id_tipo' => 2,
            ]);
            Galeria::create([
                'id_galeria' => 9,
                'imagen' => 'galeria/1.jpg',
                'posicion' => 5,
                'id_usuario' => 1,
                'id_tipo' => 1,
            ]);
            Galeria::create([
                'id_galeria' => 10,
                'imagen' => 'galeria/2.jpg',
                'posicion' => 5,
                'id_usuario' => 1,
                'id_tipo' => 2,
            ]);
            Galeria::create([
                'id_galeria' => 11,
                'imagen' => 'galeria/1.jpg',
                'posicion' => 6,
                'id_usuario' => 1,
                'id_tipo' => 1,
            ]);
            Galeria::create([
                'id_galeria' => 12,
                'imagen' => 'galeria/2.jpg',
                'posicion' => 6,
                'id_usuario' => 1,
                'id_tipo' => 2,
            ]);
            Galeria::create([
                'id_galeria' => 13,
                'imagen' => 'galeria/1.jpg',
                'posicion' => 7,
                'id_usuario' => 1,
                'id_tipo' => 1,
            ]);
            Galeria::create([
                'id_galeria' => 14,
                'imagen' => 'galeria/2.jpg',
                'posicion' => 7,
                'id_usuario' => 1,
                'id_tipo' => 2,
            ]);
            Galeria::create([
                'id_galeria' => 15,
                'imagen' => 'galeria/1.jpg',
                'posicion' => 8,
                'id_usuario' => 1,
                'id_tipo' => 1,
            ]);
            Galeria::create([
                'id_galeria' => 16,
                'imagen' => 'galeria/2.jpg',
                'posicion' => 8,
                'id_usuario' => 1,
                'id_tipo' => 2,
            ]);
            Galeria::create([
                'id_galeria' => 17,
                'imagen' => 'galeria/1.jpg',
                'posicion' => 9,
                'id_usuario' => 1,
                'id_tipo' => 1,
            ]);
            Galeria::create([
                'id_galeria' => 18,
                'imagen' => 'galeria/2.jpg',
                'posicion' => 9,
                'id_usuario' => 1,
                'id_tipo' => 2,
            ]);
        }
    }