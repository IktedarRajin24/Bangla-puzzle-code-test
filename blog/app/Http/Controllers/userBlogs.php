<?php

namespace App\Http\Controllers;
use App\Models\Blogs;
use App\Models\Users;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class userBlogs extends Controller
{
    public function createBlogs()
    {
        $users = users::where('id', session()->get('id'))->first();
        return view('blogs.createBlog')->with('users', $users);
    }

    public function createBlogsSubmitted(Request $request)
    {
        $validate = $request->validate([
            'title'=>'required|min:10|max:50',
            'slug'=>'required',
            'img'=>'required|mimes:jpg,jpeg,png|max:102400',
        ],
        [
            'title.required'=>'Please put a title.',
            'title.min'=>'Title must be greater than 10 charcters.',
            'title.max'=>'Title cannot be greater than 50 charcters.',
            'img.required'=>'Please upload an image.',
        ]);

        $imageName = time() . '-' . $request->title . '.' . $request->img->extension();
        $request->img->move(public_path('images'), $imageName);

        $blogs = new blogs();
        $blogs->title = $request->title;
        $blogs->slug = Str::slug($request->slug); 
        $blogs->description = $request->description;
        $blogs->image = $imageName;
        $blogs->userID = $request->usersid;
        $blogs->save();

        return redirect()->route('users.dashboard')->with('blogs', $blogs);
    }

    public function viewBlog()
    {
        $blogs = blogs::all();
        $users = users::all();
        return view('blogs.viewBlog')->with('blogs', $blogs)->with('users', $users);
    }

    public function commentOnBlog(Request $request)
    {
        $blogs = blogs::where('id', $request->id)->first();
        return view('blogs.commentOnBlog')->with('blogs', $blogs);
    }
    public function commentOnBlogSubmitted(Request $request)
    {
        $comments = new comments();
        $comments->comments = $request->comment;
        $comments->userID = session()->get('id');
        $comments->blogID = $request->blogID;
        $comments->save();

        $blogs = blogs::all();
        return redirect()->route('blogs.viewBlog')->with('blogs', $blogs);
    }

    public function viewMyBlog()
    {
        $blogs = blogs::where('userID', session()->get('id'))->get();
        $users = users::all();
        return view('blogs.viewMyBlog')->with('blogs', $blogs)->with('users', $users);
    }

    public function deleteMyBlog(Request $request)
    {
        $blogs = blogs::where('id', $request->id)->first();
        $blogs->delete();
        return redirect()->route('blogs.viewMyBlog');
    }

    public function updateMyBlog(Request $request)
    {
        $users = users::where('id', session()->get('id'))->first();
        $blogs = blogs::where('id', $request->id)->first();
        return view('blogs.updateMyBlog')->with('users', $users)->with('blogs', $blogs);
    }

    public function updateMyBlogSubmitted(Request $request)
    {
        
        $imageName = time() . '-' . $request->title . '.' . $request->img->extension();
        $request->img->move(public_path('images'), $imageName);


        $blogs = blogs::where('id', $request->id)->first();
        $blogs->title = $request->title;
        $blogs->slug = Str::slug($request->slug); 
        $blogs->description = $request->description;
        $blogs->image = $imageName;
        $blogs->userID = $request->usersid;
        $blogs->save();
        return redirect()->route('blogs.viewMyBlog');
    }

    
}
