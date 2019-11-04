<?php
    namespace App\Http\Controllers;

    use App\Models\Banner;
    use App\Models\Evento;
    use App\Models\Web;
    use Auth;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\File;
    use Storage;

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
            $banners = Banner::all();
            $eventos = Evento::all();

            if(File::get('storage/archivos/titulo.txt')){
                $archivos = (object) [
                    'titulo' => File::get('storage/archivos/titulo.txt'),
                    'descripcion' => File::get('storage/archivos/descripcion.txt'),
                ];
            }else{
                $archivos = (object) [
                    'titulo' => File::get('archivos/titulo.txt'),
                    'descripcion' => File::get('archivos/descripcion.txt'),
                ];
            }

            return view('web.panel', [
                'archivos' => $archivos,
                'banners' => $banners,
                'eventos' => $eventos,
                'validation' => json_encode(Web::$validation['editar']),
            ]);
        }

        /**
         * Valida y actualiza la información principal.
         * 
         * @param $request Request.
         */
        public function doEditar(Request $request){
            $inputData = $request->all();

            $request->validate(Web::$validation['editar']['rules'], Web::$validation['editar']['messages']);

            Storage::put('archivos/titulo.txt', $inputData['titulo']);
            Storage::put('archivos/descripcion.txt', $inputData['descripcion']);
            
            return redirect('/panel#personalizar')->with('status', 'Información editada correctamente.');
        }
    }