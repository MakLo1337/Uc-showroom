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
        .image-list {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 150px;
        }
    </style>
</head>
<body>
    <div id="app">
  
        <main class="container">
            <br>
            <a href="{{route('vehicle.index')}}">Kembali</a>
            <br>
            <h1> Ubah Data Kendaraan </h1>
            <br>
            <div class="container">
                <form action="{{ route('vehicle.update', $vehicleData->id) }}" method="POST" id="mainForm" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="vehicleImage" class="form-label">Foto Kendaraan</label>
                        <input class="form-control" type="file" id="vehicleImage" name="vehicleImage" accept="image/png, image/jpeg">
                        <img src="{{ url('/storage/' . $vehicleData->VehicleImage) }}" alt="" class="image-list">
                    </div>
                    <div class="mb-3">
                        <label for="model" class="form-label">Model</label>
                        <input class="form-control" type="text" placeholder="Nama Model" aria-label="model" name="model" value="{{$vehicleData->Model}}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Tahun</label>
                        <input class="form-control" type="number" placeholder="Tahun Kendaraan" aria-label="year" name="year" value="{{$vehicleData->Year}}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="passangerAmount" class="form-label">Kapasistas Penumpang</label>
                        <input class="form-control" type="number" placeholder="Kapasitas" aria-label="passangerAmount" name="passangerAmount" value="{{$vehicleData->PassangerAmount}}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="manufacture" class="form-label">Manufaktur</label>
                        <input class="form-control" type="text" placeholder="Manufaktur" aria-label="manufacture" name="manufacture" value="{{$vehicleData->Manufacture}}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input class="form-control" type="number" placeholder="Harga" aria-label="price" name="price" value="{{$vehicleData->Price}}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="selectForm" class="form-label">Pilih Jenis Kendaraan</label>
                        <select class="form-select" id="selectForm" name="selected_value" required>
                            <option value="">Jenis Kendaraan</option>
                            <option value="Car" {{ $vehicleData->Type == "Car" ? 'selected' : "" }}>Mobil</option>
                            <option value="Truck" {{ $vehicleData->Type == "Truck" ? 'selected' : "" }}>Truk</option>
                            <option value="Motorcycle" {{ $vehicleData->Type == "Motorcycle" ? 'selected' : "" }}>Sepeda Motor</option>
                        </select>
                    </div>
        
                    <!-- Bagian yang akan ditampilkan atau disembunyikan -->
                    <div id="form1">
                        <h2>Mobil</h2>
                        <!-- Tambahkan elemen-elemen form 1 di sini -->
                        <div class="mb-3">
                            <label for="fuelType" class="form-label">Bahan Bakar</label>
                            <input class="form-control" type="text" placeholder="Bahan Bakar" aria-label="fuelType" name="fuelType" value="{{$vehicleData->FuelType}}" {{ $vehicleData->Type == "Car" ? 'required' : "" }} autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="trunkSpace" class="form-label">Kapasitas Bagasi (m<sup>2</sup>)</label>
                            <input class="form-control" type="number" placeholder="Kapasitas Bagasi (Cukup Tuliskan Angka)" aria-label="trunkSpace" name="trunkSpace" value="{{$vehicleData->TrunkSpace}}" {{ $vehicleData->Type == "Car" ? 'required' : "" }} autofocus>
                        </div>
                    </div>
        
                    <div id="form2">
                        <h2>Truk</h2>
                        <!-- Tambahkan elemen-elemen form 2 di sini -->
                        <div class="mb-3">
                            <label for="tireAmount" class="form-label">Jumlah Roda</label>
                            <input class="form-control" type="number" placeholder="Jumlah Roda" aria-label="tireAmount" name="tireAmount" value="{{$vehicleData->TireAmount}}" {{ $vehicleData->Type == "Truck" ? 'required' : "" }} autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="cargoSpace" class="form-label">Kapasitas Cargo (m<sup>2</sup>)</label>
                            <input class="form-control" type="number" placeholder="Kapasitas Cargo (Cukup Tuliskan Angka)" aria-label="cargoSpace" name="cargoSpace" value="{{$vehicleData->CargoSpace}}" {{ $vehicleData->Type == "Truck" ? 'required' : "" }} autofocus>
                        </div>
                    </div>

                    <div id="form3">
                        <h2>Sepeda Motor</h2>
                        <!-- Tambahkan elemen-elemen form 3 di sini -->
                        <div class="mb-3">
                            <label for="baggageSpace" class="form-label">Kapasitas Bagasi (m<sup>2</sup>)</label>
                            <input class="form-control" type="number" placeholder="Kapasitas Bagasi (Cukup Tuliskan Angka)" aria-label="baggageSpace" name="baggageSpace" value="{{$vehicleData->BaggageSpace}}" {{ $vehicleData->Type == "Motorcycle" ? 'required' : "" }} autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="fuelCapacity" class="form-label">Kapasitas Bensin (m<sup>3</sup>)</label>
                            <input class="form-control" type="number" placeholder="Kapasitas Bagasi (Cukup Tuliskan Angka)" aria-label="fuelCapacity" name="fuelCapacity" value="{{$vehicleData->FuelCapacity}}" {{ $vehicleData->Type == "Motorcycle" ? 'required' : "" }} autofocus>
                        </div>
                    </div>
        
                    <button type="submit" class="btn btn-primary">Simpan Data Kendaraan</button>
                </form>
            </div>
        
            <script>
                // Script untuk menampilkan atau menyembunyikan bagian form berdasarkan dropdown
                document.addEventListener('DOMContentLoaded', function () {
                    var selectForm = document.getElementById('selectForm');
                    var form1 = document.getElementById('form1');
                    var form2 = document.getElementById('form2');
                    var form3 = document.getElementById('form3');
            
                    // Sembunyikan semua form saat halaman dimuat
                    form1.style.display = (selectForm.value === 'Car') ? 'block' : 'none';
                    form2.style.display = (selectForm.value === 'Truck') ? 'block' : 'none';
                    form3.style.display = (selectForm.value === 'Motorcycle') ? 'block' : 'none';
            
                    // Tampilkan form yang sesuai dengan pilihan dropdown
                    selectForm.addEventListener('change', function () {
                        form1.style.display = (selectForm.value === 'Car') ? 'block' : 'none';
                        form2.style.display = (selectForm.value === 'Truck') ? 'block' : 'none';
                        form3.style.display = (selectForm.value === 'Motorcycle') ? 'block' : 'none';
                    });
                });
            </script>
        </main>
    </div>
</body>
</html>