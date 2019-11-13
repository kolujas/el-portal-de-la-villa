<?php
    namespace App\Http\Controllers\Auth;

    use App\User;
    use App\Http\Controllers\Controller;
    use Auth;
    use Session;
    use Illuminate\Foundation\Auth\AuthenticatesUsers;
    use Illuminate\Http\Request;

    class LoginController extends Controller{
        /*
        |--------------------------------------------------------------------------
        | Login Controller
        |--------------------------------------------------------------------------
        |
        | This controller handles authenticating users for the application and
        | redirecting them to your home screen. The controller uses a trait
        | to conveniently provide its functionality to your applications.
        |
        */

        use AuthenticatesUsers;

        /**
         * Where to redirect users after login.
         *
         * @var string
         */
        protected $redirectTo = '/panel';
        
        /** Carga la seccion "Iniciar Sesión". */
        public function showIngresar(){
            $validation = User::$validation['ingresar'];

            return view('auth.ingresar',[
                'validation' => json_encode($validation),
            ]);
        }

        /**
         * Valida y loguea al Usuario.
         * 
         * @param $request Request
         */
        public function doIngresar(Request $request){
            $inputData = $request->input();
            
            $request->validate(User::$validation['ingresar']['rules'], User::$validation['ingresar']['messages']);

            if(isset($inputData['recordar'])){
                if($inputData['recordar'] == 'on'){
                    $recordar = true;
                }else{
                    $recordar = false;
                }
            }else{
                $recordar = false;
            }

            if(Auth::attempt(['password' => $inputData['clave'], 'correo' => $inputData['correo']], $recordar)){
                return redirect()->route('web.panel')->with('status', 'Sesión Iniciada.');
            }else{
                return redirect()->route('auth.showIngresar')->withInput()->with('status', 'Correo y/o clave incorrectos.');
            }
        }
        
        /** Desloguea al Usuario. */
        public function doSalir(){
            Auth::logout();
            return redirect()->route('web.inicio')->with('status', 'Sesión Cerrada.');
        }
    }