<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view('post.index');
        $post = Post::get();
        return view ('post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('post.create');
        // $category=Category::all();
        // return view ('subcategory.create',compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // dd($request->all());

    $imageName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('posts'), $imageName);

    $post = new Post();
    $post->name = $request->name;

    // Check if 'details' field is present and not null before assigning the value
    $post->details = $request->has('details') ? $request->details : '';

    $post->image = $imageName;
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
        $post=Post::where('id',$id)->first();
        if($request->hasfile('image'))
        {
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('posts'),$imageName);
            $post->image=$imageName;
        }
            $post->name=$request->name;
            //$post->category_id = $request->category_id;
            $post->save();
            // return back();
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
