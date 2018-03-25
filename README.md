# ajax-cropper-image-laravel5.4

## You Tube ==> https://youtu.be/NvpUhypU77g

## Blade Files
```
Copy get-ajax-image-popup.blade and image.blade files in resources\views folder and paste in your resources\views folder
```


## Public Folder
```
Create images folder in public folder

Copy upload.png image in public\images folder and paste in your public\images folder
```


## Routes
```
Copy Routes which is given below and paste in your web.php file
Route::get('image','ImageCropperController@getImage');
Route::any('get-ajax-image-popup','ImageCropperController@get_ajax_image_popup');
Route::post('image-crop', 'ImageCropperController@imageCropPost');
```

## Controller
```
Copy ImageCropperController in app\Http\Controllers folder and paste in your app\Http\Controllers folder
