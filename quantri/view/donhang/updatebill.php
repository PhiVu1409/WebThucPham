<style>
    .container {
        display: flex;
        align-items: flex-start;
    }
</style>

<section>
<h2>DANH SÁCH ĐƠN HÀNG</h2>
<div class="container">
    <form action="index.php?act=listbill" method="post" enctype="multipart/form-data">
        <input type="text" name="kyw" placeholder="Nhập từ khóa tìm kiếm">
        <input class="addsanpham" type="submit" name="search" value="Tìm kiếm">
    </form>
    <table>
        <tr>
            <th>Mã đơn hàng</th>
            <th>Khách hàng</th>
            <th>Số lượng hàng</th>
            <th>Gía trị đơn hàng</th>
            <th>Tình trạng đơn hàng</th>
            <th>Thao tác</th>
        </tr>

        <?php 
            foreach($listbill as $bill){
                extract($bill);
                $khachhang = $bill["bill_name"]. '
                <br> '.$bill["bill_email"]. ' 
                <br> '.$bill["bill_address"].'
                <br> '.$bill["bill_tel"];
                $ttdh = get_ttdh($bill['bill_status']);
                $countsp = loadAll_cart_count($bill['id']);
                // Định dạng giá với dấu chấm giữa các nhóm hàng nghìn
                // $gia_format = number_format($item['gia'], 0, ',', '.');
                echo '
                <tr>
                    <td>'.$bill['id'].'</td>
                    <td>'.$khachhang.'</td>
                    <td>'.$countsp.'</td>
                    <td>'.$bill['total'].'</td>
                    <td>'.$ttdh.'</td>
                    <td>
                        <a href="index.php?act=updatebillform&id='.$bill['id'].'">Sửa</a>
                        <a href="index.php?act=delbill&id='.$bill['id'].'">Xóa</a>
                    </td>
                </tr>';
            }
        ?>

    </table>

    </div>
</section>
