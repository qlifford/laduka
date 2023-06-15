<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new Category;
        $data ->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('message','Category Added successfully');

    }

    public function delete_category($id)
    {
        $data=category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Category deleted successfully'); 
    }

    public function view_product()
    {  
        $category = category::all();    
        return view('admin.product', compact('category')); 
    }

    public function add_product(Request $request)
    {   
        $product = new Product;
        $product ->title=$request->title;
        $product ->description=$request->description;
        $product ->price=$request->price;
        $product ->quantity=$request->quantity;
        $product ->discount_price=$request->discount;
        $product->category=$request->category;

        // image code start
        $image=$request->image;
        $filename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$filename);
        // image code end

        $product->image=$filename;
        $product->save();
        return redirect()->back()->with('message','Product Added successfully');
    }
    public function show_product()
    {
        $product = product::all();
        return view('admin.show_product', compact('product',));
    }

    public function delete_product($id)
    {
        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product deleted successfully');
    }
    public function update_product($id)
    {
        $product=product::find($id);
        $category=category::all();

        return view('admin.update_product', compact('product','category'));
    }

    public function update_product_confirm(Request $request,$id)
    {
        $product=product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;

        // image code start
        // $image=$request->old_image;
        // $filename=time().'.'.$image->getClientOriginalExtension();
        // $request->image->move('/product', $filename);
        // image code end

        // $product->image=$filename;

        $image = $request->image;
        $image=$request->file('product');

        if ($image != '')
        {
            $filename = rand().'.'.$image->getClientOriginalExtension();
            $image -> move(public_path('product'));
        }
        $product->save();
        return redirect();
    }

}
