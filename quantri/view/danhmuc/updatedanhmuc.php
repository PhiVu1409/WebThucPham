    <div class="container-fluid">
        <h1 class="h4 mb-2 text-gray-800">CẬP NHẬT DANH MỤC SẢN PHẨM</h1>
        <section>
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách danh mục</h6>
                    <form action="index.php?act=updatedmform" method="post">
                        <input type="text" name="tendm" value="<?=$kqone['tendanhmuc']?>">
                        <input type="hidden" name="id" value="<?=$kqone['id']?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
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
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                            <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                            <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            

        </section>
    </div>
