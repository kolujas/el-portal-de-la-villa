<?php
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Model;

    class Web extends Model{
        /** @var array Las reglas de validación y sus mensajes correspondientes. */
        public static $validation = [
            'contactar' => [
                'rules' => [
                    //
                ], 'messages' => [
                    //
                ],
            ],'editar' => [
                'rules' => [
                    'titulo' => 'required|min:3|max:150',
                    'descripcion' => 'required',
                ], 'messages' => [
                    'titulo.required' => 'El título principal no puede estar vacío.',
                    'titulo.min' => 'El título principal debe tener al menos :min caracteres.',
                    'titulo.max' => 'El título principal no puede tener más de :max caracteres.',
                    'descripcion.required' => 'La descripción principal no puede estar vacío.',
                    'descripcion.max' => 'La descripción principal no puede tener más de :max caracteres.',
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