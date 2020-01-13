<?php
    namespace App\Http\Controllers;

    use App\Mail\Contactar;
    use App\Models\Web;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\Validator;

    class CorreoController extends Controller{
        /** 
         * Contacta a un Usuario con los Administradores.
         * @param $request Request
         */
        public function contactar(Request $request){
            $inputData = $request->input();
            
            $validator = Validator::make($request->all(), Web::$reglas['contactar']['rules'], Web::$reglas['contactar']['messages']);
            
            if($validator->fails()){
                return redirect('/demo#contacto')->withErrors($validator)->withInput();
            }else{
                $checkin = explode('-', $inputData['checkin']);
                $inputData['checkin'] = [];
                $inputData['checkin']['day'] = $checkin[2];
                $inputData['checkin']['month'] = $this->setMonth($checkin[1]);
                $inputData['checkin']['year'] = $checkin[0];
                $inputData['checkin'] = (object) $inputData['checkin'];

                $checkout = explode('-', $inputData['checkout']);
                $inputData['checkout'] = [];
                $inputData['checkout']['day'] = $checkout[2];
                $inputData['checkout']['month'] = $this->setMonth($checkout[1]);
                $inputData['checkout']['year'] = $checkout[0];
                $inputData['checkout'] = (object) $inputData['checkout'];
                $objDemo = (object) $inputData;

                $response = new Contactar($objDemo);
    
                Mail::to('juancarmentia@gmail.com')->send($response);
    
                return redirect()->route('correo.gracias');
            }
        }
        
        /** 
         * Cambia la fecha numerica por la de string.
         * @param string $month - El mes en forma de número.
         * @return string
         */
        public function setMonth($month){
            switch($month){
                case '01':
                    $span = 'Enero';
                break;
                case '02':
                    $span = 'Febrero';
                break;
                case '03':
                    $span = 'Marzo';
                break;
                case '04':
                    $span = 'Abril';
                break;
                case '05':
                    $span = 'Mayo';
                break;
                case '06':
                    $span = 'Junio';
                break;
                case '07':
                    $span = 'Julio';
                break;
                case '08':
                    $span = 'Agosto';
                break;
                case '09':
                    $span = 'Septiembre';
                break;
                case '10':
                    $span = 'Octubre';
                break;
                case '11':
                    $span = 'Noviembre';
                break;
                case '12':
                    $span = 'Diciembre';
                break;
            }
            return $span;
        }

        /** De vuelve la visgta de mensaje de exito. */
        public function gracias(){
            return view('correo.gracias', [
                //
            ]);
        }
    }