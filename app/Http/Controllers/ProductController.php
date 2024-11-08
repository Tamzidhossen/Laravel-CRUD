<?php

namespace App\Http\Controllers;

use App\Models\product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends Controller
{
    function product(){
        $products = product::all();
        return view('product',[
            'products'=>$products
        ]);
    }

    function product_create(){
        return view('product/product_create');
    }

    function  product_store(Request $request){
        $request->validate([
            'name'=>'required',
            'brand_name'=>['required','unique:products'],
            'price'=>['required','numeric'],
            'image'=>['required','mimes:png,jpg','max:1024'],
        ]);

        $thumbnail = $request->image;
        $extension = $thumbnail->extension();
        // return $extension;
        $file_name = uniqid().'.'. $extension;
        // return $file_name;
        $manager = new ImageManager(new Driver());
        $image = $manager->read($thumbnail);
        $image->resize(200, 150);
        $image->save(public_path('uploads/product/'.$file_name));

        product::insert([
            'name'=>$request->name,
            'brand_name'=>$request->brand_name,
            'price'=>$request->price,
            'desp'=>$request->desp,
            'image'=>$file_name,
            'created_at'=>Carbon::now()
        ]);

        return redirect()->route('product')->with('success', 'Product Created Successfully');
    }

    function product_destoy($id){

        $delete = product::find($id);
        // return $delete;
        $delete_form = public_path('uploads/product/'.$delete->image);
        // return $delete_form;
        unlink($delete_form);

        product::find($id)->delete();
        return back()->with('success', 'Product Delete Successfull');
    }

    function product_edit($id){
        $products = product::find($id);
        return view('product.product_edit', [
            'products'=> $products,
        ]);
    }

    function product_update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'brand_name'=>['required','unique:products'],
            'price'=>['required','numeric'],
            'image'=>['required','mimes:png,jpg','max:1024'],
        ]);

        if($request->image != ''){
            $request->validate([
                'image'=>['required','mimes:png,jpg','max:1024'],
            ]);

            $delete = product::find($id);
            // return $delete->image;
            $delete_form = public_path('uploads/product/'.$delete->image);
            // return $delete_form;
            unlink($delete_form);

            $thumbnail = $request->image;
            $extension = $thumbnail->extension();
            // return $extension;
            $file_name = uniqid().'.'. $extension;
            // return $file_name;
            $manager = new ImageManager(new Driver());
            $image = $manager->read($thumbnail);
            $image->resize(200, 150);
            $image->save(public_path('uploads/product/'.$file_name));

            product::find($id)->update([
                'name'=>$request->name,
                'name'=>$request->name,
                'brand_name'=>$request->brand_name,
                'price'=>$request->price,
                'desp'=>$request->desp,
                'image'=>$file_name,
            ]);
        }
        return redirect()->route('product')->with('success', 'Product Updated Successfully');
    }
}
