<?php
    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class User extends Authenticatable{
        use Notifiable;
        
        /** @var string El nombre de la PK. */
        protected $primaryKey = 'id_usuario';

        /** @var string El nombre de la tabla. */
        protected $table = 'usuarios';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'nombre', 'correo', 'clave',
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'clave', 'remember_token',
        ];

        /**
         * The attributes that should be cast to native types.
         *
         * @var array
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
        ];
        
        /** @var array Las reglas de validación y sus mensajes correspondientes. */
        public static $validation = [
            'ingresar' => [
                'rules' => [
                    'correo' => 'required|email',
                    'clave' => 'required|min:4|max:40'
                ], 'messages' => [
                    'correo.required' => 'El correo es obligatorio.',
                    'correo.email' => 'El correo no es un correo valido.',
                    'clave.required' => 'La contraseña es obligatoria.',
                    'clave.min' => 'La contraseña no puede tener menos de :min caracteres.',
                    'clave.max' => 'La contraseña no puede tener más de :max caracteres.',
                ],
            ],
        ];

        /** Establece cual campo va a funcionar como la "Password" guardada para verificar su Autenticacion. */
        public function getAuthPassword(){
            return $this->clave;
        }
    }