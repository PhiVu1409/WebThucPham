<style>
    .container {
        display: flex;
        align-items: flex-start;
    }
</style>

<section>
<h2>SẢN PHẨM</h2>
<div class="container">
    <form action="index.php?act=sanpham" method="post" enctype="multipart/form-data">
        <input type="text" name="kyw" placeholder="Nhập từ khóa tìm kiếm">
        <select class="chon" name="iddm" id="">
                <option value="0" selected>Tất cả</option>
                <?php
                    foreach($dsdm as $dm){
                        echo '<option value="'.$dm['id'].'">'.$dm['tendanhmuc'].'</option>';
                    }
                ?>
            </select>
            <input class="addsanpham" type="submit" name="search" value="Tìm kiếm">
    </form>
    <table>
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

        <?php

            if(isset($kq) && (count($kq) > 0)){
                $i = 1;
                foreach ($kq as $item) {
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




<!-- <td>'.$item['gia'].'</td> -->
<!-- <td> <img src = "'.$item['img'].'" width ="80px"></td> -->