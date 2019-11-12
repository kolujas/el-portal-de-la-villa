<?php
    namespace App\Http\Controllers;
    
    use App\User;
    use Auth;
    use Illuminate\Http\Request;

    class AuthController extends Controller{
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
                foreach($inputData['recordar'] as $checkbox){
                    if($checkbox){
                        $recordar = true;
                    }else{
                        $recordar = false;
                    }
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