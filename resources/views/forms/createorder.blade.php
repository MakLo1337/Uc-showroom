<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
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
            <br>
            <a href="{{ url()->previous() }}">Kembali</a>
            <br>
            <h1> Buat Pesanan Kendaraan </h1>
            <br>
            <form action="{{ route('order.store', ['id' => $id]) }}" method="POST" id="mainForm" enctype="multipart/form-data">
                @csrf
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <label for="searchDropdown">Search Dropdown:</label>
                        <select id="searchDropdown" class="form-control" name="selected_value" required>
                            <option value="">Pilih Item</option>
                            @forelse ($vehicleData as $vehicles)
                            <option value="{{ $vehicles->id }}">{{ $vehicles->Model }} | {{ $vehicles->Type }} | Rp.{{$vehicles->Price}}</option>
                            @empty
                            <option value="">Tidak Ada Data</option>   
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Buat Data Customer</button>
            </form>
    </div>
</body>
</html>