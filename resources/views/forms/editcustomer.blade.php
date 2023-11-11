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
            <a href="{{route('customer.index')}}">Kembali</a>
            <br>
            <h1> Buat Data Customer Baru </h1>
            <br>
            <div class="container">
                <form action="{{ route('customer.update', ['id' => $custData->id]) }}" method="POST" id="mainForm" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input class="form-control" type="text" placeholder="Nama" aria-label="name" name="name" value="{{$custData->Name}}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input class="form-control" type="text" placeholder="Alamat" aria-label="address" name="address" value="{{$custData->Address}}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Nomor Telepon</label>
                        <input class="form-control" type="number" placeholder="Nomor Telepon" aria-label="phoneNumber" name="phoneNumber" value="{{$custData->PhoneNumber}}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="idCard" class="form-label">Nomor KTP</label>
                        <input class="form-control" type="number" placeholder="Nomor KTP" aria-label="idCard" name="idCard" value="{{$custData->IDCard}}" required autofocus>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan Data Customer</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>