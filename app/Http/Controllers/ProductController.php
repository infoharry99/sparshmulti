<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::getAllProduct();
        return view('backend.product.index')->with('products',$products);
    }

    public function create()
    {
        $brand=Brand::get();
        $category=Category::where('is_parent',1)->get();
        // $category=Category::where('is_parent',1)->get();
        return view('backend.product.create')->with('categories',$category)->with('brands',$brand);
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'summary'=>'required',
            'description'=>'nullable',
            'sold_by' => 'nullable',
            'country' => 'nullable',
            'address_of_manufacture'=>'nullable',
            'name_of_address'=>'nullable',
            'photo'=>'required',
            'size'=>'nullable',
            'stock'=>"required|numeric",
            // 'cat_id'=>'required|exists:categories,id',
            // 'brand_id'=>'nullable|exists:brands,id',
            // 'child_cat_id'=>'nullable|exists:categories,id',
            'is_featured'=>'sometimes|in:1',
            'status'=>'required|in:active,inactive',
            'condition'=>'required',
            'price'=>'required|numeric',
            'discount'=>'nullable|numeric'
        ]);

        $data=$request->all();
        $slug=Str::slug($request->title);
        $count=Product::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $tenant = app('currentTenant');
        $data['tenant_id'] = $tenant->id;
        $data['slug']=$slug;
        $data['is_featured']=$request->input('is_featured',0);
        $size=$request->input('size');
        if($size){
            $data['size']=implode(',',$size);
        }
        else{
            $data['size']='';
        }
        if ($request->hasFile('photo')) {
            $photos = [];
            foreach ($request->file('photo') as $file) {
                $fileName = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path('frontend/product'), $fileName);
                $photos[] = 'frontend/product/' . $fileName;
            }
            $data['photo'] = json_encode($photos); 
        }
        
        $status = Product::create($data);
        if($status){
            request()->session()->flash('success','Product Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('product.index');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $brand = Brand::get();
        $product = Product::findOrFail($id);
        $category = Category::where('is_parent',1)->get();
        $items = Product::where('id',$id)->get();

        return view('backend.product.edit')->with('product',$product)
                    ->with('brands',$brand)
                    ->with('categories',$category)->with('items',$items);
    }

    public function update(Request $request, $id)
    {
        $product=Product::findOrFail($id);
        $this->validate($request,[
            'title'   => 'required',
            'summary' => 'required',
            'sold_by' => 'nullable',
            'country' => 'nullable',
            'address_of_manufacture'=>'nullable',
            'name_of_address'=>'nullable',
            'description'=>'nullable',
            'photo'=>'required',
            'size'=>'nullable',
            'stock'=>"required|numeric",
            'cat_id'=>'required|exists:categories,id',
            'child_cat_id'=>'nullable|exists:categories,id',
            'is_featured'=>'sometimes|in:1',
            'brand_id'=>'nullable|exists:brands,id',
            'status'=>'required|in:active,inactive',
            'condition'=>'required',
            'price'=>'required|numeric',
            'discount'=>'nullable|numeric'
        ]);
        
        $data=$request->all();
        $data['is_featured'] = $request->input('is_featured',0);
        $size = $request->input('size');
        if($size){
            $data['size']=implode(',',$size);
        }else{
            $data['size']='';
        }

        if ($request->hasFile('photo')) {
            $photos = [];
            foreach ($request->file('photo') as $file) {
                $fileName = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path('frontend/product'), $fileName);
                $photos[] = 'frontend/product/' . $fileName;
            }
            $data['photo'] = json_encode($photos); 
        }
        $status=$product->fill($data)->save();
        if($status){
            request()->session()->flash('success','Product Successfully updated');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $status=$product->delete();
        
        if($status){
            request()->session()->flash('success','Product successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting product');
        }
        return redirect()->route('product.index');
    }
}
