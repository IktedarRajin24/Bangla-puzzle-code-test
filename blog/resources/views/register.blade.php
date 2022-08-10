@extends('include.layout')

<html>
    <body>
        @section('content')
        <br>
        <br>
        <br>
        
            <div class="container" style="width:40%; background-color: orange; ">
                <form method="post" action= "{{route('register')}}">
                    {{csrf_field()}}    
                    <h2 style="text-align:center; color: white">Register</h2>
                    <br>
                    <div class="form-group row">
                        <label for="staticName" class="col-sm-2 col-form-label" style="color: white">Name</label>
                        <div class="col-sm-10">
                        <input type="text" name="name" id="name"class="form-control" id="inputName" placeholder="Name" style="width:75%">
                        </div>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label" style="color: white">Email</label>
                        <div class="col-sm-10">
                        <input type="text" name="email" id="email"class="form-control" id="inputEmail" placeholder="E-mail" style="width:75%">
                        </div>
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label" style="color: white">Password</label>
                        <div class="col-sm-10">
                        <input type="password" name="password" id="password"class="form-control" id="inputPassword" placeholder="Password" style="width:75%">
                        </div>
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group" style="text-align:center">
                        <input type="submit" class="btn btn-success" value="Register" >
                    </div>
                    <br>
                    <div class="form-group" style="text-align:center">
                        <p style="color: white">Already Registered? <a href="{{route('login')}}">Login</a></p>
                    </div>



                </form>
                <br> 
            </div>
            
        @endsection

    </body>

</html>