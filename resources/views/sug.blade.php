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
    <div class="container">
        <h1 class="text-center"> staff Details</h1>
        <form  action="" method="POST">
          @csrf
        <div class="mb-3">
            <label > <b> Staff Name</b></label>
            <input type="text" name="name" class="form-control">

        </div>

        <div class="mb-3">
            <label > <b> Staff address</b></label>
            <input type="text" name="address" class="form-control">


        </div>

        <div class="mb-3">
            <label > <b> Staff number</b></label>
            <input type="text" name="number" class="form-control">

        </div>

        <div class="mb-3">
            <label > <b> Slug</b></label>
            <input type="text" name="slug" class="form-control">

        </div>

    <div>
      <input type="submit" name="insert" value="Submit" class="btn btn-primary">
    </div>

        </form>
    </div>

  </body>
</html>
