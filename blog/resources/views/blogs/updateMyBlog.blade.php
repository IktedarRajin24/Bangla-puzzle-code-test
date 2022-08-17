@extends('include.layout')

<html>
    <body>
        @section('content')
        <br>
        <br>
        <br>
        
            <div class="container" style="width:60%; background-color: orange; ">
                <form method="post" action= "{{route('blogs.updateMyBlog')}}" enctype="multipart/form-data">
                    {{csrf_field()}}    
                    <h2 style="text-align:center; color: white">Update Your Blog</h2>
                    <br>
                    <div class="form-group row" hidden>
                        <label for="id" class="col-sm-2 col-form-label" style="color: white">id:</label>
                        <div class="col-sm-10">
                        <input type="text" name="id" id="id"class="form-control" value="{{$blogs->id}}" style="width:80%">
                        </div>
                        
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="staticPost" class="col-sm-2 col-form-label" style="color: white">Title:</label>
                        <div class="col-sm-10">
                        <input type="text" name="title" id="title"class="form-control" value="{{$blogs->title}}" style="width:80%">
                        </div>
                        @error('title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="staticSlug" class="col-sm-2 col-form-label" style="color: white">Slug:</label>
                        <div class="col-sm-10">
                        <input type="text" name="slug" id="slug"class="form-control" value="{{$blogs->slug}}"style="width:80%">
                        </div>
                        @error('slug')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label" style="color: white">Description:</label>
                        <div class="col-sm-10">
                        <textarea name="description" id="description"class="form-control"  style="width:80%" >
                        {{$blogs->description}}</textarea>
                        </div>
                        @error('description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label" style="color: white">Image:</label>
                        <div class="col-sm-10">
                        <input type="file" name="img" id="img"class="form-control" style="width:80%">
                        <br>
                        <img src="{{asset('images/'. $blogs->image)}}" style="width: 40%; height:70%">
                        </div>
                        @error('img')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group row" hidden>
                        <label for="usersid" class="col-sm-2 col-form-label" style="color: white">id:</label>
                        <div class="col-sm-10">
                        <input type="text" name="usersid" id="usersid"class="form-control"  value="{{$users->id}}" style="width:20%" readonly>
                        </div>
                    </div>

                    
                    <br>
                    <div class="form-group" style="text-align:center">
                        <input type="submit" class="btn btn-success" value="Update" >
                    </div>
                    <br>

                    <div class="form-group" style="text-align:center">
                        <a class="btn btn-danger" href="{{route('blogs.viewMyBlog')}}">Back</a>
                    </div>
                    <br>
                </form>
                <br> 
            </div>
            
        @endsection

    </body>

</html>