<?php
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CrearTablaBanners extends Migration{
        /**
         * Run the migrations.
         * 
         * @return void
         */
        public function up(){
            Schema::create('banners', function(Blueprint $table){
                $table->increments('id_banner');
                $table->string('titulo', 150);
                $table->text('descripcion');
                $table->string('imagen');
                $table->unsignedInteger('id_usuario');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         * 
         * @return void
         */
        public function down(){
            Schema::dropIfExists('banners');
        }
    }