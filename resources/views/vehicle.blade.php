<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <title>{{ config('app.name', 'Laravel') }}</title>
  
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  
    <style type="text/css">
        i{
            font-size: 50px;
        }
    </style>
</head>
<body>
    <div id="app">
  
        <main class="container">
            <a class="button" href="/">Home</a>
            <br>
            <h1> Welcome to UC Showroom Apps</h1>
            <br>
            <a class="button" href="{{ route("vehicle.create") }}">Create</a>
            <br>
            <h1> Mobil </h1>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Model</th>
                    <th scope="col">Year</th>
                    <th scope="col">Passanger Amount</th>
                    <th scope="col">Manufacture</th>
                    <th scope="col">Price</th>
                    <th scope="col">Fuel Type</th>
                    <th scope="col">Trunk Space</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($car_data as $cars)
                <tr>
                    <td><img src="{{ url('/storage/' . $cars->VehicleImage) }}" alt="vehicleimage" class="image-list"></td>
                    <td>{{ $cars->Model }}</td>
                    <td>{{ $cars->Year }}</td>
                    <td>{{ $cars->PassangerAmount }}</td>
                    <td>{{ $cars->Manufacture }}</td>
                    <td>{{ $cars->Price }}</td>
                    <td>{{ $cars->FuelType }}</td>
                    <td>{{ $cars->TrunkSpace }}</td>
                    <td>
                        <a href="{{ route('vehicle.edit', $cars->id) }}" style="button button-primary">Edit</a> 
                        <a href="{{ route('vehicle.delete', $cars->id) }}" style="button button-primary">Delete</a> 
                    </td>
                  </tr>
                @empty
                <tr>
                    <td colspan="3">Belum Ada Data Mobil.</td>
                </tr>
                @endforelse
                </tbody>
              </table>
              {!! $car_data->withQueryString()->links('pagination::bootstrap-5') !!}
              <br>
            <br>
            <br>
            <h1> Truk </h1>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Model</th>
                    <th scope="col">Year</th>
                    <th scope="col">Passanger Amount</th>
                    <th scope="col">Manufacture</th>
                    <th scope="col">Price</th>
                    <th scope="col">Tire Amount</th>
                    <th scope="col">Cargo Space</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($truck_data as $trucks)
                <tr>
                    <td><img src="{{ url('/storage/' . $trucks->VehicleImage) }}" alt="" class="image-list"></td>
                    <td>{{ $trucks->Model }}</td>
                    <td>{{ $trucks->Year }}</td>
                    <td>{{ $trucks->PassangerAmount }}</td>
                    <td>{{ $trucks->Manufacture }}</td>
                    <td>{{ $trucks->Price }}</td>
                    <td>{{ $trucks->TireAmount }}</td>
                    <td>{{ $trucks->CargoSpace }}</td>
                    <td>
                        <a href="{{ route('vehicle.edit', $trucks->id) }}" style="button button-primary">Edit</a> 
                        <a href="{{ route('vehicle.delete', $trucks->id) }}" style="button button-primary">Delete</a> 
                    </td>
                  </tr>
                @empty
                <tr>
                    <td colspan="3">Belum Ada Data Truck.</td>
                </tr>
                @endforelse
                </tbody>
              </table>
              {!! $truck_data->withQueryString()->links('pagination::bootstrap-5') !!}
              <br>
            <br>
            <br>
            <h1> Sepeda Motor </h1>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Model</th>
                    <th scope="col">Year</th>
                    <th scope="col">Passanger Amount</th>
                    <th scope="col">Manufacture</th>
                    <th scope="col">Price</th>
                    <th scope="col">Baggage Space</th>
                    <th scope="col">Fuel Capacity</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($motorcycle_data as $motorcycles)
                <tr>
                    <td><img src="{{ url('/storage/' . $motorcycles->VehicleImage) }}" alt="" class="image-list"></td>
                    <td>{{ $motorcycles->Model }}</td>
                    <td>{{ $motorcycles->Year }}</td>
                    <td>{{ $motorcycles->PassangerAmount }}</td>
                    <td>{{ $motorcycles->Manufacture }}</td>
                    <td>{{ $motorcycles->Price }}</td>
                    <td>{{ $motorcycles->BaggageSpace }}</td>
                    <td>{{ $motorcycles->FuelCapacity }}</td>
                    <td>
                        <a href="{{ route('vehicle.edit', $motorcycles->id) }}" style="button button-primary">Edit</a> 
                        <a href="{{ route('vehicle.delete', $motorcycles->id) }}" style="button button-primary">Delete</a> 
                    </td>
                  </tr>
                @empty
                <tr>
                    <td colspan="3">Belum Ada Data Sepeda Motor.</td>
                </tr>
                @endforelse
                </tbody>
              </table>
              {!! $motorcycle_data->withQueryString()->links('pagination::bootstrap-5') !!}
              
        </main>
    </div>
</body>
</html>