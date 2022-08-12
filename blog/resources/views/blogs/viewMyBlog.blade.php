@extends('include.layout')
@section('content')
<br>
    
<br>
      <div class="container" style="width:80%; background-color: orange;">
      <h1>My Blogs</h1>
            <div class="row" style="align:center;">
              @foreach($blogs as $blog)
                <div class="card" style="background-color: yellow;">
                      
                  <h2>{{$blog->title}}</h2>
                  <h4>{{$blog->slug}}</h4> 
                  <p>{{$blog->description}}</p>
                  <img src="{{asset('images/'. $blog->image)}}" style="width: 20%; height:40%">
                  <br>
                  <div class="form-group" style="text-align:center">
                    <a style=" font-size:20px; text-decoration: none; float: left" class="btn btn-primary" href="commentOnBlog/{{$blog->id}}">Comment</a>
                  </div>
                  <br>
                  <div class="form-group" style="text-align:center">
                    <a style=" font-size:20px; text-decoration: none; float: left" class="btn btn-danger" href="deleteMyBlog/{{$blog->id}}">Delete Blog</a>
                  </div>
                  <br>
                </div>
                <br>
                <br> 
              @endforeach
              
            </div>

            <br>
            <a class="btn btn-danger" href="{{route('users.dashboard')}}">Back</a>
            <br>
            <br>
        </div>
@endsection


              


                