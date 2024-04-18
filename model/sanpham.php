<?php
require_once 'pdo.php';
global $img_path;

function sanpham_insert($iddm, $tensanpham, $img, $gia, $giakhuyenmai, $sanphamkhuyenmai, $bestseller){
    $sql = "INSERT INTO sanpham(iddm, tensanpham, img, gia, giakhuyenmai, sanphamkhuyenmai, bestseller) VALUES (?,?,?,?,?,?,?)";
    pdo_execute($sql, $iddm, $tensanpham, $img, $gia, $giakhuyenmai, $sanphamkhuyenmai, $bestseller);
}

function sanpham_update($iddm, $tensanpham, $img, $gia, $giakhuyenmai, $sanphamkhuyenmai, $bestseller, $id){
    $sql = "UPDATE sanpham SET iddm=?,tensanpham=?,img=?,gia=?,giakhuyenmai=?,sanphamkhuyenmai=?,bestseller=? WHERE id=?";
    pdo_execute($sql, $iddm, $tensanpham, $img, $gia, $giakhuyenmai, $sanphamkhuyenmai, $bestseller, $id);
}

function sanpham_delete($id){
    $sql = "DELETE FROM sanpham WHERE  id=?";
    if(is_array($id)){
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $id);
    }
}

// Lấy danh sách sản phẩm mới load lên trang chủ
function get_dssp_new($limit){
    $sql = "SELECT * FROM sanpham WHERE sanphamkhuyenmai = 0 ORDER BY id DESC limit " .$limit;
    return pdo_query($sql);
}

function get_dssp_all($limit){
    $sql = "SELECT * FROM sanpham ORDER BY id DESC limit " .$limit;
    return pdo_query($sql);
}

// phân trang
function get_all_dssp(){
    $sql = "SELECT * FROM sanpham ORDER BY id DESC";
    return pdo_query($sql);
}


function hien_thi_so_trang($dssp, $soluongsp){
    $tongsanpham = count($dssp);
    $sotrang = ceil($tongsanpham / $soluongsp);
    $html_sotrang = "";
    for($i=1; $i <= $sotrang; $i++){
        $html_sotrang = '<a href="quantri/index.php?act=sanpham&pagae='.$i.'" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">'.$i.'</a>';
    }
    return  $html_sotrang;
}

function get_sanpham_all($kyw, $iddm){

    $sql = "SELECT * FROM sanpham WHERE 1";
    if($kyw != ""){
        $sql .= " AND tensanpham like '%".$kyw."%'";
    }
    if($iddm > 0){
        $sql .= " AND iddm = '".$iddm."'";
    }
    $sql.= " ORDER BY id DESC";
    
    return pdo_query($sql);
}


//admin
function get_sanpham_all_admin($kyw, $iddm, $page){
    $soluongsp = 10; // số lượng sản phẩm được hiển thị trên 1 trang
    $batdau = ($page - 1) * $soluongsp;

    $sql = "SELECT * FROM sanpham WHERE 1";

    if($kyw != ""){
        $sql .= " AND tensanpham like '%".$kyw."%'";
    }
    if($iddm > 0){
        $sql .= " AND iddm = '".$iddm."'";
    }

    $total_products = count(pdo_query("SELECT id FROM sanpham")); // Đếm tổng số sản phẩm
    $total_pages = ceil($total_products / $soluongsp); // Tính tổng số trang

    $sql .= " ORDER BY id DESC";
    $sql .= " LIMIT " .$batdau."," .$soluongsp;

    return array(
        'total_pages' => $total_pages,
        'data' => pdo_query($sql)
    );
}


function get_onesp($id){
    $sql = "SELECT * FROM sanpham WHERE id= ". $id;
    return pdo_query($sql);
}

// Lấy danh sách sản phẩm bestseller load lên trang chủ
function get_dssp_best($limit){
    $sql = "SELECT * FROM sanpham WHERE bestseller = 1 ORDER BY id DESC limit " .$limit;
    return pdo_query($sql);
}

// Lấy danh sách sản phẩm sanphamkhuyenmai load lên trang chủ
function get_dssp_km($limit){
    $sql = "SELECT * FROM sanpham WHERE sanphamkhuyenmai = 1 ORDER BY id DESC limit " .$limit;
    return pdo_query($sql);
}

// Lấy danh sách sản phẩm có lượt xem load lên trang chủ
function get_dssp_view(){
    $sql = "SELECT * FROM sanpham ORDER BY view DESC";
    return pdo_query($sql);
}

// function sanpham_select_by_id1($id){
//     $sql = "SELECT * FROM sanpham WHERE id=?";
//     return pdo_query_one($sql, $id);
// }

function sanpham_select_by_id($id){
    $sql = "SELECT * FROM sanpham WHERE id=?";
    return pdo_query($sql, $id);
}

function sanpham_select_cungloai($id, $iddm){
    $sql = "SELECT * FROM sanpham WHERE iddm = ? AND id <> ?";
    return pdo_query($sql, $id, $iddm);
}

// function sanpham_exist($ma_hh){
//     $sql = "SELECT count(*) FROM sanpham WHERE ma_hh=?";
//     return pdo_query_value($sql, $ma_hh) > 0;
// }

