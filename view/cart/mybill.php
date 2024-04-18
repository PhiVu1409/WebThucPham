<div class="my_cart">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card shadow mb-3 mt-3">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary">ĐƠN HÀNG CỦA BẠN</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">STT</th>
                                        <th class="text-center align-middle">Mã đơn hàng</th>
                                        <th class="text-center align-middle">Ngày đặt hàng</th>
                                        <th class="text-center align-middle">Số lượng mặt hàng</th>
                                        <th class="text-center align-middle">Tổng giá trị đơn hàng</th>
                                        <th class="text-center align-middle">Tình trạng đơn hàng</th>
                                    </tr>

                                    <?php
                                        $i = 1;
                                        if(is_array($listbill)){
                                            foreach($listbill as $bill){
                                                $ttdh = get_ttdh($bill['status']);
                                                $countsp = loadAll_cart_count($bill['id']);
                                                $tong = $bill['total'];
                                                echo '
                                                    <tr >
                                                        <td class="text-center align-middle">' . $i . '</td>
                                                        <td class="text-center align-middle">' . $bill['id'] . '</td>
                                                        <td class="text-center align-middle">' . $bill['ngaydathang'] . '</td>
                                                        <td class="text-center align-middle">' . $countsp . '</td>
                                                        <td class="text-center align-middle">' . number_format($tong, 3, ',', '.'). '</td>
                                                        <td class="text-center align-middle">' . $ttdh . '</td>
                                                    </tr>
                                                ';
                                                $i++;
                                            }
                                        }
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

