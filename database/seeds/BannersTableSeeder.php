<?php
    use App\Models\Banner;
    use Illuminate\Database\Seeder;

    class BannersTableSeeder extends Seeder{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run(){
            Banner::create([
                'id_banner' => 1,
                'titulo' => 'First slide label',
                'descripcion' => 'Nulla vitae elit libero, a pharetra augue mollis interdum.',
                'imagen' => 'img/banner/1.jpg',
                'id_usuario' => 1,
            ]);
            Banner::create([
                'id_banner' => 2,
                'titulo' => 'Second slide label',
                'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'imagen' => 'img/banner/2.png',
                'id_usuario' => 1,
            ]);
            Banner::create([
                'id_banner' => 3,
                'titulo' => 'Third slide label',
                'descripcion' => 'Praesent commodo cursus magna, vel scelerisque nisl consectetur.',
                'imagen' => 'img/banner/1.jpg',
                'id_usuario' => 1,
            ]);
        }
    }