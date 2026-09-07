<!DOCTYPE HTML>
<!--
	Aesthetic by gettemplates.co
	Twitter: http://twitter.com/gettemplateco
	URL: http://gettemplates.co
-->
<html>
	<head>
		<x-userhead></x-userhead>
		<head>
			<x-userhead></x-userhead>
			<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(/assets/img/mer.jpg)">
				<div class="overlay"></div>
				<div class="gtco-container">
					<div class="row">
						<div class="col-md-12 col-md-offset-0 text-center">
							<div class="row row-mt-15em">
			
								<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
									<h1>Fasilitas</h1>	
								</div>
								
							</div>
							
						</div>
					</div>
				</div>
			</header>
	</head>
	<nav>
		<x-usernav></x-usernav>
	</nav>
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Fasilitas Yang Memadai</h2>
					<p>Banyak fasilitas di kota bengkulu yang sangat layak untuk dikunjungi oleh pengunjung.</p>
				</div>
			</div>
			<div class="row">

				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0c/79/53/90/p-20160811-170722-largejpg.jpg?w=500&h=400&s=1" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0c/79/53/90/p-20160811-170722-largejpg.jpg?w=500&h=400&s=1" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Hotel Nala</h2>
							<p>Hotel Nala adalah pilihan akomodasi yang sempurna bagi para wisatawan ...</p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="https://media-cdn.tripadvisor.com/media/photo-s/09/cd/79/7e/p-20151211-182541-largejpg.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="https://media-cdn.tripadvisor.com/media/photo-s/09/cd/79/7e/p-20151211-182541-largejpg.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Rumah Makan Marola</h2>
							<p>Ocean Breeze adalah restoran yang menawarkan pengalaman bersantap....</p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/12/7a/b3/23/pasir-putih-resort.jpg?w=1200&h=-1&s=1" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/12/7a/b3/23/pasir-putih-resort.jpg?w=1200&h=-1&s=1" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Grand Pasir Putih Hotel</h2>
							<p>Grand Pasir Putih Hotel adalah hotel mewah... </p>
						</div>
					</a>
				</div>
	                <!-- Page Heading -->
					<div class="container">
						<h1>Daftar Fasilitas</h1>
					    <!-- Form Search Bar -->
						<div class="row mb-3">
							<div class="col-12 col-md-8">
								<form method="GET" action="{{ route('showFasilitas') }}" class="form-inline">
									<input type="text" name="search" class="form-control" placeholder="Cari fasilitas..." value="{{ request('search') }}">
									<button type="submit" class="btn btn-primary ml-2">Cari</button>
								</form>
							</div>
						</div>
							<div class="table-responsive" style="overflow-x: auto;">
								<table class="table table-bordered">
									<thead class="thead-dark">
										<tr>
											<th>ID</th>
											<th>ID Pariwisata</th>
											<th>Nama Fasilitas</th>
											<th>Lokasi</th>
											<th>Jenis</th>
											<th>Deskripsi</th>
											<th>Latitude</th>
											<th>Longitude</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($fasilitas as $item)
											<tr>
												<td>{{ $item->id_fasilitas }}</td>
												<td>{{ $item->id_pariwisata }}</td>
												<td>{{ $item->nama_fasilitas }}</td>
												<td>{{ $item->lokasi }}</td>
												<td>{{ ucfirst($item->jenis) }}</td>
												<td>{{ Str::limit($item->deskripsi, 100, '...') }}</td> <!-- Potong deskripsi jika terlalu panjang -->
												<td>{{ $item->latitude }}</td>
												<td>{{ $item->longitude }}</td>
												<td>
													<a href="{{ route('fasilitas.show', $item->id_fasilitas) }}" class="btn btn-info btn-sm">Lihat Detail</a>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<!-- Menampilkan navigasi pagination dengan hanya nomor halaman -->
						<div class="d-flex justify-content-center">
							<div class="pagination pagination-sm">
								{{-- Menampilkan nomor halaman tanpa panah --}}
								@foreach ($fasilitas->getUrlRange(1, $fasilitas->lastPage()) as $page => $url)
									<li class="page-item{{ $page == $fasilitas->currentPage() ? ' active' : '' }}">
										<a class="page-link" href="{{ $url }}">{{ $page }}</a>
									</li>
								@endforeach
								</div>
					</div>
				</div>
	
				</div>
			</div>
		</div>
			</div>

			<x-userfoot></x-userfoot>
</html>

