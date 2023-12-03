<!doctype html>
<html lang="en">

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>RUN CHARITY </title>

    <!-- Styles -->
    <link rel='stylesheet' href='/assets/css/bootstrap.min.css'>
    <link rel='stylesheet' href='/assets/css/animate.min.css'>
    <link rel='stylesheet' href="/assets/css/font-awesome.min.css" />
    <link rel='stylesheet' href="/assets/css/style.css" />
    <link href="/nice-admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/nice-admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/nice-admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/nice-admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="/nice-admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="/nice-admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/nice-admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/nice-admin/assets/css/style.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800' rel='stylesheet'
        type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
 <![endif]-->

    <!-- Favicon -->
    <link rel="shortcut icon" href="#">
</head>

<body>
    <!-- Begin Hero Bg -->

    <!-- End Hero Bg
 ================================================== -->
    <!-- Start Header
 ================================================== -->
    <header id="header" class="navbar navbar-inverse navbar-fixed-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Your Logo -->
                <a href="#hero" class="navbar-brand">RUN CHARITY <span class="lighter">LITE</span></a>
            </div>
            <!-- Start Navigation -->
            <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#hero">Home</a>
                    </li>
                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li>
                        <a href="#gallery">Gallery</a>
                    </li>
                    <li>
                        <a href="#slider">Testimonials</a>
                    </li>
                    <li>
                        <a href="#faq">FAQ</a>
                    </li>
                    <li>
                        <a href="#contactarea">Contact</a>
                    </li>
                    <li>
                        <a href="">Login</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Intro
 ================================================== -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="index.html" class="logo d-flex align-items-center w-auto">
                            <img src="/nice-admin/assets/img/logo.png" alt="">
                            <span class="d-none d-lg-block">Survey App</span>
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                <p class="text-center small">Enter your email & password to login</p>
                            </div>
                            @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                            @if (session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('loginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif

                            <form class="row justify-content-center" action="{{ route('authenticate') }}"
                                method="POST">
                                @csrf
                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control" id="email"
                                            required>
                    
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control"
                                        id="yourPassword" required>
                                    <div class="invalid-feedback">Please enter your password!</div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Login</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Don't have account? <a href="/register">Create an
                                            account</a></p>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                        Designed by <a href="/">Survey App</a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Credits
=============================================== -->
    <section id="credits" class="text-center">
        <span class="social wow zoomIn">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-skype"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a>
        </span><br />
        Copyright &copy; <a href="#">Your Agency</a>
        <br />Template By <i class="fa fa-heart"></i> WowThemes.Net
    </section>
    <!-- Bootstrap core JavaScript
 ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/waypoints.min.js"></script>
    <script src="/assets/js/jquery.scrollTo.min.js"></script>
    <script src="/assets/js/jquery.localScroll.min.js"></script>
    <script src="/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/assets/js/validate.js"></script>
    <script src="/assets/js/common.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    {{-- exported button --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
</body>

</html>
