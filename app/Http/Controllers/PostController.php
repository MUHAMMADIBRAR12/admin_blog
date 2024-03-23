<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view('post.index');
        $posts = Post::with('category','subcategory')->paginate(10);
        return view ('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view ('post.create');
         $category=Category::all();
         $subcategory=Subcategory::all();
         return view ('post.create',compact('category','subcategory'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'category_id'=>'required',
        'subcategory_id'=>'required',
        'title'=>'required',
        'short_description'=>'required',
        'long_description'=>'required',
        'author'=>'required',
        'image'=>'required',
        'tags'=>'required',
    ]);
    $imageName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('posts'), $imageName);

    $post = new Post();
    $post->category_id=$request->category_id;
    $post->subcategory_id=$request->subcategory_id;
    $post->title = $request->title;
    $post->short_description = $request->short_description;
    $post->long_description = $request->long_description;
    $post->author = $request->author;
    $post->image = $imageName;
    $post->tags = $request->tags;
    $post->save();
    return redirect()->route('post.index')->withsuccess('Post Added Successfully') ;

}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post=Post::where('id',$id)->first();
        return view('post.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'title'=>'required',
            'short_description'=>'required',
            'long_description'=>'required',
            'author'=>'required',
            'image'=>'required',
            'tags'=>'required',
        ]);
        $post=Post::where('id',$id)->first();
        if($request->hasfile('image'))
        {
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('posts'),$imageName);
            $post->image=$imageName;
        }
        $post = new Post();
        $post->category_id=$request->category_id;
        $post->subcategory_id=$request->subcategory_id;
        $post->title = $request->title;
        $post->short_description = $request->short_description;
        $post->long_description = $request->long_description;
        $post->author = $request->author;
        $post->tags = $request->tags;
        $post->save();
        $postname=Post::find($id);
        return redirect()->route('post.index')->withsuccess('Post Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::where('id',$id)->first();
        $post->delete();
        return back();
    }
}
