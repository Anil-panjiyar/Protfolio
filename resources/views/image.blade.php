<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <h1 class="text-center"> staff Detils</h1>

    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ route('image.store') }}">
      @csrf
        <label for="files">Select files:</label>
        <input type="hidden" name="staffid" value="{{ $staffid }}">
        <input type="file" id="files" name="images[]" multiple><br><br>
        <input type="submit">
      </form>
  </body>
</html>
