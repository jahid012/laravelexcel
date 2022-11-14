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
    <form method="POST" action="{{route('store-user')}}">
        
        <div class="form-row row">
          <div class="form-group col-md-6">
            <label for="inputName4">Name</label>
            <input type="name" name="name" class="form-control" id="inputName4" placeholder="name">
          </div>
        </div>

        <div class="form-row row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Email</label>
              <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
        </div>
        <div class="form-row row">
            <div class="form-group col-md-6">
              <label for="inputPassword4">Password</label>
              <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
            </div>
        </div>
          
        
        @csrf
        <button type="submit" class="btn btn-primary">Sign in</button>
      </form>
</div>
</body>
</html>