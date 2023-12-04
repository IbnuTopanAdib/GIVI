<!DOCTYPE html>
<html lang="en">

<head>
    <title>GiveHope &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,500|Dosis:400,700" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/aos.css">
    <link rel="stylesheet" href="/assets/css/ionicons.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/assets/css/jquery.timepicker.css">
    <link rel="stylesheet" href="/assets/css/flaticon.css">
    <link rel="stylesheet" href="/assets/css/icomoon.css">
    <link rel="stylesheet" href="/assets/css/fancybox.min.css">

    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/style.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">GiveHope</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="how-it-works.html" class="nav-link">How It Works</a></li>
                    <li class="nav-item"><a href="donate.html" class="nav-link">Donate</a></li>
                    <li class="nav-item"><a href="gallery.html" class="nav-link">Gallery</a></li>
                    <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                    @if (auth()->user()->level == 'recipient' || auth()->user()->level == 'donor')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/">Profile</a></li>
                                <li><a class="dropdown-item" href="/donation">Donation</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item"><a href="/register" class="nav-link">SignUp</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="d-flex flex-row">
        <aside class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 330px;">
            <h2 class="mb-3">Form Pengisian Data Barang</h2>
            <form action="{{ route('donation.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="item-name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" rows="3" name = "description" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="item-location" class="form-label">Lokasi</label>
                    <input type="text" class="form-control" id="item-location" name = "location" required>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select class="form-select" id="category_id" name="category_id" required disabled>
                        <option value="" disabled>Kategori Perabotan</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $selectedCategoryId == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="item-image" class="form-label">Foto Barang</label>
                    <input type="file" class="form-control" id="item-image" name="image">
                </div>
                {{-- <button type="button" class="btn btn-primary" onclick="updatePreview()">Pratinjau</button> --}}
                <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
            </form>


        </aside>
        <div class="container" style="min-height: 100vh">
            <div id="preview-container" class="mt-4">
                <h4>Pratinjau Barang:</h4>
                <p id="preview-name">Nama Barang: </p>
                <p id="preview-description">Deskripsi: </p>
                <p id="preview-location">Lokasi: </p>
                <img id="preview-image">
            </div>
        </div>
        
    </div>



    <footer class="footer">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6 col-lg-4">
                    <h3 class="heading-section">About Us</h3>
                    <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there
                        live the blind texts. </p>
                    <p class="mb-5">Separated they live in Bookmarksgrove right at the coast of the Semantics, a
                        large language
                        ocean.</p>
                    <p><a href="#" class="link-underline">Read More</a></p>
                </div>
                <div class="col-md-6 col-lg-4">
                    <h3 class="heading-section">Recent Blog</h3>
                    <div class="block-21 d-flex mb-4">
                        <figure class="mr-3">
                            <img src="/assets/images/img_1.jpg" alt="" class="img-fluid">
                        </figure>
                        <div class="text">
                            <h3 class="heading"><a href="#">Water Is Life. Clean Water In Urban Area</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> July 29, 2018</a></div>
                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="block-21 d-flex mb-4">
                        <figure class="mr-3">
                            <img src="/assets/images/img_2.jpg" alt="" class="img-fluid">
                        </figure>
                        <div class="text">
                            <h3 class="heading"><a href="#">Life Is Short So Be Kind</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> July 29, 2018</a></div>
                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="block-21 d-flex mb-4">
                        <figure class="mr-3">
                            <img src="/assets/images/img_4.jpg" alt="" class="img-fluid">
                        </figure>
                        <div class="text">
                            <h3 class="heading"><a href="#">Unfortunate Children Need Your Love</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> July 29, 2018</a></div>
                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="block-23">
                        <h3 class="heading-section">Get Connected</h3>
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain
                                    View, San
                                    Francisco, California, USA</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392
                                        3929 210</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span
                                        class="text">info@yourdomain.com</span></a>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>
            <div class="row pt-5">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with
                        <i class="ion-ios-heart text-danger" aria-hidden="true"></i> by <a
                            href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>

                </div>
            </div>
        </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.easing.1.3.js"></script>
    <script src="/assets/js/jquery.waypoints.min.js"></script>
    <script src="/assets/js/jquery.stellar.min.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/assets/js/bootstrap-datepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    <script src="/assets/js/jquery.fancybox.min.js"></script>

    <script src="/assets/js/aos.js"></script>
    <script src="/assets/js/jquery.animateNumber.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="/assets/js/google-map.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/donation.js"></script>

</body>

</html>
