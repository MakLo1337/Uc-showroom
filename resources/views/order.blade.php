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
            <a class="button" href="{{ route('customer.index')}}">Kembali</a>
            <br>
            <h1> Welcome to UC Showroom Apps</h1>
            <br>
            <a class="button" href="{{ route("order.create", ['id'=>$custId]) }}">Create</a>
            <br>
            <h1> Order </h1>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Kendaraan Dipesan</th>
                    <th scope="col">Harga Kendaraan</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($orderData as $order)
                <tr>
                    <td>{{ $order->Customer->Name }}</td>
                    <td>{{ $order->Vehicle->Model }} | {{ $order->Vehicle->Type }}</td>
                    <td>{{ $order->Vehicle->Price}}</td>
                    <td>
                        <a href="{{ route('order.edit', ['id' => $order->id]) }}" style="button button-danger">Edit</a>
                        <a href="{{ route('order.delete', ['orderId' => $order->id]) }}" style="button button-danger">Delete</a>  
                    </td>

                  </tr>
                @empty
                <tr>
                    <td colspan="3">Belum Ada Data Order.</td>
                </tr>
                @endforelse
                </tbody>
              </table>
              {!! $orderData->withQueryString()->links('pagination::bootstrap-5') !!}
              <br>
        </main>
    </div>
</body>
</html>