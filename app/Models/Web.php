<?php
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Model;

    class Web extends Model{
        /** @var array Las reglas de validación y sus mensajes correspondientes. */
        public static $reglas = [
            'contactar' => [
                'rules' => [
                    'nombre' => 'nullable|min:2|max:60',
                    'correo' => 'required|email|max:100',
                    'telefono' => 'required|numeric',
                    'checkin' => 'nullable|date',
                    'checkout' => 'nullable|date',
                    'g-recaptcha-response' => 'required|captcha',
                ], 'messages' => [
                    'nombre.min' => 'El nombre no puede tener menos de :min caracteres.',
                    'nombre.max' => 'El nombre no puede tener más de :max caracteres.',
                    'correo.required' => 'El correo es obligatorio.',
                    'correo.email' => 'Debe ser un correo valido.',
                    'correo.max' => 'El correo no puede tener más de :max caracteres.',
                    'telefono.required' => 'El teléfono es obligatorio.',
                    'telefono.numeric' => 'El teléfono debe ser un valor numérico.',
                    'checkin.date' => 'El checkin debe ser una fecha valida.',
                    'checkout.date' => 'El checkout debe ser una fecha valida.',
                    'g-recaptcha-response.required' => 'Verifique que no es un robot',
                    'g-recaptcha-response.captcha' => 'Verificación dudosa.',
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