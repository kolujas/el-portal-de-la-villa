<?php
    namespace App\Http\Controllers;

    use App\Mail\Contactar;
    use App\Models\Tipo;
    use App\Models\Web;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;

    class CorreoController extends Controller{
        /** 
         * Contacta a un Usuario con los Administradores.
         * 
         * @param $request Request
         */
        public function contactar(Request $request){
            $inputData = $request->input();

            $request->validate(Web::$reglas['contactar']['rules'], Web::$reglas['contactar']['messages']);

            $objDemo = (object) $inputData;

            Mail::to('ejemplo@correo.com')->send(new Contactar($objDemo));

            return redirect()->route('correo.gracias');
        }

        /** De vuelve la visgta de mensaje de exito. */
        public function gracias(){
            return view('correo.gracias', [
                //
            ]);
        }
    }