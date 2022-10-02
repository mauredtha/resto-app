<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
   
    public function index(Request $request)
    {

        $data['q'] = $request->query('q');
        $data['status'] = $request->query('status');
        $data['statuses'] = Status::where('id', 'on')->orWhere('id', 'off')->get();

        $query = Category::select('categories.*')
            ->where(function ($query) use ($data) {
                $query->where('categories.name', 'like', '%' . $data['q'] . '%');
            });

        if ($data['status'])
            $query->where('categories.status', $data['status']);

        $data['categories'] = $query->paginate(30)->withQueryString();
        
        // dd($data);

        return view('categories.index',$data);
        
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

        if(empty($request->status)){
            $request->status = 'off';
        }else{
            $request->status = $request->status;
        }

        // dd($request->all());
      
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

        $data['name'] = $request->name;

        if(empty($request->status)){
            $data['status'] = 'off';
        }else {
            $data['status'] = $request->status;
        }
      
        $category->update($data); //$request->all()
      
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
