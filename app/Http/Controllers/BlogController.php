<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function index()
    {
        $data['results']=Blog::paginate(3);
        $data['titles']="";
       // dd($data['results']);

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
        $data['titles']="| Add";
        return view('blog.add',$data);
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
    public function replays(Request $request,$blog_id,$comment_id)
    {
        $blog=decrypt($blog_id);
        $comment=decrypt($comment_id);
        
        $insert_array=array(
            'blog_id'=>$blog,
            'comments'=>request('replay'),
            'parent'=>$comment
        );
        //dd($insert_array);

        Comment::create($insert_array);

        return redirect()->route('blogs');
    }
    public function view_all(Request $request,$id)
    {
        $blog_id=decrypt($id);
        
        $blog=Blog::find($blog_id);
        
        $data['results']=$blog;
        $data['titles']="| Blog";
        return view('blog.view_all',$data);
    }
}
