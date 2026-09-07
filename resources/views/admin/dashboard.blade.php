<!DOCTYPE html>
<html lang="en">

<head>
    <x-header></x-header>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <x-navbar></x-navbar>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <x-topbar></x-topbar>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="window.print()">
                            <i class="fas fa-print fa-sm text-white-50"></i> Print
                        </button>
                    </div>

                    <!-- Content Row untuk Card Statistik -->
                    <div class="row">
                        <!-- Card Jumlah Data (Total) -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah Data (Total)
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalData }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Jumlah Pariwisata -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Jumlah Pariwisata (Data)
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahPariwisata }} Wisata</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Jumlah Fasilitas -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Fasilitas (Data)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlahFasilitas }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="row mt-4">
                            <!-- Grafik Statistik Data (Atas) -->
                            <div class="col-12 mb-4">
                                <div class="card shadow h-100">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Grafik Statistik Data</h6>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="chartData" style="height: 20px; width: 10%;"></canvas>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Daftar Pesan (Bawah) -->
                            <div class="col-12 mb-4">
                                <div class="card shadow h-100">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Daftar Pesan</h6>
                                    </div>
                                    <div class="card-body">
                                        @if(session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Pesan</th>
                                                        <th>Waktu</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="messagesTable">
                                                    <!-- Pesan akan dimuat di sini -->
                                                </tbody>
                                            </table>
                                        </div>
                                        <button class="btn btn-info btn-block mt-3" onclick="fetchMessages()">Refresh Pesan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <x-footer></x-footer>
</footer>
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
<!-- Page level plugins -->
<script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
    
<!-- Page level custom scripts -->
<script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>
    var ctx = document.getElementById('chartData').getContext('2d');
    var chartData = new Chart(ctx, {
        type: 'bar', // Pilihan tipe grafik: bar, line, pie, dll.
        data: {
            labels: ['Pariwisata', 'Fasilitas'], // Label kategori data
            datasets: [{
                data: [
                    @if(isset($jumlahPariwisata) && isset($jumlahFasilitas))
                        {{ $jumlahPariwisata }}, {{ $jumlahFasilitas }}
                    @else
                        0, 0  // Nilai default jika data tidak ada
                    @endif
                ], // Data dari controller
                backgroundColor: ['#1cc88a', '#36b9cc'], // Warna batang grafik
                borderColor: ['#17a673', '#2c9faf'], // Warna border batang grafik
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true // Memastikan sumbu Y mulai dari 0
                }
            },
            plugins: {
                legend: {
                    display: false, // Menghapus label dataset di legenda
                },
                datalabels: {
                    display: true,  // Menampilkan label data di atas batang
                    color: 'white', // Warna teks label
                    font: {
                        weight: 'bold',
                        size: 14
                    },
                    formatter: (value) => {
                        return value; // Format label sesuai dengan nilai
                    }
                }
            }
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Fungsi untuk menarik pesan dari server
    function fetchMessages() {
        $.ajax({
            url: '{{ route("admin.messages.ajax") }}',  // Mengambil pesan dari route yang sudah dibuat
            method: 'GET',
            success: function(data) {
                var messagesTable = $('#messagesTable');
                messagesTable.empty();  // Menghapus pesan lama

                if (data.length > 0) {
                    // Menampilkan pesan baru
                    data.forEach(function(message) {
                        messagesTable.append(
                            '<tr>' +
                                '<td>' + message.name + '</td>' +
                                '<td>' + message.email + '</td>' +
                                '<td>' + message.message + '</td>' +
                                '<td>' + new Date(message.created_at).toLocaleString() + '</td>' +
                            '</tr>'
                        );
                    });
                } else {
                    // Jika tidak ada pesan baru
                    messagesTable.append('<tr><td colspan="4" class="text-center">Tidak ada pesan baru.</td></tr>');
                }
            }
        });
    }

    // Menarik pesan saat halaman dimuat pertama kali
    fetchMessages();

    // Menyegarkan pesan setiap 30 detik (opsional)
    setInterval(fetchMessages, 30000);
});
</script>

</html>
