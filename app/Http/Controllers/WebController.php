<?php
    namespace App\Http\Controllers;

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
            return view('web.panel', [
                //
            ]);
        }

        /** Carga el panel de administracion en la seccion de personalizar la web. */
        public function personalizar(){
            return view('web.personalizar', [
                //
            ]);
        }
    }