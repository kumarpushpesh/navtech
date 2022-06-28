<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data=Order::get();
        return view('order', compact('data'));
    }
    public function add_view()
    {
        
        return view('add');
    }
    public function add(Request $request)
    {
        $order=new Order();
        $order->order_no=request('order_no');
        $order->order_due_date=request('order_due_date');
        $order->name=request('name');
        $order->address=request('address');
        $order->phone=request('phone');
        $order->order_total=request('order_total');
        $order->save();
       
        return redirect('/home')
        ->with('success','Details updated successfully');
        
    }
    public function edit($id)

    {

        $data=Order::where('id',$id)->first();
       
        return view('edit',compact('data'));
      
       
    }
    public function update(Request $request, $id)
    {
        $post=Order::where('id',$id)->first();
   
        $post->update($request->all());
    
        return redirect('/home')
                        ->with('success','Details updated successfully');
    }
    public function destroy($id)
    {
        $data=Order::where('id',$id)->first();
        $data->delete();
    
        return redirect('/home')
                        ->with('success','Data deleted successfully');
    }
}
