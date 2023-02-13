@extends('layout.master')
@section('content')
    <style>
        .mycontainer{
            width: 70%;
            margin: 0 auto;
        }
        label {
           margin-bottom: 10px;
        }
        .card{
            border-radius: 40px;
        }
    </style>

    <div class="company-details  p-md-5" style=" background-color: #a1bbe5;">
        <div class="mycontainer">
            <div class="card p-md-5">
                    <h1 class="text-center"> Company Details</h1>
                    <form method="POST"  action="{{route('add.company')}}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        @if(Session::has('message'))
                                        <script>
                                    toastr.options = {
                                            "postion":true,
                                            "progressBar":true,
                                            "closeButton": true,
                                        }
                                        toastr.success("{{ Session::get('message') }}");
                                        //$.notify("Hello World");
                                        //$.notify("Message addes sucesfully ", "success");
                                        </script>

                                        @endif

                     </div>

                <div class="mb-3 ">
                    <label for="name"> <b> Company  name</b></label>
                    <input type="text" name="companyname" id="name" class="form-control" value="{{old('companyname')}}" required>
                    @if ($errors->has('companyname'))
                    <span class="text-danger">{{ $errors->first('companyname') }}</span>
                    @endif

                </div>

                <div class="mb-3">
                    <label> <b> Company email</b></label>
                    <input type="email" name="email" class="form-control"  value="{{old('email')}}"required>
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif

                </div>

                <div class="mb-3">
                    <label > <b> Company Phone number/Landline</b></label>
                    <input type="tel" name="number" class="form-control" value="{{old('number')}}" required>
                    @if ($errors->has('number'))
                    <span class="text-danger">{{ $errors->first('number') }}</span>
                    @endif

                </div>

                <div class="mb-3">
                    <label > <b> Company logo</b></label>
                    <input type="file" class="form-control" name="image" value="{{old('file')}}" required/>
                    @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif



                </div>
                <div class="mb-3">
                    <label > <b> Contact pan number</b></label>
                    <input type="text" name="pan" class="form-control"  value="{{old('pan')}}"required>
                    @if ($errors->has('pan'))
                    <span class="text-danger">{{ $errors->first('pan') }}</span>
                    @endif

                </div>

                <div class="mb-3">
                    <label > <b> Contact person name</b></label>
                    <input type="text" name="person_name" class="form-control"  value="{{old('person_name')}}"required>
                    @if ($errors->has('person_name'))
                    <span class="text-danger">{{ $errors->first('person_name') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label > <b> Contact person number</b></label>
                    <input type="text" name="person_number" class="form-control"  value="{{old('person_number')}}"required>
                    @if ($errors->has('person_number'))
                    <span class="text-danger">{{ $errors->first('person_number') }}</span>
                    @endif

                </div>
                <div class="mb-3">
                    <label > <b> Contact person Designation</b></label>
                    <input type="text" name="destination" class="form-control" value="{{old('destination')}}" required>

                </div>

            <div>
                <input type="submit" name="insert" value="Submit" class="btn px-5" style="background-color: #5a88d2;">
            </div>

                </form>
            </div>
        </div>
    </div>
@endsection
