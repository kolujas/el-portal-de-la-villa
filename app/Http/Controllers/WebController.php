<?php
    namespace App\Http\Controllers;

    use App\Models\Banner;
    use App\Models\Galeria;
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
            $banners = Banner::all();
            $habitaciones = Galeria::where('id_tipo', '=', 1)->orderBY('posicion', 'asc')->get();
            $instalaciones = Galeria::where('id_tipo', '=', 2)->orderBY('posicion', 'asc')->get();
            
            $galeria = collect([]);
            foreach($habitaciones as $habitacion){
                $galeria->push($habitacion);
            }
            foreach($instalaciones as $instalacion){
                $galeria->push($instalacion);
            }

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
            
            return view('web.inicio', [
                'archivos' => $archivos,
                'banners' => $banners,
                'galeria' => $galeria,
            ]);
        }

        /** Carga el panel de administracion. */
        public function panel(){
            $banners = Banner::all();
            $habitaciones = Galeria::where('id_tipo', '=', 1)->orderBY('posicion', 'asc')->paginate(8, ['*'], 'habitaciones');
            $habitaciones_totales = Galeria::where('id_tipo', '=', 1)->get();
            $instalaciones = Galeria::where('id_tipo', '=', 2)->orderBY('posicion', 'asc')->paginate(8, ['*'], 'instalaciones');
            $instalaciones_totales = Galeria::where('id_tipo', '=', 2)->get();
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
                'habitaciones' => $habitaciones,
                'instalaciones' => $instalaciones,
                'galerias' => [
                    'habitaciones' => $habitaciones_totales,
                    'instalaciones' => $instalaciones_totales,
                ],
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