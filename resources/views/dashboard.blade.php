@extends('layout.master')
@section('content')

<div class="container">

    <table class="table table-bordered shadow text-center table-striped" id ="table">

         <th><a href="{{route('details-company')}}" class="btn btn-success">Add</a></th>
         <div>
            {{-- @if(Session::has('success'))
                            <script>
                        toastr.options = {
                                "postion":true,
                                "progressBar":true,
                                "closeButton": true,
                            }
                            toastr.success("{{ Session::get('success') }}");
                            //$.notify("Hello World");
                            //$.notify("Message addes sucesfully ", "success");
                            </script> --}}

                            @endif


    <tr>
        <th>SN no</th>
        <th>CompmnayName</th>
        <th>Email</th>
        <th>Number</th>
        <th>Image</th>
        <th>Pan NUmber</th>
        <th>Customer Name</th>
        <th>Phone number</th>

        <th>Destination</th>
        <th>Status</th>

    </tr>
    @foreach ($companies as $company)
    <tr>
        <td>{{$company->id}}</td>
        <td>{{$company->companyname}}</td>
        <td>{{$company->email}}</td>
        <td>{{$company->number}}</td>

        <td>
            @php
                $img = json_decode($company->image);
            @endphp
            <img src="{{ asset('storage/staffs/'.$img) }}" height="50px" width="50px">
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
    @endforeach

    {{-- @foreach($staffs as $star)
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
    @endforeach --}}



</table>
</div>


@endsection
