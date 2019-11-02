<?php
    namespace App;

    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;

    class User extends Authenticatable{
        use Notifiable;

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

        /** Establece cual campo va a funcionar como la "Password" guardada para verificar su Autenticacion. */
        public function getAuthPassword(){
            return $this->clave;
        }
    }