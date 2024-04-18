<section>
    <h2>CẬP NHẬT DANH MỤC SẢN PHẨM</h2>
    <form action="index.php?act=updatedmform" method="post">
        <div>
            <input style="max-width: 200px;" type="text" name="tendm" value="<?=$kqone['tendanhmuc']?>">
            <input type="hidden" name="id" value="<?=$kqone['id']?>">
            <input type="submit" name="capnhat" value="Cập nhật">
        </div>
        
    </form>
    <br>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>Home</th>
            <th>Vị trí</th>
            <th>Thao tác</th>
        </tr>

        <?php
            //var_dump($kq);
            if(isset($kq) && (count($kq) > 0)){
                $i = 1;
                foreach ($kq as $dm) {
                    echo '<tr>
                            <td>'.$i.'</td>
                            <td>'.$dm['tendanhmuc'].'</td>
                            <td>'.$dm['home'].'</td>
                            <td>'.$dm['stt'].'</td>
                            <td>
                                <a href="index.php?act=updatedmform&id='.$dm['id'].'">Sửa</a>
                                <a href="index.php?act=deldm&id='.$dm['id'].'">Xóa</a>
                            </td>
                        </tr>';
                        $i++;
                }
            }
        ?>
        
    </table>


</section>