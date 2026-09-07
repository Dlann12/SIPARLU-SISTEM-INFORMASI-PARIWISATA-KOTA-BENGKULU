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
                    <h1 class="h3 mb-0 text-gray-800">Edit Pariwisata</h1>
                </div>

                <!-- Content Row -->
                <div class="container mt-5">
                    <h2 class="mb-4"></h2>
                
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                
                    <form action="{{ route('admin.pariwisata.update', $pariwisata->id_pariwisata) }}" method="POST">
                        @csrf
                        @method('PUT')
                
                        <div class="form-group">
                            <label for="nama_pariwisata">Nama Pariwisata</label>
                            <input type="text" name="nama_pariwisata" id="nama_pariwisata" class="form-control" value="{{ old('nama_pariwisata', $pariwisata->nama_pariwisata) }}" required>
                        </div>
                
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ old('lokasi', $pariwisata->lokasi) }}">
                        </div>
                
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $pariwisata->deskripsi) }}</textarea>
                        </div>
                
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="text" name="latitude" id="latitude" class="form-control" value="{{ old('latitude', $pariwisata->latitude) }}">
                        </div>
                
                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input type="text" name="longitude" id="longitude" class="form-control" value="{{ old('longitude', $pariwisata->longitude) }}">
                        </div>
                
                        <form action="{{ route('admin.pariwisata.update', $pariwisata->id_pariwisata) }}?page={{ request('page') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Input fields -->
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
                        </form>
                        
                </div>

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
