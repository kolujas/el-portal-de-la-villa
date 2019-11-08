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
            'imagen', 'id_tipo', 'posicion',
        ];
        
        /** Trae el Usuario que coincidan con el PK. */
        public function usuario(){
            return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
        }
        
        /** @var array Las reglas de validación y sus mensajes correspondientes. */
        public static $validation = [
            'crear' => [
                'rules' => [
                    'imagen' => 'required|mimetypes:image/jpeg,image/png',
                    'id_tipo' => 'required',
                    'posicion' => 'required|numeric',
                ], 'messages' => [
                    'imagen.required' => 'La imagen no puede estar vacía.',
                    'imagen.mimetypes' => 'La imagen debe ser formato JPG/JPEG o PNG.',
                    'posicion.required' => 'La posición de la imagen no puede estar vacío.',
                    'posicion.numeric' => 'La posición de la imagen debe de ser valor numeric.',
                    'id_tipo.required' => 'El tipo de la imagen es obligatorio.',
                ],
            ], 'editar' => [
            ], 'mover' => [
                'rules' => [
                    'posicion' => 'required|numeric',
                ], 'messages' => [
                    'posicion.required' => 'La posición de la imagen no puede estar vacío.',
                    'posicion.numeric' => 'La posición de la imagen debe de ser valor numeric.',
                ],
            ],
        ];
    }