<?php 
    //global $img_path;
    function viewcart(){
        $i = 1;
        $id = 0;
        $tongtien = 0;

        echo'
            <tr>
                <th class="text-center align-middle">STT</th>
                <th class="text-center align-middle">Hình ảnh</th>
                <th class="text-center align-middle">Tên sản phẩm</th>
                <th class="text-center align-middle">Đơn giá</th>
                <th class="text-center align-middle">Số lượng</th>
                <th class="text-center align-middle">Thành tiền</th>
                <th class="text-center align-middle">Thao tác</th>
            </tr>
        ';

        foreach ($_SESSION['mycart'] as $cart) {
            $hinh = $cart[2]; //lấy đường dẫn hình 
            //$gia = $cart[3];
            //$soluong = $cart[4];
            $thanhtien =$cart[3] * $cart[4];
            //$thanhtien = $gia * $soluong;
            $tongtien += $thanhtien;

            $xoasp = '
                <a href="index.php?act=delcart&idcart=' . $id . '">
                    <i class="fa-regular fa-trash-can"></i> 
                </a>';
            // $sl = '
            //     <div class="input-group d-flex align-items-center quantity-container" style="max-width: 150px;">
            //         <div class="input-group-prepend">
            //             <button onclick="giamsoluong(this)" class="btn btn-outline-black decrease" type="button">−</button>
            //         </div>
            //         <input type="text" onkeyup="kiemtrasoluong(this)" class="form-control text-center quantity-amount" value="'. $cart[4] .'" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
            //         <div class="input-group-append">
            //             <button onclick="tangsoluong(this)" class="btn btn-outline-black increase" type="button">+</button>
            //         </div>
            //         <input type="hidden" value="'.$cart[0].'">
            //     </div>
            // ';


            ?> <!-- Kết thúc giao diện PHP -->
            <tr>
                <td class="text-center align-middle"><?php echo $i; ?></td>
                <td class="text-center align-middle"><img src="<?php echo $hinh; ?>" alt="" height="50px;"></td>
                <td class="text-center align-middle"><?php echo $cart[1]; ?></td>
                <td class="text-center align-middle"><?php echo number_format($cart[3], 3, ',', '.'); ?></td>
                <td class="text-center align-middle a-none">
                    <a style="text-decoration:none;color: white;margin: 0px 10px;font-size: 20px;display: inline-block; padding: 0px 5px; background-color: black;" href="?act=updateCart&ctrl=up&id=<?= $cart[0] ?>">+</a>
                    <?php echo $cart[4]; ?>
                    <a style="text-decoration:none;color: white;margin: 0px 10px;font-size: 20px;display: inline-block; padding: 0px 5px; background-color: black;" href="?act=updateCart&ctrl=down&id=<?= $cart[0] ?>">-</a>
                </td>
                <td class="text-center align-middle"><?php echo number_format($thanhtien, 3, ',', '.'); ?></td>
                <td class="text-center align-middle fs-5"><?php echo $xoasp; ?></td>
            </tr>
            <?php // Bắt đầu giao diện PHP
            
            $i++;
            $id++;
        }
    }

    function viewChiTietCart(){
        $i = 1;
        $id = 0;
        $tongtien = 0;
        
        echo '
        <tr>
            <th class="text-center align-middle">STT</th>
            <th class="text-center align-middle">Tên sản phẩm</th>
            <th class="text-center align-middle">Đơn giá</th>
            <th class="text-center align-middle">Số lượng</th>
            <th class="text-center align-middle">Thành tiền</th>
        </tr>
        ';

        foreach ($_SESSION['mycart'] as $cart) {
            $gia = $cart[3];
            $soluong = $cart[4];
            $thanhtien = $gia * $soluong;
            $tongtien = $tongtien + $thanhtien;
            echo '
                <tr >
                    <td class="text-center align-middle">' . $i . '</td>
                    <td class="text-center align-middle">' . $cart[1] . '</td>
                    <td class="text-center align-middle">' . number_format($gia, 3, ',', '.') . '</td>
                    <td class="text-center align-middle">' . number_format($soluong, 0, ',', '.') . '</td>
                    <td class="text-center align-middle">' . number_format($thanhtien, 3, ',', '.') . '</td>
                </tr>
                ';
            $i++;
            $id++;
        }
        echo '
            <tr>
                <td class="text-center align-middle fw-bold" colspan = "4">Tổng đơn hàng cần thanh toán</td>
                <td class="text-center align-middle fw-bold">' . number_format($tongtien, 3, ',', '.') . '</td>
            </tr>
        ';
    }
    

    function bill_chi_tiet($listbill){
        $i = 1;
        $tongtien = 0;
    
        echo'
            <tr>
                <th class="text-center align-middle">STT</th>
                <th class="text-center align-middle">Hình ảnh</th>
                <th class="text-center align-middle">Tên sản phẩm</th>
                <th class="text-center align-middle">Đơn giá</th>
                <th class="text-center align-middle">Số lượng</th>
                <th class="text-center align-middle">Thành tiền</th>
            </tr>
        ';
    
        foreach ($listbill as $cart) {
            $hinh = $cart['img']; //lấy đường dẫn hình 
            $gia = $cart['price'];
            $soluong = $cart['soluong'];
            $tongtien += $cart['thanhtien']; // Cộng dồn tổng tiền

            echo '
                <tr>
                    <td class="text-center align-middle">' . $i . '</td>
                    <td class="text-center align-middle"><img src="' . $hinh . '" alt="" height="50px"></td>
                    <td class="text-center align-middle">' . $cart['name'] . '</td>
                    <td class="text-center align-middle">' . number_format($gia, 3, ',', '.') . '</td>
                    <td class="text-center align-middle">' . number_format($soluong, 0, ',', '.') . '</td>
                    <td class="text-center align-middle">' . number_format($cart['thanhtien'], 3, ',', '.') . '</td>
                </tr>
            ';
            $i++;
        }
    
        echo '
            <tr>
                <td class="text-center align-middle fw-bold" colspan="5">Tổng đơn hàng cần thanh toán</td>
                <td class="text-center align-middle fw-bold">' . number_format($tongtien, 3, ',', '.') . '</td>
            </tr>
        ';
    }


    function tongdonhang(){
        $tongtien = 0;
        foreach ($_SESSION['mycart'] as $cart) {
            $gia = $cart[3];
            $soluong = $cart[4];
            $thanhtien = $gia * $soluong;
            $tongtien = $tongtien + $thanhtien;
        }
        return $tongtien;
    }

    function donhang_insert($iduser, $idsanpham, $img, $name, $price, $soluong, $thanhtien, $idbill){
        $sql = "INSERT INTO donhang (iduser, idsanpham, img, name, price, soluong, thanhtien, idbill) VALUES (?,?,?,?,?,?,?,?)";
        pdo_execute($sql, $iduser, $idsanpham, $img, $name, $price, $soluong, $thanhtien, $idbill);
    }

    function bill_insert($iduser, $name, $address, $email, $tel, $pttt, $ngaydathang, $tongdonhang, $status){
        $sql = "INSERT INTO bill (iduser, name, address, email, tel, pttt, ngaydathang, total, status) VALUES (?,?,?,?,?,?,?,?,?)";
        return pdo_execute_return_lastInsertId($sql, $iduser, $name, $address, $email, $tel, $pttt, $ngaydathang, $tongdonhang, $status);
    }

    
    function loadOne_bill($id){
        $sql = "SELECT * FROM bill WHERE id= ". $id;
        return pdo_query($sql);
    }   

    function loadAll_cart($idbill){
        if (!isset($idbill) || empty($idbill)) {
            return []; 
        }
        $sql = "SELECT * FROM donhang WHERE idbill= ". $idbill;
        return pdo_query($sql);
    }

    function loadAll_cart_count($idbill){
        $sql = "SELECT * FROM donhang WHERE idbill= ". $idbill;
        return sizeof(pdo_query($sql));
    }

    function loadAll_cart_soluong($idbill, $soluong){
        $sql = "SELECT * FROM donhang WHERE soluong = ? AND idbill= ". $idbill;
        return sizeof(pdo_query($sql , $soluong));
    }


    function loadAll_bill($kyw = "" , $iduser  = 0 ){
        $sql = "SELECT * FROM bill WHERE 1"; 
        if (!isset($iduser) > 0 ) {
            $sql .= " AND iduser= ". $iduser;
        }
        if ($kyw != "" ) {
            $sql .= " AND id LIKE '%".$kyw."%'";
        }
        $sql .= " ORDER BY id";
        return pdo_query($sql);
    }

    // admin
    function get_bill_all_admin($kyw, $page){

        $soluongdh = 10; // số lượng sản phẩm được hiển thị trên 1 trang
        $batdau = ($page - 1) * $soluongdh;

        $sql = "SELECT * FROM bill WHERE 1"; 

        if($kyw != ""){
            $sql .= " AND name like '%" .$kyw. "%'";
        }
        
        $total_products = count(pdo_query("SELECT id FROM bill")); // Đếm tổng số sản phẩm
        $total_pages = ceil($total_products / $soluongdh); // Tính tổng số trang

        $sql .= " ORDER BY id DESC";
        $sql .= " LIMIT " .$batdau."," .$soluongdh;
    
        return array(
            'total_pages' => $total_pages,
            'data' => pdo_query($sql)
        );

    }

    //delete san pham
    function delbill($id){
        $conn = pdo_get_connection();
        try {
            // Tắt chế độ kiểm tra khóa ngoại để có thể xóa bản ghi trong tbl_bill
            $conn->exec("SET foreign_key_checks = 0");
    
            // Xóa chi tiết đơn hàng từ bảng tbl_cart
            $sql_cart = "DELETE FROM donhang WHERE idbill=" . $id;
            $conn->exec($sql_cart);
    
            // Bật lại chế độ kiểm tra khóa ngoại
            $conn->exec("SET foreign_key_checks = 1");
    
            // Xóa đơn hàng từ bảng tbl_bill
            $sql = "DELETE FROM bill WHERE id=" . $id;
            $conn->exec($sql);
    
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function get_ttdh($n){
        switch ($n) {
            case '0':
                $tt = "Đơn hàng mới";
                break;
            case '1':
                $tt = "Đang xử lý";
                break;
            case '2':
                $tt = "Đang giao hàng";
                break;
            case '3':
                $tt = "Hoàn tất";
                break;
            default:
                $tt = "Đơn hàng mới";
                break;
        }
        return($tt);
    }
    



    // function loadAll_bill($kyw = "" ,$iduser = 0){
    //     $sql = "SELECT * FROM tbl_bill WHERE 1"; 
    //     if (isset($iduser) > 0 ) {
    //         $sql .= " AND iduser= ". $iduser;
    //     }
    //     if ($kyw != "" ) {
    //         $sql .= " AND id LIKE '%".$kyw."%'";
    //     }
    //     $sql .= " ORDER BY id";
    //     return pdo_query($sql);
    // }

    // function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $idbill)
    // {
    //     $conn = pdo_get_connection();
    //     $sql = "INSERT INTO donhang (iduser, idpro, img, name, price, soluong, thanhtien, idbill) 
    //             VALUES ('" . $iduser . "', '" . $idpro . "', '" . $img . "','" . $name . "','" . $price . "','" . $soluong . "', '" . $thanhtien . "','" . $idbill . "')";
    //     $conn->exec($sql);
    // }

    /* ----------------------------------- NEW ---------------------------------- */
    function getOrderByUser($userId){
        $conn = pdo_get_connection();
        $sql = "SELECT * FROM bill WHERE iduser = '$userId' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    function updateStatusBill($id, $value){
        $conn = pdo_get_connection();
        $sql = "UPDATE bill SET status = '$value' WHERE id = '$id' ";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    function updateCartQuantity($id, $action)
    {
        if (isset($_SESSION['mycart']) && is_array($_SESSION['mycart'])) {
            foreach ($_SESSION['mycart'] as $key => $cart_item) {
                if ($cart_item[0] == $id) {
                    if ($action == 'up') {
                        $_SESSION['mycart'][$key][4]++;
                    } elseif ($action == 'down' && $_SESSION['mycart'][$key][4] > 1) {
                        $_SESSION['mycart'][$key][4]--;
                    }
                    return true; 
                }
            }
        }
    }
    /* ----------------------------------- NEW ---------------------------------- */
