<!DOCTYPE html>
<html lang="en">
<head>
<title>Lentera Social</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta name="description" content="lentera Teknologi - Let's Learn Together, Belajar bersama tentang ilmu komputer">
<meta name="author" content="toni-ismail-z.com">

<!-- <link rel="icon" href=" " type="image/x-icon"> -->

<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" ><!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="assets/fonts/simple-line-icons.css"><!-- Icon -->
<link rel="stylesheet" type="text/css" href="assets/css/slicknav.css"><!-- Slicknav -->

<!-- Owl carousel -->
<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/owl.theme.css">


<link rel="stylesheet" type="text/css" href="assets/css/animate.css"><!-- Animate -->
<link rel="stylesheet" type="text/css" href="assets/css/main.css"><!-- Main Style -->
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css"><!-- Responsive Style -->

</head>
<body>
<header id="header-wrap">
    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar indigo bg-light">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="icon-menu"></span>
                    <span class="icon-menu"></span>
                    <span class="icon-menu"></span>
                </button>
                <a href="#" class="navbar-brand">
                    <!-- <img src="assets/img/logo.svg" alt=""> -->
                    <h2 class="navbar-brand">Lentera</h2>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="navbar-nav mr-auto justify-content-left clearfix">
                    <li class="nav-item active"><a class="nav-link" href="#hero-area"> </a></li>                    
                   <!--  <li class="nav-item"><a class="nav-link" href="#feature">feature</a></li>
                    <li class="nav-item"><a class="nav-link" href="#About">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonial">Testimonial</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pricing">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li> -->
                </ul>
                <div class="btn-sing float-right">
                    @auth
                    <a class="btn btn-outline-primary" href="/todashboard">Dashboard</a>
                    @else
                    <a class="btn btn-outline-primary mr-3" href="/login">Login</a>
                    <a class="btn btn-primary" href="/register">Register</a>
                    @endauth
                   
                </div>
            </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="mobile-menu navbar-nav bg-secondary">
           <!--  <li><a class="page-scroll" href="#hero-area">Home</a></li>      -->       
            @auth
            <li><a class="page-scroll active" href="/todashboard">My Dashboard</a></li>
            @else
            <a class="btn btn-outline-primary" href="/login">Login</a>

            <a class="btn btn-primary" href="/register">Register</a>
            @endauth 
            
            <!-- <li><a class="page-scroll" href="#About">About</a></li>
            <li><a class="page-scroll" href="#team">Team</a></li>
            <li><a class="page-scroll" href="#testimonial">Testimonial</a></li>
            <li><a class="page-scroll" href="#pricing">Pricing</a></li>
            <li><a class="page-scroll" href="#contact">Contact</a></li> -->
        </ul>

    </nav>

    <!-- Hero Area Start -->
    <div id="hero-area" class="hero-area-bg bg-white">
        <div class="overlay"></div>
        <div class="container">
            <div class="row clearfix justify-content-center">
                <div class="col-md-8 col-sm-12 col-12">
                    <div class="contents text-center">
                        <h2 class="head-title wow fadeInUp">Lentera - join us and start friendship to be more meaningful </h2>
                        @auth
                        <div class="header-button wow fadeInUp" data-wow-delay="0.3s">
                            <a href="/todashboard" class="btn btn-outline-primary">My Dashboard</a>
                        </div>
                        @else
                        <div class="header-button wow fadeInUp" data-wow-delay="0.3s">
                            <a href="/login" class="btn btn-outline-primary"> Login</a>
                        </div>
                        @endauth
                       
                    </div>
                    <div class="img-thumb text-center wow fadeInUp" data-wow-delay="0.6s">
                        <!-- <img class="img-fluid" src="assets/img/hero-1.png" alt=""> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>


