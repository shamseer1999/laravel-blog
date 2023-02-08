@extends('layout.template')
@section('content')
<div class="card">
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
                    <p><small>Posted on :{{$item->date}}</small></p>
                </div>
            </div> 
            @endforeach
        @endif
      
    </div>
  </div>
@endsection