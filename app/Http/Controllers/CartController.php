<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd(Cart::content());
        return view('front-end.cart.index');
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


        // $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {

        //     return $cartItem->id ===  $request->id;
        // });

        // if ($duplicates->isNotEmpty()) {
        //     return redirect()->route('cart.index')->with('success', 'Item is already in your cart!');
        // }

        Cart::add($request->id,  $request->name, 1, $request->price)->associate('App\Models\Product');
        return redirect()->route('cart.index')->with('success', 'Successfully added to cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id, $incrment = null)
    // {


    //     // if ($incrment) {
    //     $product = Cart::get($id);
    //     $qty     = $product->qty + 1;

    //     Cart::update($id,  $qty);
    //     return back()->with('success', 'Cart updated!');
    //     // }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success', 'Item has been remove from cart!');
    }

    public function itemIncrement(Request $request, $id)
    {

        $product = Cart::get($id);
        $qty     = $product->qty + 1;

        // Cart::update($id,  $request->quantity);
        Cart::update($id,  $qty);
        return back()->with('success', 'Cart updated!');
    }

    public function itemDecrement($id)
    {

        $product = Cart::get($id);
        $qty     = $product->qty - 1;
        Cart::update($id,  $qty);
        return back()->with('success', 'Cart updated!');
    }
}