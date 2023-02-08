<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
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

            return redirect()->route('blogs')->with('success','Blog created successfully');
              
        }
        return view('blog.add');
    }
    public function comments(Request $request,$id)
    {
        $blog_id=decrypt($id);
        $comment=request('comment');

        $insert_array=array(
            'blog_id'=>$blog_id,
            'comments'=>$comment,
        );

        Comment::create($insert_array);

        return redirect()->route('blogs');
    }
}
