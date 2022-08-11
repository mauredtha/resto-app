<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
   
    public function index()
    {
        $categories = Category::latest()->paginate(5);

        $data = [
            'categories' => $categories,
            'i' => (request()->input('page', 1) - 1) * 10
        ];
        
        //dd($data);

        return view('categories.index',compact('data'));
        
    }

    
    public function create()
    {
        return view('categories.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
      
        Category::create($request->all());
       
        return redirect()->route('categories.index')
                        ->with('success','Categories created successfully.');
    }

    
    public function show(Category $category)
    {
        return view('categories.show',compact('category'));
    }

    
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);
      
        $category->update($request->all());
      
        return redirect()->route('categories.index')
                        ->with('success','Category updated successfully');
    }

    
    public function destroy(Category $category)
    {
        $category->delete();
       
        return redirect()->route('categories.index')
                        ->with('success','Category deleted successfully');
    }
}
