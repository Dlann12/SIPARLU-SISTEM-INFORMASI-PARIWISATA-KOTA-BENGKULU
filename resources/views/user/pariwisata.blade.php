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
        <h1 class="h3 mb-0 text-gray-800">Data Pariwisata</h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="window.print()">
            <i class="fas fa-print fa-sm text-white-50"></i> Print
        </button>
    </div>
    <div class="row mb-3">
        <div class="col-12 col-md-8">
            <form method="GET" action="{{ route('admin.pariwisata') }}" class="form-inline">
                <input type="text" name="search" class="form-control" placeholder="Cari pariwisata..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary ml-2">Cari</button>
            </form>
        </div>
    </div>
    <!-- Content Row -->
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pariwisata</th>
                        <th>Lokasi</th>
                        <th>Deskripsi</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Aksi</th> <!-- Kolom untuk tombol -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pariwisata as $item)
                        <tr>
                            <td>{{ $item->id_pariwisata }}</td>
                            <td>{{ $item->nama_pariwisata }}</td>
                            <td>{{ $item->lokasi }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->latitude }}</td>
                            <td>{{ $item->longitude }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="{{ route('admin.pariwisata.edit', ['id' => $item->id_pariwisata, 'page' => request()->get('page')]) }}" class="btn btn-info btn-sm">Edit</a>
                                
                                <!-- Tombol Hapus -->
                                <form action="{{ route('admin.pariwisata.hapus', $item->id_pariwisata) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <!-- Menampilkan navigasi pagination di bawah tabel -->

                </tbody>
            </table>
            <!-- Menampilkan navigasi pagination dengan hanya nomor halaman -->
<div class="d-flex justify-content-center">
    <div class="pagination pagination-sm">
        {{-- Menampilkan nomor halaman tanpa panah --}}
        @foreach ($pariwisata->getUrlRange(1, $pariwisata->lastPage()) as $page => $url)
            <li class="page-item{{ $page == $pariwisata->currentPage() ? ' active' : '' }}">
                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
            </li>
        @endforeach
            </div>
        </div>
    </div>
                </div>

                </div>
    <div class="row">
              
                    </div>
                </div>
                <!-- Card Body -->
               
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <
                </div>
            </div>

            <!-- Color System -->
</div>
<!-- End of Main Content -->

        <x-footer></x-footer>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
    
    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
    
    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>
    

</body>

</html>