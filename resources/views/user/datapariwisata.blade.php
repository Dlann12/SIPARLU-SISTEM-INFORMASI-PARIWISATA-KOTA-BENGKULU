<!DOCTYPE HTML>
<!--
	Aesthetic by gettemplates.co
	Twitter: http://twitter.com/gettemplateco
	URL: http://gettemplates.co
-->
<html>
	<head>
		<x-userhead></x-userhead>
		<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(/assets/img/pan.jpg)">
			<div class="overlay"></div>
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 text-center">
						<div class="row row-mt-15em">
		
							<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
								<h1>Pariwisata</h1>	
							</div>
							
						</div>
						
					</div>
				</div>
			</div>
		</header>
	</head>
	<nav>
		<x-usernav></x-usernav>
	<body>
		<div class="gtco-section">
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
						<h2>Jelajahi Kota Bengkulu</h2>
						<p>Kota bengkulu yang indah akan alam siap memanjakan mata pengunjung dengan menawarkan berbagai pariwisata.</p>
					</div>
				</div>
				<div class="row">
	
					<div class="col-lg-4 col-md-4 col-sm-6">
						<a href="https://helloindonesia.id/wp-content/uploads/2019/11/Pantai-Panjang-Bengkulu.jpg" class="fh5co-card-item image-popup">
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="https://helloindonesia.id/wp-content/uploads/2019/11/Pantai-Panjang-Bengkulu.jpg" alt="Image" class="img-responsive">
							</figure>
							<div class="fh5co-text">
								<h2>Pantai Panjang</h2>
								<p>Pantai Panjang adalah destinasi wisata yang terkenal di Kota Bengkulu...</p>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<a href="https://assets-a1.kompasiana.com/items/album/2019/06/16/whatsapp-image-2019-06-16-at-23-09-46-5d066a03c01a4c0f497a7ba8.jpeg" class="fh5co-card-item image-popup">
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="https://assets-a1.kompasiana.com/items/album/2019/06/16/whatsapp-image-2019-06-16-at-23-09-46-5d066a03c01a4c0f497a7ba8.jpeg" alt="Image" class="img-responsive">
							</figure>
							<div class="fh5co-text">
								<h2>Taman Kota Bengkulu</h2>
								<p>Taman Kota Bengkulu adalah ruang terbuka hijau yang luas yang terletak di pusat kota...</p>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<a href="https://osccdn.medcom.id/images/content/2021/06/23/b06176227363fe24fdf8c1ac03a6538f.jpg" class="fh5co-card-item image-popup">
							<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="https://osccdn.medcom.id/images/content/2021/06/23/b06176227363fe24fdf8c1ac03a6538f.jpg" alt="Image" class="img-responsive">
							</figure>
							<div class="fh5co-text">
								<h2>Benteng Marlborough</h2>
								<p>Benteng Marlborough adalah situs bersejarah yang dibangun oleh Inggris...</p>
							</div>
						</a>
					</div>
	
		<div class="container">
			<h1>Daftar Pariwisata</h1>
			<div class="row mb-3">
				<div class="col-12 col-md-8">
					<form method="GET" action="{{ route('showPariwisata') }}" class="form-inline">
						<input type="text" name="search" class="form-control" placeholder="Cari pariwisata..." value="{{ request('search') }}">
						<button type="submit" class="btn btn-primary ml-2">Cari</button>
					</form>
				</div>
			</div>
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
						</tr>
					</thead>
					<tbody>
						@foreach ($pariwisata as $item)
							<tr>
								<td>{{ $item->id_pariwisata }}</td>
								<td>{{ $item->nama_pariwisata }}</td>
								<td>{{ $item->lokasi }}</td>
								<td>{{ Str::limit($item->deskripsi, 100, '...') }}</td> <!-- Potong deskripsi jika terlalu panjang -->
								<td>{{ $item->latitude }}</td>
								<td>{{ $item->longitude }}</td>
								<td>
									<a href="{{ route('pariwisata.show', ['id' => $item->id_pariwisata]) }}" class="btn btn-info btn-sm">Lihat Detail</a>

								</td>
							</tr>
						@endforeach
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
	</body>
			</div>

			<x-userfoot></x-userfoot>
</html>

