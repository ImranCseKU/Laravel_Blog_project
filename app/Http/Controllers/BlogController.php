<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BlogController extends Controller
{
    //Action for index/Welcome page
    public function BlogPost(){
        // return view('blog');
        $blog_post = DB::table('posts')
        ->select('posts.*', 'categories.name', 'categories.status')
        ->join('categories', 'categories.id', 'posts.category_id')
        ->paginate(3);
        
        return view('welcome', compact('blog_post'));
        // return view('blog', compact('blog_post'));
        
    }


    // Action For Categories
    public function add_category(){
        
        return view('posts.add_category');
    }

    public function AllCategory(){
        
        $category = DB::table('categories')->get();
        
        return view('posts.all_category', compact('category'));
    }

    public function storeCategory(Request $request){

        //validation user data
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:4',
            'status' => 'required|unique:categories|max:25',
        ]);
        
        $data = [];
        // data['xyz'] ekhane xyz obosshoi database er attribute er sathe mil hotee hobe
        $data['name'] = $request->name;
        $data['status'] = $request->status;

        // return response()->json($data);
        $category = DB::table('categories')->insert($data);
        if($category){
            // return Redirect()->back();
            return Redirect()->route('all.category');
        }else{
            return 'query failed';
        }

    }

    public function ViewCategory($id){
        $catagory_details = DB::table('categories')->where('id', $id)->first();
        // return response()->json($catagory_details);
        return view('posts.view_category')->with('categoryDetails', $catagory_details);
    }

    public function DeleteCategory($id){
        $delete = DB::table('categories')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function EditCategory($id){
        $edited_category = DB::table('categories')->where('id', $id)->first();

        return view('posts.edit_category', compact('edited_category'));
    }

    public function UpdateCategory(Request $request ,$id){
        //validation user data
        $validatedData = $request->validate([
            'name' => 'required|max:25|min:4',
            'status' => 'required|max:25|min:4',
        ]);
        
        $data = [];
        // data['xyz'] ekhane xyz obosshoi database er attribute er sathe mil hotee hobe
        $data['name'] = $request->name;
        $data['status'] = $request->status;

        // return response()->json($data);
        $category = DB::table('categories')->where('id', $id)->update($data);
        if($category){
            // return Redirect()->back();
            return Redirect()->route('all.category');
        }else{
            return 'query failed';
        }
    }


}
