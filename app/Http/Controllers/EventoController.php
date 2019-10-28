<?php
    namespace App\Http\Controllers;

    use App\Models\Evento;
    use Auth;
    use Illuminate\Http\Request;
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
            $validation = (object) [
                Evento::$validation['crear'],
            ];

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
            
            $inputData['id_usuario'] = Auth::id();
            
            Evento::create($inputData);
            
            return redirect()->route('evento.panel')->with('status', 'Evento subido correctamente.');
        }
        
        /**
         * Carga el panel de administracion en la seccion de editar Evento.
         * 
         * @param $id_evento El id del Evento.
         */
        public function showEditar($id_evento){
            $evento = Evento::find($id_evento);

            return view('evento.editar', [
                'evento' => $evento
            ]);
        }

        /**
         * Valida y actualiza los datos del Evento seleccionado.
         * 
         * @param $request Request.
         * @param $id_evento El id del Evento.
         */
        public function doEditar(Request $request, $id_evento){
            $inputData = $request->input();

            $request->validate(Evento::$validation['editar']['rules'], Evento::$validation['editar']['messages']);
            
            $evento = Evento::find($id_evento);
            
            if($request->hasFile('pdf')){
                $pdfActual = $evento->pdf;
                
                $inputData['pdf'] = $request->file('pdf')->store('eventos');
            }else{
                $inputData['pdf'] = $evento->pdf;
            }
            
            $inputData['id_usuario'] = Auth::id();
            
            $evento->update($inputData);
            
            if(isset($pdfActual) && !empty($pdfActual)){
                Storage::delete($pdfActual);
            }
            
            return redirect()->route('evento.panel')->with('status', 'El Evento: "' . $evento->titulo . '" fue editado exitosamente.');
        }

        /**
         * Elimina el Evento seleccionada.
         * 
         * @param $id_evento El id del Evento.
         */
        public function doEliminar($id_evento){
            $evento = Evento::find($id_evento);

            if(isset($evento->pdf) && !empty($evento->pdf)) {
                Storage::delete($evento->pdf);
            }
                
            $evento->delete();
                
            return redirect()->route('evento.panel')->with('status', 'El Evento fue eliminado exitosamente.');
        }
    }