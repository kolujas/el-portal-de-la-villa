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
            $evento = Evento::find(1);
            $evento->update(['slug' => 'titulo',]);
            $evento->update(['url' => 'https://google.com.ar',]);
        }
    }