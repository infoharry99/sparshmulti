<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Shipping;
use App\User;
use PDF;
use Notification;
use Helper;
use Illuminate\Support\Str;
use App\Notifications\StatusNotification;

class OrderApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::orderBy('id','DESC')->paginate(10);
        return view('backend.order.index')->with('orders',$orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
                'first_name' => 'required',
                'address1'   => 'required',
                'address2'   => 'nullable',
                'phone'      => 'numeric|required',
                'post_code'  =>   'nullable',
                'email'      => 'required',
                'payment_method' => 'required',
                "total_amount"   => 'required',
                "sub_total"      => 'required',
                "shipping_amt"   => 'required',
                "country"        =>'required'
            ]);
            $user_id   = $request->user_id;
            $sub_total = $request->sub_total;
            $total_amount = $request->total_amount;
            $shipping_amt = $request->shipping_amt ?? 0;
            $coupon    = $request->coupon ?? 0;

            if(empty(Cart::where('user_id',$user_id)->where('order_id',null)->first())){
                return response()->json([
                    'success' => false, 
                    'data' => null,
                    'message' => 'Cart is Empty !', 
                    'code' => 400
                ], 400);
            }

            $order  = new Order();
            $order_data = $request->all();
            $order_data['order_number'] = 'ORD-'.strtoupper(Str::random(10));
            $order_data['user_id']      = $user_id;
            $order_data['shipping_id']  = $request->shipping ?? null;
            $order_data['country']  = $request->country ?? "india";
            
            $shipping = Shipping::where('id',$order_data['shipping_id'])->pluck('price');

            $order_data['sub_total'] = $sub_total;
            $order_data['quantity']         = Helper::cartCount($user_id);
            $order_data['coupon']    = $coupon;
            $order_data['total_amount'] =  $total_amount;
            $order_data['status']    = "new";

            if(request('payment_method') == 'paypal'){
                $order_data['payment_method'] = 'paypal';
                $order_data['payment_status'] = 'paid';
            }else{
                $order_data['payment_method'] = 'cod';
                $order_data['payment_status'] = 'Unpaid';
            }

            $order->fill($order_data);
            $status = $order->save();
            
            if($order)
                $users = User::where('role','admin')->first();
                $details=[
                    'title'=>'New order created',
                    'actionURL'=>route('order.show',$order->id),
                    'fas'=>'fa-file-alt'
                ];
            Notification::send($users, new StatusNotification($details));
            // if(request('payment_method')=='paypal'){
            //     return redirect()->route('payment')->with(['id'=>$order->id]);
            // }
            Cart::where('user_id', $user_id)->where('order_id', null)->update(['order_id' => $order->id]);

            return response()->json([
                'success' => true, 
                'data' => null,
                'message' => 'Your product successfully placed in order', 
                'code' => 200
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'data' => null,
                'message' => $e->getMessage(), 
                'code' => 400
            ], 400);
        }  
    }

    public function show($id)
    {
        $order=Order::find($id);
        return view('backend.order.show')->with('order',$order);
    }

    public function edit($id)
    {
        $order=Order::find($id);
        return view('backend.order.edit')->with('order',$order);
    }

    public function update(Request $request, $id)
    {
        $order=Order::find($id);
        $this->validate($request,[
            'status'=>'required|in:new,process,delivered,cancel'
        ]);
        $data=$request->all();
        // return $request->status;
        if($request->status=='delivered'){
            foreach($order->cart as $cart){
                $product=$cart->product;
                // return $product;
                $product->stock -=$cart->quantity;
                $product->save();
            }
        }
        $status=$order->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated order');
        }
        else{
            request()->session()->flash('error','Error while updating order');
        }
        return redirect()->route('order.index');
    }

    public function destroy($id)
    {
        $order=Order::find($id);
        if($order){
            $status=$order->delete();
            if($status){
                request()->session()->flash('success','Order Successfully deleted');
            }
            else{
                request()->session()->flash('error','Order can not deleted');
            }
            return redirect()->route('order.index');
        }
        else{
            request()->session()->flash('error','Order can not found');
            return redirect()->back();
        }
    }

    public function orderTrack(){
        return view('frontend.pages.order-track');
    }

    public function productTrackOrder(Request $request){

        $order=Order::where('user_id',auth()->user()->id)->where('order_number',$request->order_number)->first();
        if($order){
            if($order->status=="new"){
            request()->session()->flash('success','Your order has been placed. please wait.');
            return redirect()->route('home');

            }
            elseif($order->status=="process"){
                request()->session()->flash('success','Your order is under processing please wait.');
                return redirect()->route('home');
    
            }
            elseif($order->status=="delivered"){
                request()->session()->flash('success','Your order is successfully delivered.');
                return redirect()->route('home');
    
            }
            else{
                request()->session()->flash('error','Your order canceled. please try again');
                return redirect()->route('home');
    
            }
        }
        else{
            request()->session()->flash('error','Invalid order numer please try again');
            return back();
        }
    }

    // PDF generate
    public function pdf(Request $request){

        $order = Order::getAllOrder($request->id);
        $file_name = $order->order_number.'-'.$order->first_name.'.pdf';
   
        $pdf=PDF::loadview('backend.order.pdf',compact('order'));
        return $pdf->download($file_name);
    }
    // Income chart
    public function incomeChart(Request $request){
        $year=\Carbon\Carbon::now()->year;
        // dd($year);
        $items=Order::with(['cart_info'])->whereYear('created_at',$year)->where('status','delivered')->get()
            ->groupBy(function($d){
                return \Carbon\Carbon::parse($d->created_at)->format('m');
            });
            // dd($items);
        $result=[];
        foreach($items as $month=>$item_collections){
            foreach($item_collections as $item){
                $amount=$item->cart_info->sum('amount');
                // dd($amount);
                $m=intval($month);
                // return $m;
                isset($result[$m]) ? $result[$m] += $amount :$result[$m]=$amount;
            }
        }
        $data=[];
        for($i=1; $i <=12; $i++){
            $monthName=date('F', mktime(0,0,0,$i,1));
            $data[$monthName] = (!empty($result[$i]))? number_format((float)($result[$i]), 2, '.', '') : 0.0;
        }
        return $data;
    }
}
