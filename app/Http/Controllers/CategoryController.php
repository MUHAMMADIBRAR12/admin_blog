<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('category.index');
        $category=Category::get();
        return json_encode($category);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required',
            'name'=>'required'
        ]);
        $imageName=time().'.'.$request->image->extension();
        $request->image->move(public_path('categories'),$imageName);

        $category=new Category;
        $category->image=$imageName;
        $category->name=$request->name;
        $category->save();
        return redirect()->route('category.index')->withsuccess(' Category created Successfuly');

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
        $category=Category::where('id',$id)->first();
        return view('category.edit',['category'=>$category]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     $request->validate([
        'name'=>'required',
        'image'=>'nullable|mimes:png,jpg,jpeg,gif|max:10000',
     ]);
        $category=Category::where('id',$id)->first();
        if($request->hasFile('image'))
        {
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('categories'),$imageName);
            $category->image=$imageName;
        }
            $category->name=$request->name;
            $category->save();
            return redirect()->route('category.index')->withsuccess('Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::where('id',$id)->first();
        $category->delete();
        return back();
    }
}
