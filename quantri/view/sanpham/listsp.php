    <div class="container-fluid">
        <div style="display: flex; align-items: center;">
            <h1 class="h4 mb-2 text-gray-800" style="flex: 1;">SẢN PHẨM</h1>
            <a href="index.php?act=sanpham_add">
                <input type="submit" name="addsp" value="Thêm sản phẩm" class="btn btn-primary m-0" style="border-radius: 5px; padding: 3px 10px; font-size: 0.8rem; height: 40px;">
            </a>
        </div>

        <section class="mt-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>

                    <form action="index.php?act=sanpham" method="post" enctype="multipart/form-data" class="d-flex">
                        <div class="d-flex flex-row align-items-center">
                            <div class="form-group m-0 mr-2">
                                <input class="form-control bg-light border-2 small" type="text" name="kyw" placeholder="Nhập từ khóa tìm kiếm">
                            </div>
                            <div class="form-group m-0 mr-2 d-flex align-items-center justify-content-center">
                                <select class="bg-light border-2 small form-control" name="iddm" id="">
                                    <option value="0" selected>Tất cả</option>
                                    <?php
                                        foreach($dsdm as $dm){
                                            echo '<option value="'.$dm['id'].'">'.$dm['tendanhmuc'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>

                            <input type="submit" name="search" value="Tìm kiếm" class="btn btn-primary m-0" style="border-radius: 5px; padding: 3px 10px; font-size: 0.8rem; height: 40px;">
                        </div>
                    </form>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="stt"></th>
                                    <th class="stt">STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Giá bán</th>
                                    <th>Giá khuyến mãi</th>
                                    <th>Sản phẩm khuyễn mãi</th>
                                    <th>Bestseller</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($dssp) && (count($dssp) > 0)){
                                        $i = 1;
                                        foreach ($dssp as $item) {
                                            // Định dạng giá với dấu chấm giữa các nhóm hàng nghìn
                                            $gia_format = number_format($item['gia'], 0, ',', '.');
                                            $giakhuyenmai_format = number_format($item['giakhuyenmai'], 0, ',', '.');
                                            echo '<tr>
                                                    <td class="stt"><input type="checkbox" name="myCheckbox"></td>
                                                    <td class="stt">'.$i.'</td>
                                                    <td>'.$item['tensanpham'].'</td>
                                                    <td> <img src="'.$item['img'].'" width="80px"></td>
                                                    <td>' . $gia_format . ' đ</td>
                                                    <td>' . $giakhuyenmai_format . ' đ</td>
                                                    <td>' . $item['sanphamkhuyenmai'] . ' </td>
                                                    <td>' . $item['bestseller'] . ' </td>
                                                    <td>
                                                        <a style="text-decoration: none;" href="index.php?act=updatespform&id='.$item['id'].'">Sửa</a>
                                                        <a style="text-decoration: none;" href="index.php?act=delsp&id='.$item['id'].'">Xóa</a>
                                                    </td>
                                                </tr>'; 
                                                $i++;
                                        }
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
                                    echo '<li class="paginate_button page-item previous" id="dataTable_previous"><a href="index.php?act=sanpham&page='.($page - 1).'" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>';
                                }

                                // Hiển thị các trang
                                for ($i = $start_page; $i <= $end_page; $i++) {
                                    if ($i == $page) {
                                        echo '<li class="paginate_button page-item active"><span class="page-link">'.$i.'</span></li>';
                                    } else {
                                        echo '<li class="paginate_button page-item"><a href="index.php?act=sanpham&page='.$i.'" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">'.$i.'</a></li>';
                                    }
                                }

                                // Hiển thị nút Next
                                if ($page < $total_pages) {
                                    echo '<li class="paginate_button page-item next" id="dataTable_next"><a href="index.php?act=sanpham&page='.($page + 1).'" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>';
                                }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>

        </section>
    </div>
