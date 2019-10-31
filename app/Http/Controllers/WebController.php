<?php
    namespace App\Http\Controllers;

    use App\Models\Evento;
    use Auth;
    use Illuminate\Http\Request;

    class WebController extends Controller{
        /** Carga la seccion principal. */
        public function construccion(){
            return view('web.construccion', [
                //
            ]);
        }

        public function inicio(){
            return view('web.inicio', [
                //
            ]);
        }

        /** Carga el panel de administracion. */
        public function panel(){
            $eventos = Evento::all();
            return view('web.panel', [
                'eventos' => $eventos,
            ]);
        }

        /** Carga el panel de administracion en la seccion de personalizar la web. */
        public function personalizar(){
            return view('web.personalizar', [
                //
            ]);
        }
    }