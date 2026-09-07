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
			<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(/assets/img/batu.jpg)">
				<div class="overlay"></div>
				<div class="gtco-container">
					<div class="row">
						<div class="col-md-12 col-md-offset-0 text-center">
							<div class="row row-mt-15em">
			
								<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
									<h1>Contact Us</h1>	
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
					<h2>Hubungi Kami</h2>
					<p>Jika anda memiliki saran, kritik, pesan atau kesan kepada kami, untuk bisnis silahkan hubungi email.</p>
				</div>
			</div>
			<div class="row">
</div>

</div>
</div>
</div>
</header>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>
	<div class="container mt-5">	
		@if(session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif
	
		<form method="POST" action="{{ route('messages.store') }}" class="mt-4">
			@csrf
			<div class="form-group">
				<label for="name" class="font-weight-bold">Nama</label>
				<input type="text" name="name" id="name" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="email" class="font-weight-bold">Email</label>
				<input type="email" name="email" id="email" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="message" class="font-weight-bold">Pesan</label>
				<textarea name="message" id="message" class="form-control" required></textarea>
			</div>
			<button type="submit" class="btn btn-primary btn-lg">Kirim Pesan</button>
		</form>
	</div>
</body>
</div>

<footer id="gtco-footer" role="contentinfo">
<div class="gtco-container">
<div class="row row-p	b-md">
</div>
</div>

</div>
<x-userfoot></x-userfoot>
</footer>
<!-- </div> -->

</div>

<div class="gototop js-top">
<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="assets/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="assets/js/jquery.waypoints.min.js"></script>
<!-- Carousel -->
<script src="assets/js/owl.carousel.min.js"></script>
<!-- countTo -->
<script src="assets/js/jquery.countTo.js"></script>

<!-- Stellar Parallax -->
<script src="assets/js/jquery.stellar.min.js"></script>

<!-- Magnific Popup -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/magnific-popup-options.js"></script>

<!-- Datepicker -->
<script src="assets/js/bootstrap-datepicker.min.js"></script>


<!-- Main -->
<script src="assets/js/main.js"></script>

</body>
</html>

