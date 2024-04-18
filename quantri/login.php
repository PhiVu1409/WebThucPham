<?php
    session_start();
    include "../model/pdo.php";
    include "../model/user.php";

    if(isset($_POST['btndangnhap'])){
        $tendangnhap = $_POST['username'];
        $pass = $_POST['password'];
        $user = checkuser($tendangnhap, $pass);
        if(isset($user) && (is_array($user)) && (count($user) > 0)){
            extract($user);
            if($role == 1){
                $_SESSION['s_user'] = $user;
                header('location: index.php');
                exit();
            }else{
                $thongbao = "Tài khoản không có quyền đăng nhập vào trang quản trị";
            }
        }else{
            $thongbao = "Tài khoản không tồn tại hoặc chưa đăng ký!";
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
    <link rel="stylesheet" href="../layout/assests/style.css">
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
            <!-- Login form -->
            <div class="auth-form">
                <div class="auth-form__container">
                    <div class="form-header">
                        <h3 class="form-heading">Đăng nhập</h3>
                        <span class="form__switch-btn">
                            <a href="register.php" class="switch-btn__link">Đăng ký</a>
                        </span>
                        
                    </div>
                    <?php
                        if (isset($thongbao) && $thongbao != "") {
                            echo "<span style='color: red; font-size: 16px; margin-left: 10px;'>" . $thongbao . "</span>";
                        }
                    ?>

                    <form method="post" action="login.php" name="formLogin">
                        <div class="form">
                            <div class="form__group">
                                <input type="text" name="username" class="form__input" placeholder="Nhập tên đăng nhập" required>
                            </div>
                            <div class="form__group">
                                <input type="password" name="password" class="form__input" placeholder="Nhập mật khẩu" required>
                            </div>
                        </div>

                        <div class="form__aside">
                            <div class="form_help">
                                <a href="" class="form_help-link help-forgot">Quên mật khẩu</a>
                                <span class="form_help-separate"></span>
                                <a href="../index.php?act=lienhe" class="form_help-link">Cần trợ giúp?</a>
                            </div>
                        </div>

                        <div class="form__controls">
                            <button type="submit" class="btn btn-normal form__controls-back" name="btntrolai">TRỞ LẠI</button>
                            <button type="submit" class="btn btn-primary" name="btndangnhap">ĐĂNG NHẬP</button>
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