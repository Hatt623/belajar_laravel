<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        return view('order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $customer = Customer::all();
        return view('order.create', compact('product', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;
        //Nama yang di tabel          nama yang di form
        $order->id_product             = $request->id_product;
        $order->quantity               = $request->quantity;
        $order->order_date             = $request->order_date;
        $order->id_customer            = $request->id_customer;

        $order->save();

        return redirect()->route('order.index')->with('success', 'Data order berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $product = Product::all();
        $customer = Customer::all();

        return view('order.show', compact('order', 'product', 'customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $product = Product::all();
        $customer = Customer::all();

        return view('order.edit', compact('order', 'product', 'customer'));
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
        $order = Order::findOrFail($id);
        //Nama yang di tabel          nama yang di form
        $order->id_product             = $request->id_product;
        $order->quantity               = $request->quantity;
        $order->order_date             = $request->order_date;
        $order->id_customer            = $request->id_customer;

        $order->save();

        return redirect()->route('order.index')->with('success', 'Data order berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::FindOrFail($id)->delete();
        return redirect()->route('order.index')->with('success', 'Data order berhasil dihapus');
    }
}
