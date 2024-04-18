<?php                               
    if(isset($_SESSION['s_user']) && (count($_SESSION['s_user']) > 0)){
        extract($_SESSION['s_user']);
    }else{
        echo "<h2>Lỗi</h2>";
    }
?>

<div class="my_account">
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="index.php?act=capnhatthongtin" method="post">
                    <div class="card shadow mb-3 mt-3">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Lấy thông tin tài khoản thành công</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td class="thongtin_account fw-bold">Tên đăng nhập</td>
                                            <td>
                                                <?=$tendangnhap?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="thongtin_account fw-bold">Mật khẩu</td>
                                            <td>
                                                <?=$pass?>
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</div>