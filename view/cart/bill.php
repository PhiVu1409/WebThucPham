<?php 
    // Kiểm tra khi form được submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Kiểm tra xem đã đăng nhập hay chưa
        if (isset($_SESSION['s_user'])) {
            // Lấy thông tin từ các input
            $name = isset($_POST['name']) ? $_POST['name'] : "";
            $address = isset($_POST['address']) ? $_POST['address'] : "";
            $email = isset($_POST['email']) ? $_POST['email'] : "";
            $tel = isset($_POST['tel']) ? $_POST['tel'] : "";
        }
    }
?>

<form action="index.php?act=billcomfirm" method="post">
    <div class="my_cart">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="card shadow mb-3 mt-3">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Thông tin đặt hàng</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td class="thongtin fw-bold">Người đặt hàng</td>
                                            <td>
                                                <input class="txt form-control" type="text" name="name" value="<?=$name?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="thongtin fw-bold">Địa chỉ nhận hàng</td>
                                            <td>
                                                <input class="txt form-control" type="text" name="address" value="<?=$address?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="thongtin fw-bold">Email</td>
                                            <td>
                                                <input class="txt form-control" type="text" name="email" value="<?=$email?>">
                                            </td>
                                        </tr>
                                        <tr >
                                            <td class="thongtin fw-bold">Điện thoại</td>
                                            <td>
                                                <input class="txt form-control" type="text" name="tel" value="<?=$tel?>">
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                                
                                <div class="pt_thanhtoan">
                                    <h5 class="mb-2 font-weight-bold text-primary">Phương thước thanh toán</h5>
                                    <table>
                                        <tr>
                                            <td> <input class="mx-2" type="radio" value="1" name="pttt" id="" checked>Thanh toán khi nhận hàng</td>
                                            <td> <input class="mx-2" type="radio" value="2" name="pttt" id=""> Chuyển khoản ngân hàng </td>
                                            <td> <input class="mx-2" type="radio" value="3" name="pttt" id=""> Thanh toán bằng momo</td>
                                        </tr>
                                    </table>
                                    <div class="container mt-3">
                                        <div class="row justify-content-end">
                                            <div class="col text-end">
                                                <input type="submit" name="dongydathang" class="btn btn-primary d-inline-block w-100" value="Đồng ý đặt hàng">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="col-5">
                    <div class="card shadow mb-3 mt-3">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Chi Tiết Giỏ Hàng</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        
                                        <?php
                                            viewChiTietCart();
                                        ?>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>