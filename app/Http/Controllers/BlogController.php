<?php

namespace App\Http\Controllers;

use App\Models\Blog;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function index()
    {
        $data['results']=Blog::get();
        
        return view('blog.index',$data);
    }
    public function add(Request $request)
    {
        if($request->isMethod('post'))
        {
            $request->validate([
                'title'=>'required',
            ]);

            $filename="";
            if(request()->hasFile('image'))
            {
                $exe=request('image')->extension();
                $filename="blog_image_".time().'.'.$exe;
                request('image')->storeAs('blogs',$filename);
            }

            $title=request('title');
            $description=request('description');

            $insert_data=array(
                'title'=>$title,
                'description'=>$description,
                'date'=>date('Y-m-d'),
                'image'=>$filename
            );

            Blog::create($insert_data);

            echo "success";
              
        }
        return view('blog.add');
    }
}
