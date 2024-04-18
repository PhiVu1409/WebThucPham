<?php
require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $ten_danhmuc là tên loại
 * @throws PDOException lỗi thêm mới
 */

function danhmuc_insert($tendm){
    $sql = "INSERT INTO danhmuc(tendanhmuc) VALUES(?)";
    pdo_execute($sql, $tendm);
}

// /**
//  * Cập nhật tên loại
//  * @param int $ma_danhmuc là mã loại cần cập nhật
//  * @param String $ten_danhmuc là tên loại mới
//  * @throws PDOException lỗi cập nhật
//  */

function danhmuc_update($id, $tendm){
    $sql = "UPDATE danhmuc SET tendanhmuc=? WHERE id=?";
    pdo_execute($sql, $tendm, $id);
}

// /**
//  * Xóa một hoặc nhiều loại
//  * @param mix $ma_danhmuc là mã loại hoặc mảng mã loại
//  * @throws PDOException lỗi xóa
//  */

function danhmuc_delete($id){
    $sql = "DELETE FROM danhmuc WHERE id=?";
    if(is_array($id)){
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $id);
    }
}

/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */


function danhmuc_select_all(){
    $sql = "SELECT * FROM danhmuc";
    return pdo_query($sql);
}


function get_danhmuc_all_admin($page){
    $soluongdm = 10; // số lượng sản phẩm được hiển thị trên 1 trang
    $batdau = ($page - 1) * $soluongdm;

    $sql = "SELECT * FROM danhmuc";

    $total_category = count(pdo_query("SELECT id FROM danhmuc")); // Đếm tổng số sản phẩm
    $total_pages = ceil($total_category / $soluongdm); // Tính tổng số trang

    $sql .= " ORDER BY id DESC";
    $sql .= " LIMIT " .$batdau."," .$soluongdm;

    return array(
        'total_pages' => $total_pages,
        'data' => pdo_query($sql)
    );
}


// /**
//  * Truy vấn một loại theo mã
//  * @param int $ma_danhmuc là mã loại cần truy vấn
//  * @return array mảng chứa thông tin của một loại
//  * @throws PDOException lỗi truy vấn
//  */

function danhmuc_select_by_id($id){
    $sql = "SELECT * FROM danhmuc WHERE id=?";
    return pdo_query_one($sql, $id);
}

// /**
//  * Kiểm tra sự tồn tại của một loại
//  * @param int $ma_danhmuc là mã loại cần kiểm tra
//  * @return boolean có tồn tại hay không
//  * @throws PDOException lỗi truy vấn
//  */
// function danhmuc_exist($ma_danhmuc){
//     $sql = "SELECT count(*) FROM danhmuc WHERE ma_danhmuc=?";
//     return pdo_query_value($sql, $ma_danhmuc) > 0;
// }