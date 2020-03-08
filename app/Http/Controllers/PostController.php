<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use File;

class PostController extends Controller
{
    // Action For Posts ...
    public function write_post(){

        $categories = DB::table('categories')->get();

        return view('posts.writepost', compact('categories'));
    }

    public function StorePost(Request $req){

        $validatedData = $req->validate([
            'post_title' => 'required|max:125',
            'post_details' => 'required|max:400',
            'post_img' => 'required | mimes:jpeg,jpg,png,PNG | max:1000',
        ]);
        
        $data = [];
        $data['title'] = $req->post_title;
        $data['details'] = $req->post_details;
        $data['category_id'] = $req->category_id;
    

        if($req->has('post_img')){
            
            $uploded_file = $req->file('post_img');
            //set unique name for the image...
            $image_name = time() . '.' .$uploded_file->getClientOriginalExtension();
            // $uploded_file->getClientOriginalName();
            // $image_uploaded_path = 'public/image/'
            $image_uploaded_path = public_path('/image/');
            
            
            $uploded_file->move($image_uploaded_path,$image_name );


            $data['image'] = '/image/'. $image_name;
            $write_post_res = DB::table('posts')->insert($data);
            return redirect()->back();

        }
        else{
            $write_post_res = DB::table('posts')->insert($data);
            return redirect()->back();
        }        
    }

    public function all_post(){
        // $all_post = DB::table('posts')->get();
        
        $all_post = DB::table('posts')
        ->select('posts.*','categories.name')
        ->join('categories' , 'posts.category_id', 'categories.id')
        // ->where('posts.title', 'Redox')
        ->get();


        // print_r($all_post);
        return view('posts.all_post', compact('all_post'));
    }

    public function ViewPost($id){
        $the_post = DB::table('posts')
        ->select('posts.*', 'categories.name', 'categories.status')
        ->join('categories', 'posts.category_id' , 'categories.id')
        ->where('posts.id', $id)
        ->first();

        return view('posts.view_post', compact('the_post'));
    }

    public function EditPost($id){
        $categories = DB::table('categories')->get();
        $post = DB::table('posts')->where('posts.id', $id)->first();

        return view('posts/edit_post', compact('categories', 'post'));
    }

    public function UpdatePost(Request $req, $id){
        $validatedData = $req->validate([
            'post_title' => 'required|max:125',
            'post_details' => 'required|max:400',
            'post_img' => 'mimes:jpeg,jpg,png,PNG | max:1000',
        ]);
        
        $data = [];
        $data['title'] = $req->post_title;
        $data['details'] = $req->post_details;
        $data['category_id'] = $req->category_id;
    

        if($req->has('post_img')){
            
            $uploded_file = $req->file('post_img');
            //set unique name for the image...
            $image_name = time() . '.' .$uploded_file->getClientOriginalExtension();
            $image_uploaded_path = public_path('/image/');
            $uploded_file->move($image_uploaded_path,$image_name );


            $data['image'] = '/image/'. $image_name;
            //delete old image and set new image
            unlink('public/'.$req->old_photo);
            // File::delete('public/'.$req->old_photo);
            $write_post_res = DB::table('posts')->where('id', $id)->update($data);
            return Redirect()->route('all.post');

        }
        else{
            // if new image not set than set the old image
            $data['image'] = $req->old_photo;
            $write_post_res = DB::table('posts')->where('posts.id', $id)->update($data);
            return Redirect()->route('all.post');
            
        }
    }

    public function DeletePost($id){
        $post = DB::table('posts')->where('id', $id)->first();
        // also delete image from public dir
        unlink('public/'.$post->image);
        $delete = DB::table('posts')->where('id', $id)->delete();
        return redirect()->back();
        
    }

}
