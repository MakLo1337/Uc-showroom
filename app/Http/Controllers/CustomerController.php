<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $custData = Customer::paginate(15);
        return view('customer', compact('custData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.createcustomer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $data = Customer::create([
            'Name' => $request->name,
            'Address' => $request->address,
            'PhoneNumber' => $request->phoneNumber,
            'IDCard' => $request->idCard,
        ]);

        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $custData = Customer::findOrFail($id);
        return view('forms.editcustomer', compact('custData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, $id)
    {
        Customer::findOrFail($id)->update([
            'Name' => $request->name,
            'Address' => $request->address,
            'PhoneNumber' => $request->phoneNumber,
            'IDCard' => $request->idCard,
        ]);
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Customer::findOrFail($id)->delete();
        
        return redirect()->route('customer.index');
    }
}
