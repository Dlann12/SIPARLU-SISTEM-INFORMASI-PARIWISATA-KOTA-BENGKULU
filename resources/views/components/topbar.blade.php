 <!-- Topbar -->
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <span class="navbar-text text-left font-weight-bold" style="font-size: 1.5rem; color: #007bff;">
        SISTEM INFORMASI PARIWISATA KOTA BENGKULU
    </span>
     <!-- Tanggal dan Waktu -->
     <span id="date-time" class="navbar-text ml-auto" style="font-size: 1rem; font-weight: normal; color: #555;">
        <!-- Tanggal dan Waktu akan ditampilkan di sini -->
    </span>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
    <!-- Tanggal dan Waktu -->
    <span id="date-time" class="navbar-text ml-auto" style="font-size: 1rem; font-weight: bold; color: #555;">
        <!-- Tanggal dan Waktu akan ditampilkan di sini -->
    </span>
            <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle"
                <img src="{{ asset('assets/img/undraw_profile.svg') }}" alt="Profile">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
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
        </li>

    </ul>

</nav>
<!-- End of Topbar -->

<script>
    document.addEventListener("DOMContentLoaded", () => {
        fetch('/api/user') // Ganti dengan endpoint API Anda
            .then(response => response.json())
            .then(data => {
                const userNameElement = document.querySelector("#userDropdown span");
                if (data && data.name) {
                    userNameElement.textContent = data.name;
                }
            })
            .catch(error => console.error('Error fetching user data:', error));
    });
</script>
<script>
    // Fungsi untuk menampilkan tanggal dan waktu
    function updateDateTime() {
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true };
        const now = new Date();
        const dateTimeString = now.toLocaleString('id-ID', options); // Format tanggal dan waktu untuk Indonesia
        document.getElementById('date-time').textContent = dateTimeString;
    }

    // Perbarui tanggal dan waktu setiap detik
    setInterval(updateDateTime, 1000);

    // Panggil fungsi saat halaman dimuat pertama kali
    document.addEventListener("DOMContentLoaded", updateDateTime);
</script>