<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Vehicle;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $orderData = Order::where('customer_id', $id)->paginate(15);
        $custId = $id;
        return view('order', compact('orderData', 'custId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $vehicleData = Vehicle::all();
        $custId = $id;
        return view('forms.createorder', compact('vehicleData','id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request, $id)
    {
        $data = Order::create([
            'customer_id' => $id,
            'vehicle_id' => $request->selected_value
        ]);

        return redirect()->route('order.index', ['id' => $id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehicleData = Vehicle::all();
        $orderData = Order::findOrFail($id);
        return view('forms.editorder', compact('vehicleData', 'orderData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, $id)
    {
        $custId = Order::findOrFail($id)->Customer->id;
        Order::findOrFail($id)->update([
            'vehicle_id' => $request->selected_value,
        ]);
        return redirect()->route('order.index', ['id' => $custId]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($orderId)
    {
        $custId = Order::findOrFail($orderId)->customer_id;
        Order::findOrFail($orderId)->delete();
        return redirect()->route('order.index', ['id' => $custId]);
    }
}
