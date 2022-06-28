<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data['orders'] = Order::orderBy('id','desc')->paginate(5);
   
        return view('index',$data);
    }
    

    public function store(Request $request)
    {
        $order  =   Order::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'onder_no' => $request->order_no, 
                        'order_due_date' => $request->order_due_date,
                        'name' => $request->name,
                        'address' => $request->address,
                        'phone' => $request->phone,
                        'order_total' => $request->order_total,
                    ]);
                    
        return response()->json(['success' => true]);
    }
    
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $order  = Order::where($where)->first();
 
        return response()->json($order);
    }
 
    public function destroy(Request $request)
    {
        $order = Order::where('id',$request->id)->delete();
   
        return response()->json(['success' => true]);
    }
}
