<?php

namespace App\Http\Controllers;
use App\Models\Blogs;
use App\Models\Users;
use App\Models\Comments;
use Illuminate\Http\Request;

class userBlogControllerAPI extends Controller
{
    public function viewBlog(){
        $blogs = blogs::all();
        return $blogs;
    }

    public function createBlog(Request $request)
    {
        $blogs = new blogs();
        $blogs->title = $request->title;
        $blogs->slug = $request->slug; 
        $blogs->description = $request->description;
        $blogs->image = $request->image;
        $blogs->userID = $request->userID;
        $blogs->save();

        return response()->json('Blog Created');
    }

    public function deleteBlog(Request $request, $id)
    {
        $blogs = blogs::findOrFail($id);
        if($blogs)
        {
            $blogs->delete();
            return response()->json('Blog deleted');
        }
    }

    public function updateBlog(Request $request, $id)
    {
        $blogs = blogs::find($id);
        if($blogs)
        {
            $blogs->title = $request->title;
            $blogs->slug = $request->slug; 
            $blogs->description = $request->description;
            $blogs->image = $request->image;
            $blogs->userID = $request->userID;
            $blogs->save();
            return response()->json('Blog updated');
        }
        else
        {
            return response()->json('Blog not found');
        }
    }

}