<!-- Kelas Start --> 
<section id="pricing" class="section-padding bg-secondary">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header text-center text-white">
                    <h2 class="section-title wow fadeInDown text-white" data-wow-delay="0.3s">Daftar Kelas Belajar</h2>
                    <span class="sub-title wow fadeInDown" data-wow-delay="0.5s">Daftar kelas belajar sekarang untuk mendapatkan pengalaman baru</span>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            @foreach ($kelas as $item)
                
            <div class="col-lg-4 col-md-12">
                <div class="pricing2">
                    <div class="body">
                        <div class="pricing-plan">
                            <img src="assets/img/paper-plane.png" alt="" class="pricing-img">
                            <h2 class="pricing-header">{{ $item->nama_kelas }}</h2>
                            <ul class="pricing-features">
                                <li>Angkatan : {{ $item->angkatan }}</li>
                                <li>{{ $item->deskripsi }}</li>
                            </ul>
                            <span class="pricing-price">Free</span>

                            @auth
                            <div class="header-button wow fadeInUp" data-wow-delay="0.3s">
                                <a href="/todashboard" class="btn btn-outline-primary">Dashboard</a>
                            </div>
                            @else
                            <a href="/register" class="btn btn-outline-primary">Daftar Sekarang</a>    
                            @endauth
                            
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>

<!-- Services Section Start -->
<section id="feature" class="section-padding bg-light">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Amazing Features</h2>
            <span class="sub-title wow fadeInDown" data-wow-delay="0.5s">Create something amazing</span>
        </div>
        <div class="row clearfix">
            <div class="col-md-6 col-lg-6 col-6">
                <div class="services-item wow fadeInRight" data-wow-delay="0.3s">
                    <div class="icon"><i class="icon-users"></i></div>
                    <div class="services-content">
                        <h3><a href="#">Jalin Pertemanan</a></h3>
                        <p>jalin pertemanan dari sudut yang berbeda agar lebih berwarna</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-6">
                <div class="services-item wow fadeInRight" data-wow-delay="0.6s">
                    <div class="icon"><i class="icon-rocket"></i>
                    </div>
                    <div class="services-content">
                        <h3><a href="#">jangakauan Luas</a></h3>
                        <p>Kembangkan sayap dan tunjukan potensi dirimu untuk menjadi bintang</p>
                    </div>
                </div>
            </div>

            
            <div class="col-md-6 col-lg-6 col-6">
                <div class="services-item wow fadeInRight" data-wow-delay="1.5s">
                    <div class="icon"><i class="icon-key"></i></div>
                    <div class="services-content">
                        <h3><a href="#">Peranmu Penting</a></h3>
                        <p>Tunjukan pada dunia bahwa dirimu begitu penting dan sangat diharapkan</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-6">
                <div class="services-item wow fadeInRight" data-wow-delay="1.8s">
                    <div class="icon"><i class="icon-magic-wand"></i></div>
                    <div class="services-content">
                        <h3><a href="#">Hari yang menyenangkan</a></h3>
                        <p>Begabung bersama kami akan menyenangkan dan bisa berjumpa hal baru</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Feature Section Start -->



<!-- Footer Section Start -->
<footer id="footer" class="footer-area section-padding">
    <div class="container">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-5 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="footer-logo mb-3">
                        <!-- <img src="assets/img/logo-white.svg" alt=""> -->
                        <h2>Lentera</h2>
                    </div>
                    <p>Gabung Bersama Komunitas Kami dan Upgrade Skill dirimu.</p>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.4s">
                    <h3 class="footer-titel">Company</h3>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Our Work</a></li>
                        <li><a href="#">Services</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.6s">
                    <h3 class="footer-titel">About</h3>
                    <ul>
                        <li><a href="#">Career</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Clients</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="0.8s">
                    <h3 class="footer-titel">Find us on</h3>
                    <div class="social-icon">
                        <a class="facebook" href="#"><i class="icon-social-facebook"></i></a>
                        <a class="twitter" href="#"><i class="icon-social-twitter"></i></a>
                        <a class="instagram" href="#"><i class="icon-social-dribbble"></i></a>
                        <a class="linkedin" href="#"><i class="icon-social-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>  
    </div>     
</footer>

<section id="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>Buat Relasimu Jadi Keren</p>
            </div>
        </div>
    </div>
</section>   

<!-- Go to Top Link -->
<a href="#" class="back-to-top">
    <i class="lni-arrow-up"></i>
</a>

<!-- Preloader -->
<div id="preloader">
    <div class="loader" id="loader-1"></div>
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/jquery-min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/jquery.nav.js"></script>
<script src="assets/js/scrolling-nav.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/jquery.slicknav.js"></script>

<script src="assets/js/main.js"></script>
<script src="assets/js/form-validator.min.js"></script>
<script src="assets/js/contact-form-script.min.js"></script>
</body>
</html>
