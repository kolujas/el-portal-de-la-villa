<?php
    namespace App\Models;
   
    use App\User;
    use Illuminate\Database\Eloquent\Model;

    class Banner extends Model{
        /** @var string El nombre de la tabla. */
        protected $table = 'banners';
        
        /** @var string El nombre de la PK. */
        protected $primaryKey = 'id_banner';

        /** @var array Los atributos que se van a cargar de forma masiva. */
        protected $fillable = [
            'titulo', 'descripcion', 'imagen', 'id_usuario',
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
                ], 'messages' => [
                    'titulo.required' => 'El título del banner no puede estar vacío.',
                    'titulo.min' => 'El título del banner debe tener al menos :min caracteres.',
                    'titulo.max' => 'El título del banner no puede tener más de :max caracteres.',
                    'descripcion.required' => 'La descripción del banner no puede estar vacío.',
                    'descripcion.max' => 'La descripción del banner no puede tener más de :max caracteres.',
                    'imagen.required' => 'La imagen del banner es obligatoria.',
                    'imagen.mimetypes' => 'La imagen del banner debe ser una imagen con formato JPG/JPEG o PNG.',
                ],
            ],'editar' => [
                'rules' => [
                    'titulo' => 'required|min:3|max:150',
                    'descripcion' => 'required|max:220',
                    'imagen' => 'nullable|mimetypes:image/jpeg,image/png',
                ], 'messages' => [
                    'titulo.required' => 'El título del banner no puede estar vacío.',
                    'titulo.min' => 'El título del banner debe tener al menos :min caracteres.',
                    'titulo.max' => 'El título del banner no puede tener más de :max caracteres.',
                    'descripcion.required' => 'La descripción del banner no puede estar vacío.',
                    'descripcion.max' => 'La descripción del banner no puede tener más de :max caracteres.',
                    'imagen.mimetypes' => 'La imagen del banner debe ser una imagen con formato JPG/JPEG o PNG.',
                ],
            ]
        ];
    }