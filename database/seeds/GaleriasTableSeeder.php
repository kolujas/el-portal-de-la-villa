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
            $galeria = Galeria::find(3);
            $inputData = ['posicion' => 2];
            $galeria->update($inputData);
            // $galeria = Galeria::find(2);
            // $galeria->update($inputData);
            // Galeria::create([
            //     'id_galeria' => 3,
            //     'titulo' => 'Título',
            //     'descripcion' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam fugit rerum perferendis repellendus nemo provident, labore tempore facilis. Sapiente quaerat perferendis vero mollitia accusantium numquam vel molestias tempore voluptatem nulla.',
            //     'imagen' => 'img/galeria/1.jpg',
            //     'posicion' => 2,
            //     'id_usuario' => 1,
            //     'id_tipo' => 1,
            // ]);
            // Galeria::create([
            //     'id_galeria' => 4,
            //     'titulo' => 'Título',
            //     'descripcion' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam fugit rerum perferendis repellendus nemo provident, labore tempore facilis. Sapiente quaerat perferendis vero mollitia accusantium numquam vel molestias tempore voluptatem nulla.',
            //     'imagen' => 'img/galeria/2.jpg',
            //     'posicion' => 2,
            //     'id_usuario' => 1,
            //     'id_tipo' => 2,
            // ]);
            // Galeria::create([
            //     'id_galeria' => 5,
            //     'titulo' => 'Título',
            //     'descripcion' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam fugit rerum perferendis repellendus nemo provident, labore tempore facilis. Sapiente quaerat perferendis vero mollitia accusantium numquam vel molestias tempore voluptatem nulla.',
            //     'imagen' => 'img/galeria/1.jpg',
            //     'posicion' => 3,
            //     'id_usuario' => 1,
            //     'id_tipo' => 1,
            // ]);
            // Galeria::create([
            //     'id_galeria' => 6,
            //     'titulo' => 'Título',
            //     'descripcion' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam fugit rerum perferendis repellendus nemo provident, labore tempore facilis. Sapiente quaerat perferendis vero mollitia accusantium numquam vel molestias tempore voluptatem nulla.',
            //     'imagen' => 'img/galeria/2.jpg',
            //     'posicion' => 3,
            //     'id_usuario' => 1,
            //     'id_tipo' => 2,
            // ]);
            // Galeria::create([
            //     'id_galeria' => 7,
            //     'titulo' => 'Título',
            //     'descripcion' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam fugit rerum perferendis repellendus nemo provident, labore tempore facilis. Sapiente quaerat perferendis vero mollitia accusantium numquam vel molestias tempore voluptatem nulla.',
            //     'imagen' => 'img/galeria/1.jpg',
            //     'posicion' => 4,
            //     'id_usuario' => 1,
            //     'id_tipo' => 1,
            // ]);
            // Galeria::create([
            //     'id_galeria' => 8,
            //     'titulo' => 'Título',
            //     'descripcion' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam fugit rerum perferendis repellendus nemo provident, labore tempore facilis. Sapiente quaerat perferendis vero mollitia accusantium numquam vel molestias tempore voluptatem nulla.',
            //     'imagen' => 'img/galeria/2.jpg',
            //     'posicion' => 4,
            //     'id_usuario' => 1,
            //     'id_tipo' => 2,
            // ]);
            // Galeria::create([
            //     'id_galeria' => 9,
            //     'titulo' => 'Título',
            //     'descripcion' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam fugit rerum perferendis repellendus nemo provident, labore tempore facilis. Sapiente quaerat perferendis vero mollitia accusantium numquam vel molestias tempore voluptatem nulla.',
            //     'imagen' => 'img/galeria/1.jpg',
            //     'posicion' => 5,
            //     'id_usuario' => 1,
            //     'id_tipo' => 1,
            // ]);
            // Galeria::create([
            //     'id_galeria' => 10,
            //     'titulo' => 'Título',
            //     'descripcion' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam fugit rerum perferendis repellendus nemo provident, labore tempore facilis. Sapiente quaerat perferendis vero mollitia accusantium numquam vel molestias tempore voluptatem nulla.',
            //     'imagen' => 'img/galeria/2.jpg',
            //     'posicion' => 5,
            //     'id_usuario' => 1,
            //     'id_tipo' => 2,
            // ]);
            // Galeria::create([
            //     'id_galeria' => 11,
            //     'titulo' => 'Título',
            //     'descripcion' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam fugit rerum perferendis repellendus nemo provident, labore tempore facilis. Sapiente quaerat perferendis vero mollitia accusantium numquam vel molestias tempore voluptatem nulla.',
            //     'imagen' => 'img/galeria/1.jpg',
            //     'posicion' => 6,
            //     'id_usuario' => 1,
            //     'id_tipo' => 1,
            // ]);
            // Galeria::create([
            //     'id_galeria' => 12,
            //     'titulo' => 'Título',
            //     'descripcion' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam fugit rerum perferendis repellendus nemo provident, labore tempore facilis. Sapiente quaerat perferendis vero mollitia accusantium numquam vel molestias tempore voluptatem nulla.',
            //     'imagen' => 'img/galeria/2.jpg',
            //     'posicion' => 6,
            //     'id_usuario' => 1,
            //     'id_tipo' => 2,
            // ]);
            // Galeria::create([
            //     'id_galeria' => 13,
            //     'titulo' => 'Título',
            //     'descripcion' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam fugit rerum perferendis repellendus nemo provident, labore tempore facilis. Sapiente quaerat perferendis vero mollitia accusantium numquam vel molestias tempore voluptatem nulla.',
            //     'imagen' => 'img/galeria/1.jpg',
            //     'posicion' => 7,
            //     'id_usuario' => 1,
            //     'id_tipo' => 1,
            // ]);
            // Galeria::create([
            //     'id_galeria' => 14,
            //     'titulo' => 'Título',
            //     'descripcion' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam fugit rerum perferendis repellendus nemo provident, labore tempore facilis. Sapiente quaerat perferendis vero mollitia accusantium numquam vel molestias tempore voluptatem nulla.',
            //     'imagen' => 'img/galeria/2.jpg',
            //     'posicion' => 7,
            //     'id_usuario' => 1,
            //     'id_tipo' => 2,
            // ]);
            // Galeria::create([
            //     'id_galeria' => 15,
            //     'titulo' => 'Título',
            //     'descripcion' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam fugit rerum perferendis repellendus nemo provident, labore tempore facilis. Sapiente quaerat perferendis vero mollitia accusantium numquam vel molestias tempore voluptatem nulla.',
            //     'imagen' => 'img/galeria/1.jpg',
            //     'posicion' => 8,
            //     'id_usuario' => 1,
            //     'id_tipo' => 1,
            // ]);
            // Galeria::create([
            //     'id_galeria' => 16,
            //     'titulo' => 'Título',
            //     'descripcion' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam fugit rerum perferendis repellendus nemo provident, labore tempore facilis. Sapiente quaerat perferendis vero mollitia accusantium numquam vel molestias tempore voluptatem nulla.',
            //     'imagen' => 'img/galeria/2.jpg',
            //     'posicion' => 8,
            //     'id_usuario' => 1,
            //     'id_tipo' => 2,
            // ]);
            // Galeria::create([
            //     'id_galeria' => 17,
            //     'titulo' => 'Título',
            //     'descripcion' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam fugit rerum perferendis repellendus nemo provident, labore tempore facilis. Sapiente quaerat perferendis vero mollitia accusantium numquam vel molestias tempore voluptatem nulla.',
            //     'imagen' => 'img/galeria/1.jpg',
            //     'posicion' => 9,
            //     'id_usuario' => 1,
            //     'id_tipo' => 1,
            // ]);
            // Galeria::create([
            //     'id_galeria' => 18,
            //     'titulo' => 'Título',
            //     'descripcion' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam fugit rerum perferendis repellendus nemo provident, labore tempore facilis. Sapiente quaerat perferendis vero mollitia accusantium numquam vel molestias tempore voluptatem nulla.',
            //     'imagen' => 'img/galeria/2.jpg',
            //     'posicion' => 9,
            //     'id_usuario' => 1,
            //     'id_tipo' => 2,
            // ]);
        }
    }