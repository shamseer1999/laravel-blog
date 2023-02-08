@extends('layout.template')
@section('content')
@if(session()->has('success'))
    <div class="card">
        <div class="card-body">
           {{session('success')}}
        </div>
  </div>
@endif
<div class="card mt-2">
    <div class="card-header">
      Blogs
    </div>
    <div class="card-body">
        @if (!empty($results))
            @foreach ($results as $item)
            <div class="row">
                <div class="col-lg-12">
                    <h3>{{$item->title}}</h3>
                    <img src="{{asset('storage/'.$item->image)}}" alt="blog-image">
                    <p>{{$item->description}}</p>
                    <p><small>Posted on :{{$item->date}}</small><label class="ms-2"><small><a id="comment" class="text-secondary">Add a comment</a></small></label></p>
                    <div style="display:none;" id="comment_box">
                        <form action="{{route('comments',encrypt($item->id))}}" method="post">
                            @csrf
                            <textarea class="form-control border-primary" name="comment" id="" cols="10" rows="5" placeholder="Add comments here..."></textarea>
                            <button type="submit" class="btn btn-md btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div> 
            @endforeach
        @endif
      
    </div>
  </div>
  <script>
    $("#comment").on('click',function(){
        $("#comment_box").css("display","block")
    })
  </script>
@endsection