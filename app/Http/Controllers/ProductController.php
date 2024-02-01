<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
          public function ProductPage():View{
        return view('Backend.Pages.dashboard.product-page');
     }

   public function ProductList(Request $request){
    $user_id= $request->header('id');
        return Product::where('user_id', $user_id)->get();
   }

    public function ProductCreate(Request $request){
        $user_id=$request->header('id');

        //prepare file name
        $img = $request->file('img');

        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "{$user_id}-{$t}-{$file_name}";
        $img_url = "uploads/{$img_name}";

        // file-upload
        $img->move(public_path('uploads'), $img_name);

        // save to database:
        return Product::create([
            'name'=>$request->input('name'),
            'price'=>$request->input('price'),
            'unit'=>$request->input('unit'),
            'img_url'=>$img_url,
            'category_id'=>$request->input('category_id'),
            'user_id'=>$user_id
        ]);
    }

    public function ProductDelete(Request $request){
        $Product_id=$request->input('id');
        $user_id=$request->header('id');
        $file_path = $request->input("file_path");
        File::delete($file_path);

        return Product::where('id',$Product_id)->where('user_id', $user_id)->delete();
    }

    public function ProductUpdate(Request $request){
        $Product_id=$request->input('id');
        $user_id=$request->header('id');

        if($request->hasFile('img')){
            $img = $request->file('img');

            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $img_url = "uploads/{$file_name}";
            $img->move(public_path('uploads'), $img_name);

            //delete file:
            $filePath = $request->input("file_path");
            File::delete($filePath);

            //update file:

             return Product::where('id',$Product_id)->where('user_id', $user_id)->update([
            'name'=>$request->input('name'),
            'price'=>$request->input('price'),
            'unit'=>$request->input('unit'),
            'img_url'=>$img_url,
            'category_id'=>$request->input('category_id'),
        ]);

        }else{
            return Product::where('id', $Product_id)->where('user_id', $user_id)->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'unit' => $request->input('unit'),
                'category_id' => $request->input('category_id')
            ]);
        }
        
    }

    public function ProductId(Request $request){
        $Product_id = $request->input('id');
        $user_id = $request->header('id');

        return Product::where('id', $Product_id)->where('user_id', $user_id)->first();
    
    }
}
