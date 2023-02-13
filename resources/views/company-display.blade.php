@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar-menu">


          <div class="sidebar">
          <header>My App </header>
          <ul>
            <li><a href="#"><i class="fas fa-qrcode"></i>Dashboard</a></li>
            <li><a href="#"><i class="fas fa-link"></i>Shortcuts</a></li>

             {{-- <li><a href="{{route('table-data')}}"><i class="fas fa-stream"></i>Add Company</a></li>  --}}

          </ul>

        </div>
</div>


    <div class="col-md-10 dataset">
         <table class="table " id ="table-id">

            <a href="{{route('insert-data')}}" class="btn btn-success">Add</a>
            <div>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            </div>
       <thead class="thead-dark" >
        <tr>
            <th>SN no</th>
            <th>CompanyName</th>
            <th>Email</th>
            <th>Number</th>
            <th>Image</th>
            <th>Pan NUmber</th>
            <th>Customer Name</th>
            <th>Phone number</th>
            <th>Destination</th>
            <th>Status</th>

        </tr>
       </thead>

       <tbody>

        <tr>
       @foreach ($companies as $company)
           <td>{{$company->id}}</td>
           <td>{{$company->companyname}}</td>
           <td>{{$company->email}}</td>
           <td>{{$company->number}}</td>
           <td>
               @php
                   $img = json_decode($company->image);
               @endphp
               <img src="{{ asset('storage/images/'.$img) }}" height="50px" width="50px">
           </td>
           <td>{{$company->pan}}</td>
           <td>{{$company->person_name}}</td>
           <td>{{$company->person_number}}</td>
           <td>{{$company->destination}}</td>

           <td>
               @if ($company->status == 'Y')
               <a class="nav-link active" href="#">Active</a>
               @else
                   Inactive
               @endif
           </td>

       </tr>
    </tbody>
       @endforeach
       </table>
    </div>
</div>
</div>


 <style>
    *{
    margin: 0;
    padding: 0;
    list-style: none;
    text-decoration: none;

}
body{
    font-family: sans-serif ;

}
.sidebar-menu{
    padding-right: 0;

}
.sidebar{
    position: fixed;
    left: 0px ;
    width: 200px;
    height: 100%;
    background-color: #011f31;
    /* padding-right: 0; */
}
.sidebar header{
    font-size: 18px;
    color: white;
    user-select: none;
    text-align: center;
    line-height: 50px;
    background-color:#002c44 ;
}

.sidebar ul li a{
    text-align: left;
    font-size: 15px;
    display: block;
    height: 100%;
    width: 100%;
    color: white;
    user-select:auto;
   padding: 10px;
    box-sizing: border-box;
    line-height: 35px;
    border-top: 1px  black;
    border-bottom: 1px solid black;
    transition: .2s;
    text-decoration: none;

}
.dataset{
    padding-left: 0;
}
.sidebar ul li a i{
    margin-right: 20px;
}
/* ul li:hover a{
    padding-left: 60px;
} */

#check{
    display:none;
}
label #btn1, label #cancel{
    position: absolute;
    cursor: pointer;
    background: #042331;
    border-radius:3px;
}
label #btn1{
    left:40px;
    top:25px;
    font-size: 35px;
    color: white;
    padding: 6px 12px;
    transition: all 0.4s;
}
label #cancel{
    z-index: 1111;
    left:-200px;
    top:17px;
    font-size: 30px;
    color:#0a5275;
    padding:4px 9px;
    transition: all 0.4s ease;
}

#check:checked ~ .sidebar{
    left:0;
}

#check:checked ~ label #btn1{
    left:250px;
    opacity:0;
    pointer-events: none;
}

#check:checked ~ label #cancel{
    left:200px;
}

#check:checked ~ section{
    margin-left:250px;
}
section{
    background-image: url('download1.jfif');
    background-repeat: no-repeat;
    background-position:center;
    background-size: cover;
    height: 100vh;
    transition: all .4s ;
    object-fit: cover;


}
</style>

  <script>
    $(document).ready( function () {
    $('#table-id').DataTable();
} );

 </script>


@endsection
