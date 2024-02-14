<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::get();
        return view('product.index',['products'=>$products]);
    }
    public function create(){
        return view('product.create');
    }
    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,gif,jpg|max:1000'
        ]);

        //upload image
        $imagename = time() .'.'.$request->image->extension();
        $request->image->move(public_path('products'),$imagename);
        // dd($imagename);

        $product = new Product;
        $product->image = $imagename;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product Created.....!!');

    }
    public function edit($id){
        // dd($id);
        $product = Product::where('id',$id)->first();
        return view('product.edit',['product' => $product]);
    }
    public function update(Request $request ,$id){
        $request->validate([
            'name'=>'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,png,gif,jpg|max:1000'
        ]);
        $product = Product::where('id',$id)->first();

        if(isset($request->image)){
            //upload image
            $imagename = time() .'.'.$request->image->extension();
            $request->image->move(public_path('products'),$imagename);
            // dd($imagename);
            $product->image = $imagename;
        }


        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product updated.....!!');
    }
    public function destroy($id){
        $product = Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product deleted.....!!');
    }
    public function show($id){
        $product = Product::where('id',$id)->first();
        return view('product.show',['product' => $product]);
    }

}
