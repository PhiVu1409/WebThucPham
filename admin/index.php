<?php 
    session_start();
    ob_start();

    include "../model/pdo.php";
    include "../model/danhmuc.php";
    include "../model/donhang.php";
    include "../model/sanpham.php";
    include "../model/user.php";
    include "../model/global.php";


    include "view/layout_admin/header.php";


    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'danhmuc':
                $kq = danhmuc_select_all();
                include "view/danhmuc/list.php";
                break;

            case 'adddm':
                if(isset($_POST['themmoi']) && ($_POST['themmoi'])){
                    $tendm = $_POST['tendm'];
                    danhmuc_insert($tendm);
                }
                $kq = danhmuc_select_all();
                include "view/danhmuc/list.php";
                break;

            case 'updatedmform':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $kqone = danhmuc_select_by_id($id);
                    $kq =  danhmuc_select_all();
                    include "view/danhmuc/updatedanhmuc.php";
                }
                if(isset($_POST['id'])){
                    $id = $_POST['id'];
                    $tendm = $_POST['tendm'];
                    danhmuc_update($id, $tendm);
                    $kq =  danhmuc_select_all();
                    include "view/danhmuc/list.php";
                }
                break; 

            case 'deldm':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    danhmuc_delete($id);
                }
                $kq =  danhmuc_select_all();
                include "view/danhmuc/list.php";
                break;

            case 'sanpham':
                if(isset($_POST['search']) && ($_POST['search'])){
                    $kyw = $_POST['kyw'];
                    $iddanhmuc = $_POST['iddm'];
                }else{
                    $kyw = '';
                    $iddanhmuc = 0;
                }

                $dsdm =  danhmuc_select_all();
                $kq = get_sanpham_all($kyw, $iddanhmuc);
                include "view/sanpham/list.php";
                break;

            case 'sanpham_add':
                if(isset($_POST['themmoi']) && ($_POST['themmoi'])){
                    $iddm = $_POST['iddm'];
                    $tensanpham = $_POST['tensanpham'];
                    $gia = $_POST['gia'];
                    $giakhuyenmai = $_POST['giakhuyenmai'];
                    $sanphamkhuyenmai = $_POST['sanphamkhuyenmai'];
                    $bestseller = $_POST['bestseller'];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);
                    $img = $target_file;
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                        $uploadOk = 0;
                    }

                    if($uploadOk == 1){
                        move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                        sanpham_insert($iddm, $tensanpham, $img, $gia, $giakhuyenmai, $sanphamkhuyenmai, $bestseller);
                    }
                }
                 //load dsdm
                 $dsdm =  danhmuc_select_all();
                 //load dssp
                 $kq = get_sanpham_all("", 0);
                 include "view/sanpham/add.php";
                break;

            case 'updatespform':
                //load dsdm
                $dsdm =  danhmuc_select_all();
                if(isset($_GET['id']) && ($_GET['id'] > 0)){
                    //san pham chi tiet
                    $spct = get_onesp($_GET['id']);
                }   
                //load dssp
                $kq = get_sanpham_all("", 0);
                include "view/sanpham/updatesanpham.php";
                break;

            case 'sanpham_update':
                //load dsdm 
                $dsdm = danhmuc_select_all();
                //cap nhat sp
                if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
                    $iddm = $_POST['iddm'];
                    $tensanpham = $_POST['tensanpham'];
                    $gia = $_POST['gia']; 
                    $giakhuyenmai = $_POST['giakhuyenmai'];
                    $sanphamkhuyenmai = $_POST['sanphamkhuyenmai'];
                    $bestseller = $_POST['bestseller'];
                    $id = $_POST['id'];
                    if($_FILES["img"]["name"] != ""){
                        $target_dir = "../uploads/";
                        $target_file = $target_dir . basename($_FILES["img"]["name"]);
                        $img = $target_file;
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                            $uploadOk = 0;
                        }
    
                        // if($uploadOk == 1){
                        //     move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                        //     sanpham_insert($iddm, $tensanpham, $img, $gia, $giakhuyenmai, $sanphamkhuyenmai, $bestseller);
                        // }
                    }else{
                        $img = "";
                    }

                    sanpham_update($iddm, $tensanpham, $img, $gia, $giakhuyenmai, $sanphamkhuyenmai, $bestseller, $id);
                }  
                //load dssp
                $kq = get_sanpham_all("", 0);
                include "view/sanpham/list.php";
                break;

            case 'delsp':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    sanpham_delete($id);
                }
                $kq = get_sanpham_all("", 0);
                include "view/sanpham/list.php";
                break;

            case 'listbill':
                if(isset($_POST['kyw']) && ($_POST['kyw']) != ""){
                    $kyw = $_POST['kyw'];
                }
                else{
                    $kyw = "";
                }
                $listbill = loadAll_bill($kyw, 0);
                include "view/donhang/listbill.php";
                break;

            case 'updatebillform':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $kqone = danhmuc_select_by_id($id);
                    $kq = danhmuc_select_all();
                    include "view/donhang/updatebill.php";
                }
                if(isset($_POST['id'])){
                    $id = $_POST['id'];
                    $tendm = $_POST['tendm'];
                    danhmuc_update($id, $tendm);

                    $kq = danhmuc_select_all();
                    include "view/donhang/listbill.php";
                }
                break; 

            case 'delbill':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    delbill($id);
                }
                $listbill = loadAll_bill("", 0);
                include "view/donhang/listbill.php";
                break;

            case 'taikhoan':
                include "view/taikhoan/taikhoan.php";
                break;

            case 'dangxuat':
                if(isset($_SESSION['s_user'])){
                    unset($_SESSION['s_user']);
                }
                header('location: ../index.php');
                break;

            default:
            include "view/layout_admin/home.php";
            break;
        }
    } else {
        include "view/layout_admin/home.php";
    }


    include "view/layout_admin/footer.php";

?>

