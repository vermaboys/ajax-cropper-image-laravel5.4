<?php
   /*
   Module Name: Image Cropper Using Ajax Laravel5.4
   Author: Deepak Verma
   Description: Image cropper module is a easy way to crop image.  
   Version: 5.4
   */
?>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageCropperController extends Controller
{
    
	public function getImage()
	{
		return view('image');
	}
    /**
    * @Get ajax image popup
    */
    public function get_ajax_image_popup() {                
        if(isset($_POST) && !empty($_POST))
        {
        	return view('get-ajax-image-popup')->with(['data' => $_POST]);
        }        
    }
    
    public function imageCropPost(Request $request)
    {
       
        $data = $request->image_path;        
        
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        $image_name= time().'.png';

        $path = public_path() . "/images/". $image_name;
       
        file_put_contents($path, $data);
        
        

        return $image_name;
    }
}
