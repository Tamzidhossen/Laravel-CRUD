<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageController extends Controller
{
    function Edit(){
        $images =  image::all();
        // return $images;
        return view('upload', compact('images'));
    }
    function uploadImage(Request $request){

        $img = $request->image;
        $extension = $img->extension();
        $file_name = uniqid(). '.'. $extension;

        $manager = new ImageManager(new Driver());
        $image = $manager->read($img);
        $image->resize(200, 150);
        $image->save(public_path('uploads/'.$file_name));

        image::insert([
            'image'=>$file_name,
        ]);
        return back();
    }

    function editImage($id){
        $new_id = image::find($id);
        return view('edit', $new_id);
    }

    function updateImage(Request $request, $id){

        $request->validate([
            'image'=>['required', 'mimes:png,jpeg', 'max:2048'],
        ]);

        $file = image::find($id);
        $delete_from = public_path('uploads/'.$file->image);
        unlink($delete_from);

        $img = $request->image;
        $extension = $img->extension();
        $file_name = uniqid(). '.'. $extension;

        $manager = new ImageManager(new Driver());
        $image = $manager->read($img);
        $image->resize(200, 150);
        $image->save(public_path('uploads/'.$file_name));

        image::find($id)->update([
            'image'=> $file_name,
        ]);

        return redirect()->route('main')->with('success', "Photo Updated Successfully");
    }
}
