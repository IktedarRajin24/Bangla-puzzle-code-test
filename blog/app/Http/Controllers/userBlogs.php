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
        $users = users::all()->first();
        return view('blogs.createBlog')->with('users', $users);
    }

    public function createBlogsSubmitted(Request $request)
    {
        $validate = $request->validate([
            'title'=>'required|min:10|max:50',
            'slug'=>'required',
        ],
        [
            'title.required'=>'Please put a title',
            'title.min'=>'Title must be greater than 10 charcters',
            'title.max'=>'Title cannot be greater than 50 charcters',
        ]);

        $blogs = new blogs();
        $blogs->title = $request->title;
        $blogs->slug = Str::slug($request->slug); 
        $blogs->description = $request->description;
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
}
