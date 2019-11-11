<?php
    namespace App\Http\Controllers;

    use App\Models\Galeria;
    use Auth;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\File;
    use Intervention\Image\ImageManagerStatic as Image;
    use Storage;

    class GaleriaController extends Controller{
        /**
         * Valida y agrega una imagen en la Galeria.
         * 
         * @param $request - Request.
         * @param $id_tipo - El tipo de Galeria.
         */
        public function doAgregar(Request $request, $id_tipo){
            $inputData = $request->all();

            $request->validate(Galeria::$validation['agregar']['rules'], Galeria::$validation['agregar']['messages']);
            
            if($request->hasFile('imagen')){
                $filepath = $request->file('imagen')->hashName('galerias');
                
                $img = Image::make($request->file('imagen'))
                        ->resize(400, 400, function($constrait){
                        	$constrait->aspectRatio();
                        	$constrait->upsize();
                        });
                        
                Storage::put($filepath, (string) $img->encode());
                
                $inputData['imagen'] = $filepath;
            }
            
            $inputData['id_usuario'] = 1;
            $inputData['posicion'] = 1;

            $galerias = Galeria::where('id_tipo', '=', $inputData['id_tipo'])->get();
            foreach($galerias as $galeria){
                $auxiliarData = [];
                $auxiliarData['posicion'] = $galeria->posicion + 1;
                $galeria->update($auxiliarData);
            }
            
            Galeria::create($inputData);
            
            return redirect('/panel#galerias')->with('status', 'Imagen subida correctamente.');
        }

        /**
         * Elimina la imagen de la Galeria seleccionado.
         * 
         * @param $id_galeria - El id de la imagen.
         */
        public function doEliminar($id_galeria){
            $galeria = Galeria::find($id_galeria);

            if(isset($galeria->imagen) && !empty($galeria->imagen)){
                Storage::delete($galeria->imagen);
            }
                
            $galeria->delete();
                
            return redirect('panel#galerias')->with('status', 'Galeria eliminada correctamente.');
        }
    }