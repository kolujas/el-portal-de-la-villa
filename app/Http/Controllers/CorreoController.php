<?php
    namespace App\Http\Controllers;

    use App\Mail\Contactar;
    use App\Models\Web;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\Validator;
    use PHPMailer\PHPMailer\PHPMailer;

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
                $inputData['day'] = $checkin[2];
                $inputData['month'] = $this->setMonth($checkin[1]);
                $inputData['year'] = $checkin[0];

                $checkout = explode('-', $inputData['checkout']);
                $inputData['day'] = $checkout[2];
                $inputData['month'] = $this->setMonth($checkout[1]);
                $inputData['year'] = $checkout[0];
                $objDemo = (object) $inputData;

                try{
                    $mail = new PHPMailer;
                    $mail->isSMTP();
                    $mail->SMTPDebug = 2;
                    $mail->Host = env('MAIL_HOST');
                    $mail->Port = env('MAIL_PORT');
                    $mail->SMTPAuth = true;
                    $mail->Username = env('MAIL_USERNAME');
                    $mail->Password = env('MAIL_PASSWORD');
                    $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                    $mail->addAddress(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                    if(isset($objDemo->nombre)){
                        $mail->Subject = "$objDemo->nombre quiere contactar a alguien";
                        $objDemo->nombre = "$objDemo->nombre, desde tu sitio web.";
                    }else{
                        $mail->Subject = "$objDemo->correo quiere contactar a alguien";
                        $objDemo->nombre = "alguien, sin dejar su nombre, desde tu sitio web.";
                    }
                    if(!isset($objDemo->huespedes)){
                        $objDemo->huespedes = "indefinida.";
                    }
    
    $message = "<!DOCTYPE html><html lang='es'><head><meta charset='utf-8'><title>$objDemo->nombre quiere contactar a alguien</title><style>body{--color-uno: #0D4A7B;--color-dos: #197C3E;--color-tres: #C6C6C6;--color-cuatro: #222222;}table{max-width: 600px;padding: 10px;margin: 0 auto;border-collapse: collapse;}td{background-color: #ecf0f1;}td > div{color: #34495e;margin: 4% 10% 2% 10%;text-align: justify;font-family: sans-serif;}h2{color: #0D4A7B;margin:0 0 7px;}ul{font-size: 15px;margin: 10px 0;}.dates{margin: 2px;font-size: 15px;min-height: 100px;background-color: #f8f8f8;padding: 1rem;margin-bottom: 1.5rem;}.dates p{flex-basis: 100%;font-size: 1.5rem;margin-top: 0;text-align: center;}.dates > div{display: flex;justify-content: space-between;align-items: center;flex-wrap: wrap;}.dates > div > div{flex-basis: calc(50% - 2.5px);display: flex;justify-content: center;flex-wrap: wrap;}.dates .separador{position: relative;height: 25px;flex-basis: 5px;background: #0D4A7B;border-radius: 10px;display: block;transform: translateY(-80%);}.dates .separador::before{position: absolute;content: '';height: 50%;width: 100%;top: 105%;left: 0;background: #0D4A7B;border-radius: 10px;}.dates .separador::after{position: absolute;content: '';height: 100%;width: 100%;top: 160%;left: 0;background: #0D4A7B;border-radius: 10px;}.dates div span{flex-basis: 100%;text-align: center;}.dates div .day{flex-basis: 100%;text-align: center;font-size: 4rem;}.dates div .text{flex-basis: 100%;display: flex;justify-content: center;}.dates div .text .month,.dates div .text .year{flex-basis: fit-content;}.dates div .text .month{margin-right: 1rem;}.return{width: 100%;text-align: center;}.return a{text-decoration: none;border-radius: 5px;padding: 11px 23px;color: white;transition: 500ms;background-color: #0D4A7B;}.return a:hover{background-color: #222222;}.copyright{color: #ffffff;font-size: 1.1rem;text-align: center;margin: 30px 0 0 0;padding: 1rem;background-color: #222222;}</style></head><body><table><tr><td><div><h2> $objDemo->nombre  quiere contactar a alguien</h2><ul><li><strong>Se ha contactado:</strong>  $objDemo->nombre  desde tu sitio web.</li><li><strong>Email:</strong>  $objDemo->correo </li><li><strong>Telefono:</strong>   $objDemo->telefono </li><li><strong>Cantidad de huespedes:</strong>   $objDemo->huespedes </li></ul><div class='dates'><p>Consultando por las fechas</p><div><div class='checkin'><span>Desde</span><div class='day'>$objDemo->day</div><div class='text'><div class='month'>$objDemo->month</div><div class='year'>$objDemo->year</div></div></div><div class='separador'></div><div class='checkout'><span>Hasta</span><div class='day'>$objDemo->day</div><div class='text'><div class='month'>$objDemo->month</div><div class='year'>$objDemo->year</div></div></div></div></div><div class='return'><a target='_blank' href='URL'>Ir a la página</a></div><p class='copyright'>© Digitalo: <a style='color: white; text-decoration: none;' target='_blank' href='https://www.digitalo.com.ar/'> www.digitalo.com.ar</a></p></div></td></tr></table></body></html>";
    
                    $mail->msgHTML($message);
                    $mail->AltBody = 'Esto es un texto de test';
                    // dd($mail);
                    $mail->send();
                    return redirect()->route('correo.gracias');
                }catch(phpmailerException $e){
                    dd($e);
                    return redirect('/demo#contacto')->withInput()->with('status', $e->getMessage());
                }catch(Exception $e){
                    dd($e);
                    return redirect('/demo#contacto')->withInput()->with('status', $e->getMessage());
                }

                // $response = new Contactar($objDemo);
    
                // Mail::to('juancarmentia@gmail.com')->send($response);
    
                // return redirect()->route('correo.gracias');
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