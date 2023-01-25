<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation =   $request->validate([
            'name' => 'required',
            'description' => 'min:3',
            'image' =>'image|mimes:png,jpg,pdf |max:2048'
           
            
        ]);
        $category = new Category;
        $category->id = $request->category;
        $category->name = $request->name;
        $category->description = $request->description;
        // $category->image = $request->image->Store('category');
        // if($request->hasfile('image')){
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . "." . $extension;
        //     $file->move('category', $filename);
        //     $category->image = $filename;    

        // }
        if($request->image){        
            $imageName = time() . "." .
            $request->image->extension();
            $request->image->move(public_path('category'), $imageName);
            $category->image = $imageName;
          }
        $category->save();
        return redirect()->back()->with('message', "Category Product added");
     

    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status( Category $category)
    {
        if($category->status == 1){
            $category->update(['status'=>0]);
        }
        else{
            $category->update(['status' =>1]);
        }
       
        return redirect()->back()->with('message', "Category Status update successfully");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
      
        return view('admin.category.edit',compact('category'));
        // echo "hello";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Category $category)
    {
       
          $category->name = $request->name;
        $category->description = $request->description;
   
        if($request->image){        
            $imageName = time() . "." .
            $request->image->extension();
            $request->image->move(public_path('category'), $imageName);
            $category->image = $imageName;
          }

        $category->update();
        return redirect('/categorys')->with('message', "category updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/categorys')->with('message', 'Category delete successfully');
        // $delete = $category->delete();
        // if($delete){
        //     return redirect('/categories')->with('message',"Category delete successfully")
        // }
    }
}
