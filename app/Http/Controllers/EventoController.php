<?php
    namespace App\Http\Controllers;

    use App\Models\Evento;
    use Auth;
    use Cviebrock\EloquentSluggable\Services\SlugService;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\File;
    use Intervention\Image\ImageManagerStatic as Image;
    use Storage;

    class EventoController extends Controller{
        /** Carga el panel de administracion en la seccion de listado de Eventos. */
        public function panel(){
            $eventos = Evento::orderBy('updated_at', 'DESC')->get();
            $cantidad_eventos = count($eventos);

            return view('evento.panel', [
                'eventos' => $eventos,
                'cantidad' => $cantidad_eventos,
            ]);
        }

        /** Carga el panel de administracion en la seccion de crear Evento. */
        public function showCrear(){
            $validation = Evento::$validation['crear'];

            return view('evento.crear',[
                'validation' => json_encode($validation),
            ]);
        }
        
        /**
         * Valida y crea el Evento.
         * 
         * @param $request Request.
         */
        public function doCrear(Request $request){
            $inputData = $request->all();
            
            $request->validate(Evento::$validation['crear']['rules'], Evento::$validation['crear']['messages']);
            
            if($request->hasFile('imagen')){
                $filepath = $request->file('imagen')->hashName('eventos');
                
                $img = Image::make($request->file('imagen'))
                        ->resize(500, 500, function($constrait){
                        	$constrait->aspectRatio();
                        	$constrait->upsize();
                        });
                        
                Storage::put($filepath, (string) $img->encode());
                
                $inputData['imagen'] = $filepath;
            }
            
            $inputData['id_usuario'] = 1;
            $inputData['slug'] = SlugService::createSlug(Evento::class, 'slug', $inputData['titulo']);
            
            Evento::create($inputData);
            
            return redirect('/panel#eventos')->with('status', 'Evento creado correctamente.');
        }
        
        /**
         * Carga el panel de administracion en la seccion de editar Evento.
         * 
         * @param $slug El slug del Evento.
         */
        public function showEditar($slug){
            $evento = Evento::findBySlug($slug);
            $validation = Evento::$validation['editar'];

            return view('evento.editar',[
                'validation' => json_encode($validation),
                'evento' => $evento,
            ]);
        }

        /**
         * Valida y actualiza los datos del Evento seleccionado.
         * 
         * @param $request Request.
         * @param $id_evento El id del Evento.
         */
        public function doEditar(Request $request, $id_evento){
            $inputData = $request->all();

            $request->validate(Evento::$validation['editar']['rules'], Evento::$validation['editar']['messages']);
            
            $evento = Evento::find($id_evento);

            if($request->hasFile('imagen')){
                $imagenActual = $evento->imagen;
                
                $filepath = $request->file('imagen')->hashName('eventos');
                
                $img = Image::make($request->file('imagen'))
                        ->resize(500, 500, function($constrait){
                        	$constrait->aspectRatio();
                        	$constrait->upsize();
                        });
                        
                Storage::put($filepath, (string) $img->encode());
                
                $inputData['imagen'] = $filepath;
            }else{
                $inputData['imagen'] = $evento->imagen;
            }
            
            $inputData['id_usuario'] = 1;
            if($inputData['titulo'] != $evento->titulo){
                $inputData['slug'] = SlugService::createSlug(Evento::class, 'slug', $inputData['titulo']);
            }
            
            $evento->update($inputData);
            
            if(isset($imagenActual) && !empty($imagenActual)){
                Storage::delete($imagenActual);
            }
            
            return redirect('/panel#eventos')->with('status', 'Evento editado correctamente.');
        }

        /**
         * Elimina el Evento seleccionado.
         * 
         * @param $id_evento El id del Evento.
         */
        public function doEliminar($id_evento){
            $evento = Evento::find($id_evento);

            if(isset($evento->imagen) && !empty($evento->imagen)){
                Storage::delete($evento->imagen);
            }
                
            $evento->delete();
                
            return redirect('panel#eventos')->with('status', 'Evento eliminado correctamente.');
        }
    }