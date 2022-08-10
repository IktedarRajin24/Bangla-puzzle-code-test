@extends('include.layout')
@section('content')
    <br>
    <div class="container" style="width:80%; background-color: orange;">
        <h1>Comment</h1>
        <form method="post" action= "{{route('blogs.commentOnBlog')}}">
            {{csrf_field()}}    
            <textarea name="comment" id="comment" class="form-control"  placeholder="comment" style="width:60%;"></textarea>
            <br>
            <input type="submit" class="btn btn-success" value="Comment">
            <br>
            <br>
            <input type="text" name="blogID" id="blogID"class="form-control" value="{{$blogs->id}}" style="width:80%" hidden>
            <br>
            <a class="btn btn-danger" href="{{route('blogs.viewBlog')}}">Back</a>
            <br>
            <br>
        </form>
    </div>
@endsection