<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./css/main.css">
        <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.css">
</head>

<body>

        <div class="container">
                <header>
                        <nav>
                                <a href="./home.php">
                                        <img width="60" height="60" src="./img/logo.png" alt="">
                                </a>
                                <ul>
                                        <li>
                                                <a class="nav-link" href="./home.php">Home</a>

                                        </li>
                                        <li>
                                                <a class="nav-link" href="categories.html">Danh Mục Sản Phẩm</a>
                                        </li>
                                        <li>
                                                <a class="nav-link" href="./notification.html">Thông Báo</a>
                                        </li>
                                </ul>
                        </nav>

                        <nav class="nav-right">
                                <a class="header-icon" href="#">
                                        <i class="fa-solid icon fa-phone"></i>
                                        +84*******
                                </a>
                                <a class="header-icon" href="#">
                                        <i class="fa-solid icon fa-cart-shopping"></i>
                                </a>
                                <a class="header-icon" href="./login.html">
                                        <i class="fa-regular icon fa-user"></i>
                                </a>
                                <a href="<?= BASE_URL_ADM ?>">Ấn Vào Trang ADM</a>
                        </nav>
                </header>

                <!-- Banner  -->
                <div class="banner">
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                        <div class="carousel-item active">
                                                <img class="banner-img" src="./img/banner/1.png" class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                        <h5>First slide label</h5>
                                                        <p>Some representative placeholder content for the first slide.</p>
                                                </div>
                                        </div>
                                        <div class="carousel-item">
                                                <img class="banner-img" src="./img/banner/2.png" class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                        <h5>Second slide label</h5>
                                                        <p>Some representative placeholder content for the second slide.</p>
                                                </div>
                                        </div>
                                        <div class="carousel-item">
                                                <img class="banner-img" src="./img/banner/3.png" class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                        <h5>Third slide label</h5>
                                                        <p>Some representative placeholder content for the third slide.</p>
                                                </div>
                                        </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                </button>
                        </div>
                </div>

                <div class="content">

                        <!-- List Products  -->
                        <section class="section-products">
                                <div class="container">
                                        <div class="row justify-content-center text-center">
                                                <div class="col-md-8 col-lg-6">
                                                        <div class="header">
                                                                <h3>Featured Product</h3>
                                                                <h2>Popular Products</h2>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <!-- Single Product -->
                                                <div ha class="col-md-6 col-lg-4 col-xl-3">
                                                        <div id="product-1" class="single-product">
                                                                <div class="part-1">
                                                                        <ul>
                                                                                <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                                                        </ul>
                                                                </div>
                                                                <a href="./detail_products.html">
                                                                        <div class="part-2">
                                                                                <h3 class="product-title">Here Product Title</h3>
                                                                                <h4 class="product-old-price">$79.99</h4>
                                                                                <h4 class="product-price">$49.99</h4>
                                                                        </div>
                                                                </a>
                                                        </div>
                                                </div>
                                                <!-- Single Product -->
                                                <div class="col-md-6 col-lg-4 col-xl-3">
                                                        <div id="product-2" class="single-product">
                                                                <div class="part-1">
                                                                        <span class="discount">15% off</span>
                                                                        <ul>
                                                                                <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                                                        </ul>
                                                                </div>
                                                                <a href="./detail_products.html">
                                                                        <div class="part-2">
                                                                                <h3 class="product-title">Here Product Title</h3>
                                                                                <h4 class="product-price">$49.99</h4>
                                                                        </div>
                                                                </a>
                                                        </div>
                                                </div>
                                                <!-- Single Product -->
                                                <div class="col-md-6 col-lg-4 col-xl-3">
                                                        <div id="product-3" class="single-product">
                                                                <div class="part-1">
                                                                        <ul>
                                                                                <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                                                        </ul>
                                                                </div>
                                                                <a href="./detail_products.html">
                                                                        <div class="part-2">
                                                                                <h3 class="product-title">Here Product Title</h3>
                                                                                <h4 class="product-old-price">$79.99</h4>
                                                                                <h4 class="product-price">$49.99</h4>
                                                                        </div>
                                                                </a>
                                                        </div>
                                                </div>
                                                <!-- Single Product -->
                                                <div class="col-md-6 col-lg-4 col-xl-3">
                                                        <div id="product-4" class="single-product">
                                                                <div class="part-1">
                                                                        <span class="new">new</span>
                                                                        <ul>
                                                                                <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                                                        </ul>
                                                                </div>
                                                                <a href="./detail_products.html">
                                                                        <div class="part-2">
                                                                                <h3 class="product-title">Here Product Title</h3>
                                                                                <h4 class="product-price">$49.99</h4>
                                                                        </div>
                                                                </a>
                                                        </div>
                                                </div>
                                                <!-- Single Product -->
                                                <div class="col-md-6 col-lg-4 col-xl-3">
                                                        <div id="product-1" class="single-product">
                                                                <div class="part-1">
                                                                        <ul>
                                                                                <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                                                        </ul>
                                                                </div>
                                                                <a href="./detail_products.html">
                                                                        <div class="part-2">
                                                                                <h3 class="product-title">Here Product Title</h3>
                                                                                <h4 class="product-old-price">$79.99</h4>
                                                                                <h4 class="product-price">$49.99</h4>
                                                                        </div>
                                                                </a>
                                                        </div>
                                                </div>
                                                <!-- Single Product -->
                                                <div class="col-md-6 col-lg-4 col-xl-3">
                                                        <div id="product-2" class="single-product">
                                                                <div class="part-1">
                                                                        <span class="discount">15% off</span>
                                                                        <ul>
                                                                                <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                                                        </ul>
                                                                </div>
                                                                <a href="./detail_products.html">
                                                                        <div class="part-2">
                                                                                <h3 class="product-title">Here Product Title</h3>
                                                                                <h4 class="product-price">$49.99</h4>
                                                                        </div>
                                                                </a>
                                                        </div>
                                                </div>
                                                <!-- Single Product -->
                                                <div class="col-md-6 col-lg-4 col-xl-3">
                                                        <div id="product-3" class="single-product">
                                                                <div class="part-1">
                                                                        <ul>
                                                                                <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                                                        </ul>
                                                                </div>
                                                                <a href="./detail_products.html">
                                                                        <div class="part-2">
                                                                                <h3 class="product-title">Here Product Title</h3>
                                                                                <h4 class="product-old-price">$79.99</h4>
                                                                                <h4 class="product-price">$49.99</h4>
                                                                        </div>
                                                                </a>
                                                        </div>
                                                </div>
                                                <!-- Single Product -->
                                                <div class="col-md-6 col-lg-4 col-xl-3">
                                                        <div id="product-4" class="single-product">
                                                                <div class="part-1">
                                                                        <span class="new">new</span>
                                                                        <ul>
                                                                                <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-plus"></i></a></li>
                                                                                <li><a href="#"><i class="fas fa-expand"></i></a></li>
                                                                        </ul>
                                                                </div>
                                                                <a href="./detail_products.html">
                                                                        <div class="part-2">
                                                                                <h3 class="product-title">Here Product Title</h3>
                                                                                <h4 class="product-price">$49.99</h4>
                                                                        </div>
                                                                </a>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </section>
                        <hr>

                        <!-- List Support -->
                        <div class="containers">
                                <h2 class="title">Hỗ Trợ Khách Hàng</h2>
                                <div class="row">
                                        <div class="col-md-6 col-lg-4 g-mb-30">
                                                <article class="u-shadow-v18 g-bg-white text-center rounded g-px-20 g-py-40 g-mb-5">
                                                        <img class="d-inline-block img-fluid mb-4" src="./img/support-1.png" alt="Image Description">
                                                        <a href="#">
                                                                <h4 class="h5 g-color-black g-font-weight-600 g-mb-10">Câu Hỏi Thường Gặp</h4>

                                                        </a>
                                                        <!-- <p>Finding your perfect product</p>
                        <span class="d-block g-color-primary g-font-size-16">$50.00</span> -->
                                                </article>
                                        </div>

                                        <div class="col-md-6 col-lg-4 g-mb-30">
                                                <article class="u-shadow-v18 g-bg-white text-center rounded g-px-20 g-py-40 g-mb-5">
                                                        <img class="d-inline-block img-fluid mb-4" src="./img/support-2.png" alt="Image Description">
                                                        <a href="#">
                                                                <h4 class="h5 g-color-black g-font-weight-600 g-mb-10">Tìm Kiếm Cửa Hàng</h4>

                                                        </a>
                                                        <!-- <p>Finding your perfect product</p>
                        <span class="d-block g-color-primary g-font-size-16">$50.00</span> -->
                                                </article>
                                        </div>

                                        <div class="col-md-6 col-lg-4 g-mb-30">
                                                <article class="u-shadow-v18 g-bg-white text-center rounded g-px-20 g-py-40 g-mb-5">
                                                        <img class="d-inline-block img-fluid mb-4" src="./img/support-3.png" alt="Image Description">
                                                        <a href="#">
                                                                <h4 class="h5 g-color-black g-font-weight-600 g-mb-10">Phản Hồi Góp Ý</h4>

                                                        </a>
                                                        <!-- <p>Finding your perfect product</p>
                        <span class="d-block g-color-primary g-font-size-16">$50.00</span> -->
                                                </article>
                                        </div>
                                </div>
                        </div>


                </div>

                <hr>

                <!-- Footer -->
                <footer class="text-center text-lg-start bg-body-tertiary text-muted">

                        <!-- Section: Social media -->

                        <!-- Section: Links  -->
                        <section class="">
                                <div class="container text-center text-md-start mt-5">
                                        <!-- Grid row -->
                                        <div class="row mt-3">
                                                <!-- Grid column -->
                                                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                                                        <!-- Content -->
                                                        <h6 class="text-uppercase fw-bold mb-4">
                                                                <i class="fas fa-gem me-3"></i>Company name
                                                        </h6>
                                                        <p>
                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio assumenda veritatis, hic exercitationem ea alias, consequatur magni consequuntur vitae atque asperiores libero dolore voluptatem dolorem odio est aut facilis? Facilis.
                                                        </p>
                                                </div>
                                                <!-- Grid column -->

                                                <!-- Grid column -->
                                                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                                                        <!-- Links -->
                                                        <h6 class="text-uppercase fw-bold mb-4">
                                                                Products
                                                        </h6>
                                                        <p>
                                                                <a href="#!" class="text-reset">JS</a>
                                                        </p>
                                                        <!-- <p>
              <a href="#!" class="text-reset">React</a>
            </p> -->
                                                        <!-- <p>
              <a href="#!" class="text-reset">PHP</a>
            </p> -->
                                                        <p>
                                                                <a href="#!" class="text-reset">Laravel</a>
                                                        </p>
                                                </div>
                                                <!-- Grid column -->

                                                <!-- Grid column -->
                                                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                                                        <!-- Links -->
                                                        <h6 class="text-uppercase fw-bold mb-4">
                                                                Social Networks
                                                        </h6>
                                                        <p>
                                                                <a href="" class="me-4 text-reset">
                                                                        <i class="fab fa-facebook-f"></i>
                                                                        Facebook
                                                                </a>
                                                        </p>
                                                        <p>
                                                                <a href="" class="me-4 text-reset">
                                                                        <i class="fab fa-twitter"></i>
                                                                        Twitter
                                                                </a>
                                                        </p>
                                                        <p>
                                                                <a href="" class="me-4 text-reset">
                                                                        <i class="fab fa-google"></i>
                                                                        Google
                                                                </a>
                                                        </p>
                                                        <p>
                                                                <a href="" class="me-4 text-reset">
                                                                        <i class="fab fa-github"></i>
                                                                        Github
                                                                </a>
                                                        </p>
                                                </div>
                                                <!-- Grid column -->

                                                <!-- Grid column -->
                                                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                                                        <!-- Links -->
                                                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                                                        <p><i class="fas fa-home me-3"></i> Ha Noi, Viet Nam</p>
                                                        <p>
                                                                <i class="fas fa-envelope me-3"></i>
                                                                info@example.com
                                                        </p>
                                                        <p><i class="fas fa-phone me-3"></i> + 84 *** *** 88</p>
                                                        <p><i class="fas fa-print me-3"></i> + 84 *** *** 89</p>
                                                </div>
                                                <!-- Grid column -->
                                        </div>
                                        <!-- Grid row -->
                                </div>
                        </section>

                        <!-- Section: Social media -->
                        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                                <!-- Left -->
                                <div class="me-5 d-none d-lg-block">
                                </div>

                        </section>
                        <!-- Section: Links  -->

                        <!-- Copyright -->
                        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                                © 2021 Copyright:
                                <a class="text-reset fw-bold" href="https://mdbootstrap.com/">ninhddph47550</a>
                        </div>
                        <!-- Copyright -->
                </footer>
                <!-- Footer -->
        </div>
</body>

</html>