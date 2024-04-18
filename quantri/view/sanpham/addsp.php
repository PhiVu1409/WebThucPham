<div class="container-fluid">
    <section class="mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="container">
                        <h3 class="mt-3 d-flex flex-row align-items-center justify-content-center text-dark fw-bold mb-3">THÊM SẢN PHẨM</h3>
                        <form action="index.php?act=sanpham_add" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <select class="form-control chon" name="iddm" id="">
                                        <option value="0">Chọn danh mục</option>
                                        <?php
                                        if (isset($dsdm)) {
                                            foreach ($dsdm as $dm) {
                                                echo '<option value="' . $dm['id'] . '">' . $dm['tendanhmuc'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control textbox d-block" type="text" name="tensanpham" placeholder="Tên sản phẩm">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <input class="form-control textbox d-block" type="text" name="gia" placeholder="Giá">
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control textbox d-block" type="text" name="giakhuyenmai" placeholder="Giá khuyến mãi">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <select class="form-control chon d-block" name="sanphamkhuyenmai">
                                        <option value="0">0 - Không khuyến mãi</option>
                                        <option value="1">1 - Sản phẩm khuyến mãi</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control chon" name="bestseller">
                                        <option value="0">0 - Sản phẩm không bestseller</option>
                                        <option value="1">1 - Sản phẩm bestseller</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <input class="form-control textbox d-block" type="file" name="img">
                                </div>
                                <div class="col-md-6 d-flex justify-content-end">
                                    <input class="d-block btn btn-primary" style="height: 38px;" type="submit" name="themmoi" value="Thêm mới">
                                    <a href="index.php?act=sanpham" class="btn btn-secondary ml-2" style="height: 38px;">Quay lại</a>
                                </div>
                            </div>
                        </form> 
                        <br>
                    </div>
                </div>
            </div>
    </section>
</div>


<div class="container-fluid">
    <section class="mt-1">
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
                                foreach ($dsdm as $dm) {
                                    echo '<option value="' . $dm['id'] . '">' . $dm['tendanhmuc'] . '</option>';
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
                            if (isset($dssp) && (count($dssp) > 0)) {
                                $i = 1;
                                foreach ($dssp as $item) {
                                    // Định dạng giá với dấu chấm giữa các nhóm hàng nghìn
                                    $gia_format = number_format($item['gia'], 0, ',', '.');
                                    $giakhuyenmai_format = number_format($item['giakhuyenmai'], 0, ',', '.');
                                    echo '<tr>
                                                <td class="stt"><input type="checkbox" name="myCheckbox"></td>
                                                <td class="stt">' . $i . '</td>
                                                <td>' . $item['tensanpham'] . '</td>
                                                <td> <img src="' . $item['img'] . '" width="80px"></td>
                                                <td>' . $gia_format . ' đ</td>
                                                <td>' . $giakhuyenmai_format . ' đ</td>
                                                <td>' . $item['sanphamkhuyenmai'] . ' </td>
                                                <td>' . $item['bestseller'] . ' </td>
                                                <td>
                                                    <a style="text-decoration: none;" href="index.php?act=updatespform&id=' . $item['id'] . '">Sửa</a>
                                                    <a style="text-decoration: none;" href="index.php?act=delsp&id=' . $item['id'] . '">Xóa</a>
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
                                $show_pages = 3;

                                // Tính toán chỉ số trang bắt đầu và kết thúc
                                $start_page = max(1, $page - $show_pages);
                                $end_page = min($total_pages, $page + $show_pages);

                                // Hiển thị nút Previous
                                if ($page > 1) {
                                    echo '<li class="paginate_button page-item previous" id="dataTable_previous"><a href="index.php?act=sanpham_add&page='.($page - 1).'" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>';
                                }

                                // Hiển thị các trang
                                for ($i = $start_page; $i <= $end_page; $i++) {
                                    if ($i == $page) {
                                        echo '<li class="paginate_button page-item active"><span class="page-link">'.$i.'</span></li>';
                                    } else {
                                        echo '<li class="paginate_button page-item"><a href="index.php?act=sanpham_add&page='.$i.'" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">'.$i.'</a></li>';
                                    }
                                }

                                // Hiển thị nút Next
                                if ($page < $total_pages) {
                                    echo '<li class="paginate_button page-item next" id="dataTable_next"><a href="index.php?act=sanpham_add&page='.($page + 1).'" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>';
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>


    </section>
</div>