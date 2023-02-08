<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
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
    </div>
</body>
</html>