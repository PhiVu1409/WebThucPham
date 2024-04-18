<?php
    require_once 'pdo.php';

    function user_insert($name, $address, $email, $tendangnhap, $pass){
        $sql = "INSERT INTO user(name, address, email, tendangnhap, pass) VALUES (?, ?, ?, ?, ?)";
        pdo_execute($sql, $name, $address, $email, $tendangnhap, $pass);
    }

    function checkuser($tendangnhap, $pass){
        $sql = "SELECT * FROM user WHERE tendangnhap= ? AND pass= ?";
        return pdo_query_one($sql, $tendangnhap, $pass);
    }

    function get_user($id){
        $sql = "SELECT * FROM user WHERE $id=?";
        return pdo_query_one($sql, $id);
    }

    function isTendangnhapExists($tendangnhap){
        $sql = "SELECT COUNT(*) FROM user WHERE tendangnhap = ?";
        $result = pdo_query($sql, $tendangnhap);
    
        return ($result[0]['COUNT(*)'] > 0);
    }
    
    function user_update($name, $address, $email, $tel, $role, $id){
        $sql = "UPDATE user SET name=?, address=?, email=?, tel=?, role=? WHERE id=?";
        pdo_execute($sql, $name, $address, $email, $tel, $role, $id);
    }

    // function khach_hang_delete($ma_kh){
    //     $sql = "DELETE FROM khach_hang  WHERE ma_kh=?";
    //     if(is_array($ma_kh)){
    //         foreach ($ma_kh as $ma) {
    //             pdo_execute($sql, $ma);
    //         }
    //     }
    //     else{
    //         pdo_execute($sql, $ma_kh);
    //     }
    // }

    // function khach_hang_select_all(){
    //     $sql = "SELECT * FROM khach_hang";
    //     return pdo_query($sql);
    // }

    // function khach_hang_select_by_id($ma_kh){
    //     $sql = "SELECT * FROM khach_hang WHERE ma_kh=?";
    //     return pdo_query_one($sql, $ma_kh);
    // }

    // function khach_hang_exist($ma_kh){
    //     $sql = "SELECT count(*) FROM khach_hang WHERE $ma_kh=?";
    //     return pdo_query_value($sql, $ma_kh) > 0;
    // }

    // function khach_hang_select_by_role($vai_tro){
    //     $sql = "SELECT * FROM khach_hang WHERE vai_tro=?";
    //     return pdo_query($sql, $vai_tro);
    // }

    // function khach_hang_change_password($ma_kh, $mat_khau_moi){
    //     $sql = "UPDATE khach_hang SET mat_khau=? WHERE ma_kh=?";
    //     pdo_execute($sql, $mat_khau_moi, $ma_kh);
    // }
    function getAllUser(){
        $sql = "SELECT * FROM user";
        return pdo_query($sql);
    }
    function updateRole($value, $id){
        $conn = pdo_get_connection();
        $sql = "UPDATE user SET role = '$value' WHERE id = '$id' ";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
?>