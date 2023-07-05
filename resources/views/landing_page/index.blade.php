<!DOCTYPE html>
<!-- saved from url=(0033)https://www.shop.semicolon.my.id/ -->
<html lang="en" data-bs-theme="auto">
<link type="text/css" rel="stylesheet" id="dark-mode-custom-link">
<link type="text/css" rel="stylesheet" id="dark-mode-general-link">
<style lang="en" type="text/css" id="dark-mode-custom-style"></style>
<style lang="en" type="text/css" id="dark-mode-native-style"></style>
<style lang="en" type="text/css" id="dark-mode-native-sheet"></style>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.111.3">
    <title>Homepage E-Commerce</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="{{asset('landing_page/css2')}}" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/">
    <link rel="icon" href="https://www.shop.semicolon.my.id/assets/favicon.png" type="image/png">


    <link href="{{asset('landing_page/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <meta name="theme-color" content="#712cf9">
    <link rel="stylesheet" href="{{asset('landing_page/app.css')}}">
    <!-- FontAwesome Css -->
    <link rel="stylesheet" href="{{asset('landing_page/all.min.css')}}">
    <style>
        a{
            text-decoration: none;
        }
    </style>
</head>

<body class="bg-isi">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-header">
        <div class="container">
            <a class="navbar-brand" href="https://www.shop.semicolon.my.id/">Semiclon Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="https://www.shop.semicolon.my.id/">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="https://www.shop.semicolon.my.id/cart" class="nav-link"><i
                                class="fas fa fa-shopping-cart"></i> Cart <span class="text-danger">()</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.shop.semicolon.my.id/login" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.shop.semicolon.my.id/register" class="nav-link">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> <!-- End Navbar -->

    <!-- Content -->
    <main class="container">

        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                Kategori: <strong class="text-decoration-underline">Semua Kategori</strong>
                                <span class="float-end">Urutkan Harga:
                                    <a href="https://www.shop.semicolon.my.id/shop/sortby/asc"
                                        class="badge bg-primary"><i class="fas fa-arrow-down"> </i> Termurah</a>
                                    |
                                    <a href="https://www.shop.semicolon.my.id/shop/sortby/desc" class="badge bg-hott">
                                        <i class="fas fa-arrow-up"> </i> Termahal</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Card Komponen -->
                    <div class="col-md-6 card-group">
                        <div class="card mb-3">
                            <img src="landing_page/nintendo-switch-lite-20230523130217.jpg"
                                alt="gambar" height="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Nintendo Switch Lite</h5>
                                <p class="card-text"><strong>Rp2.900.000,-</strong></p>
                                <p class="card-text">
                                </p>
                                <p>Kelengkapan :<br>
                                    1x Unit console Nintendo Switch Lite<br>
                                    1x Adaptor original<br>
                                    1x Dus/Box</p>
                                <p></p>
                                <a href="https://www.shop.semicolon.my.id/shop/category/console"
                                    class="badge bg-primary"><i class="fas fa-tags"></i> Console</a>
                            </div>
                            <div class="card-footer">
                                <form action="https://www.shop.semicolon.my.id/cart/add" method="POST">
                                    <input type="hidden" name="id_product" value="12">
                                    <div class="input-group">
                                        <input type="number" name="qty" value="1" class="form-control"
                                            min="0" oninput="validasiQty(this)">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary mx-1 ">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Card Komponen -->
                    <div class="col-md-6 card-group">
                        <div class="card mb-3">
                            <img src="landing_page/nintendo-switch-v2-20230523130233.jpg"
                                alt="gambar" height="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Nintendo Switch V2</h5>
                                <p class="card-text"><strong>Rp3.900.000,-</strong></p>
                                <p class="card-text">
                                </p>
                                <p>FULLSET CONDITION:<br>
                                    - Nintendo Switch™ Console HAC-001(-01)<br>
                                    - Joy‑Con™ (L/R)<br>
                                    - Nintendo Switch Dock<br>
                                    - Joy‑Con™ Wrist Straps<br>
                                    - Joy‑Con™ Grip<br>
                                    - HDMI™ Cable<br>
                                    - AC Adapter</p>
                                <p></p>
                                <a href="https://www.shop.semicolon.my.id/shop/category/console"
                                    class="badge bg-primary"><i class="fas fa-tags"></i> Console</a>
                            </div>
                            <div class="card-footer">
                                <form action="https://www.shop.semicolon.my.id/cart/add" method="POST">
                                    <input type="hidden" name="id_product" value="13">
                                    <div class="input-group">
                                        <input type="number" name="qty" value="1" class="form-control"
                                            min="0" oninput="validasiQty(this)">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary mx-1 ">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Card Komponen -->
                    <div class="col-md-6 card-group">
                        <div class="card mb-3">
                            <img src="landing_page/nintendo-switch-oled-20230523133208.jpg"
                                alt="gambar" height="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Nintendo Switch Oled</h5>
                                <p class="card-text"><strong>Rp4.900.000,-</strong></p>
                                <p class="card-text">
                                </p>
                                <p>Nintendo Switch Oled Model.<br>
                                    Barang 100?ru dan original!</p>

                                <p>Kelengkapan :<br>
                                    -1 Tablet Nintendo Switch Oled<br>
                                    -2 Joy con R/L<br>
                                    -2 Joy con strap<br>
                                    -1 Joy con grip<br>
                                    -1 Adaptor/Charger<br>
                                    -1 Docking Oled Model</p>

                                <p>- Garansi Console 30 hari, Garansi Accesories 7 hari.<br>
                                    - S&amp;K(Garansi tidak berlaku jika * segel rusak, cacat fisik,kotor, kena air
                                    &amp; kerusakan lainnya dikarenakan kesalahan pengguna)</p>
                                <p></p>
                                <a href="https://www.shop.semicolon.my.id/shop/category/console"
                                    class="badge bg-primary"><i class="fas fa-tags"></i> Console</a>
                            </div>
                            <div class="card-footer">
                                <form action="https://www.shop.semicolon.my.id/cart/add" method="POST">
                                    <input type="hidden" name="id_product" value="15">
                                    <div class="input-group">
                                        <input type="number" name="qty" value="1" class="form-control"
                                            min="0" oninput="validasiQty(this)">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary mx-1 ">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Card Komponen -->
                    <div class="col-md-6 card-group">
                        <div class="card mb-3">
                            <img src="landing_page/playstation-4-20230523133613.jpg" alt="gambar"
                                height="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Playstation 4</h5>
                                <p class="card-text"><strong>Rp4.000.000,-</strong></p>
                                <p class="card-text">
                                </p>
                                <p>Playstation 4 Pro 1TB Second / Bekas kondisi terawat layak jual</p>

                                <p>Garansi 1 bulan PS4 setelah barang diterima .</p>

                                <p>** Firmware official/resmi original<br>
                                    ** Bisa main CD , bisa main game digital<br>
                                    ** bisa main online utk game ps+ extra<br>
                                    ** Full Akun pribadi, bukan share akun<br>
                                    ** ID login dan password, akan kami infokan, password bisa diganti sendiri<br>
                                    ** Game sudah siap main sampai rumah , ga perlu download2 lagi full update</p>
                                <p></p>
                                <a href="https://www.shop.semicolon.my.id/shop/category/console"
                                    class="badge bg-primary"><i class="fas fa-tags"></i> Console</a>
                            </div>
                            <div class="card-footer">
                                <form action="https://www.shop.semicolon.my.id/cart/add" method="POST">
                                    <input type="hidden" name="id_product" value="17">
                                    <div class="input-group">
                                        <input type="number" name="qty" value="1" class="form-control"
                                            min="0" oninput="validasiQty(this)">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary mx-1 ">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Card Komponen -->
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item active"><a href="https://www.shop.semicolon.my.id/#"
                                class="page-link">1<span class="visually-hidden-focusable">(current)</span></a></li>
                        <li class="page-item"><a href="https://www.shop.semicolon.my.id/home/2" class="page-link"
                                data-ci-pagination-page="2">2</a></li>
                        <li class="page-item"><a href="https://www.shop.semicolon.my.id/home/2" class="page-link"
                                data-ci-pagination-page="2" rel="next">»</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">Pencarian</div>
                            <div class="card-body">
                                <form action="https://www.shop.semicolon.my.id/shop/search" method="POST">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="keyword" placeholder="Cari"
                                            value="play">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary mx-1" type="submit"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">Kategori</div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a href="https://www.shop.semicolon.my.id/"></a>Semua
                                    Kategori</li>
                                <li class="list-group-item"><a
                                        href="https://www.shop.semicolon.my.id/shop/category/smartphones">Smartphones</a>
                                </li>
                                <li class="list-group-item"><a
                                        href="https://www.shop.semicolon.my.id/shop/category/console">Console</a></li>
                                <li class="list-group-item"><a
                                        href="https://www.shop.semicolon.my.id/shop/category/games-console">Games
                                        Console</a></li>
                                <li class="list-group-item"><a
                                        href="https://www.shop.semicolon.my.id/shop/category/laptop">Laptop</a></li>
                                <li class="list-group-item"><a
                                        href="https://www.shop.semicolon.my.id/shop/category/lain-lain">Lain-lain</a>
                                </li>
                                <li class="list-group-item"><a
                                        href="https://www.shop.semicolon.my.id/shop/category/game-sharing">Game
                                        Sharing</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> <!-- End Content -->

    <script>
        // Cek apakah elemen dengan ID 'autoCloseAlert' ada sebelum mengakses properti classList
        var alertElement = document.getElementById('autoCloseAlert');
        if (alertElement !== null) {
            // Auto close the alert after 5 seconds (5000 milliseconds)
            setTimeout(function() {
                alertElement.classList.remove('show');
                alertElement.classList.add('hide');
                setTimeout(function() {
                    alertElement.remove();
                }, 500);
            }, 5000);
        }
    </script>
    <script>
        function validasiQty(input) {
            if (input.value < 0) {
                input.value = 0; // Mengatur nilai input menjadi 0 jika nilainya kurang dari 0
            }
        }
    </script>

    <script src="{{asset('landing_page/jquery-3.6.4.min.js')}}"></script>
    <script src="{{asset('landing_page/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('landing_page/app.js')}}"></script>

@include('layouts.scripts.sweetalert')
@include('landing_page.modal_login')
@include('landing_page.modal_pinjam')
</body>

</html>
