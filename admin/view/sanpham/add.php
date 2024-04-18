<style>
    .container {
        display: flex;
        align-items: flex-start;
    }
</style>

<section> 
<h2>SẢN PHẨM</h2>
<div class="container">
    <form action="index.php?act=sanpham_add" method="post" enctype="multipart/form-data">
        <!-- load ra san pham -->
        <select class="chon" name="iddm" id="">
            <option value="0">Chọn danh mục</option>
            <?php
                if (isset($dsdm)){
                    foreach($dsdm as $dm){
                        echo '<option value="'.$dm['id'].'">'.$dm['tendanhmuc'].'</option>';
                    }
                }
            ?>
        </select>
        <input class="textbox" type="text" name="tensanpham" placeholder="Tên sản phẩm">
        <input class="textbox" type="file" name="img">
        <?php 
            if (isset($uploadOk) && ($uploadOk == 0)){
                echo "Yêu cầu nhập đúng file hình ảnh!";
            }
        ?>
        <input class="textbox" type="text" name="gia" placeholder="Giá">
        <input class="textbox" type="text" name="giakhuyenmai" placeholder="Giá khuyến mãi">
        <select class="chon" name="sanphamkhuyenmai">
            <option value="0">0 - Không khuyến mãi</option>
            <option value="1">1 - Sản phẩm khuyến mãi</option>
        </select>
        <select class="chon" name="bestseller">
            <option value="0">0 - Sản phẩm không bestseller</option>
            <option value="1">1 - Sản phẩm bestseller</option>
        </select>
        <input class="addsanpham" type="submit" name="themmoi" value="Thêm mới"> 
    </form>
    <br>
    <table>
        <tr>
            <th class="stt">STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá bán</th>
            <th>Giá khuyến mãi</th>
            <th>Sản phẩm khuyễn mãi</th>
            <th>Sản phẩm bestseller</th>
            <th>Thao tác</th>
        </tr>

        <?php

            if(isset($kq) && (count($kq) > 0)){
                $i = 1;
                foreach ($kq as $item) {
                    // Định dạng giá với dấu chấm giữa các nhóm hàng nghìn
                    $gia_format = number_format($item['gia'], 0, ',', '.');
                    $giakhuyenmai_format = number_format($item['giakhuyenmai'], 0, ',', '.');
                    echo '<tr>
                            <td class="stt">'.$i.'</td>
                            <td>'.$item['tensanpham'].'</td>
                            <td> <img src="'.$item['img'].'" width="80px"></td>
                            <td>' . $gia_format . ' VND</td>
                            <td>' . $giakhuyenmai_format . ' VND</td>
                            <td>' . $item['sanphamkhuyenmai'] . ' </td>
                            <td>' . $item['bestseller'] . ' </td>
                            <td>
                                <a href="index.php?act=sanpham_add&id='.$item['id'].'">Thêm</a>
                                <a href="index.php?act=updatespform&id='.$item['id'].'">Sửa</a>
                                <a href="index.php?act=delsp&id='.$item['id'].'">Xóa</a>
                            </td>
                        </tr>';
                        $i++;
                }
            }
        ?>

    </table>

    </div>
</section>
