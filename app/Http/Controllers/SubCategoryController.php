<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = SubCategory::with('category')->paginate(10);
        return view('subcategory.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=Category::all();
        return view ('subcategory.create',compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $imageName=time().'.'.$request->image->extension();
      $request->image->move(public_path('subcategories'),$imageName);

      $subcategory=new SubCategory();
      $subcategory->name=$request->name;
      $subcategory->category_id=$request->category_id;
      $subcategory->image=$imageName;
      $subcategory->save();
    //   return back();
      return redirect()->route('subcategory.index')->withsuccess('Sub Category Inserted Successfuly');
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
        $category=Category::all();
        $subcategory=SubCategory::where('id',$id)->first();
        return view('subcategory.edit',compact('subcategory','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subcategory=SubCategory::where('id',$id)->first();
        if($request->hasFile('image'))
        {
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('subcategories'),$imageName);
            $subcategory->image=$imageName;
        }
            $subcategory->name=$request->name;
            $subcategory->category_id = $request->category_id;
            $subcategory->save();
            // return back();
            return redirect()->route('subcategory.index')->withsuccess('subCategory Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory=SubCategory::where('id',$id)->first();
        $subcategory->delete();
        return back();
    }
}
