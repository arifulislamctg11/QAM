<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index()
   {
      $products = Product::all();
      return view('products.products')->with('products', $products);
   }


   public function delete($id)
   {
      $product = Product::find($id);
      $product->delete();
      return redirect('products');
   }



   public function productupdate(Request $request, $id)
   {
      $product = Product::find($id);
      $product->product_name = $request->input('product_name');
      // $user->role = $request->input('role');
      $product->description = $request->input('description');
      $product->product_type = $request->input('product_type');
      $product->price = $request->input('price');
      $product->condition = $request->input('condition');
      $product->update();
      return redirect('products')->with('status', 'Product has been updated successfully !');
   }



   public function productedit($id)
   {
      $product = Product::findOrFail($id);
      return view('products.productedit')->with('product', $product);
   }


   public function addproduct()
   {
      // dd("its workingn !");
      return view('products.addproduct');
   }
}
