<?php 
?>


<div class="wrapper">
    <div class="container">
        <div class="row justify-content-around">
            <form action="index.php?act=dangky" method="post" class="col-md-5 bg-light p-3 my-3">
                <h3 class="text-center text-uppercase py-3 fs-5 fw-bold">Đăng Ký Tài Khoản</h3>
                <?php foreach ($errors as $error) : ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endforeach; ?>
                <div class="form-group py-2">
                    <label class="fs-6 ms-2" for="tendangnhap">Tên đăng nhập</label>
                    <input type="text" name="tendangnhap" id="tendangnhap" class="form-control" placeholder="Nhập tên đăng nhập">
                </div>
                <div class="form-group py-2">
                    <label class="fs-6 ms-2" for="password">Mật khẩu</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu">
                </div>
                <div class="form-group py-2">
                    <label class="fs-6 ms-2" for="confirm_password">Nhập lại mật khẩu</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu">
                </div>
                <div class="icon-link p-2">
                    <a href="#" class="help text-decoration-none text-black">Cần trợ giúp?</a>
                </div>
                <br>
                <div class="row p-3">
                    <input type="submit" class="btn-success btn" name="dangky" value="Đăng Ký">
                </div>
            </form>
        </div>
    </div>
</div>