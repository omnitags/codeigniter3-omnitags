<!-- setting setiap src di assets -->

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<!-- header -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Khenjy Johnelson">

    <base href="http://localhost/me/omnitags/assets/">

    <!-- menampilkan data pengaturan sebagai p -->
    <meta name="description" content="<p>Lepaskan diri Anda ke <strong>Hotel Hebat</strong>, dikelilingi oleh keindahan pegunungan yang indah, danau, dan sawah menghijau.</p>

<p>Nikmati sore yang hangat dengan berenang di kolam renang dengan pemandangan matahari terbenam yang memukau; Kid&#39;s Club yang luas - menawarkan beragam fasilitas dan kegiatan anak-anak yang akan melengkapi kenyamanan keluarga.</p>

<p>Convention Center kami, dilengkapi pelayanan lengkap dengan ruang konvensi terbesar di Bandung, mampu mengakomodasi hingga 3.000 delegasi. Manfaatkan ruang penyelenggaraan konvensi M.I.C.E ataupun mewujudkan acara pernikahan adat yang mewah.</p>
">

    <title>Dashboard - HOTEL HEBAT administrator</title>

    <!-- menampilkan favicon -->
    <link rel="icon" href="img/website_themes/school_ukk_hotel_favicon.jpg" type="image/jpg">


    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <script src="ckeditor/ckeditor.js"></script>

    <!-- css untuk datatables bertema bootstrap -->
    <link rel="stylesheet" href="datatables/datatables/css/dataTables.bootstrap4.min.css">

    <!-- Add Intro.js CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/3.4.0/introjs.min.css">

    <!-- css pribadi -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/floating-labels.css">

    <!-- javascript untuk semua halaman (sesuai kebutuhan) -->
    <script src="popper.min.js"></script>
    <script src="jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>

    <!-- javascript untuk datatables bertema bootstrap -->
    <script src="datatables/datatables/js/jquery.dataTables.min.js"></script>
    <script src="datatables/datatables/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>

    <style>
        .btn.disabled,
        .btn-secondary {
            background-color: lightgray;
            border-color: lightgray;
            cursor: not-allowed;
            pointer-events: none;
        }
    </style>

    <!-- menampilkan data pengaturan sebagai p -->

    <!-- toast -->
    <div class="toast fade" id="element" style="position: absolute; top: 95px; right: 15px; z-index: 1000"
        data-delay="5000">
        <div class="toast-header">
            <img class="rounded mr-2" src="img/website_themes/school_ukk_hotel_favicon.jpg" width="15px"
                draggable="false">
            <strong class="mr-auto">
                HOTEL HEBAT </strong>
            <button type="button" class="close" data-dismiss="toast">
                <span>&times;</span>
            </button>
        </div>

        <div class="toast-body">
            Selamat datang administrator Khen! </div>
    </div>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top shadow-sm">
        <a class="navbar-brand font-weight-bold" href="http://localhost/me/omnitags/?source=nav">
            <img src="img/website_themes/utama_logo.jpg" height="50">
        </a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarku">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- menu navbar berdasarkan level user -->
        <div class="collapse navbar-collapse" id="navbarku">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item pb-2">
                    <a class="nav-link text-light text-decoration-none" href="http://localhost/me/omnitags/en/">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item pb-2">
                    <div class="dropdown">
                        <a type="button" class="nav-link text-light text-decoration-none" data-toggle="dropdown"
                            href="#">
                            <h4>Master Data <i class="fas fa-caret-down"></i></h4>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <h6 class="dropdown-header">Data</h6>
                            <a class="dropdown-item" href="http://localhost/me/omnitags/en/fashotel/admin/?source=nav">
                                Facilities
                            </a> <a class="dropdown-item"
                                href="http://localhost/me/omnitags/en/kamar/admin/?source=nav">
                                Room
                            </a> <a class="dropdown-item"
                                href="http://localhost/me/omnitags/en/tipe_kamar/admin/?source=nav">
                                Room Type
                            </a>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-divider"></div>
                            <h6 class="dropdown-header">Operational</h6>
                            <a class="dropdown-item" href="http://localhost/me/omnitags/en/faskamar/admin/?source=nav">
                                Room Facilities
                            </a> <a class="dropdown-item"
                                href="http://localhost/me/omnitags/en/petugas/admin/?source=nav">
                                Officer
                            </a> <a class="dropdown-item" href="http://localhost/me/omnitags/en/user/admin/?source=nav">
                                User
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"
                                href="http://localhost/me/omnitags/en/pengaturan/profil/?source=nav">
                                Website Settings
                            </a>
                        </div>
                    </div>
                </li>


                <li class="nav-item pb-2 dropdown">
                    <a type="button" class="nav-link text-decoration-none h4 mt-1 text-light font-weight-bold"
                        data-toggle="dropdown" href="#">
                        <i class="fas fa-bell"></i> <span>2</span> </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                        <div class="dropdown-header d-flex justify-content-between align-items-center">
                            <span>2 new notifications</span>
                            <div>
                                <span class="px-3"></span> <!-- Adding space between buttons -->
                                <a href="http://localhost/me/omnitags/en/website_notifications/update/?source=nav"
                                    class="btn btn-link">
                                    <i class="far fa-check-circle"></i>
                                </a>
                                <!-- <a class="btn btn-link">
                                <i class="fas fa-cog"></i>
                            </a> -->
                            </div>
                        </div>

                        <div class="list-group" style="min-width: 350px; max-height: 300px; overflow-y: auto;">


                            <a href="http://localhost/me/omnitags/en/website_notifications/263/detail"
                                class="list-group-item bg-light">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Berhasil!</div>
                                        <div class="text-muted small mt-1">
                                            Status successfully updated! (ID = 5) </div>
                                        <div class="text-muted small mt-1">Baru saja </div>
                                    </div>
                                </div>
                            </a>


                            <a href="http://localhost/me/omnitags/en/website_notifications/262/detail"
                                class="list-group-item bg-light">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Berhasil!</div>
                                        <div class="text-muted small mt-1">
                                            Status successfully updated! (ID = 6) </div>
                                        <div class="text-muted small mt-1">Baru saja </div>
                                    </div>
                                </div>
                            </a>

                            <a href="http://localhost/me/omnitags/en/website_notifications/261/detail"
                                class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Berhasil!</div>
                                        <div class="text-muted small mt-1">
                                            Website Themes successfully deleted! (ID = 7) </div>
                                        <div class="text-muted small mt-1">Baru saja </div>
                                    </div>
                                </div>
                            </a>

                            <a href="http://localhost/me/omnitags/en/website_notifications/260/detail"
                                class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Berhasil!</div>
                                        <div class="text-muted small mt-1">
                                            Website Themes successfully saved! </div>
                                        <div class="text-muted small mt-1">Baru saja </div>
                                    </div>
                                </div>
                            </a>

                            <a href="http://localhost/me/omnitags/en/website_notifications/259/detail"
                                class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Berhasil!</div>
                                        <div class="text-muted small mt-1">
                                            Facilities successfully saved! </div>
                                        <div class="text-muted small mt-1">Baru saja </div>
                                    </div>
                                </div>
                            </a>

                            <a href="http://localhost/me/omnitags/en/website_notifications/258/detail"
                                class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Berhasil!</div>
                                        <div class="text-muted small mt-1">
                                            Website Themes successfully updated! (ID = 1) </div>
                                        <div class="text-muted small mt-1">Baru saja </div>
                                    </div>
                                </div>
                            </a>

                            <a href="http://localhost/me/omnitags/en/website_notifications/257/detail"
                                class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Berhasil!</div>
                                        <div class="text-muted small mt-1">
                                            Favicon successfully updated! (ID = 1) </div>
                                        <div class="text-muted small mt-1">Baru saja </div>
                                    </div>
                                </div>
                            </a>

                            <a href="http://localhost/me/omnitags/en/website_notifications/255/detail"
                                class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Berhasil!</div>
                                        <div class="text-muted small mt-1">
                                            Website Decorations successfully saved! </div>
                                        <div class="text-muted small mt-1">Baru saja </div>
                                    </div>
                                </div>
                            </a>

                            <a href="http://localhost/me/omnitags/en/website_notifications/254/detail"
                                class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Berhasil!</div>
                                        <div class="text-muted small mt-1">
                                            Website Decorations successfully saved! </div>
                                        <div class="text-muted small mt-1">Baru saja </div>
                                    </div>
                                </div>
                            </a>

                            <a href="http://localhost/me/omnitags/en/website_notifications/243/detail"
                                class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Berhasil!</div>
                                        <div class="text-muted small mt-1">
                                            Website Decoration successfully saved! </div>
                                        <div class="text-muted small mt-1">Baru saja </div>
                                    </div>
                                </div>
                            </a>

                            <a href="http://localhost/me/omnitags/en/website_notifications/242/detail"
                                class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Berhasil!</div>
                                        <div class="text-muted small mt-1">
                                            Website Decoration successfully updated! (ID = 36) </div>
                                        <div class="text-muted small mt-1">Baru saja </div>
                                    </div>
                                </div>
                            </a>

                            <a href="http://localhost/me/omnitags/en/website_notifications/240/detail"
                                class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Berhasil!</div>
                                        <div class="text-muted small mt-1">
                                            Website Decoration successfully saved! </div>
                                        <div class="text-muted small mt-1">Baru saja </div>
                                    </div>
                                </div>
                            </a>

                            <a href="http://localhost/me/omnitags/en/website_notifications/241/detail"
                                class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Berhasil!</div>
                                        <div class="text-muted small mt-1">
                                            Website Decoration successfully updated! (ID = 36) </div>
                                        <div class="text-muted small mt-1">Baru saja </div>
                                    </div>
                                </div>
                            </a>

                            <a href="http://localhost/me/omnitags/en/website_notifications/244/detail"
                                class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Berhasil!</div>
                                        <div class="text-muted small mt-1">
                                            Website Decoration successfully deleted! (ID = 37) </div>
                                        <div class="text-muted small mt-1">Baru saja </div>
                                    </div>
                                </div>
                            </a>

                            <a href="http://localhost/me/omnitags/en/website_notifications/3/detail"
                                class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Berhasil!</div>
                                        <div class="text-muted small mt-1">
                                            Data Foto berhasil diubah! </div>
                                        <div class="text-muted small mt-1">Baru saja </div>
                                    </div>
                                </div>
                            </a>

                        </div>
                        <div class="dropdown-header">
                            <a href="http://localhost/me/omnitags/en/website_notifications/daftar/?source=nav"
                                class="text-muted">Show all notifications</a>
                        </div>
                    </div>
                </li>



                <li class="nav-item pb-2">
                    <div class="dropdown">
                        <!-- tombol ini akan memunculkan dropdown tanpa menggunakan button: https://stackoverflow.com/questions/38576503/how-to-remove-the-arrow-in-dropdown-in-bootstrap- terimakasih pada link di atas -->
                        <a type="button" class="nav-link text-light text-decoration-none" data-toggle="dropdown"
                            href="#">
                            <h4><i class="fas fa-user-tie"></i> <i class="fas fa-caret-down"></i></h4>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">

                            <a class="dropdown-item" href="http://localhost/me/omnitags/en/user/profil/?source=nav">
                                Profile
                            </a> <a class="dropdown-item"
                                href="http://localhost/me/omnitags/en/user/logout/?source=nav">
                                Logout
                            </a>

                        </div>
                    </div>
                </li>

                <!-- <li class="nav-item pb-2">
        <form action="http://localhost/me/omnitags/en/welcome/set_language" method="post" class="form-inline">
            <select name="language" class="form-control" onchange="this.form.submit()">
                <option value="en" selected>EN</option>
                <option value="id" >ID</option>
                <option value="fr" >FR</option>
                <option value="zh" >中文</option>
            </select>
        </form>
    </li>
