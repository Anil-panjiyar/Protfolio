 {{-- @extends('layout.master')
@section('content')



<h1>
    Ajax </h1>

<button onclick="ajaxCall()"> CLICK ON </button>
<script>
    function ajaxCall(){
        var req = new XMLHttpRequest();
        req.open("GET","/ajax-Call",true);
        req.send();
        req.onreadystatechange = function(){
            if(req.readyState == 4 && req.status ==200){
                console.log(req.responseText);

            }
        };
    }

</script>
@endsection --}}

 @extends('layout.master')
@section('content')
    <div class="container">
        <h1 class="text-center"> staff Details</h1>
         {{-- onsubmit="return submitData()" --}}


        <form  on submit="return submitData()">

        <div class="mb-3">

            <label > <b>  Name</b></label>
            <input type='text' id="name" class="form-control" required>


        </div>

        <div class="mb-3">
            <label > <b>  address</b></label>
            <input type="text"   id="address"     class="form-control" required>


        </div>

        <div class="mb-3">
            <label > <b>  number</b></label>
            <input type="text"  id="number" class="form-control" required>

        </div>

        <div class="mb-3">
            <label > <b> education</b></label>
            <input type="text"  id="education" class="form-control" required>

        </div>

    <div>

      <input type="submit" id="saveButton" value="save" class="btn btn-primary">
    </div>

        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#saveButton').on('click', function (e) {
                e.preventDefault();
                var name = $('#name').val();
                var address = $('#address').val();
                var number = $('#number').val();
                var education = $('#education').val();
                var token = '{{ csrf_token() }}';
                var data = {_token:token, name:name, number:number, address:address, education:education};
                var url ='{{ route('save-data') }}';
                $.post(url, data, function(response) {
                    var rep = JSON.parse(response);

                    if (rep.type == 'success') {
                        alert(rep.message);
                    } else {
                        alert(rep.message);
                    }

                });
            });

        });
        // function submitData(){

        //     var name=document.getElementById("name").value;
        //     var  address= document.getElementById("address").value;
        //     var number = document.getElementById("number").value;
        //     var education = document.getElementById("education").value;

        //     var req= new XMLHttpRequest();
        //     req.open("GET","/save-data/"+name+"/"+address+"/"+number+"/"+education,true);
        //     req.send();

        //     req.onreadystatechange = function(){
        //         if(req.readyState == 4 && req.status == 200){
        //             var obj = JSON.parse(req.responseText);
        //             console.log(obj);

        //         }
        //     };

        //     return true;
        // }
    </script>
    
    @endsection


