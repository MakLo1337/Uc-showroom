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
            <a class="button" href="{{ route("customer.create") }}">Create</a>
            <br>
            <h1> Customer </h1>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Nomor KTP</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @forelse ($custData as $cust)
                <tr>
                    <td>{{ $cust->Name }}</td>
                    <td>{{ $cust->Address }}</td>
                    <td>{{ $cust->PhoneNumber }}</td>
                    <td>{{ $cust->IDCard }}</td>
                    <td>
                        <a href="{{ route('order.index', $cust->id) }}" style="button button-primary">Order List</a>
                        <a href="{{ route('customer.edit', $cust->id) }}" style="button button-primary">Edit</a> 
                        <a href="{{ route('customer.delete', $cust->id) }}" style="button button-primary">Delete</a> 
                    </td>

                  </tr>
                @empty
                <tr>
                    <td colspan="3">Belum Ada Data Mobil.</td>
                </tr>
                @endforelse
                </tbody>
              </table>
              {!! $custData->withQueryString()->links('pagination::bootstrap-5') !!}
              <br>
        </main>
    </div>
</body>
</html>