<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Notifications\MailNotification;
use Illuminate\Notifications\Events\NotificationSent;
use PDF;
use Illuminate\Support\Facades\Notification;

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
        $image=$request->image;
        if($image)
        {
        $filename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $filename);
        $product->image=$filename;
        }
        
        // image code end

        $product->save();
        return redirect()->back()->with('message', 'Product Updated succesfully');
    }

    public function order()
    {
        $order=order::all();
        return view('admin.order',compact('order'));
    }

    public function delivered($id)
    {
        $order = order::find($id);
        $order->delivery_status="delivered";
        $order->payment_status='paid';
        $order->save();

        return redirect()->back();
    }

    public function print_pdf($id)
    {
        $order=order::find($id);
        $pdf=\Barryvdh\DomPDF\Facade\Pdf::loadView('admin.pdf',compact('order'));
        return $pdf->download('order_details.pdf');
        
    }

    public function send_mail(Request $request, $id)
    {
        $order=order::find($id);
        return view('admin.email', compact('order'));
    }

    public function send_user_mail(Request $request, $id)
    {
        $order=order::find($id);
        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => 'WELCOME TO LARAVEL',
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];
        Notification::send($order, new MailNotification($details));

        return redirect()->back();

    }

    public function searchdata(Request $request)
    {
        $searchText = $request->search;
        $order = order::where('name', 'LIKE', "%$searchText%")->orWhere('phone', 'LIKE', "%$searchText%")->orWhere('product_title', 'LIKE', "%$searchText%")->get();

        return view('admin.order', compact('order'));
    }

}
