<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('category.index',compact('category'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'required|max:1500',
            'status' => 'required',
        ]);
        $category = new Category;
        $category->name = $request['name'];
        $category->description = $request['description'];
        $category->status = $request['status'];
        $category->save();
        return redirect('/category');
    }

    public function edit($id){
        $cat = Category::find($id);
        return view('category.edit',compact('cat'));
    }

    public function update(Request $request,$id){
        $category = Category::find($id);
        $category->name = $request['name'];
        $category->description = $request['description'];
        $category->status = $request['status'];
        $category->save();
        return redirect('/category');
    }

    public function changeStatus($id, $status) {
        $category = Category::find($id);
        $category -> status = $status;
        $category -> save();
        return response()->json(['success'=>'Status change successful']);
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('/category');
    }
}
