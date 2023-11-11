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
            <h1> Welcome to UC Showroom Apps</h1>
            <div class="card">
              <div class="card-header">
                Icons
              </div>
              <div class="card-body text-center">
                <a href="{{ route('vehicle.index') }}"><i class="bi bi-car-front-fill"></i>  Vehicle</a>
                <a href="{{ route('customer.index') }}"><i class="bi bi-person-fill"></i>  Customer</a>
            </div>
            </div>
        </main>
    </div>
</body>
</html>