// function sanpham_tang_so_luot_xem($ma_hh){
//     $sql = "UPDATE sanpham SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
//     pdo_execute($sql, $ma_hh);
// }

// function sanpham_select_top10(){
//     $sql = "SELECT * FROM sanpham WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
//     return pdo_query($sql);
// }

// function sanpham_select_dac_biet(){
//     $sql = "SELECT * FROM sanpham WHERE dac_biet=1";
//     return pdo_query($sql);
// }


function sanpham_select_by_danhmuc($iddm){
    $sql = "SELECT * FROM sanpham WHERE iddm=?";
    return pdo_query($sql, $iddm);
}

function sanpham_select_keyword($keyword){
    $sql = "SELECT * FROM sanpham sp "
            . " JOIN danhmuc lo ON lo.id = sp.iddm "
            . " WHERE tensanpham LIKE ?";
    return pdo_query($sql, '%'.$keyword.'%');
}

// function sanpham_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM sanpham");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM sanpham ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }



// function sanpham_select_page($startRow, $pageSize){
//     $sql = "SELECT * FROM sanpham limit ?, ?";
//     return pdo_query($sql, $startRow, $pageSize);
// }




// Sử lý show dữ liệu lên 
function show_sp($dssp){
    global $img_path;

    $html_dssp = '';

    foreach ($dssp as $sp) {
        extract($sp);
        $linksp ="index.php?act=chitietsanpham&id=" .$id;
        $hinh = $img_path.$img; //lấy đường dẫn hình 
        $gia_formatted = number_format($gia, 0, ',', '.');
        // $giakhuyenmai_formatted = number_format($giakhuyenmai, 0, ',', '.');
        // $sanphamkhuyenmai = intval($sanphamkhuyenmai);
        // $gia_sanpham = ($sanphamkhuyenmai == 1) ? $giakhuyenmai : $gia;
        $html_dssp .= '
                        <div class="col-md-2">
                            <a class="home-product__item border-top" href="'.$linksp.'">
                                <div class="product-item__img"
                                    style="background-image: url('.$hinh.'); ">
                                </div>
                                <h4 class="product-item__name">'.$tensanpham.'</h4>
                                <div class="product-item__price">
                                    <span class="product-item__price-current">'.$gia_formatted.'đ</span>
                                </div>
                                <div class="product-item__action">
                                    <div class="product-item__rating">
                                        <i class="rating__star-gold fa-solid fa-star"></i>
                                        <i class="rating__star-gold fa-solid fa-star"></i>
                                        <i class="rating__star-gold fa-solid fa-star"></i>
                                        <i class="rating__star-gold fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>

                                    <span class="item-sold">'.$daban.' đã bán</span>
                                </div>

                                <div class="product-item__origin">
                                    <span class="product-item__brand">Rau</span>
                                    <span class="product-item__origin-name">Đà Lạt</span>
                                </div>
                            </a>
                        </div>
                        ';
        }
    return $html_dssp;
}

function show_sp_km($dssp_km){
    global $img_path;

    $html_dssp_km = '';

    foreach ($dssp_km as $sp) {
        extract($sp);
        $linksp ="index.php?act=chitietsanpham&id=" .$id;
        $hinh = $img_path.$img; //lấy đường dẫn hình 
        $gia_formatted = number_format($gia, 0, ',', '.');
        $giakhuyenmai_formatted = number_format($giakhuyenmai, 0, ',', '.');
        $sanphamkhuyenmai = intval($sanphamkhuyenmai);
        $gia_sanpham = ($sanphamkhuyenmai == 1) ? $giakhuyenmai : $gia;
        $html_dssp_km .= '
                            <a class="home-product__item border" href="'.$linksp.'">
                                <div class="product-item__img"
                                style="background-image: url('.$hinh.');">
                                </div>
                                <h4 class="product-item__name">'.$tensanpham.'</h4>
                                <div class="product-item__price">
                                    <span class="product-item__price-oud">'.$gia_formatted.'đ</span>
                                    <span class="product-item__price-current">'.$giakhuyenmai_formatted.'đ</span>
                                </div>
                                <div class="product-item__origin">
                                    <span class="product-item__brand">Rau</span>
                                    <span class="product-item__origin-name">Đà Lạt</span>
                                </div>

                                <div class="product-item__favourite">
                                    <i class="fa-solid fa-check"></i>
                                    <span>Yêu thích</span>
                                </div>

                                <div class="product-item__sale-off">
                                    <span class="sale-off__prrcent">10%</span>
                                    <span class="sale-off__lable">GIẢM</span>
                                </div>
                                
                                <form action="index.php?act=addtocart" method= "post">
                                    <div>
                                        <input type="hidden" name="id" value="'.$id.'">
                                        <input type="hidden" name="tensanpham" value="'.$tensanpham.'">
                                        <input type="hidden" name="img" value="'.$hinh.'">
                                        <input type="hidden" name="gia" value="'.$gia_formatted.'">
                                        <input type="hidden" name="giamoi" value="'.$giakhuyenmai_formatted.'">
                                        <input type="hidden" name="sanphamkhuyenmai" value="'.$sanphamkhuyenmai.'">
                                        <input type="submit" class="product_mua" name="addtocart" value="Mua ngay">
                                    </div>
                                </form>
                            </a>        
                        ';
        }
    return $html_dssp_km;
}