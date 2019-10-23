<?php
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CrearTablaGalerias extends Migration{
        /**
         * Run the migrations.
         * 
         * @return void
         */
        public function up(){
            Schema::create('galeria', function(Blueprint $table){
                $table->increments('id_galeria');
                $table->string('titulo', 150);
                $table->text('descripcion');
                $table->string('imagen');
                $table->unsignedInteger('id_tipo');
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
            Schema::dropIfExists('galeria');
        }
    }