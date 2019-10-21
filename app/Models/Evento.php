<?php
    namespace App\Models;
   
    use App\User;
    use Illuminate\Database\Eloquent\Model;

    class Evento extends Model{
        /** @var string El nombre de la tabla. */
        protected $table = 'eventos';
        
        /** @var string El nombre de la PK. */
        protected $primaryKey = 'id_evento';

        /** @var array Los atributos que se van a cargar de forma masiva. */
        protected $fillable = [
            'titulo', 'descripcion', 'fecha', 'organizador', 'pdf', 'id_usuario',
        ];
        
        /** Trae el Usuario que coincidan con el PK. */
        public function usuario(){
            return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
        }
        
        /** @var array Las reglas de validación. */
        public static $reglas = [
            'crear' => [
                'titulo' => 'required|min:3|max:150',
                'descripcion' => 'required',
                'fecha' => 'required|date',
                'organizador' => 'required|min:2|max:200',
                'pdf' => 'required|mimetypes:application/pdf',
            ],'editar' => [
                'titulo' => 'required|min:3|max:150',
                'descripcion' => 'required',
                'fecha' => 'required|date',
                'organizador' => 'required|min:2|max:200',
                'pdf' => 'sometimes|mimetypes:application/pdf',
            ]
        ];
    }