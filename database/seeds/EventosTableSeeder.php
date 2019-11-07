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
                'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, corporis? Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, incidunt?',
                'organizador' => 'Organizador',
                'fecha' => now(),
                'slug' => 'titulo',
                'url' => 'https://google.com.ar',
                'imagen' => 'eventos/construction.jpg',
                'id_usuario' => 1,
            ]);
        }
    }