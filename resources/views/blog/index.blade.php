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
                            <textarea class="form-control border-primary" name="comment" id="" cols="10" rows="3" placeholder="Add comments here..."></textarea>
                            <button type="submit" class="btn btn-md btn-default">Comment</button>
                        </form>
                    </div>
                    @if(!empty($item->comment))
                    <p><small><u>Comments</u></small></p>
                        @foreach ($item->comment as $value)
                        <div class="card">
                            <div class="card-header">
                                <p>{{$value->comments}}</p>
                                <small><a id="replay_comment{{$value->id}}" onclick="replay_comment({{$value->id}})" class="text-secondary">Replay comment</a></small>
                                <div style="display:none;" id="replay_comment_box{{$value->id}}">
                                    <form action="{{route('replays',['blog_id'=>encrypt($item->id),'comment_id'=>encrypt($value->id)])}}" method="post">
                                        @csrf
                                        <textarea class="form-control border-primary" name="replay" id="" cols="10" rows="3" placeholder="Add your replays here..."></textarea>
                                        <button type="submit" class="btn btn-md btn-default">Replay</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @if (!empty($value->replays))
                                @foreach ($value->replays as $replay)
                                <div class="card ms-3">
                                    <div class="card-header">
                                        <p>{{$replay->comments}}</p>
                                        <small><a id="replay_comment{{$replay->id}}" onclick="replay_comment({{$replay->id}})" class="text-secondary">Replay comment</a></small>
                                        <div style="display:none;" id="replay_comment_box{{$replay->id}}">
                                            <form action="{{route('replays',['blog_id'=>encrypt($item->id),'comment_id'=>encrypt($replay->id)])}}" method="post">
                                                @csrf
                                                <textarea class="form-control border-primary" name="replay" id="" cols="10" rows="3" placeholder="Add your replays here..."></textarea>
                                                <button type="submit" class="btn btn-md btn-default">Replay</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                            
                        @endforeach
                        <a href="">View all comments</a>
                    @endif
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


    function replay_comment(vl)
    {
        $("#replay_comment_box"+vl).css("display","block")
    }
  </script>
@endsection