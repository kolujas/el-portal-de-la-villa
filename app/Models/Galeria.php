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
        
        /** @var array Las reglas de validación y sus mensajes correspondientes. */
        public static $validation = [
            'crear' => [
                'rules' => [
                    'titulo' => 'required|min:3|max:150',
                    'descripcion' => 'required|max:220',
                    'imagen' => 'required|mimetypes:image/jpeg,image/png',
                    'id_tipo' => 'required',
                ], 'messages' => [
                    'titulo.required' => 'El título de la imagen no puede estar vacío.',
                    'titulo.min' => 'El título de la imagen debe tener al menos :min caracteres.',
                    'titulo.max' => 'El título de la imagen no puede tener más de :max caracteres.',
                    'descripcion.required' => 'La descripción de la imagen no puede estar vacío.',
                    'descripcion.max' => 'La descripción de la imagen no puede tener más de :max caracteres.',
                    'imagen.required' => 'La imagen es obligatoria.',
                    'imagen.mimetypes' => 'La imagen debe ser una imagen con formato JPG/JPEG o PNG.',
                    'id_tipo.required' => 'El tipo de la imagen es obligatorio.',
                ],
            ],'editar' => [
                'rules' => [
                    'titulo' => 'required|min:3|max:150',
                    'descripcion' => 'required|max:220',
                    'imagen' => 'nullable|mimetypes:image/jpeg,image/png',
                    'id_tipo' => 'required',
                ], 'messages' => [
                    'titulo.required' => 'El título de la imagen no puede estar vacío.',
                    'titulo.min' => 'El título de la imagen debe tener al menos :min caracteres.',
                    'titulo.max' => 'El título de la imagen no puede tener más de :max caracteres.',
                    'descripcion.required' => 'La descripción de la imagen no puede estar vacío.',
                    'descripcion.max' => 'La descripción de la imagen no puede tener más de :max caracteres.',
                    'imagen.mimetypes' => 'La imagen debe ser una imagen con formato JPG/JPEG o PNG.',
                    'id_tipo.required' => 'El tipo de la imagen es obligatorio.',
                ],
            ]
        ];
    }