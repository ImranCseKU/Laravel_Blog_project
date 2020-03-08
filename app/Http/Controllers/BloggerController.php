<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blogger;

class BloggerController extends Controller
{
    public function index(){
        //fetch All data using Eloquent ORM
        //all() method made static inside facades 
    
        $all_bloggers = Blogger::all();
        return view('bloggers/blogger_index', compact('all_bloggers'));
    }

    public function create(){
        return view('bloggers/add_blogger');
    }
    
    public function store(Request $req){
        
        //validate data... 
        $validatedData = $req->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:bloggers|max:50',
            'phone' => 'required|max:50|min:3',
        ]);

        // create an obj to access model class

        $blogger = new Blogger;

        $blogger->name = $req->name;
        $blogger->email= $req->email;
        $blogger->phone = $req->phone;

        //insert data into Database using Eloquent
        $blogger->save();
        
        return redirect()->back();

    }

    public function show($id){
        //fetch individual data using Eloquent ORM
        $A_blogger = Blogger::find($id);
        return view('bloggers/blogger_view', compact('A_blogger'));
    }

    public function destroy($id){
        // find an individual data using Eloquent ORM 
        //and Delete it
        $a_blogger = Blogger::findorfail($id);
        $a_blogger->delete();
        return redirect()->back();
    }
    public function edit($id){
        // find an individual data using Eloquent ORM 
        //and Update it
        $a_blogger = Blogger::find($id);
        return view('bloggers.blogger_edit', compact('a_blogger'));
    }
    public function update(Request $req,$id){
        
        //fetch the specific data and 
        //change the property 
        //and save(update)

        $update_blogger = Blogger::find($id);

        $update_blogger->name= $req->name;
        $update_blogger->email= $req->email;
        $update_blogger->phone= $req->phone;

        $update_blogger->save();

        return Redirect()->route('all.blogger');

    }
}
