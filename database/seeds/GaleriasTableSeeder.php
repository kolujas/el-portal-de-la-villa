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
                'titulo' => 'Título',
                'descripcion' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam fugit rerum perferendis repellendus nemo provident, labore tempore facilis. Sapiente quaerat perferendis vero mollitia accusantium numquam vel molestias tempore voluptatem nulla.',
                'imagen' => 'img/galeria/1.jpg',
                'id_usuario' => 1,
                'id_tipo' => 1,
            ]);
            Galeria::create([
                'id_galeria' => 2,
                'titulo' => 'Título',
                'descripcion' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam fugit rerum perferendis repellendus nemo provident, labore tempore facilis. Sapiente quaerat perferendis vero mollitia accusantium numquam vel molestias tempore voluptatem nulla.',
                'imagen' => 'img/galeria/2.jpg',
                'id_usuario' => 1,
                'id_tipo' => 2,
            ]);
        }
    }