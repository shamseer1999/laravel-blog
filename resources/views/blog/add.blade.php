@extends('layout.template')
@section('content')
<div class="card mt-3">
    <div class="card-header">
      Add Blog
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="formGroupExampleInput">Title</label>
              <input type="text" class="form-control border-primary" id="formGroupExampleInput" placeholder="Title" name="title" required value="{{old('title')}}">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Description</label>
              <textarea name="description" id="" cols="10" rows="6" class="form-control border-primary">{{old('description')}}</textarea>
            </div>
            {{-- <div class="form-group">
              <label for="formGroupExampleInput2">Date</label>
              <input type="date" class="form-control border-primary" id="formGroupExampleInput" name="date" required {{old('date')}}>
            </div> --}}
            <div class="form-group">
              <label for="formGroupExampleInput2">Image</label>
              <input type="file" class="form-control border-primary" id="formGroupExampleInput" name="image">
            </div>
            <div class="form-group text-center mt-2">
              <button class="btn btn-primary btn-md">Submit</button>
            </div>
          </form>
    </div>
  </div>
@endsection
        
    