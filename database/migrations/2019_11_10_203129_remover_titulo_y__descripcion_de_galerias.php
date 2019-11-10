<?php
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class RemoverTituloYDescripcionDeGalerias extends Migration{
        /**
         * Run the migrations.
         * 
         * @return void
         */
        public function up(){
            Schema::table('galerias', function($table) {
                $table->dropColumn('titulo');
                $table->dropColumn('descripcion');
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