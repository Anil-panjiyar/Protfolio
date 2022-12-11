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
        <table class="table table-bordered shadow text-center table-striped">
            
            <th><a href="{{route('add.user')}}" class="btn btn-success">Add</a></th>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>address</th>
            <th>number</th>
            <th>delete</th>
            <th>update</th>
        </tr>
        @foreach($staffs as $star)
        <tr>
            <th>{{$star->id}}</th>
            <th>{{$star->name}}</th>
            <th>{{$star->address}}</th>
            <th>{{$star->number}}</th>
            <th><a href="/delete/{{$star->id}}" class="btn btn-danger">delete</a></th>
            <th><a href="/edit/{{$star->id}}" class="btn btn-success">update</a></th>

        </tr>
        @endforeach


    </table>
    </div>

  </body>
</html>
