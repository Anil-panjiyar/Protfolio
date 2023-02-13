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
            <th></th>
            <th>delete</th>
            <th>update</th>
            <th>image</th>
        </tr>
        @foreach($staffs as $star)
          @php
            $images = json_decode($star->image);
        @endphp
        <tr>
            <th>{{$star->id}}</th>
            <th>{{$star->name}}</th>
            <th>{{$star->address}}</th>
            <th>{{$star->number}}</th>

             <th>
              @if($images)

                  @foreach ($images as $img)
                     <img src="{{ asset('storage/staffs/'.$img) }}" height="30px" width="30px">

                  @endforeach
              @else
                 No image available.
              @endif
            </th>





        </tr>
        @endforeach
       {{-- <th><a href="/delete/{{$star['id']}}" class="btn btn-danger">delete</a></th>
        <th><a href="/edit/{{$star['id']}}" class="btn btn-success">update</a></th> --}}


    </table>
    </div>

  </body>
</html>
