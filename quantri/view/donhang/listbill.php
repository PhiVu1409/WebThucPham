<div class="container-fluid">
        <h1 class="h4 mb-2 text-gray-800">DANH MỤC SÁCH ĐƠN HÀNG</h1>
        <section>
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng</h6>
                    <form action="index.php?act=sanpham" method="post" enctype="multipart/form-data" class="d-flex">
                        <!-- <div class="d-flex flex-row align-items-center">
                            <div class="form-group m-0 mr-2">
                                <input class="form-control bg-light border-2 small" type="text" name="kyw" placeholder="Nhập từ khóa tìm kiếm">
                            </div>
                            <input type="submit" name="search" value="Tìm kiếm" class="btn btn-primary m-0" style="border-radius: 5px; padding: 3px 10px; font-size: 0.8rem; height: 40px;">
                        </div> -->
                    </form>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Khách hàng</th>
                                    <th>Số lượng hàng</th>
                                    <th>Gía trị đơn hàng</th>
                                    <th>Tình trạng đơn hàng</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($dsdh as $bill){
                                        extract($bill);
                                        $khachhang = $bill["name"]. '
                                        <br> '.$bill["email"]. ' 
                                        <br> '.$bill["address"].'
                                        <br> '.$bill["tel"];
                                        $ttdh = get_ttdh($bill['status']);
                                        $countsp = loadAll_cart_count($bill['id']);
                                        // Định dạng giá với dấu chấm giữa các nhóm hàng nghìn
                                        // $gia_format = number_format($item['gia'], 0, ',', '.');
                                        echo '
                                        <tr>
                                            <td>'.$bill['id'].'</td>
                                            <td>'.$khachhang.'</td>
                                            <td>'.$countsp.'</td>
                                            <td>'.$bill['total'].'</td>
                                            <td>'.$ttdh.'</td>
                                            <td>
                                                <div class="a-fix">
                                                <a href="index.php?act=updatebill&id='.$bill['id'].'&value=1">Xác nhận</a>
                                                <a href="index.php?act=updatebill&id='.$bill['id'].'&value=2">Đang giao</a>
                                                <a href="index.php?act=updatebill&id='.$bill['id'].'&value=3">Đã giao</a>
                                                <a href="index.php?act=delbill&id='.$bill['id'].'">Xóa</a>
                                                </div>
                                            </td>
                                        </tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 d-flex justify-content-center">
                    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                        <ul class="pagination">
                            <?php
                                // Số lượng trang hiển thị xung quanh trang hiện tại
                                $show_pages = 5;

                                // Tính toán chỉ số trang bắt đầu và kết thúc
                                $start_page = max(1, $page - $show_pages);
                                $end_page = min($total_pages, $page + $show_pages);

                                // Hiển thị nút Previous
                                if ($page > 1) {
                                    echo '<li class="paginate_button page-item previous" id="dataTable_previous"><a href="index.php?act=listbill&page='.($page - 1).'" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>';
                                }

                                // Hiển thị các trang
                                for ($i = $start_page; $i <= $end_page; $i++) {
                                    if ($i == $page) {
                                        echo '<li class="paginate_button page-item active"><span class="page-link">'.$i.'</span></li>';
                                    } else {
                                        echo '<li class="paginate_button page-item"><a href="index.php?act=listbill&page='.$i.'" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">'.$i.'</a></li>';
                                    }
                                }

                                // Hiển thị nút Next
                                if ($page < $total_pages) {
                                    echo '<li class="paginate_button page-item next" id="dataTable_next"><a href="index.php?act=listbill&page='.($page + 1).'" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>';
                                }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
            

        </section>
    </div>