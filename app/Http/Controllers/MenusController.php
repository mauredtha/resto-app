<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenusController extends Controller
{
    
    public function index()
    {
        $menus = Menu::latest()->paginate(5);

        $data = [
            'menus' => $menus,
            'i' => (request()->input('page', 1) - 1) * 10
        ];
        
        //dd($data);

        return view('menus.index',compact('data'));
    }

    
    public function create()
    {
        $categories = Category::get();
        return view('menus.create', compact('categories'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'status' => 'required',
            'pict' => 'required|mimes:png,jpg,jpeg,PNG,JPG,JPEG|max:2048',
        ]);

        if($request->file('pict')){
            $name = date('YmdHis').'_'.$request->pict->getClientOriginalName();
            $filePath = $request->file('pict')->storeAs('uploads', $name, 'public');
            $fileName = date('YmdHis').'_'.$request->pict->getClientOriginalName();
            $data['pict'] = $fileName;
        }

        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['category_id'] = $request->category_id;
        $data['price'] = $request->price;
        $data['status'] = $request->status;
        
        Menu::create($data); //$request->all()
       
        return redirect()->route('menus.index')
                        ->with('success','Menu created successfully.');
    }

    
    public function show(Menu $menu)
    {
        return view('menus.show',compact('menu'));
    }

    
    public function edit(Menu $menu)
    {
        $categories = Category::get();
        return view('menus.edit',compact(['menu', 'categories']));
    }

    
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'status' => 'required',
            'pict' => 'required|mimes:png,jpg,jpeg,PNG,JPG,JPEG|max:2048',
        ]);

        if($request->file('pict')){
            $name = date('YmdHis').'_'.$request->pict->getClientOriginalName();

            if($menu->pict != $name){
                $image_path = Storage::path('public/uploads/'.$menu->pict);
                unlink($image_path);
            }
            $filePath = $request->file('pict')->storeAs('uploads', $name, 'public');
            $fileName = date('YmdHis').'_'.$request->pict->getClientOriginalName();
            $data['pict'] = $fileName;
        }

        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['category_id'] = $request->category_id;
        $data['price'] = $request->price;
        $data['status'] = $request->status;
        $data['updated_at'] = date('Y-m-d H:i:s');
      
        $menu->update($data); //$request->all()
      
        return redirect()->route('menus.index')
                        ->with('success','Menu updated successfully');
    }

    
    public function destroy(Menu $menu)
    {
        $image_path = Storage::path('public/uploads/'.$menu->pict);
        unlink($image_path);

        $menu->delete();
       
        return redirect()->route('menus.index')
                        ->with('success','Menu deleted successfully');
    }
}
