<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class CategoryController extends Controller
{
    public function CategoryPage(){
        return view('Backend.Pages.dashboard.category-page');
    }
    public function CategoryList(Request $request){
        $user_id = $request->header('id');
        return Category::where('user_id', $user_id)->get();
    }
     
    public function CategoryCreate(Request $request){
        $user_id = $request->header('id');
        //validation:
     
            return Category::create([
            'name'=> $request->input('name'),
            'user_id'=> $user_id,
        ]);
       
        
    }
  
    public function CategoryUpdate(Request $request){
        // sleep(5);
         $category_id = $request->input('id');
        $user_id = $request->header('id');

        return Category::where('id', $category_id)->where('user_id', $user_id)->update([
            'name'=> $request->input('name'),
            
        ]);
    }

      public function CategoryDelete(Request $request){
        $category_id = $request->input('id');
        $user_id = $request->header('id');

        return Category::where('id', $category_id)->where('user_id', $user_id)->delete();
    }

    public function CategoryId(Request $request){
        $categoryId = $request->input('id');
        $user_id = $request->header('id');

        return Category::where('id', $categoryId)->where('user_id', $user_id)->first();
    }

}
