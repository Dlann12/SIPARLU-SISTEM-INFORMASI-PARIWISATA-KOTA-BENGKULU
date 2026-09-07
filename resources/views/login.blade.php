<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
            .bg-video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .bg-gradient-primary {
            background: none;
        }
        .card {
    background-color: rgba(255, 255, 255, 0.4); /* White with 80% opacity */
    border: none;  /* Optional: Remove card border */
    }

    .card-body {
    background-color: rgba(255, 255, 255, 0.4); /* Add transparency */
    box-shadow: none; /* Optional: Remove any shadow */
    }

}
    </style>
</head>

<body class="bg-gradient-primary">

    <video autoplay muted loop class="bg-video">
        <source src="assets/vid/bkl.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>

    <div class="container py-5">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
             <!-- Bagian Logo (Kiri) -->
           <div class="row">
            <!-- Nested Row within Card Body -->
            <div class="col-lg-6">
                <div class="text-center mt-5 mb-0">  <!-- Mengubah mb-4 menjadi mb-2 untuk mendekatkan ke logo -->
                    <h4 class="text-black" style="color: #000000; font-weight: bold;">
                        SISTEM INFORMASI PARIWISATA KOTA BENGKULU
                    </h4>
                 </div>
                <div class="d-flex align-items-center justify-content-center">
                    <img src="assets/img/logo.png" 
                         alt="Logo" 
                         class="img-fluid" 
                         style="max-width: 60%; max-height: 80%;">
                </div>
            </div>
                            
                            <!-- Bagian Form Login (Kanan) -->
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Admin</h1>
                                    </div>
                                    <!-- Laravel Login Form -->
                                    <form action="" method="POST">
                                        @csrf
                                        @if($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $item)
                                                        <li>{{ $item }}</li> 
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="form-group mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" value="{{ old('email') }}" name="email" class="form-control form-control-user" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                        </div>
                                        <div class="form-group mb-3 d-grid">
                                            <button name="submit" type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                        </div>
                                        <div class="form-group mb-3 d-grid">
                                            <a href="/"" class="btn btn-warning btn-user btn-block text-dark">Continue as Guest</a>
                                        </div>
                                    </form>
                                    <hr>
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
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>