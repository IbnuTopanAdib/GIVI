<!DOCTYPE html>
<html lang="en">

<head>
    <title>GiveHope &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,500|Dosis:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
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
    <style>
        .hidden {
            display: none;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="/">GIVI</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <form action="/items" class="d-flex" method="GET">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        @if (request('user'))
                            <input type="hidden" name="user" value="{{ request('user') }}">
                        @endif

                        <input type="text" class="form-control me-2" placeholder="Cari Barang...." name="search"
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Cari Barang</button>

                    </form>
                    <li class="nav-item active"><a href="/items" class="nav-link">Semua Barang</a></li>
                    <li class="nav-item"><a href="/categories" class="nav-link">Kategori</a></li>
                    <li class="nav-item"><a href="/favorite" class="nav-link">Favorit</a></li>
                    <li class="nav-item"><a href="gallery.html" class="nav-link">Profil</a></li>
                </ul>

                {{-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> --}}
            </div>
        </div>
    </nav>
    <!-- END nav -->


    <div class="site-section bg-secondary">
        <div class="container">

            @if ($donatedItems->count())
                <div class="container">
                    <div class="row">
                        @foreach ($donatedItems as $donatedItem)
                            <div class="col-md-3">
                                <div class="card-barang">
                                    <div class="image-container">
                                        <img src="{{ asset('./storage/' . $donatedItem->image) }}" alt="">
                                    </div>
                                    <div class="favorite">
                                        <form class="favorit-form addFavoritForm" data-item-id="{{ $donatedItem->id }}"
                                            method="POST" action="/item/{{ $donatedItem->id }}/favorite/add">
                                            @csrf
                                            <button type="submit" class="addFavoritButton"><i
                                                    class="bi bi-heart"></i></button>
                                        </form>
                                        <form class="favorit-form deleteFavoritForm"
                                            data-item-id="{{ $donatedItem->id }}" method="POST"
                                            action="/item/{{ $donatedItem->id }}/favorite/delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="deleteFavoritButton"><i
                                                    class="bi bi-heart-fill"></i></button>
                                        </form>
                                    </div>
                                    <div class="content">
                                        <div class="category">

                                            <a href="/items?category={{ $donatedItem->category->category_name }}"
                                                class="text-decoration-none">{{ $donatedItem->category->category_name }}
                                            </a>
                                        </div>
                                        <div class="item-name">{{ $donatedItem->name }}</div>
                                        <div class="description">
                                            {{ $donatedItem->description }}
                                        </div>
                                        <div class="donator">
                                            By. <a
                                                href="/items?user={{ $donatedItem->user->username }}">{{ $donatedItem->user->name }}</a>
                                        </div>
                                        <div class="location">location: {{ $donatedItem->location }}</div>
                                    </div>

                                    <div class="button-container">
                                        <a href="/items/{{ $donatedItem->id }}"
                                            class="readmore button text-center">Read More</a>
                                    </div>
                                </div>
                                {{-- <div class="card float-animation">
                                    <div class="position-absolute px-3 py-2"
                                        style="background-color: rgba(0,0,0,0.5)"><a
                                            href="/items?category={{ $donatedItem->category->category_name }}"
                                            class="text-white text-decoration-none">{{ $donatedItem->category->category_name }}</a>
                                    </div>
                                    <img src="https://source.unsplash.com/200x200/?{{ $donatedItem->category->category_name }}"
                                        class="card-img-top" alt="{{ $donatedItem->category->category_name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $donatedItem->name }}</h5>
                                        <p>
                                            <small class="text-muted">
                                                By. <a
                                                    href="/items?user={{ $donatedItem->user->username }}">{{ $donatedItem->user->name }}</a>
                                                in <a href="/categories/{{ $donatedItem->category->category_name }}"
                                                    class="text-decoration-none">
                                                    {{ $donatedItem->category->category_name }}</a>
                                                {{ $donatedItem->created_at->diffForHumans() }}
                                            </small>
                                        </p>
                                        <p class="card-text">{{ $donatedItem->location }}</p>
                                        <a href="/items/{{ $donatedItem->id }}" class="btn btn-primary">Read More</a>
                                    </div>
                                </div> --}}
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p class="text-center fs-4">Barang tidak ditemukan</p>
            @endif

            <div class="d-flex mt-10">
                {{ $donatedItems->links() }}
            </div>
        </div>
    </div>

    <div class="featured-section overlay-color-2" style="background-image: url('images/bg_2.jpg');">

        <div class="container">
            <div class="row">

                <div class="col-md-6 mb-5 mb-md-0">
                    <img src="/assets/images/bg_2.jpg" alt="Image placeholder" class="img-fluid">
                </div>

                <div class="col-md-6 pl-md-5">

                    <div class="form-volunteer">

                        <h2>Be A Volunteer Today</h2>
                        <form action="#" method="post">
                            <div class="form-group">
                                <!-- <label for="name">Name</label> -->
                                <input type="text" class="form-control py-2" id="name"
                                    placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <!-- <label for="email">Email</label> -->
                                <input type="text" class="form-control py-2" id="email"
                                    placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <!-- <label for="v_message">Email</label> -->
                                <textarea name="v_message" id="" cols="30" rows="3" class="form-control py-2"
                                    placeholder="Write your message"></textarea>
                                <!-- <input type="text" class="form-control py-2" id="email"> -->
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-white px-5 py-2" value="Send">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div> <!-- .featured-donate -->

    <footer class="footer">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6 col-lg-4">
                    <h3 class="heading-section">About Us</h3>
                    <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts. </p>
                    <p class="mb-5">Separated they live in Bookmarksgrove right at the coast of the Semantics, a
                        large language ocean.</p>
                    <p><a href="#" class="link-underline">Read More</a></p>
                </div>
                <div class="col-md-6 col-lg-4">
                    <h3 class="heading-section">Recent Blog</h3>
                    <div class="block-21 d-flex mb-4">
                        <figure class="mr-3">
                            <img src="images/img_1.jpg" alt="" class="img-fluid">
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
                            <img src="images/img_2.jpg" alt="" class="img-fluid">
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
                            <img src="images/img_4.jpg" alt="" class="img-fluid">
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
                                    View, San Francisco, California, USA</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392
                                        3929 210</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span
                                        class="text">info@yourdomain.com</span></a></li>
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
                        </script> All rights reserved | This template is made with <i
                            class="ion-ios-heart text-danger" aria-hidden="true"></i> by <a
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

    <script src="/assets/js/jquery.fancybox.min.js"></script>

    <script src="/assets/js/aos.js"></script>
    <script src="/assets/js/jquery.animateNumber.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="/assets/js/google-map.js"></script>
    <script src="/assets/js/main.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const favoritBarangIds = @json($favoriteItems->pluck('id')->toArray());
            const semuaBarangIds = @json($donatedItems->pluck('id')->toArray());

            const favoritForms = document.querySelectorAll('.favorit-form');

            favoritForms.forEach(form => {
                form.addEventListener('submit', async (event) => {
                    event.preventDefault();

                    try {
                        const response = await fetch(form.action, {
                            method: form.method,
                            body: new FormData(form),
                        });

                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }

                        // Ganti tampilan formulir yang sesuai berdasarkan aksi favorit
                        const itemId = form.getAttribute('data-item-id');
                        const addFavoritButton = document.querySelector(
                            `.addFavoritForm[data-item-id="${itemId}"]`);
                        const deleteFavoritButton = document.querySelector(
                            `.deleteFavoritForm[data-item-id="${itemId}"]`);

                        addFavoritButton.classList.add("hidden");
                        deleteFavoritButton.classList.add("hidden");

                        if (form.classList.contains('addFavoritForm')) {
                            deleteFavoritButton.classList.remove("hidden");
                        } else {
                            addFavoritButton.classList.remove("hidden");
                        }
                    } catch (error) {
                        console.error("Error:", error);
                    }
                });
            });

            // Tambahkan logika untuk menyembunyikan/menampilkan formulir berdasarkan favoritBarangIds
            semuaBarangIds.forEach(id => {
                const addFavoritForm = document.querySelector(`.addFavoritForm[data-item-id="${id}"]`);
                const deleteFavoritForm = document.querySelector(
                `.deleteFavoritForm[data-item-id="${id}"]`);

                if (favoritBarangIds.includes(id)) {
                    addFavoritForm.classList.add("hidden");
                    console.log(`Item ${id} is in favorites`);
                    // Lakukan sesuatu jika item berada dalam favorit
                } else {
                    console.log(`Item ${id} is not in favorites`);
                    deleteFavoritForm.classList.add("hidden");
                    // Lakukan sesuatu jika item tidak berada dalam favorit
                }
            });
        });
    </script>

</body>

</html>
