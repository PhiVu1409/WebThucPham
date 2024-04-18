<?php                               
    if(isset($_SESSION['s_user'])){
        $name = $_SESSION['s_user']['name'];
        $address = $_SESSION['s_user']['address'];
        $email = $_SESSION['s_user']['email'];
        $tel = $_SESSION['s_user']['tel'];
    }else{
        $name = "";
        $address = "";
        $email = "";
        $tel = "";
    } 
?>

<div class="my_account">
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="index.php?act=capnhatthongtintaikhoan" method="post">
                    <div class="card shadow mb-3 mt-3">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Thông tin tài khoản</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td class="thongtin_account fw-bold">Họ và tên</td>
                                            <td>
                                                <input class="txt_account form-control" type="text" name="name" value="<?=$name?>">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="thongtin_account fw-bold">Địa chỉ</td>
                                            <td>
                                                <input class="txt_account form-control" type="text" name="address" value="<?=$address?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="thongtin_account fw-bold">Email</td>
                                            <td>
                                                <input class="txt_account form-control" type="text" name="email" value="<?=$email?>">
                                            </td>
                                        </tr>
                                        <tr >
                                            <td class="thongtin_account fw-bold">Điện thoại</td>
                                            <td>
                                                <input class="txt_account form-control" type="text" name="tel" value="<?=$tel?>">
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                                <div class="xacnhan_donhang">
                                    <input type="hidden" name="id" value="<?=$id?>">

                                    <input class="btn_capnhatthongtin" type="submit" name="capnhat" value="Cập nhật thông tin">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>