<!DOCTYPE html>
<html lang="en">
@extends('layout.master')
@section('content')
    <style>
    .heed,
    .uname,
    .pword,
    .reme,
    .up,
    .sinup {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body{
        background-color: #a1bbe5;
        opacity: 0.2px;
    }

    .right-side{
          margin-top:4%;
    }
     .wel {


        background-color: #fff;
        width: fit-content;
        color: black;
        font-size: 9px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .come {
        color: black;
        width: fit-content;
        background-color: #fff;
        font-size: 17px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
.mycontainer{
    width: 50%;
    margin: auto;
}
    .left-side{
        background-color: #ffffff;
        margin-top:4%;
        padding: 4%;
        border-radius: 40px;
        height: 450px;
        display: flex;
        justify-content: center;
    }

    .right-side{
          margin-top:4%;
          margin-bottom: 4%;
    }

    .wel {


        background-color: #fff;
        width: fit-content;
        color: black;
        font-size: 9px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .come {
        color: black;
        width: fit-content;
        background-color: #fff;
        font-size: 17px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .welcome {
        margin-left: 40px;
         margin-top:4%;
    }
   .welcome img{

    width: 100%;
    height: 400px;
        object-fit: cover;

   }
    .button {
        text-align: center;
        gap: 20px;
    }

    .butto {
        background-color: whitesmoke;
        border: #A4AFF5 1px solid;
        width: 350px;
        height: 40px;
        color: rgb(0, 0, 0);
        border-radius: 8px;
    }

    .butto:hover {
        background-color: rgb(211, 208, 208);
        color: #5a88d2;
        /* border-radius: 12px; */
    }

    .butto1 {
        background-color: #5a88d2;
        border: #A79DEB 1px solid;
        width: 350px;
        height: 40px;
        color: white;
        border-radius: 8px;

    }
    .butto1 a{
        color: white;
    }

    .butto1:hover {
        background-color: #5a88d2;
        color: black;
        /* border-radius: 12px; */
    }

    .formb {
        text-align: left;
        margin-left: 80px;

    }

    .pword {
        padding-top: 20px;
    }

    .username {
        width: 350px;
        height: 35px;
    }

    .password {
        width: 350px;
        height: 35px;
    }

    @media screen and (max-width: 991px){
        .left-side {
             margin-top: 6%;
             height: 505px;
            }
            .left-side h1{
                font-size: 35px;
            }
            .username ,.password,.butto,.butto1{
    width: 308px;
}
.welcome img{
    height: 400px;
   }
   .welcome {
    margin-left: 20px;
    margin-top: 7%;
}
.welcome .wel h1,.welcome .come h1{
    font-size: 30px;
}

}

@media screen and (max-width:575px){
    .left-side {
             width: 80%;
             height: 505px;
             margin: 0 auto;
                margin-top: 6% !important;
            }
            .welcome {
     margin-left:0;
    /* margin-top: 7%; */
}
}
</style>

    <div class="box">
        <div class="mycontainer">
                <div class="left-side">
                    {{-- <input type="hidden" name="id" value="{{$companies->id}}"> --}}
                        <form class="form" action={{route('admin-check')}} method="POST">
                            <div class="form-group">


                            @csrf
                            <h1 style="text-align: center;">Admin Login</h1><br>
                            @if(Session::has('message'))
                                <div class="row">
                                    <p class="alert alert-danger">{{ Session::get('message') }}</p>
                                </div>
                                @endif
                            <input class="username form-control" placeholder="Email" type="text" name="email" ><br>
                            <div>
                                @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                            </div>

                            <input class="password form-control" placeholder="Password" type="password" name="password"><br>
                            <div>
                                @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>

                            </div>
                            @endif
                                            <input class="reme" type="checkbox">&nbsp;Remember me &nbsp; &nbsp;
                            <a href="#">Forget Password?</a><br><br>
                            <button class="butto" type ="submit" name="loginbtn">Login</button> <br><br>
                            <button class="butto1" name="registerbtn"> <a href="adminregister.php">Create Account</a></button><br><br><br>

                        </form>
                    </div>
                </div>
                </div>
            </div>
    </div>
    </div>

           <!--  <div class="dash">
                <h2>Login to Access Admin Dashboard</h2>
            </div>
            </div> -->
            <!-- <div class="heed">
                <h1>Admin Login</h1>
            </div>

                <div class="formb">
                    <label class="uname">Username</label><br>
                    <input class="username" placeholder="Type your username" type="text" name="username"><br><br>
                    <label class="pword">Password</label><br>
                    <input class="password" placeholder="Type your password" type="password" name="password"><br>
                    <br><input class="reme" type="checkbox">Remember me
                    <br>
                    <br>
                </div>
                <div class="button">
                    <a href="#">Forget Password?</a><br><br>
                    <input class="butto" name="loginbtn" type="submit"> -->
                <!--  <button class="butto" type ="submit" name="loginbtn">Login</button> <br><br>
                    <button class="butto1" name="registerbtn"> <a href="adminregister.php">Create Account</button>
                </div>
            </form>  -->

          <!--   <p class="up">Or Sign Up Using</p>

            <div class="media">
                <a href="facebook.com"><img src="img/facebook.png" alt="facebook logo" width="30px"></a>
                <a href="twitter.com"><img src="img/twiter.png" alt="twitter logo" width="30px"></a>
                <a href="google.com"><img src="img/google.png" alt="google logo" width="30px"></a>
                <a href="instagram.com"><img src="img/igr.png" alt="instagram logo" width="27px"></a>
            </div>
            <br> -->
            <!-- <div class="sinup">
                <p>Or Sign Up Using</p>
                <a href="#">SIGN UP</a>
            </div> -->
       <!--  </div>

        <div class="box1">
            <div class="welcome">
                <div class="wel">
                    <h1>WELCOME TO </h1>
                </div>
                <div class="come">
                    <h1>THE WEBSITE</h1>
                </div>
            </div>
            <div class="dash">
                <h2>Login to Access Admin Dashboard</h2>
            </div>
        </div>

    </div> -->

@endsection
