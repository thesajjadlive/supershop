<?php

namespace App\Http\Controllers;

use App\Category;
use http\Message;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Category List';
        //$data['categories'] = Category::withTrashed()->orderBy('id','DESC')->paginate(10);
        $category = new Category();
        $category = $category->withTrashed();

        //search category
        if ($request->has('search') && $request->search != null){
            $category = $category->where('name','like','%'.$request->search.'%');
        }

        //search via status
        if ($request->has('status') && $request->status != null){
            $category = $category->where('status',$request->status);
        }


        $category = $category->orderBy('id','DESC')->paginate(10);
        $data['categories'] = $category;
        $data['serial'] = managePagination($category);

        return view('backend.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add New Category';
        return view('backend.category.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'status'=>'required'
        ]);
        $category = $request->except('_token');
        Category::create($category);
        session()->flash('message','Category Created Successfully');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data['title'] = 'Edit category';
        $data['category'] = $category;
        return view('backend.category.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required',
            'status'=>'required'
        ]);

        $category_data = $request->except('_token','_method');
        $category->update($category_data);
        session()->flash('message','Category Updated Successfully');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('message','Category Deleted Successfully');
        return redirect()->route('category.index');
    }

    public function restore($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        session()->flash('message','Category Restored Successfully');
        return redirect()->route('category.index');
    }

    public function delete($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        session()->flash('message','Category Permanently Removed');
        return redirect()->route('category.index');
    }

}
