<div class="container-fluid">
    <section class="mt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="container">
                        <h3 class="mt-3 d-flex flex-row align-items-center justify-content-center text-dark fw-bold mb-3">CẬP NHẬT SẢN PHẨM</h3>
                        <form action="index.php?act=sanpham_update" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="iddm">Danh mục:</label>
                                    <select class="form-control chon" name="iddm" id="iddm">
                                        <option value="0">Chọn danh mục</option>
                                        <?php
                                            //Lấy iddm hiện tại
                                            $iddmcur = $spct[0]['iddm']; //load dữ liệu lên
                                            if (isset($dsdm)){
                                                foreach($dsdm as $dm){
                                                    if ($dm['id'] == $iddmcur)
                                                        echo '<option value="'.$dm['id'].'" selected>'.$dm['tendanhmuc'].'</option>';
                                                    else
                                                        echo '<option value="'.$dm['id'].'">'.$dm['tendanhmuc'].'</option>';
                                                }   
                                            }
                                        ?>  
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="tensanpham">Tên sản phẩm:</label>
                                    <input class="form-control textbox" type="text" name="tensanpham" id="tensanpham" placeholder="Tên sản phẩm" value="<?=$spct[0]['tensanpham']?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="gia">Giá:</label>
                                    <input class="form-control textbox" type="text" name="gia" id="gia" placeholder="Giá" value="<?=$spct[0]['gia']?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="giakhuyenmai">Giá khuyến mãi:</label>
                                    <input class="form-control textbox" type="text" name="giakhuyenmai" id="giakhuyenmai" placeholder="Giá khuyễn mãi" value="<?=$spct[0]['giakhuyenmai']?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="sanphamkhuyenmai">Sản phẩm khuyến mãi:</label>
                                    <select class="form-control chon d-block" name="sanphamkhuyenmai" id="sanphamkhuyenmai">
                                        <option value="0" <?php if ($spct[0]['sanphamkhuyenmai'] == 0) echo 'selected'; ?>> 0 - Không khuyến mãi </option>
                                        <option value="1" <?php if ($spct[0]['sanphamkhuyenmai'] == 1) echo 'selected'; ?>> 1 - Sản phẩm khuyến mãi </option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="bestseller">Sản phẩm bestseller:</label>
                                    <select class="form-control chon" name="bestseller" id="bestseller">
                                        <option value="0" <?php if ($spct[0]['bestseller'] == 0) echo 'selected'; ?>> 0 - Sản phẩm không bestseller </option>
                                        <option value="1" <?php if ($spct[0]['bestseller'] == 1) echo 'selected'; ?>> 1 - Sản phẩm bestseller </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="img">Hình ảnh:</label>
                                    <?php 
                                        $img_name = basename($spct[0][3]); // Lấy tên của hình ảnh từ đường dẫn
                                    ?>
                                    <input class="form-control textbox" type="file" name="img" id="img" required>
                                    <img src="<?=$spct[0]['img']?>" width=80 alt="<?=$img_name?>"> <?=$img_name?>
                                    <?php 
                                        if (isset($uploadOk) && ($uploadOk == 0)){
                                            echo "Yêu cầu nhập đúng file hình ảnh!";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex justify-content-end">
                                <input type="hidden" name="id"  value="<?=$spct[0]['id']?>">
                                <input class="d-block btn btn-primary" style="height: 38px;" type="submit" name="capnhat" value="Cập nhật">
                                <a href="index.php?act=sanpham" class="btn btn-secondary ml-2" style="height: 38px;">Quay lại</a>
                            </div>
                        </form> 
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
