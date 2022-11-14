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
        <div style="display: flex; align-items:center;justify-content:center">
            <form style="width:500px" method="POST" action="{{route('import-user')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input name="file" type="file" id="exampleInputFile">
                </div>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <a href="{{route('export-user')}}">Download User Excel Sheet</a>
        </div>
    </div>

</body>
</html>