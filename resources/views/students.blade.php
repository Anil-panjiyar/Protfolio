

@extends('layout.master')
@section('content')

 <div class="container">
     <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                 <a href="#" class="btn btn-success" data-toggle="modal" data-target="#studentModal"> New student</a>
            </div>
            <div class="card-body">
                <table id="studentTable" class ="table table-striped">
                    <thead>
                        <tr>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>Phonenumber</th>
                        </tr>
                    </thead>
                    <tbody id="studentTableBody">

                    </tbody>
                </table>
            </div>
        </div>
     </div>




  <!-- Modal -->

  <div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">New Students</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
             </button>
                </div>
                  <div class="modal-body">
                       <form id="studentForm">
                        @csrf
                        <div class="form-group">
                            <label for ="firstname">FirstName</label>
                            <input type="text" class="from-control" id="firstname"/>
                            <span  class="firstname_er"r></span>


                        </div>
                        <div class="form-group">
                            <label for ="lastname">LastName</label>
                            <input type="text" class="from-control" id="lastname"/>
                            <span  class="lastname_err"></span>


                        </div>
                        <div class="form-group">
                            <label for ="email">Email</label>
                            <input type="text" class="from-control" id="email"/>
                            <span  class="email_err"></span>


                        </div>
                        <div class="form-group">
                            <label for ="Phonenumber">Phonenumber</label>
                            <input type="text" class="from-control" id="phonenumber"/>
                            <span class="phonenumber_err"></span>
                        </div>



    <button type ="submit" class="btn btn-primary "> Submit</button>

    <button type="button" class="btn btn-secondary" id="closeButton" data-dismiss="modal">Close</button>
          </form>
        </div>

      </div>
    </div>
  </div>


<script>
    function getStudent() {
        var url = '{{ route('getStudent') }}';
        var token = '{{ csrf_token() }}';
        var data = {_token:token};
        $.get(url, data, function (response) {
            $('#studentTableBody').html(response);
        });
    }
    getStudent();

    $(document).ready(function () {
        $("#studentForm").submit(function(e){
            e.preventDefault();
            let firstname = $("#firstname").val();
            let lastname = $("#lastname").val();
            let email = $("#email").val();
            let phonenumber = $("#phonenumber").val();
            let _token = $("input[name=_token]").val();
        //   $("#studentForm").validate({
            //   rules: {
            //    	firstname: {
            //  	 	required: true,
            //  	 	minlength: 2
            //    },
            //    	lastname: {
            //   	 	required: true,
            //   	 	minlength: 5
            // 	   	email: {
            //   		required: true,
            //   		minlength: 12
            //    }
            //   },
            //   messages: {
            //    	firstame: {
            //   	 	required: "this fiedl is require ",
            //   	 	minlength: ""
            //    },
            //    	email: {
            //   	 	required: "this fiel is require ",
            // },
                //minlength: "",



            //     },
            //  	Phone: {
            //  	 	required: "This filed is require ",
            // 	 //	minlength: ""
            //   }
            //  },
            // });

            $.ajax({
                url:"{{route('student.add')}}",
                type:"POST",
                datatype:"JSON",
                data:{
                    firstname:firstname,
                    lastname:lastname,
                    email:email,
                    phonenumber:phonenumber,
                    _token:_token,
                },
                success:function(response)
                {
                    var data = JSON.parse(response);
                    if (data.type == 'success') {
                        alert(data.message);
                        $("#studentForm")[0].reset();
                        $("#closeButton").trigger('click'); //
                        getStudent();

                    } else {
                        alert(data.message);
                    }
                }

            });
        });

        $(document).on('click', '.deleteStudent', function(e) {
            e.preventDefault();
            if(confirm("do you really want to delete?") == false) {
                return false;
            }
            var studentid = $(this).data('id');
            var token = $("input[name =_token]").val();
            var data = {_token : token, studentid: studentid};
            var url = '{{ route('deleteStudent') }}';
            $.post(url, data, function(response) {
                var data = JSON.parse(response);
                if (data.type == 'success') {
                    alert(data.message);
                    getStudent();

                } else {
                    alert(data.message);

                }
            });
        });

    });



</script>


@endsection














