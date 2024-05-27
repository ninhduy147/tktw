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
    <style>
        table {
            text-align: center;
            border: 3px solid gray;
            margin: 50px auto;
            width: 1200px;
        }

        table tr th {
            border: 1px solid red;
            padding: 10px;
        }

        table tr td {
            border: 1px solid red;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>


            <nav>
                <a href="<?= BASE_URL . '?act=/' ?>"">
                    <img width=" 60" height="60" src="./img/logo.png" alt="">
                </a>
                <ul>

                    <li>
                        <a class="nav-link" href="#">Quản Lý Danh Mục Sản Phẩm</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">Quản Lý Sản Phẩm</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">Quản Lý Comment</a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?= BASE_URL . '?act=list_user' ?>">Quản Lý User</a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">Thông Báo</a>
                    </li>
                </ul>
            </nav>

            <nav class="nav-right">
                <a href="#">
                    <i class="fa-solid fa-user-tie"></i>
                    Admin
                </a>
                <!-- <a class="header-icon" href="#">
                    <i class="fa-solid icon fa-phone"></i>
                    +84*******
                </a> -->
                <!-- <a class="header-icon" href="#">
                    <i class="fa-solid icon fa-cart-shopping"></i>
                </a> -->
                <!-- <a class="header-icon" href="./login.html">
                    <i class="fa-regular icon fa-user"></i>
                </a> -->
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

        <div class="table">
            <table>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Pass</th>
                    <th>Email</th>
                    <th>Phone_number</th>
                    <th>Role</th>
                    <th>Avatar</th>
                    <th>Chức Năng</th>
                </tr>
                <?php
                $stt = 1;
                foreach ($dataUser as $val) {
                ?>
                    <tr>
                        <td><?php echo  $stt++ ?></td>
                        <td><?php echo $val['username'] ?></td>
                        <td><?php echo $val['password'] ?></td>
                        <td><?php echo $val['email'] ?></td>
                        <td><?php echo $val['phone_number'] ?></td>
                        <td><?php echo $val['role'] ?></td>
                        <td><?php echo $val['avatar'] ?></td>
                        <td>
                            <a style="color:blue;" href="<?= BASE_URL . '?act=detail_user&id=' . $val['id'] ?>">Thông tin chi tiết</a>
                        </td>
                    </tr>

                <?php } ?>
            </table>
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