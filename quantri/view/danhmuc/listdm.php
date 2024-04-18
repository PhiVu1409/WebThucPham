    <div class="container-fluid">
        <h1 class="h4 mb-2 text-gray-800">DANH MỤC CỦA SẢN PHẨM</h1>
        <section>
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách danh mục</h6>

                    <form class="formAdd_dm" action="index.php?act=adddm" method="post">
                        <input class="addTitle" type="text" name="tendm" placeholder="Nhập tên danh mục">
                        <input class="add" type="submit" name="themmoi" value="Thêm mới">
                    </form>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên danh mục</th>
                                    <th>Home</th>
                                    <th>Vị trí</th>
                                    <th class="thaotac">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //var_dump($kq);
                                if (isset($dsdm) && (count($dsdm) > 0)) {
                                    $i = 1;
                                    foreach ($dsdm as $dm) {
                                        echo '<tr>
                                                <td>' . $i . '</td>
                                                <td>' . $dm['tendanhmuc'] . '</td>
                                                <td>' . $dm['home'] . '</td>
                                                <td>' . $dm['stt'] . '</td>
                                                <td>
                                                    <a style="text-decoration: none;" href="index.php?act=updatedmform&id=' . $dm['id'] . '">Sửa</a>
                                                    <a style="text-decoration: none;" href="index.php?act=deldm&id=' . $dm['id'] . '">Xóa</a>
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
                                    echo '<li class="paginate_button page-item previous" id="dataTable_previous"><a href="index.php?act=danhmuc&page='.($page - 1).'" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>';
                                }

                                // Hiển thị các trang
                                for ($i = $start_page; $i <= $end_page; $i++) {
                                    if ($i == $page) {
                                        echo '<li class="paginate_button page-item active"><span class="page-link">'.$i.'</span></li>';
                                    } else {
                                        echo '<li class="paginate_button page-item"><a href="index.php?act=danhmuc&page='.$i.'" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">'.$i.'</a></li>';
                                    }
                                }

                                // Hiển thị nút Next
                                if ($page < $total_pages) {
                                    echo '<li class="paginate_button page-item next" id="dataTable_next"><a href="index.php?act=danhmuc&page='.($page + 1).'" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>';
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>