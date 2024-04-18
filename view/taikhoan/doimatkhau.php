<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lấy lại mật khẩu</title>
    <style>
        .icon-link:hover .help {
            color: #52a851 !important;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="row justify-content-around mb-5">
                <form id="passwordResetForm" action="index.php?act=laymatkhau" method="post" class="col-md-5 bg-light p-3 my-3">
                    <h3 class="text-center text-uppercase py-3 fs-5 fw-bold">Lấy lại Mật khẩu</h3>
                    <div class="form-group py-2">
                        <label class="fs-6 ms-2" for="tendangnhap">Tên đăng nhập</label>
                        <input type="text" name="tendangnhap" id="tendangnhap" class="form-control" placeholder="Nhập tên đăng nhập">
                    </div>
                    <div class="form-group py-2">
                        <label class="fs-6 ms-2" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Nhập địa chỉ email">
                    </div>
                    <br>
                    <div class="row justify-content-end">
                        <div class="col-2 text-end">
                            <input type="submit" class="btn-secondary btn" name="trolai" value="Trở Lại">
                        </div>
                        <div class="col-4 text-end">
                            <input type="submit" class="btn-success btn w-100" name="laymatkhau" value="Lấy lại Mật khẩu">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lấy tham chiếu đến form
            var passwordResetForm = document.getElementById('passwordResetForm');

            // Thêm sự kiện submit form
            passwordResetForm.addEventListener('submit', function(event) {
                // Lấy giá trị của các trường nhập liệu
                var tendangnhap = document.getElementById('tendangnhap').value;
                var email = document.getElementById('email').value;

                // Kiểm tra xem các trường đã được nhập hay chưa
                if (tendangnhap.trim() === '' || email.trim() === '') {
                    // Ngăn chặn form từ việc submit
                    event.preventDefault();

                    // Hiển thị thông báo lỗi
                    alert('Vui lòng nhập đầy đủ thông tin để lấy lại mật khẩu.');
                }
            });
        });
    </script>

</body>

</html>