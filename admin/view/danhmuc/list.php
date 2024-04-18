<section>
    <h2>DANH MỤC SẢN PHẨM</h2>
    <form class="formAdd_dm" action="index.php?act=adddm" method="post">
        <input class="addTitle" type="text" name="tendm" placeholder="Nhập tên danh mục">
        <input class="add" type="submit" name="themmoi" value="Thêm mới">
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