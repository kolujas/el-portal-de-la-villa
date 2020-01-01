<?php
    namespace App\Models;
   
    use App\User;
    use Cviebrock\EloquentSluggable\Sluggable;
    use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
    use Illuminate\Database\Eloquent\Model;

    class Evento extends Model{
        use Sluggable, SluggableScopeHelpers;

        /** @var string El nombre de la tabla. */
        protected $table = 'eventos';
        
        /** @var string El nombre de la PK. */
        protected $primaryKey = 'id_evento';

        /** @var array Los atributos que se van a cargar de forma masiva. */
        protected $fillable = [
            'titulo', 'descripcion', 'fecha', 'organizador', 'imagen', 'url', 'id_usuario', 'slug',
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
                    'descripcion' => 'nullable|max:220',
                    'fecha' => 'required|date',
                    'organizador' => 'required|min:2|max:200',
                    'url' => 'required|url',
                    'imagen' => 'required|mimetypes:image/jpeg,image/png',
                ], 'messages' => [
                    'titulo.required' => 'El título del evento no puede estar vacío.',
                    'titulo.min' => 'El título del evento debe tener al menos :min caracteres.',
                    'titulo.max' => 'El título del evento no puede tener más de :max caracteres.',
                    'descripcion.required' => 'La descripción del evento no puede estar vacío.',
                    'descripcion.max' => 'La descripción del evento no puede tener más de :max caracteres.',
                    'fecha.required' => 'La fecha del evento no puede estar vacía.',
                    'fecha.date' => 'La fecha del evento debe ser una fecha valida.',
                    'organizador.required' => 'El organizador del evento no puede estar vacío.',
                    'organizador.min' => 'El organizador del evento debe tener al menos :min caracteres.',
                    'organizador.max' => 'El organizador del evento no puede tener más de :max caracteres.',
                    'url.required' => 'La URL del evento es obligatoria.',
                    'url.url' => 'La URL del evento no es una URL valida.',
                    'imagen.required' => 'La imagen del evento es obligatoria.',
                    'imagen.mimetypes' => 'La imagen del evento no es una imagen valida, debe ser formato JPG/JPEG o PNG.',
                ],
            ],'editar' => [
                'rules' => [
                    'titulo' => 'required|min:3|max:150',
                    'descripcion' => 'nullable|max:220',
                    'fecha' => 'required|date',
                    'organizador' => 'required|min:2|max:200',
                    'url' => 'required|url',
                    'imagen' => 'nullable|mimetypes:image/jpeg,image/png',
                ], 'messages' => [
                    'titulo.required' => 'El título del evento no puede estar vacío.',
                    'titulo.min' => 'El título del evento debe tener al menos :min caracteres.',
                    'titulo.max' => 'El título del evento no puede tener más de :max caracteres.',
                    'descripcion.required' => 'La descripción del evento no puede estar vacío.',
                    'descripcion.max' => 'La descripción del evento no puede tener más de :max caracteres.',
                    'fecha.required' => 'La fecha del evento no puede estar vacía.',
                    'fecha.date' => 'La fecha del evento debe ser una fecha valida.',
                    'organizador.required' => 'El organizador del evento no puede estar vacío.',
                    'organizador.min' => 'El organizador del evento debe tener al menos :min caracteres.',
                    'organizador.max' => 'El organizador del evento no puede tener más de :max caracteres.',
                    'url.required' => 'La URL del evento es obligatoria.',
                    'url.url' => 'La URL del evento no es una URL valida.',
                    'imagen.mimetypes' => 'La imagen del evento no es una imagen valida, debe ser formato JPG/JPEG o PNG.',
                ],
            ]
        ];
        
        /**
         * Devuelve la configuracion del slug del modelo.
         * 
         * @return array
         */
        public function sluggable(){
            return [
                'slug' => [
                    'source'	=> 'titulo',
                    'onUpdate'	=> true,
                ]
            ];
        }
    }