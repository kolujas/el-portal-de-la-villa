<?php
    namespace App\Models;
   
    use App\User;
    use Illuminate\Database\Eloquent\Model;

    class Galeria extends Model{
        /** @var string El nombre de la tabla. */
        protected $table = 'galerias';
        
        /** @var string El nombre de la PK. */
        protected $primaryKey = 'id_galeria';

        /** @var array Los atributos que se van a cargar de forma masiva. */
        protected $fillable = [
            'titulo', 'descripcion', 'imagen', 'id_tipo',
        ];
        
        /** Trae el Usuario que coincidan con el PK. */
        public function usuario(){
            return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
        }
        
        /** @var array Las reglas de validación. */
        public static $reglas = [
            'crear' => [
                //
            ],'editar' => [
                //
            ]
        ];
    }