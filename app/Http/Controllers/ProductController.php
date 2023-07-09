<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Hardevine\ShoppingCart\Facades\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function productCart()
    {
        $cartItems = Cart::content();
        return view('cart', compact('cartItems'));
    }

    public function addProducttoCart($id)
    {
        $product = Product::findOrFail($id);
        Cart::add($product->id, $product->name, 1, $product->price, ['description' => $product->description]);
        return redirect()->route('shopping.cart')->with('success', 'Product has been added to the cart!');
    }

    public function updateCart(Request $request)
    {
        $rowId = $request->rowId;
        $quantity = $request->quantity;
        Cart::update($rowId, $quantity);
        return redirect()->route('shopping.cart')->with('success', 'Cart has been updated successfully!');
    }

    public function deleteProduct(Request $request)
    {
        $rowId = $request->rowId;
        Cart::remove($rowId);
        return redirect()->route('shopping.cart')->with('success', 'Product has been removed from the cart!');
    }
}
