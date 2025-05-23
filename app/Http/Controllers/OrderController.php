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

class OrderController extends Controller
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
    // public function store(Request $request)
    // {
    //     $this->validate($request,[
    //         'first_name'=>'string|required',
    //         'last_name'=>'string|required',
    //         'address1'=>'string|required',
    //         'address2'=>'string|nullable',
    //         'coupon'=>'nullable|numeric',
    //         'phone'=>'numeric|required',
    //         'post_code'=>'string|nullable',
    //         'email'=>'string|required'
    //     ]);
    //     // return $request->all();

    //     // if(empty(Cart::where('user_id',auth()->user()->id)->where('order_id',null)->first())){
    //     //     request()->session()->flash('error','Cart is Empty !');
    //     //     return back();
    //     // }
    //     // $cart=Cart::get();
    //     // // return $cart;
    //     // $cart_index='ORD-'.strtoupper(uniqid());
    //     // $sub_total=0;
    //     // foreach($cart as $cart_item){
    //     //     $sub_total+=$cart_item['amount'];
    //     //     $data=array(
    //     //         'cart_id'=>$cart_index,
    //     //         'user_id'=>$request->user()->id,
    //     //         'product_id'=>$cart_item['id'],
    //     //         'quantity'=>$cart_item['quantity'],
    //     //         'amount'=>$cart_item['amount'],
    //     //         'status'=>'new',
    //     //         'price'=>$cart_item['price'],
    //     //     );

    //     //     $cart=new Cart();
    //     //     $cart->fill($data);
    //     //     $cart->save();
    //     // }

    //     // $total_prod=0;
    //     // if(session('cart')){
    //     //         foreach(session('cart') as $cart_items){
    //     //             $total_prod+=$cart_items['quantity'];
    //     //         }
    //     // }

    //     $order=new Order();
    //     $order_data=$request->all();
    //     $order_data['order_number']='ORD-'.strtoupper(Str::random(10));
    //     $order_data['user_id']=$request->user()->id;
    //     $order_data['shipping_id']=$request->shipping;
    //     $shipping=Shipping::where('id',$order_data['shipping_id'])->pluck('price');
    //     // return session('coupon')['value'];
    //     $order_data['sub_total']=Helper::totalCartPrice();
    //     $order_data['quantity']=Helper::cartCount();
    //     if(session('coupon')){
    //         $order_data['coupon']=session('coupon')['value'];
    //     }
    //     if($request->shipping){
    //         if(session('coupon')){
    //             $order_data['total_amount']=Helper::totalCartPrice()+$shipping[0]-session('coupon')['value'];
    //         }
    //         else{
    //             $order_data['total_amount']=Helper::totalCartPrice()+$shipping[0];
    //         }
    //     }
    //     else{
    //         if(session('coupon')){
    //             $order_data['total_amount']=Helper::totalCartPrice()-session('coupon')['value'];
    //         }
    //         else{
    //             $order_data['total_amount']=Helper::totalCartPrice();
    //         }
    //     }
    //     // return $order_data['total_amount'];
    //     $order_data['status']="new";
    //     if(request('payment_method')=='paypal'){
    //         $order_data['payment_method']='paypal';
    //         $order_data['payment_status']='paid';
    //     }
    //     else{
    //         $order_data['payment_method']='cod';
    //         $order_data['payment_status']='Unpaid';
    //     }
    //     $order->fill($order_data);
    //     $status=$order->save();
    //     if($order)
    //     // dd($order->id);
    //     $users=User::where('role','admin')->first();
    //     $details=[
    //         'title'=>'New order created',
    //         'actionURL'=>route('order.show',$order->id),
    //         'fas'=>'fa-file-alt'
    //     ];
    //     Notification::send($users, new StatusNotification($details));
    //     if(request('payment_method')=='paypal'){
    //         return redirect()->route('payment')->with(['id'=>$order->id]);
    //     }
    //     else{
    //         session()->forget('cart');
    //         session()->forget('coupon');
    //     }
    //     Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => $order->id]);

    //     // dd($users);        
    //     request()->session()->flash('success','Your product successfully placed in order');
    //     return redirect()->route('home');
    // }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'address1' => 'string|required',
            'coupon' => 'nullable|numeric',
            'phone' => 'numeric|required',
            'post_code' => 'string|nullable',
            'email' => 'required|email',
            'shipping' => 'nullable|exists:shippings,id'
        ]);

        if(!auth()->check()){
            return redirect()->route('login.form');
        }
        // Get cart data
        if (auth()->check()) {
            $cartItems = Cart::where('user_id', auth()->id())->whereNull('order_id')->get();
        } else {
            $cartItems = collect(session()->get('cart', []));
        }

        if ($cartItems->isEmpty()) {
            request()->session()->flash('error', 'Cart is Empty!');
            return back();
        }

        // Calculate totals
        if (auth()->check()) {
            $sub_total = Helper::totalCartPrice();
            $quantity = Helper::cartCount();
        } else {
            $sub_total = $cartItems->sum('amount');
            $quantity = $cartItems->sum('quantity');
        }

        $shipping_price = 0;
        if ($request->shipping) {
            $shipping_price = Shipping::where('id', $request->shipping)->value('price') ?? 0;
        }

        $coupon_value = session('coupon')['value'] ?? 0;
        $total_amount = $sub_total + $shipping_price - $coupon_value;

        $tenant = app('currentTenant');
        // Create Order
        $order = new Order();
        $order_data = $request->all();
        $order_data['tenant_id'] = $tenant->id;
        $order_data['order_number'] = 'ORD-' . strtoupper(Str::random(10));
        $order_data['user_id'] = auth()->id(); 
        $order_data['sub_total'] = $sub_total;
        $order_data['quantity'] = $quantity;
        $order_data['coupon'] = $coupon_value;
        $order_data['total_amount'] = $total_amount;
        $order_data['status'] = "new";
        $order_data['payment_method'] = $request->payment_method ?? 'cod';
        $order_data['payment_status'] = ($order_data['payment_method'] == 'paypal') ? 'paid' : 'Unpaid';

        $order->fill($order_data);
        $order->save();

        // Save cart items to order
        if (auth()->check()) {
            Cart::where('user_id', auth()->id())->whereNull('order_id')->update(['order_id' => $order->id]);
        } else {
            foreach ($cartItems as $item) {
                \App\Models\OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }
            session()->forget('cart');
        }

        // Send notification to admin
        $admin = User::where('role', 'admin')->first();
        if ($admin) {
            $details = [
                'title' => 'New order created',
                'actionURL' => route('order.show', $order->id),
                'fas' => 'fa-file-alt'
            ];
            Notification::send($admin, new StatusNotification($details));
        }

        session()->forget('coupon');

        if ($order_data['payment_method'] == 'paypal') {
            return redirect()->route('payment')->with(['id' => $order->id]);
        }

        request()->session()->flash('success', 'Your order has been placed successfully!');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=Order::find($id);
        // return $order;
        return view('backend.order.show')->with('order',$order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order=Order::find($id);
        return view('backend.order.edit')->with('order',$order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        $order = Order::where('order_number',$request->order_number)->first();
        if($order){
            if($order->status=="new"){
                request()->session()->flash('success','Your order has been placed. please wait.');
                return redirect()->route('home');
            }elseif($order->status=="process"){
                request()->session()->flash('success','Your order is under processing please wait.');
                return redirect()->route('home');
    
            }elseif($order->status=="delivered"){
                request()->session()->flash('success','Your order is successfully delivered.');
                return redirect()->route('home');
    
            }else{
                request()->session()->flash('error','Your order canceled. please try again');
                return redirect()->route('home');
    
            }
        }else{
            request()->session()->flash('error','Invalid order numer please try again');
            return back();
        }
    }

    // PDF generate
    public function pdf(Request $request){
        $order=Order::getAllOrder($request->id);
        // return $order;
        $file_name=$order->order_number.'-'.$order->first_name.'.pdf';
        // return $file_name;
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
