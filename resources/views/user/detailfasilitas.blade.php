<!DOCTYPE HTML>
<html>
<head>
    <x-userhead></x-userhead>
    <header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(/assets/img/mer.jpg)">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center">
                    <div class="row row-mt-15em">
                        <div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
                            <h1>Detail Fasilitas</h1>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
<body>
    <nav>
        <x-usernav></x-usernav>
    </nav>

    <div class="container">
        <div class="gtco-section">
            <div class="gtco-container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                        <h2>{{ $fasilitas->nama_fasilitas }}</h2>
                        <p>{{ ucfirst($fasilitas->jenis) }}</p>
                    </div>
                </div>

                <div class="row">
                    <!-- Peta -->
                    <div class="col-md-6">
                        <h5 class="text-center">Peta Lokasi</h5>
                        <div id="map" style="height: 400px;"></div>
                    </div>

                    <!-- Fasilitas Details -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Deskripsi</h5>
                                <p class="card-text">{{ $fasilitas->deskripsi }}</p>

                                <h5 class="card-title">Lokasi</h5>
                                <p class="card-text">{{ $fasilitas->lokasi }}</p>

                                <h5 class="card-title">Koordinat</h5>
                                <p class="card-text">
                                    Latitude: {{ $fasilitas->latitude }}<br>
                                    Longitude: {{ $fasilitas->longitude }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div> <!-- End of Row for Details -->

                <div class="row mt-4">
                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <!-- Tombol Traveloka (Tiket ke Bengkulu) dengan gaya yang sama seperti tombol Kembali -->
                            <a href="https://www.traveloka.com/id-id/hotel" class="btn btn-secondary ml-2" target="_blank">
                                Beli Tiket
                            </a>
                </div>
            </div>
            <x-userfoot></x-userfoot>
        </div>
    </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([{{ $fasilitas->latitude }}, {{ $fasilitas->longitude }}], 15);

        // Tambahkan layer OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        // Tambahkan marker
        var marker = L.marker([{{ $fasilitas->latitude }}, {{ $fasilitas->longitude }}]).addTo(map);
        marker.bindPopup("<b>{{ $fasilitas->nama_fasilitas }}</b>").openPopup();
    </script>
</body>
</html>