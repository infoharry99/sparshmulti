<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\PostTag;
use App\Models\PostCategory;
use App\Models\Post;
use App\Models\Cart;
use App\Models\Brand;
use App\User;
use Auth;
use Session;
use Newsletter;
use DB;
use Hash;
use Validator;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FrontendApiController extends Controller
{
  
    public static function sendOTPToMobile($mobile, $otp) {

        $provider = "msg91";
        $curl = curl_init();
        $postData = array(
            'flow_id' => "667d10c7d6fc0510782cf4a2",
             'sender' => "ANKMDI",
            'mobiles' => '91'.$mobile,
            'var' => $otp
        );

        curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.msg91.com/api/v5/flow/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($postData),
        CURLOPT_HTTPHEADER => [
            "authkey: 355384AHJeVIQIIwg603cd4ceP1",
            "content-type: application/JSON"
        ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return $err;
        } else {
            return $response;
        }
    }
    
    public function home(){


        $featured = Product::where('status','active')->where('is_featured',1)->orderBy('price','DESC')->get();
        $posts    = Post::where('status','active')->orderBy('id','DESC')->get();
        $banners  = Banner::where('status','active')->orderBy('id','DESC')->get();
        $products   = Product::where('status','active')->orderBy('id','DESC')->get();
        $categories = Category::where('status', 'active')->orderBy('title', 'ASC')->get();
      
        $categoryTree = [];
        $categoryMap = [];

        foreach ($categories as $category) {
            $categoryMap[$category->id] = [
                'id'       => $category->id,
                'title'    => $category->title,
                'slug'     => $category->slug,
                'summary'  => $category->summary,
                'image'  => $category->photo,
                'children' => []
            ];
        }

        foreach ($categories as $category) {
            if ($category->is_parent == 1 || $category->parent_id == null) {
                $categoryTree[$category->id] = &$categoryMap[$category->id];
            } else {
                if (isset($categoryMap[$category->parent_id])) {
                    $categoryMap[$category->parent_id]['children'][] = &$categoryMap[$category->id];
                }
            }
        }

        $categoryTree = array_values($categoryTree);
        
        $response_array =[
            'success'  => true, 
            'featured' => $featured ?? NULL,
            'posts'    => $posts?? NULL,
            'banners'  => $banners?? NULL,
            'products' => $products?? NULL,
            'category' => $categoryTree?? NULL,
            'messages' => "Success", 
            'code'     => 200
        ];

        return response()->json($response_array);
    }   

    public function aboutUs(){
        return view('frontend.pages.about-us');
    }

    public function contact(){
        return view('frontend.pages.contact');
    }

    public function productDetail($slug){

        $product_detail= Product::getProductBySlug($slug);
        $response_array =[
            'success'  => true, 
            'product_detail' => $product_detail ?? NULL,
            'messages'=>"Success", 
            'code'=>200
        ];
        return response()->json($response_array);
    }

    public function productGrids(){
        $products=Product::query();
        
        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            $cat_ids=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            $products->whereIn('cat_id',$cat_ids);
        }
        if(!empty($_GET['brand'])){
            $slugs=explode(',',$_GET['brand']);
            $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
            return $brand_ids;
            $products->whereIn('brand_id',$brand_ids);
        }
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='title'){
                $products=$products->where('status','active')->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='price'){
                $products=$products->orderBy('price','ASC');
            }
        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);
            // return $price;
            // if(isset($price[0]) && is_numeric($price[0])) $price[0]=floor(Helper::base_amount($price[0]));
            // if(isset($price[1]) && is_numeric($price[1])) $price[1]=ceil(Helper::base_amount($price[1]));
            
            $products->whereBetween('price',$price);
        }

        $recent_products=Product::where('status','active')->orderBy('id','DESC')->get();
        // Sort by number
        if(!empty($_GET['show'])){
            $products=$products->where('status','active')->paginate($_GET['show']);
        }
        else{
            $products=$products->where('status','active')->paginate(9);
        }
        // Sort by name , price, category
        $response_array =[
            'success'  => true, 
            'products' => $products ?? NULL,
            'recent_products' => $recent_products ?? NULL,
            'messages'=>"Success", 
            'code'=>200
        ];
        return response()->json($response_array);
      
        return view('frontend.pages.product-grids')->with('products',$products)->with('recent_products',$recent_products);
    }

    public function productLists(){
        
        $products=Product::query();
        
        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            $cat_ids=Category::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            $products->whereIn('cat_id',$cat_ids)->paginate;
        }
        if(!empty($_GET['brand'])){
            $slugs=explode(',',$_GET['brand']);
            $brand_ids=Brand::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
            return $brand_ids;
            $products->whereIn('brand_id',$brand_ids);
        }
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='title'){
                $products=$products->where('status','active')->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='price'){
                $products=$products->orderBy('price','ASC');
            }
        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);
            $products->whereBetween('price',$price);
        }

        $recent_products=Product::where('status','active')->orderBy('id','DESC')->get();

        // Sort by number
        if(!empty($_GET['show'])){
            $products=$products->where('status','active')->paginate($_GET['show']);
        }else{
            $products=$products->where('status','active')->paginate(6);
        }

        return view('frontend.pages.product-lists')->with('products',$products)->with('recent_products',$recent_products);
    }
    
    public function productFilter(Request $request){

            $data= $request->all();
            $showURL="";
            if(!empty($data['show'])){
                $showURL .='&show='.$data['show'];
            }

            $sortByURL='';
            if(!empty($data['sortBy'])){
                $sortByURL .='&sortBy='.$data['sortBy'];
            }

            $catURL="";
            if(!empty($data['category'])){
                foreach($data['category'] as $category){
                    if(empty($catURL)){
                        $catURL .='&category='.$category;
                    }
                    else{
                        $catURL .=','.$category;
                    }
                }
            }

            $brandURL="";
            if(!empty($data['brand'])){
                foreach($data['brand'] as $brand){
                    if(empty($brandURL)){
                        $brandURL .='&brand='.$brand;
                    }
                    else{
                        $brandURL .=','.$brand;
                    }
                }
            }
            // return $brandURL;

            $priceRangeURL="";
            if(!empty($data['price_range'])){
                $priceRangeURL .='&price='.$data['price_range'];
            }
            if(request()->is('e-shop.loc/product-grids')){
                return redirect()->route('product-grids',$catURL.$brandURL.$priceRangeURL.$showURL.$sortByURL);
            }
            else{
                return redirect()->route('product-lists',$catURL.$brandURL.$priceRangeURL.$showURL.$sortByURL);
            }
    }

    public function productSearch(Request $request){

        $recent_products = Product::where('status','active')->orderBy('id','DESC')->get();
        $products = Product::orwhere('title','like','%'.$request->search.'%')
                    ->orwhere('slug','like','%'.$request->search.'%')
                    ->orwhere('description','like','%'.$request->search.'%')
                    ->orwhere('summary','like','%'.$request->search.'%')
                    ->orwhere('price','like','%'.$request->search.'%')
                    ->orderBy('id','DESC')
                    ->paginate('9');

        $response_array =[
            'success'  => true, 
            'products' => $products ?? NULL,
            'recent_products'    => $recent_products?? NULL,
            'messages'=>"Success", 
            'code'=>200
        ];
        return response()->json($response_array);
        // return view('frontend.pages.product-grids')->with('products',$products)->with('recent_products',$recent_products);
    }

    public function productBrand(Request $request){

        $products = Brand::getProductByBrand($request->slug);
        $recent_products = Product::where('status','active')->orderBy('id','DESC')->get();
        $response_array =[
            'success'  => true, 
            'products' => $products ?? NULL,
            'recent_products'    => $recent_products?? NULL,
            'messages'=>"Success", 
            'code'=>200
        ];
        return response()->json($response_array);

    }

    public function productCat(Request $request){

        $products = Category::getProductByCat($request->slug);
        $recent_products = Product::where('status','active')->orderBy('id','DESC')->get();
  
        $response_array =[
            'success'  => true, 
            'products' => $products ?? NULL,
            'recent_products'    => $recent_products?? NULL,
            'messages'=>"Success", 
            'code'=>200
        ];
        return response()->json($response_array);

    }

    public function productSubCat(Request $request){

        $products = Category::getProductBySubCat($request->sub_slug);
        $recent_products = Product::where('status','active')->orderBy('id','DESC')->get();

        $response_array =[
            'success'  => true, 
            'products' => $products ?? NULL,
            'recent_products'  => $recent_products ?? NULL,
            'messages'=>"Success", 
            'code'=>200
        ];
        return response()->json($response_array);
    }

    public function blog(){

        $post=Post::query();
        
        if(!empty($_GET['category'])){
            $slug=explode(',',$_GET['category']);
            $cat_ids=PostCategory::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            return $cat_ids;
            $post->whereIn('post_cat_id',$cat_ids);
        }
        if(!empty($_GET['tag'])){
            $slug=explode(',',$_GET['tag']);
            $tag_ids=PostTag::select('id')->whereIn('slug',$slug)->pluck('id')->toArray();
            $post->where('post_tag_id',$tag_ids);
        }

        if(!empty($_GET['show'])){
            $post=$post->where('status','active')->orderBy('id','DESC')->paginate($_GET['show']);
        }
        else{
            $post=$post->where('status','active')->orderBy('id','DESC')->paginate(9);
        }

        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->get();

        $response_array =[
            'success'  => true, 
            'recent_posts' => $rcnt_post ?? NULL,
            'posts'    => $post ?? NULL,
            'messages'=>"Success", 
            'code'=>200
        ];
        return response()->json($response_array);
    }

    public function blogDetail($slug){
        $post=Post::getPostBySlug($slug);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->get();
        // return $post;
        $response_array =[
            'success'  => true, 
            'posts' => $post ?? NULL,
            'recent_posts'    => $rcnt_post?? NULL,
            'messages'=>"Success", 
            'code'=>200
        ];
        return response()->json($response_array);
        return view('frontend.pages.blog-detail')->with('post',$post)->with('recent_posts',$rcnt_post);
    }

    public function blogSearch(Request $request){

        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->get();
        $posts=Post::orwhere('title','like','%'.$request->search.'%')
            ->orwhere('quote','like','%'.$request->search.'%')
            ->orwhere('summary','like','%'.$request->search.'%')
            ->orwhere('description','like','%'.$request->search.'%')
            ->orwhere('slug','like','%'.$request->search.'%')
            ->orderBy('id','DESC')
            ->paginate(8);

        $response_array =[
            'success'  => true, 
            'posts' => $posts ?? NULL,
            'recent_posts'    => $rcnt_post?? NULL,
            'messages'=>"Success", 
            'code'=>200
        ];
        return response()->json($response_array);
        return view('frontend.pages.blog')->with('posts',$posts)->with('recent_posts',$rcnt_post);
    }

    public function blogFilter(Request $request){
        $data=$request->all();
        $catURL="";
        if(!empty($data['category'])){
            foreach($data['category'] as $category){
                if(empty($catURL)){
                    $catURL .='&category='.$category;
                }
                else{
                    $catURL .=','.$category;
                }
            }
        }

        $tagURL="";
        if(!empty($data['tag'])){
            foreach($data['tag'] as $tag){
                if(empty($tagURL)){
                    $tagURL .='&tag='.$tag;
                }
                else{
                    $tagURL .=','.$tag;
                }
            }
        }
        return redirect()->route('blog',$catURL.$tagURL);
    }

    public function blogByCategory(Request $request){
        
        $post=PostCategory::getBlogByCategory($request->slug);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->get();

        $response_array =[
            'success'  => true, 
            'posts' => $post->post ?? NULL,
            'recent_posts'    => $rcnt_post?? NULL,
            'messages'=>"Success", 
            'code'=>200
        ];
        return response()->json($response_array);
        return view('frontend.pages.blog')->with('posts',$post->post)->with('recent_posts',$rcnt_post);
    }

    public function blogByTag(Request $request){

        $post=Post::getBlogByTag($request->slug);
        $rcnt_post=Post::where('status','active')->orderBy('id','DESC')->get();
        $response_array =[
            'success'  => true, 
            'posts' => $post ?? NULL,
            'recent_posts'    => $rcnt_post?? NULL,
            'messages'=>"Success", 
            'code'=>200
        ];
        return response()->json($response_array);
        return view('frontend.pages.blog')->with('posts',$post)->with('recent_posts',$rcnt_post);
    
    }

    // Login
    public function sociallogin(Request $request){
        try {

            $validated = $request->validate([
                'name' => 'string|required|min:2',
                'email' => 'email|required',
                'provider'=> 'required',
            ]);

            $user = User::select('*')->where('email','=',$request['email'])->first();
            if(!empty($user)){
                
                return response()->json([
                    'success' => true, 
                    'data'    => $user,
                    'message' => "User Login Successfully", 
                    'code' => 200
                ], 200);
                return response()->json($response_array);

            }else{

                $data = $request->all();
                $data['password'] = "Test@123";
                $check = $this->create($data);

                return response()->json([
                    'success' => true, 
                    'data' => $check,
                    'message' => "User Registered Successfully", 
                    'code' => 200
                ], 200);
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
    }

    public function sendotp(Request $request){

        try {
            
            $validated = $request->validate([
                'mobileNumber' => 'required|exists:users,mobile',
            ]);

            $user_details = User::where('mobile' , $request->mobileNumber)->first();
            if(!$user_details) {
                $response_array = array(
                    'success'=> false,
                    'messsage' => 'User Not exists or already Activated'
                );
                return response()->json($response_array, 200);
            }
            $random_otp = mt_rand(1000, 9999);
            $random_otp = "1234";
            $otpSend    = $this->sendOTPToMobile($user_details->mobile, $random_otp);
            $user_details->otp = $random_otp;
            $user_details->save();

            $response_array = array(
                'success' => true,
                'msg'  => "Otp Sent Successfully",
                'code' =>  200,
            );
            return response()->json($response_array, 200);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false, 
                'data' => null,
                'message' => $e->getMessage(), 
                'code' => 400
            ], 400);
        }
        
    }

    public function otplogin(Request $request){
        try {
            
            $validated = $request->validate([
                'mobileNumber' => 'required|exists:users,mobile',
                'otp'          => 'required|exists:users,otp',
            ]);

            $user_details = User::where('mobile' , $request->mobileNumber)->where('otp',$request->otp)->first();

            if(!$user_details) {

                $response_array = array(
                    'success'  => false,
                    'messsage' => 'Invalid OTP',
                    "code"     => 400
                );
                return response()->json($response_array, 200);
            }
            $response_array = array(
                'success'=> true,
                'data'=> $user_details,
                'messsage' => 'OTP Verify',
                "code" => 200
            );

             return response()->json($response_array, 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'data' => null,
                'message' => $e->getMessage(), 
                'code' => 400
            ], 400);
        }
        
    }

    public function loginSubmit(Request $request){
        try {
            
            $validated = $request->validate([
                'email' => 'email|required|exists:users,email',
                'password' => 'required',
            ]);
            $data= $request->all();
            if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'status'=>'active'])){

                $user  = User::select('*')->where('email','=',$data['email'])->first();
                $response_array =[
                    'success'=>true, 
                    'data'=>$user,
                    'messages'=>"Login Successfully", 
                    'code'=>200
                ];
                return response()->json($response_array);
            }else{
                $response_array =[
                    'success'=>false, 
                    'data'=>null,
                    'messages'=>"Invalid email and password pleas try again!", 
                    'code'=>500
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
    }

    public function logout(){
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success','Logout successfully');
        return back();
    }

    public function register(){
        return view('frontend.pages.register');
    }

    public function registerSubmit(Request $request){
        try {

            $validated = $request->validate([
                'name' => 'string|required|min:2',
                'email' => 'string|required|unique:users,email',
                'mobile' => 'required',
                'password' => 'required|min:6',
                'provider'=> 'required',
            ]);
            
            $data = $request->all();
            $check = $this->create($data);
    
            return response()->json([
                'success' => true, 
                'data' => $check,
                'message' => "User Registered Successfully", 
                'code' => 201
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'data' => null,
                'message' => $e->getMessage(), 
                'code' => 400
            ], 400);
        }
    }
  
    public function create(array $data){
        return User::create([
            'name'  => $data['name'],
            'email' => $data['email'],
            'mobile'=> $data['mobile']?? null,
            'password' => Hash::make($data['password']),
            'status'   => 'active'
            ]);
    }

    // Reset password
    public function showResetForm(){
        return view('auth.passwords.old-reset');
    }

    public function subscribe(Request $request){
        if(! Newsletter::isSubscribed($request->email)){
                Newsletter::subscribePending($request->email);
                if(Newsletter::lastActionSucceeded()){
                    request()->session()->flash('success','Subscribed! Please check your email');
                    return redirect()->route('home');
                }
                else{
                    Newsletter::getLastError();
                    return back()->with('error','Something went wrong! please try again');
                }
            }
            else{
                request()->session()->flash('error','Already Subscribed');
                return back();
            }
    }
    
}
