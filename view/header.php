<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="layout/assests/style.css"> -->
    <link rel="stylesheet" href="layout/assests/style.css">
    <link rel="stylesheet" href="layout/assests/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Shop Nông Sản Xanh</title>
</head>

<body>
    <div class="app">
        <!-- header -->
        <div class="my_header">
            <div class="container">
                <div class="row align-items-center">

                    <!-- Logo -->
                    <div class="col-md-3 col-6 py-1 d-md-block d-none">
                        <a href="index.php">
                            <img src="layout/assests/img/GreenLogo.png" alt="logo" class="logo-img img-fluid">
                        </a>
                    </div>

                    <!-- Search Form -->
                    <div class="col-md-5 col-12 pt-4">
                        <form action="index.php?act=sanpham" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="kyw" placeholder="Nhập từ khóa tìm kiếm" aria-label="Nhập từ khóa tìm kiếm" aria-describedby="basic-addon2">
                                <button class="input-group-text" id="basic-addon2">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- User Actions -->
                    <div class="col-md-4">
                        <div class="row mt-1 pt-2 ps-3">
                            <div class="col-md-4 col-4">
                                <a href="#" class="position-relative text-decoration-none">
                                    <span class="icon-notify"><i class="fa-solid fa-bell"></i></span>
                                </a>
                                <a href="#" class="fs-6 ms-1 text-decoration-none text-dark">Thông báo</a>
                            </div>

                            <div class="col-md-4 col-4">
                                <a href="index.php?act=viewcart" class="position-relative text-decoration-none">
                                    <span class="icon-cart"><i class="fa-solid fa-cart-shopping"></i></span>
                                    <span class="position-absolute top-2 m-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;">
                                        <?php
                                        $totalProducts = 0;
                                        foreach ($_SESSION['mycart'] as $cartItem) {
                                            $totalProducts += $cartItem[4]; // Số lượng sản phẩm lưu ở vị trí 4 trong mảng
                                        }
                                        echo $totalProducts;
                                        ?>
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </a>
                                <a href="index.php?act=viewcart" class="fs-6 ms-3 text-decoration-none text-dark">Giỏ hàng</a>
                            </div>

                            <div class="col-md-4 col-4">
                                <div class="dropdown">
                                    <?php if (isset($_SESSION["s_user"])) {
                                        extract($_SESSION["s_user"]);
                                        $display_name = $tendangnhap; // Thay $user bằng tên biến chứa thông tin tên đăng nhập của người dùng
                                    ?>
                                        <a type="button" class="position-relative text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="icon-login"><i class="fa-solid fa-user"></i></span>
                                            <span class="fs-6 ms-1 text-dark"><?php echo $display_name; ?></span>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <?php if ($role == 0) { ?>
                                                <!-- Nếu là user -->
                                                <li><a class="dropdown-item" href="index.php?act=mybill">Đơn hàng của tôi</a></li>
                                                <li><a class="dropdown-item" href="index.php?act=thongtintaikhoan">Thông tin tài khoản</a></li>
                                                <li><a class="dropdown-item" href="index.php?act=doimatkhau">Đổi mật khẩu</a></li>
                                            <?php } else { ?>
                                                <!-- Nếu là admin -->
                                                <li><a class="dropdown-item" href="index.php?act=quantri">Trang quản trị</a></li>
                                            <?php } ?>
                                            <li><a class="dropdown-item" href="index.php?act=thoat">Đăng xuất</a></li>
                                        </ul>
                                    <?php } else { ?>
                                        <a href="index.php?act=dangnhap" class="fs-6 ms-1 text-decoration-none text-dark">
                                            <span class="icon-login"><i class="fa-solid fa-user"></i></span>
                                            Đăng nhập
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- navbar menu -->
        <div class="line"></div>
        <div class="my_mainmenu">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid">
                                <a class="navbar-brand d-none" href="#">Navbar</a>
                                <button class="navbar-toggler" style="font-size: 10px;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link active text-white me-4 fw-bold" aria-current="page" href="index.php">Trang Chủ</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle text-white me-4 fw-bold" href="index.php?act=sanpham" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Sản Phẩm
                                            </a>
                                            <ul class="dropdown-menu">
                                                <?php
                                                $danhmucs = danhmuc_select_all();
                                                foreach ($danhmucs as $danhmuc) {
                                                    echo '<li><a class="dropdown-item" href="index.php?act=sanpham&id_danhmuc=' . $danhmuc['id'] . '">' . $danhmuc['tendanhmuc'] . '</a></li>';
                                                }
                                                ?>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active text-white me-4 fw-bold" aria-current="page" href="index.php?act=sanphambanchay">Best Seller</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active text-white me-4 fw-bold" aria-current="page" href="index.php?act=sanphamgiamgia">Sản Phẩm Giảm Giá</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active text-white me-4 fw-bold" aria-current="page" href="index.php?act=sanphamkhac">Sản phẩm khác</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active text-white me-4 fw-bold" aria-current="page" href="index.php?act=thanhtoan">Thanh Toán</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active text-white me-4 fw-bold" aria-current="page" href="index.php?act=lienhe">Liên Hệ</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="line"></div>
