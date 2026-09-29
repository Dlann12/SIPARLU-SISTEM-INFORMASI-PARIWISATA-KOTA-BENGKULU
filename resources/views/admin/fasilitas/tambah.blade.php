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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Fasilitas</h1>
                    </div>

                    <!-- Form Tambah Fasilitas -->
                    <form action="{{ route('fasilitas.store') }}" method="POST">
                        @csrf
                    
                        <!-- Menampilkan pesan sukses jika ada -->
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    
                        <div class="form-group">
                            <label for="id_fasilitas">ID Fasilitas:</label>
                            <input type="text" name="id_fasilitas" id="id_fasilitas" class="form-control" value="{{ $nextId }}" readonly>
                        </div>
                    
                        <div class="form-group">
                            <label for="id_pariwisata">ID Pariwisata:</label>
                            <select name="id_pariwisata" id="id_pariwisata" class="form-control" required>
                                @foreach ($pariwisataList as $pariwisata)
                                    <option value="{{ $pariwisata->id_pariwisata }}">{{ $pariwisata->nama_pariwisata }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="nama_fasilitas">Nama Fasilitas:</label>
                            <input type="text" name="nama_fasilitas" id="nama_fasilitas" class="form-control" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="lokasi">Lokasi:</label>
                            <textarea name="lokasi" id="lokasi" class="form-control" required></textarea>
                        </div>
                    
                        <div class="form-group">
                            <label for="jenis">Jenis:</label>
                            <select name="jenis" id="jenis" class="form-control" required>
                                <option value="Hotel">Hotel</option>
                                <option value="Restoran">Restoran</option>
                                <option value="Oleh-oleh">Oleh-oleh</option>
                                <option value="Tempat Ibadah">Tempat Ibadah</option>
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi:</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
                        </div>
                    
                        <div class="form-group">
                            <label for="latitude">Latitude:</label>
                            <input type="text" name="latitude" id="latitude" class="form-control" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="longitude">Longitude:</label>
                            <input type="text" name="longitude" id="longitude" class="form-control" required>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    

                </div>
                <!-- /.container-fluid -->

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

    <!-- Bootstrap core JavaScript-->
    <!-- jQuery -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Bundle (includes Popper) -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript (jQuery Easing) -->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages -->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
