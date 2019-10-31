<?php
    use App\Models\Evento;
    use Illuminate\Database\Seeder;

    class EventosTableSeeder extends Seeder{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run(){
            Evento::create([
                'id_evento' => 1,
                'titulo' => 'Título',
                'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat impedit nihil eaque cumque, debitis beatae est neque. Repellat voluptates doloribus in animi, quod culpa quia praesentium dolores, magni reiciendis ut?',
                'fecha' => now(),
                'organizador' => 'Organizador',
                'imagen' => 'img/construction.jpg',
                'url' => 'google.com.ar',
                'id_usuario' => 1,
            ]);
        }
    }