@extends('include.layout')

<html>
    <body>
        @section('content')
        <br>
        <br>
        <br>
        
            <div class="container" style="width:40%; background-color: orange; ">

            <br>
                <h2 style="text-align:center; color: white">Hello this is a blog project</h2>
                <br>
                <form>
                    <div class="form-group" style="text-align:center">
                        <a style=" color: black; font-size:20px; text-decoration: none" class="fa" class="btn" href="{{route('login')}}">&#xf090; login</a>
                    </div>
                    <br>
                    <div class="form-group" style="text-align:center">
                        <a style=" color: black; font-size:20px; text-decoration: none" class="fa" class="btn" href="{{route('register')}}">&#xf25d; register</a>
                    </div>
                </form>
                <br> 
            </div>
            
        @endsection

    </body>

</html>