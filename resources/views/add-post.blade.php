<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <form method="POST" action="{{route('post.store')}}">
        
        <div class="form-row row">
          <div class="form-group col-md-6">
            <label for="inputName4">Title</label>
            <input type="text" name="title" class="form-control" id="inputName4" placeholder="name">
          </div>
        </div>

        <div class="form-row row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Body</label>
              <textarea name="body" class="form-control" cols="30" rows="10"></textarea>
            </div>
        </div>
          
        
        @csrf
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
</div> 
</body>
</html>