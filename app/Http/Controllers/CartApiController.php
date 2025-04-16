<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Cart;
use Illuminate\Support\Str;
use Helper;

class CartApiController extends Controller
{
    protected $product=null;

    public function __construct(Product $product){
        $this->product=$product;
    }

    public function addToCart(Request $request){
        
        try {
            
            $validated = $request->validate([
                'slug' => 'required',
                'user_id' => 'required|exists:users,id',
            ]);

            if (empty($request->slug)) {
                $response_array =[
                    'success'  => false, 
                    'messages'=>"Invalid Products", 
                    'code'=>400
                ];
                return response()->json($response_array);
            }    

            $product = Product::where('slug', $request->slug)->first();

            if (empty($product)) {
                $response_array =[
                    'success'  => false, 
                    'messages'=>"Invalid Products", 
                    'code'=>400
                ];
                return response()->json($response_array);
            }
            $user_id = $request->user_id;
            $already_cart = Cart::where('user_id', $request->user_id)->where('order_id',null)->where('product_id', $product->id)->first();

            if($already_cart) {
            
                $already_cart->quantity = $already_cart->quantity + 1;
                $already_cart->amount = $product->price+ $already_cart->amount;
                if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0)
                 return back()->with('error','Stock not sufficient!.');
                $already_cart->save();
                
            }else{
                
                $cart = new Cart;
                $cart->user_id = $user_id;
                $cart->product_id = $product->id;
                $cart->price = ($product->price-($product->price*$product->discount)/100);
                $cart->quantity = 1;
                $cart->amount=$cart->price*$cart->quantity;
                if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) 
                
                return response()->json([
                    'success' => false, 
                    'data' => null,
                    'message' => 'Stock not sufficient!.', 
                    'code' => 400
                ], 400);

                $cart->save();
                $wishlist=Wishlist::where('user_id',$user_id)->where('cart_id',null)->update(['cart_id'=>$cart->id]);
            }
            return response()->json([
                'success' => true,
                'message' => 'Product successfully added to cart', 
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
    public function cart(Request $request){
        
        try {
            
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
            ]);

            $user_id  = $request->user_id;
            $cart     =  Cart::with('product')->where('user_id',$user_id)->where('order_id',null)->get();
            if(empty($cart)){
                return response()->json([
                    'success'  => false,
                    'cart'     => 0,
                    'subtotal' => 0,
                    'message' => 'Cart is Empty', 
                    'code' => 400
                ], 400);
            }
            $subtotal = Cart::where('user_id',$user_id)->where('order_id',null)->sum('amount');
            
            return response()->json([
                'success'  => true,
                'cart'     => $cart,
                'subtotal' => $subtotal,
                'message' => 'Success', 
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

    public function singleAddToCart(Request $request){
        
        $request->validate([
            'slug'      =>  'required',
            'quant'      =>  'required',
        ]);

        $product = Product::where('slug', $request->slug)->first();
        if($product->stock <$request->quant[1]){
            return back()->with('error','Out of stock, You can add other products.');
        }
        if ( ($request->quant[1] < 1) || empty($product) ) {
            request()->session()->flash('error','Invalid Products');
            return back();
        }    

        $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id',null)->where('product_id', $product->id)->first();

        // return $already_cart;

        if($already_cart) {
            $already_cart->quantity = $already_cart->quantity + $request->quant[1];
            // $already_cart->price = ($product->price * $request->quant[1]) + $already_cart->price ;
            $already_cart->amount = ($product->price * $request->quant[1])+ $already_cart->amount;

            if ($already_cart->product->stock < $already_cart->quantity || $already_cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');

            $already_cart->save();
            
        }else{
            
            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->product_id = $product->id;
            $cart->price = ($product->price-($product->price*$product->discount)/100);
            $cart->quantity = $request->quant[1];
            $cart->amount=($product->price * $request->quant[1]);
            if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) return back()->with('error','Stock not sufficient!.');
            // return $cart;
            $cart->save();
        }
        request()->session()->flash('success','Product successfully added to cart.');
        return back();       
    } 
    
    public function cartDelete(Request $request){
        try {
            
            $validated = $request->validate([
                'id' => 'required',
                'user_id' => 'required|exists:users,id',
            ]);

            $cart = Cart::find($request->id);
            
            if ($cart) {
                $cart->delete();
                $response_array =[
                    'success'  => true, 
                    'messages'=>"Cart successfully removed", 
                    'code'=>200
                ];
                return response()->json($response_array);
            }else{
                $response_array =[
                    'success'  => false, 
                    'messages'=>"Cart Invalid", 
                    'code'=>400
                ];
                return response()->json($response_array);
            }

        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'data' => null,
                'message' => $e->getMessage(), 
                'code' => 400
            ], 400);
        }  
        // request()->session()->flash('error','Error please try again');
        // return back();       
    }     

    public function cartUpdate(Request $request){

        if($request->quant){
            $error = array();
            $success = '';
            foreach ($request->quant as $k=>$quant) {
                $id = $request->qty_id[$k];
                $cart = Cart::find($id);
                if($quant > 0 && $cart) {
                    if($cart->product->stock < $quant){
                        request()->session()->flash('error','Out of stock');
                        return back();
                    }
                    $cart->quantity = ($cart->product->stock > $quant) ? $quant  : $cart->product->stock;
                    
                    if ($cart->product->stock <=0) continue;
                    $after_price=($cart->product->price-($cart->product->price*$cart->product->discount)/100);
                    $cart->amount = $after_price * $quant;
                    $cart->save();
                    $success = 'Cart successfully updated!';
                }else{
                    $error[] = 'Cart Invalid!';
                }
            }
            return back()->with($error)->with('success', $success);
        }else{
            return back()->with('Cart Invalid!');
        }    
    }

    public function checkout(Request $request){
        return view('frontend.pages.checkout');
    }
}
