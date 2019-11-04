<?php
    namespace App\Http\Controllers;

    use App\Models\Banner;
    use Auth;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\File;
    use Intervention\Image\ImageManagerStatic as Image;
    use Storage;

    class BannerController extends Controller{
        /**
         * Valida y actualiza el banner seleccionado.
         * 
         * @param $request Request.
         * @param $id_banner El id del Banner.
         */
        public function doEditar(Request $request, $id_banner){
            $inputData = $request->all();

            $request->validate(Banner::$validation['editar']['rules'], Banner::$validation['editar']['messages']);
            
            $banner = Banner::find($id_banner);

            if($request->hasFile('imagen')){
                $imagenActual = $banner->imagen;
                
                $filepath = $request->file('imagen')->hashName('banners');
                
                $img = Image::make($request->file('imagen'))
                        ->resize(400, 400, function($constrait){
                        	$constrait->aspectRatio();
                        	$constrait->upsize();
                        });
                        
                Storage::put($filepath, (string) $img->encode());
                
                $inputData['imagen'] = $filepath;
            }else{
                $inputData['imagen'] = $banner->imagen;
            }
            
            $inputData['id_usuario'] = 1;
            
            $banner->update($inputData);
            
            if(isset($imagenActual) && !empty($imagenActual)){
                Storage::delete($imagenActual);
            }
            
            return redirect('/panel#personalizar')->with('status', 'Banner editado correctamente.');
        }
    }