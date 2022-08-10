@extends('include.layout')

<html>
    <body>
        @section('content')
        <br>
        <br>
        <br>
        
            <div class="container" style="width:40%; background-color: orange; ">

            <br>
                <h2 style="text-align:center; color: white">Dashboard</h2>
                <h3 style="text-align:center; color: Red"> Hello, {{$users->Name}}</h3>
                <br>
                <form>
                    <div class="form-group" style="text-align:center">
                        <a style=" color: black; font-size:20px; text-decoration: none" class="fa" class="btn" href="{{route('users.profile')}}">Profile</a>
                    </div>
                    <br>
                    <div class="form-group" style="text-align:center">
                        <a style=" color: black; font-size:20px; text-decoration: none" class="fa" class="btn" href="{{route('blogs.createBlog')}}">Post a blog</a>
                    </div>
                    <br>
                    <div class="form-group" style="text-align:center">
                        <a style=" color: black; font-size:20px; text-decoration: none" class="fa" class="btn" href="{{route('blogs.viewBlog')}}">View all blogs</a>
                    </div>
                    <br>
                    <div class="form-group" style="text-align:center">
                        <a style=" color: black; font-size:20px; text-decoration: none" class="fa" class="btn" href="{{route('logout')}}">Logout</a>
                    </div>
                </form>
                <br> 
            </div>
            
        @endsection

    </body>

</html>