<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $car = Vehicle::where('Type', "Car")->paginate(5);
        $truck = Vehicle::where('Type', "Truck")->paginate(5);
        $motorcycle = Vehicle::where('Type', "Motorcycle")->paginate(5);

        return view('vehicle', [
            'car_data' => $car,
            'truck_data' => $truck,
            'motorcycle_data' => $motorcycle,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.createvehicle');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehicleRequest $request)
    {
        $this->validate($request, [
            'vehicleImage' => 'required|image|mimes:jpg,png,jpeg,jfif,pjp,pjpeg',
        ]);

        $vehicle_image_path = $request->file('vehicleImage')->store('Image', 'public');

        $vehicleType = $request->selected_value;

            $data = Vehicle::create([
                'Type' => $vehicleType,
                'Model' => $request->model,
                'Year' => $request->year,
                'PassangerAmount' => $request->passangerAmount,
                'Manufacture' => $request->manufacture,
                'Price' => $request->price,
                'FuelType' => $request->fuelType,
                'TrunkSpace' => $request->trunkSpace,
                'TireAmount' => $request->tireAmount,
                'CargoSpace' => $request->cargoSpace,
                'BaggageSpace' => $request->baggageSpace,
                'FuelCapacity' => $request->fuelCapacity,
                'VehicleImage' => $vehicle_image_path
            ]);

        return redirect()->route('vehicle.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehicleData = Vehicle::findOrFail($id);
        return view('forms.editvehicle', compact('vehicleData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehicleRequest $request, $id)
    {
        $vehicle_image_path = null;
        if($request->vehicleImage != null){
            $this->validate($request, [
                'vehicleImage' => 'required|image|mimes:jpg,png,jpeg,jfif,pjp,pjpeg',
            ]);
            $vehicle_image_path = $request->file('vehicleImage')->store('Image', 'public');
        }

        $vehicleType = $request->selected_value;

        if ($vehicle_image_path == "") {
            Vehicle::findOrFail($id)->update([
                'Type' => $vehicleType,
                'Model' => $request->model,
                'Year' => $request->year,
                'PassangerAmount' => $request->passangerAmount,
                'Manufacture' => $request->manufacture,
                'Price' => $request->price,
                'FuelType' => ($vehicleType == "Car" ? $request->fuelType : ""),
                'TrunkSpace' => ($vehicleType == "Car" ? $request->trunkSpace : 0),
                'TireAmount' => ($vehicleType == "Truck" ? $request->tireAmount : 0),
                'CargoSpace' => ($vehicleType == "Truck" ? $request->cargoSpace : 0),
                'BaggageSpace' => ($vehicleType == "Motorcycle" ? $request->baggageSpace : 0),
                'FuelCapacity' => ($vehicleType == "Motorcycle" ? $request->fuelCapacity : 0),
            ]);
        } else {
            Vehicle::findOrFail($id)->update([
                'Type' => $vehicleType,
                'Model' => $request->model,
                'Year' => $request->year,
                'PassangerAmount' => $request->passangerAmount,
                'Manufacture' => $request->manufacture,
                'Price' => $request->price,
                'FuelType' => ($vehicleType == "Car" ? $request->fuelType : ""),
                'TrunkSpace' => ($vehicleType == "Car" ? $request->trunkSpace : 0),
                'TireAmount' => ($vehicleType == "Truck" ? $request->tireAmount : 0),
                'CargoSpace' => ($vehicleType == "Truck" ? $request->cargoSpace : 0),
                'BaggageSpace' => ($vehicleType == "Motorcycle" ? $request->baggageSpace : 0),
                'FuelCapacity' => ($vehicleType == "Motorcycle" ? $request->fuelCapacity : 0),
                'VehicleImage' => $vehicle_image_path,
            ]);
        }


        return redirect()->route('vehicle.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Vehicle::findOrFail($id)->delete();
        return redirect()->route('vehicle.index');
    }
}
