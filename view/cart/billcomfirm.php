<?php
    if (!session_id()) {
        session_start();
    }
?>
<div class="my_cart">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card shadow mb-2 mt-2">
                    <div class="card-header">
                        <h4 class="text-center m-0 mb-2 font-weight-bold text-uppercase" style="color: #4CAF50;">Đơn hàng của quý khách đã được đặt thành công!</h4>
                        <h5 class="text-center m-0 font-weight-bold">Cảm ơn quý khách đã đặt hàng! Chúc quý khách ngày mới vui vẻ </h5>
                    </div>
                </div>
            </div>
        </div>

        <?php
            if(isset($bill) &&(is_array($bill))){
                if (isset($bill[0]['ngaydathang'])) {
                    // Lấy thời gian hiện tại
                    $current_time = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
                    $current_formatted_time = $current_time->format('Y-m-d H:i:s');
                    // Cập nhật giá trị "ngaydathang" trong mảng $bill
                    $bill[0]['ngaydathang'] = $current_formatted_time;
                }
                extract($bill);
                //lấy id của đơn hàng
                $id = isset($billct[0]['id']) ? intval($billct[0]['id']) : 0;
                //lấy idbill từ đơn hàng 
                $idbill = isset($billct[0]['idbill']) ? intval($billct[0]['idbill']) : 0;
                // 1 hàm lấy cả 2 
                //$IdOrBill = isset($billct[0]['id']) ? intval($billct[0]['id']) : (isset($billct[0]['idbill']) ? intval($billct[0]['idbill']) : '');
            
            }
        ?>  

        <div class="row">
            <div class="col-7">
                <div class="card shadow mb-3">
                    <div class="card-header">
                        <h5 class="m-0 font-weight-bold text-primary text-uppercase">Thông tin đặt hàng</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <!-- /* ------------------- THÔNG TIN CHỖ NÀY PHẢI LẤY TỪ BILL ------------------- */ -->
                                <thead>
                                    <tr>
                                        <td class="thongtin fw-bold">Người đặt hàng</td>
                                        <td> <?= $bill[0]['name'] ?> </td>
                                    </tr>
                                    <tr>
                                        <td class="thongtin fw-bold">Địa chỉ nhận hàng</td>
                                        <td>
                                            <?= $bill[0]['address']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="thongtin fw-bold">Email</td>
                                        <td>
                                            <?= $bill[0]['email'];?>
                                        </td>
                                    </tr>
                                    <tr >
                                        <td class="thongtin fw-bold">Điện thoại</td>
                                        <td>
                                            0<?= $bill[0]['tel'];?>
                                        </td>
                                    </tr>
                                </thead>
                                <!-- /* ------------------- THÔNG TIN CHỖ NÀY PHẢI LẤY TỪ BILL ------------------- */ -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="card shadow mb-3">
                    <div class="card-header">
                        <h5 class="m-0 font-weight-bold text-primary text-uppercase">Theo dõi đơn hàng</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive"> 
                        <table>
                            <tr>
                                <td class="fw-bold">Mã đơn hàng:</td>
                                <td>
                                    <span><?= $idbill; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Ngày đặt hàng: </td>
                                <td>
                                    <span> <?= $current_formatted_time; ?></span>
                                </td>
                            </tr>
                        </table>
                           
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-3">
                    <div class="card-header">
                        <h5 class="m-0 font-weight-bold text-primary text-uppercase">Phương thước thanh toán</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table>
                                <tr>
                                    <?php
                                        $ptttText = "";
                                        if($pttt == 1){
                                            $ptttText = "Thanh toán trực tiếp";
                                        }
                                        if($pttt == 2){
                                            $ptttText = "Chuyển khoản";
                                        }
                                        if($pttt == 1){
                                            $ptttText = "Thanh toán qua MoMo";
                                        }
                                       echo '<p>Phương thức thanh toán: ' . $ptttText . '</p>';
                                    ?>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card shadow mb-3">
                    <div class="card-header">
                        <h5 class="m-0 font-weight-bold text-primary text-uppercase">Chi Tiết Đơn Hàng</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <?php
                                        bill_chi_tiet($billct);
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
