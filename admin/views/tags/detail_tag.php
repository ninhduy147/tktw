<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Người Dùng : <?= $tags['name'] ?></title>
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




        <h1 style="margin-top:50px">Chi Tiết Sản Phẩm : <?= $tag['name'] ?></h1>
        <table>
            <tr>
                <th>Tên Trường</th>
                <th>Giá Trị</th>
            </tr>

            <tr>
                <td>Name</td>
                <td><?= $tag['name'] ?></td>
            </tr>

            <tr>
                <td>Danh Mục</td>
                <td><?= $tag['category_id'] ?></td>
            </tr>

            <tr>
                <td>price</td>
                <td><?= $tag['price'] ?></td>
            </tr>

            <tr>
                <td>Description</td>
                <td><?= $tag['description'] ?></td>
            </tr>

            <tr>
                <td>Quantity</td>
                <td>
                    <?php echo $tag['quantity'] ?>
                </td>
            </tr>

            <tr>
                <td>Avatar</td>
                <td><img style="height : 70px; width:70px" src="<?php echo $tag['avatar'] ?>" alt=""></td>
            </tr>
        </table>
        <a style="color:blue;" href="<?= BASE_URL_ADM . '?act=tags'  ?>"><button>Back to List Tags</button></a>

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