</ul>      </div>

    </nav>

    <!-- komponen berada tengah halaman -->
                <div class="container mb-4" id="konten">

                    <div style="margin-top: 100px;">
                        <!-- konten sesuai controller -->
                        <div class="row mb-2 align-items-center">
                            <div class="col-md-9 d-flex align-items-center">
                                <h1>Dashboard<br><span class="h6"> (beta phase)</span></h1>
                            </div>
                            <div class="col-md-3 text-right">
                                <img src="img/decoration/dashboard.png" width="200" alt="Image">
                            </div>
                        </div>
                        <hr>


                        <!-- menampilkan data untuk administrator -->

                        <div class="row">
                            <div class="col-md-3 mt-2">
                                <div class="card text-white bg-danger">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            User
                                        </h5>
                                        <p class="card-text" style="font-size: 32px;">
                                            11
                                        </p>
                                        <a class="text-white" href="http://localhost/me/omnitags/en/user/admin">Detail
                                            >></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mt-2">
                                <div class="card text-white bg-danger">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Officer
                                        </h5>
                                        <p class="card-text" style="font-size: 32px;">
                                            2
                                        </p>
                                        <a class="text-white"
                                            href="http://localhost/me/omnitags/en/petugas/admin">Detail >></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mt-2">
                                <div class="card text-white bg-danger">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Login Histories
                                        </h5>
                                        <p class="card-text" style="font-size: 32px;">
                                            261
                                        </p>
                                        <a class="text-white"
                                            href="http://localhost/me/omnitags/en/login_histories/admin">Detail >></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <hr>


                        <div class="row">

                            <!-- menampilkan data untuk administrator -->

                            <div class="col-md-3 mt-2">
                                <div class="card text-white bg-danger">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Room Type
                                        </h5>
                                        <p class="card-text" style="font-size: 32px;">
                                            3
                                        </p>
                                        <a class="text-white"
                                            href="http://localhost/me/omnitags/en/tipe_kamar/admin">Detail >></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mt-2">
                                <div class="card text-white bg-danger">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Facilities
                                        </h5>
                                        <p class="card-text" style="font-size: 32px;">
                                            3
                                        </p>
                                        <a class="text-white"
                                            href="http://localhost/me/omnitags/en/fashotel/admin">Detail >></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mt-2">
                                <div class="card text-white bg-danger">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Room Facilities
                                        </h5>
                                        <p class="card-text" style="font-size: 32px;">
                                            24
                                        </p>
                                        <a class="text-white"
                                            href="http://localhost/me/omnitags/en/faskamar/admin">Detail >></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- The charts shown will be different for each user level -->
                        <h2 class="mt-4">Statistics</h2>
                        <hr>
                        <div class="row mt-4">
                            <div class="col-md-6 px-2 px-sm-3 dashboard-stat-box">
                                <canvas id="myChart_1_2" width="200" height="125"></canvas>
                            </div>
                        </div>

                        <h2 class="mt-4">Detail Website</h2>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">

                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table class="table table-light" id="data">
                                            <thead>
                                            <tbody>
                                                <tr>
                                                    <td width="40%" class="table-active">Website Name</td>
                                                    <td width="">HOTEL HEBAT</td>
                                                </tr>
                                                <tr>
                                                    <td width="40%" class="table-active">Address</td>
                                                    <td width="">Jl Peternakan Dlm III 36, Dki Jakarta</td>
                                                </tr>
                                                <tr>
                                                    <td width="40%" class="table-active">Email</td>
                                                    <td width="">hotelhebat@gmail.com</td>
                                                </tr>
                                                <tr>
                                                    <td width="40%" class="table-active">Phone Number</td>
                                                    <td width="">0-21-541-3829</td>
                                                </tr>

                                            </tbody>
                                            <tfoot></tfoot>
                                        </table>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <img class="img-thumbnail rounded" src="img/website_themes/utama_foto.jpg">
                            </div>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <script>
                            var ctx = document.getElementById('myChart_1_2').getContext('2d');
                            var chartDatatabel_1 = [{ "label": "Superior", "value": "2" }, { "label": "Deluxe", "value": "3" }, { "label": "Classic", "value": "4" }] // Data passed from controller
                            var chartDatatabel_2 = [{ "label": "Superior", "value": "0" }, { "label": "Deluxe", "value": "9" }, { "label": "Classic", "value": "9" }] // Data passed from controller

                            var labelstabel_1 = chartDatatabel_1.map(function (item) {
                                return item.label;
                            });

                            var valuestabel_1 = chartDatatabel_1.map(function (item) {
                                return item.value;
                            });

                            var labelstabel_2 = chartDatatabel_2.map(function (item) {
                                return item.label;
                            });

                            var valuestabel_2 = chartDatatabel_2.map(function (item) {
                                return item.value;
                            });

                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: labelstabel_2,
                                    datasets: [{
                                        label: 'Jumlah Orders Aktif',
                                        data: valuestabel_2,
                                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                        borderColor: 'rgba(255, 99, 132, 1)',
                                        borderWidth: 1
                                    },
                                    {
                                        label: 'Jumlah Booking History',
                                        data: valuestabel_1,
                                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                        borderColor: 'rgba(54, 162, 235, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                        <script>
                            function adjustColumns() {
                                // Get the current width of the viewport
                                const screenWidth = window.innerWidth;

                                // Define the breakpoint for switching column sizes
                                const breakpoint = 1024; // You can adjust this value based on your needs

                                // Select all elements with the class "col-md-3"
                                const colMd3Elements = document.querySelectorAll(".col-md-3");

                                // Loop through each element
                                colMd3Elements.forEach(element => {
                                    if (screenWidth >= breakpoint) {
                                        // If screen size is greater than or equal to breakpoint, set class to col-md-4
                                        element.classList.add("col-md-3");
                                        element.classList.remove("col-md-4");
                                    } else {
                                        // If screen size is less than breakpoint, set class to col-md-3
                                        element.classList.remove("col-md-3");
                                        element.classList.add("col-md-4");
                                    }
                                });
                            }

                            // Call the adjustColumns function on window resize
                            window.addEventListener("resize", adjustColumns);

                            // Call the adjustColumns function on page load to handle initial layout
                            adjustColumns();
                        </script>
                    </div>

                </div>

                <!-- footer -->
                <footer class="container-fluid bg-dark">
                    <div class="container">

                        <!-- Displaying footer specific to user level: guest, admin, etc. -->
                        <div class="row justify-content-center align-content-center">
                            <p class="pt-2 text-light">
                                2022-2024 |
                                HOTEL HEBAT </p>
                        </div>
                    </div>
                </footer>


                <!-- fungsi datatables (wajib ada) -->
                <script type="text/javascript">
                    $(document).ready(function () {
                        // yg ini yang menggunakan toast
                        $("#element").toast("show")
                        // yg di bawah ini adalah semua yg berhubungan dgn modal

                        $('#data').DataTable({
                            "createdRow": function (row, data, dataIndex) {
                                $(row).find('td:first').html(dataIndex + 1);
                            },


                        });
                    });

                    var table = $('#daterange_table').DataTable({

                    })
                </script>

                <script>
                    $(document).ready(function () {
                        $('[data-toggle="tooltip"]').tooltip({
                            html: true
                        });
                    });
                </script>


                <!-- Berikut ini adalah list projek2 mendatang yang ingin kubuat jika sudah mempunyai tim frontend
    Bagiku cukup sulit dalam menentukan pilihan terbaik dalam membuat quick tour
    1. Membuat guided tour yang bisa pergi ke halaman lain -->
                <script>
                    $(document).ready(function () {
                        $('.view-toggle').on('click', function () {
                            $('.view-toggle').removeClass('active');
                            $(this).addClass('active');
                            var target = $(this).data('target');
                            $('.data-view').removeClass('active').hide();
                            $('#' + target).addClass('active').show();
                        });
                    });
                </script>


</body>

</html>