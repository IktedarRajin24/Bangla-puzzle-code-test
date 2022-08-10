@extends('include.layout')

<html>
    <body>
        @section('content')
        <br>
        <br>
        <br>
        <h2>Edit</h2>
            <form method="post" action= "{{route('userEdit')}}" class= "form form-group" >
                {{csrf_field()}}
                <label for="id">ID:</label>
                <input type="text" name="id" id="id" value="{{$users-> id}}" class="form-control" readonly>
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <br>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{$users-> Name}}" class="form-control">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <br>
                <label for="email">E-mail:</label>
                <input type="text" name="email" id="email" value="{{$users-> Email}}" class="form-control">
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <br>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" value="{{$users-> Password}}" class="form-control">
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <br>
                
                <input type="submit" class="btn btn-success" value="update">   
                <a class="btn btn-danger" href="{{route('users.profile')}}">Back</a> 
            </form>
            
        @endsection

    </body>

</html>