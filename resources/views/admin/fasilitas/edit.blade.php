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
                    <h1 class="h3 mb-0 text-gray-800">Edit Fasilitas</h1>
                </div>

                <!-- Content Row -->
                <form action="{{ route('fasilitas.update', $fasilitas->id_fasilitas) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                        <!-- Input Hidden untuk Page -->
                        <input type="hidden" name="page" value="{{ request('page', 1) }}">

                    <div class="form-group">
                        <label for="id_pariwisata">Pariwisata:</label>
                        <select class="form-control" name="id_pariwisata" required>
                            <option value="">Pilih Pariwisata</option>
                            @foreach($pariwisata as $item)
                                <option value="{{ $item->id_pariwisata }}" 
                                    {{ old('id_pariwisata', $fasilitas->id_pariwisata) == $item->id_pariwisata ? 'selected' : '' }}>
                                    {{ $item->nama_pariwisata }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_pariwisata')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <label for="nama_fasilitas">Nama Fasilitas:</label>
                        <input type="text" class="form-control" name="nama_fasilitas" value="{{ old('nama_fasilitas', $fasilitas->nama_fasilitas) }}" required>
                        @error('nama_fasilitas')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <label for="lokasi">Lokasi:</label>
                        <textarea class="form-control" name="lokasi" required>{{ old('lokasi', $fasilitas->lokasi) }}</textarea>
                        @error('lokasi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <label for="jenis">Jenis:</label>
                        <select class="form-control" name="jenis" required>
                            <option value="Hotel" {{ old('jenis', $fasilitas->jenis) == 'Hotel' ? 'selected' : '' }}>Hotel</option>
                            <option value="Restoran" {{ old('jenis', $fasilitas->jenis) == 'Restoran' ? 'selected' : '' }}>Restoran</option>
                            <option value="Oleh-oleh" {{ old('jenis', $fasilitas->jenis) == 'Oleh-oleh' ? 'selected' : '' }}>Oleh-oleh</option>
                            <option value="Tempat Ibadah" {{ old('jenis', $fasilitas->jenis) == 'Tempat Ibadah' ? 'selected' : '' }}>Tempat Ibadah</option>
                        </select>
                        @error('jenis')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea class="form-control" name="deskripsi" required>{{ old('deskripsi', $fasilitas->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <label for="latitude">Latitude:</label>
                        <input type="text" class="form-control" name="latitude" value="{{ old('latitude', $fasilitas->latitude) }}" required>
                        @error('latitude')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <label for="longitude">Longitude:</label>
                        <input type="text" class="form-control" name="longitude" value="{{ old('longitude', $fasilitas->longitude) }}" required>
                        @error('longitude')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                
                                            <!-- Tombol Update -->
                        <button type="submit" class="btn btn-primary">Simpan</button>

                    <!-- Tombol Batal -->
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
                                    </form>
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
