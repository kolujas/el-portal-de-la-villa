<?php
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class AgregarCampoImagenAEventos extends Migration{
        /**
         * Run the migrations.
         * 
         * @return void
         */
        public function up(){
            Schema::table('eventos', function (Blueprint $table){
                $table->string('imagen');
            });
        }

        /**
         * Reverse the migrations.
         * 
         * @return void
         */
        public function down(){
            //
        }
    }