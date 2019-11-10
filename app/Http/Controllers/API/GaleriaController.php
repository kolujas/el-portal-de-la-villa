<?php
    namespace App\Http\Controllers\API;

    use App\Models\Galeria;
    use App\Http\Controllers\Controller;
    use Auth;
    use Illuminate\Http\Request;

    class GaleriaController extends Controller{
        /**
         * Valida y mueve una imagen en la Galeria.
         * 
         * @param $request Request.
         * @param $id_galeria El id de la imagen de la Galeria.
         */
        public function doMover(Request $request, $id_galeria){
            $inputData = $request->all();

            $request->validate(Galeria::$validation['mover']['rules'], Galeria::$validation['mover']['messages']);
            
            $galeria_seleccionada = Galeria::find($id_galeria);

            $galeria_encontrada = null;

            $galerias = Galeria::where('id_tipo', '=', 1)->get();

            foreach($galerias as $galeria){
                if($galeria->posicion == $inputData['posicion']){
                    $auxiliarData = [];
                    $auxiliarData['posicion'] = $galeria_seleccionada->posicion;
                    $galeria->update($auxiliarData);
                    $galeria_encontrada = $galeria;
                }
            }
            
            $galeria_seleccionada->update($inputData);

            return response()->json([
                'error' => 0,
                'status' => 'Imagen movida correctamente.',
            ]);
        }
    }