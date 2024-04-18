<style>
    .container {
        display: flex;
        align-items: flex-start;
    }
</style>

<section>
<h2>CẬP NHẬT SẢN PHẨM</h2>
<div class="container">
    <form action="index.php?act=sanpham_update" method="post" enctype="multipart/form-data">
        <!-- load ra san pham -->
        <select class="chon" name="iddm" id="">
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
        <input class="textbox" type="text" name="tensanpham" placeholder="Tên sản phẩm" value="<?=$spct[0]['tensanpham']?>">
        <input class="textbox" type="file" name="img" required>
        <img src="<?=$spct[0]['img']?>" width=80 alt="">
        <?php 
            if (isset($uploadOk) && ($uploadOk == 0)){
                echo "Yêu cầu nhập đúng file hình ảnh!";
            }
        ?>
        <input class="textbox" type="text" name="gia" placeholder="Giá" value="<?=$spct[0]['gia']?>">
        <input class="textbox" type="text" name="giakhuyenmai" placeholder="Giá khuyễn mãi" value="<?=$spct[0]['giakhuyenmai']?>">
        <select class="chon" name="sanphamkhuyenmai">
            <option value="0" <?php if ($spct[0]['sanphamkhuyenmai'] == 0) echo 'selected'; ?>> 0 - Không khuyến mãi </option>
            <option value="1" <?php if ($spct[0]['sanphamkhuyenmai'] == 1) echo 'selected'; ?>> 1 - Sản phẩm khuyến mãi </option>
        </select>
        <select class="chon" name="bestseller">
            <option value="0" <?php if ($spct[0]['bestseller'] == 0) echo 'selected'; ?>> 0 - Sản phẩm không bestseller </option>
            <option value="1" <?php if ($spct[0]['bestseller'] == 1) echo 'selected'; ?>> 1 - Sản phẩm bestseller </option>
        </select>
        <input type="hidden" name="id"  value="<?=$spct[0]['id']?>">
        <input class="addsanpham" type="submit" name="capnhat" value="Cập nhật"> 
    </form>
    <br>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá bán</th>
            <th>Giá khuyến mãi</th>
            <th>Sản phẩm khuyến mãi</th>
            <th>Bestseller</th>
            <th>Thao tác</th>
        </tr>

        <?php
            //var_dump($kq);
            if(isset($kq) && (count($kq) > 0)){
                $i = 1;
                foreach ($kq as $item) {
                    echo '<tr>
                            <td class="stt">'.$i.'</td>
                            <td>'.$item['tensanpham'].'</td>
                            <td> <img src = "'.$item['img'].'" width ="80px"></td>
                            <td>'.$item['gia'].'</td>
                            <td>'.$item['giakhuyenmai'].'</td>
                            <td>' . $item['sanphamkhuyenmai'] . ' </td>
                            <td>' . $item['bestseller'] . ' </td>
                            <td>
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




