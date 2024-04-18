<?php 
    session_start();
    include "../model/pdo.php";
    include "../model/user.php";
    if (isset($_POST["btndangky"])) {
        $email = $_POST['email'];
        $tendangnhap = $_POST['username'];
        $pass = $_POST['password'];
        $repass = $_POST['re_password'];
        // Kiểm tra mật khẩu nhập lại
        if ($pass != $repass) {
            echo "<p style='color: red; font-size: 1.6em;'>Mật khẩu nhập lại không khớp. Vui lòng thử lại.</p>";
        } else {
            $user = user_insert($name, $address, $email, $tendangnhap, $pass);
    
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://themify.me/themify-icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../layout/assests/css/base.css">
    <link rel="stylesheet" href="../layout/assests/css/main.css">
    <link rel="stylesheet" href="../layout/assests/css/grid.css">
    <link rel="stylesheet" href="../layout/assests/css/reponsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../layout/assests/fonts/fontawesome-free-6.5.1-web/fontawesome-free-6.5.1-web/css/all.min.css">
    <title> Shop Nông Sản Xanh </title>
    <style>
        .switch-btn__link{
            color: #6bbc6a;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="modal">
        <div class="modal_body">
            <!-- Register from -->
            <div class="auth-form">
                <div class="auth-form__container">
                    <div class="form-header">
                        <h3 class="form-heading">Đăng ký</h3>
                        <span class="form__switch-btn">
                            <a href="login.php" class="switch-btn__link">Đăng nhập</a>
                        </span>
                    </div>
                    <form method="post" action="" name="formRegister">

                    <?php
                        if (isset($_POST["btndangky"])) {
                            // Lấy dữ liệu từ form
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $repassword = $_POST['re_password'];
                        
                            // Kiểm tra mật khẩu nhập lại
                            if ($password != $repassword) {
                                echo "<p style='color: red; font-size: 1.6em;'>Mật khẩu nhập lại không khớp. Vui lòng thử lại.</p>";
                            } else {
                                // Kiểm tra xem tên người dùng đã tồn tại chưa
                                $check_query = "SELECT * FROM tbl_user WHERE user = '$username'";
                                $check_result = mysqli_query($conn, $check_query);
                        
                                if (mysqli_num_rows($check_result) > 0) {
                                    echo "<p style='color: red; font-size: 1.6em;'>Tên người dùng đã tồn tại. Vui lòng chọn tên người dùng khác.</p>";
                                } else {
                                    // Thêm tài khoản mới vào cơ sở dữ liệu
                                    $insert_query = "INSERT INTO tbl_user(user, pass) VALUES ('$username', '$password')";
                                    
                                    if (mysqli_query($conn, $insert_query)) {
                                        echo "<p style='font-size: 1.6em;'>Đăng ký thành công! Mời bạn đăng nhập</p>";
                                        header("Location: login.php");
                                        exit();
                                    } else {
                                        echo "<p style='color: red; font-size: 1.6em;'>Lỗi khi thêm tài khoản: </p>" . mysqli_error($conn);
                                    }
                                }
                            }
                        }
                    ?>

                        <div class="form">
                            <div class="form__group">
                                <input type="text" name="email" class="form__input" placeholder="Nhập Email">
                            </div>
                            <div class="form__group">
                                <input type="text" name="username" class="form__input" placeholder="Nhập tên đăng nhập">
                            </div>
                            <div class="form__group">
                                <input type="password" name="password" class="form__input" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="form__group">
                                <input type="password" name="re_password" class="form__input" placeholder="Nhập lại mật khẩu">
                            </div>
                        </div>

                        <div class="form__aside">
                            <p class="form__policy-text">
                                Bầng việc đăng ký, bạn đã đồng ý với Fresh Market về
                                <a href="" class="form__text-link">Điều khoản dịch vụ</a> &
                                <a href="" class="form__text-link">chính sách bảo mật</a>
                            </p>
                        </div>

                        <div class="form__controls">
                            <input class="btn btn-normal form__controls-back" type="submit" value="TRỞ LẠI"></input>
                            <input class="btn btn-primary" name="btndangky" type="submit" value="ĐĂNG KÝ"></input>
                        </div>
                    </form>
                </div>

                <div class="form__socials">
                    <a href="" class="socials-facebook btn btn-size-s btn__with-icon">
                        <i class="socials-icon fab fa-facebook"></i>
                        <span class="form__socials-title">Đăng nhập với Facebook</span>
                    </a>
                    <a href="" class="socials-google btn btn-size-s btn__with-icon">
                        <i class="socials-icon fab fa-google"></i>
                        <span class="form__socials-title">Đăng nhập với Google</span>

                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>