<?php

session_start();

if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}

//nếu nút đăng xuất đc bấmn
if (isset($_GET['logged_out'])) {
    // Hủy phiên đăng nhập
    session_destroy();

    // Chuyển hướng về trang index.php
    header("Location: index.php");
    exit();
}

ob_start();

include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/donhang.php";
include "../model/sanpham.php";
include "../model/user.php";
include "../model/global.php";

include "view/header_ad.php";

if (isset($_GET['act'])) {

    switch ($_GET['act']) {
        case 'danhmuc':
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

            $result = get_danhmuc_all_admin($page);
            $total_pages = $result['total_pages'];
            $dsdm = $result['data'];

            include "view/danhmuc/listdm.php";
            break;

        case 'adddm':
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tendm = $_POST['tendm'];
                danhmuc_insert($tendm);
            }

            $result = get_danhmuc_all_admin($page);
            $total_pages = $result['total_pages'];
            $dsdm = $result['data'];

            include "view/danhmuc/listdm.php";
            break;

        case 'updatedmform':
            if (isset($_GET['id'])) {
                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }
                $id = $_GET['id'];

                $result = get_danhmuc_all_admin($page);
                $total_pages = $result['total_pages'];
                $dsdm = $result['data'];

                $kqone = danhmuc_select_by_id($id);
                $result = get_danhmuc_all_admin($page);
                $total_pages = $result['total_pages'];
                $dsdm = $result['data'];
                include "view/danhmuc/updatedanhmuc.php";
            }

            if (isset($_POST['id'])) {
                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }

                $id = $_POST['id'];
                $tendm = $_POST['tendm'];
                danhmuc_update($id, $tendm);
                $result = get_danhmuc_all_admin($page);
                $total_pages = $result['total_pages'];
                $dsdm = $result['data'];

                include "view/danhmuc/listdm.php";
            }

            break;

        case 'deldm':
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                danhmuc_delete($id);
            }

            $result = get_danhmuc_all_admin($page);
            $total_pages = $result['total_pages'];
            $dsdm = $result['data'];

            header("Location: index.php?act=danhmuc");
            exit();
            break;


        case 'sanpham':
            if (isset($_POST['search']) && ($_POST['search'])) {
                $kyw = $_POST['kyw'];
                $iddanhmuc = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddanhmuc = 0;
            }

            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

            $dsdm = danhmuc_select_all();
            $result = get_sanpham_all_admin($kyw, $iddanhmuc, $page);
            $total_pages = $result['total_pages'];
            $dssp = $result['data'];

            include "view/sanpham/listsp.php";
            break;


        case 'sanpham_add':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
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
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    $uploadOk = 0;
                }

                if ($uploadOk == 1) {
                    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                    sanpham_insert($iddm, $tensanpham, $img, $gia, $giakhuyenmai, $sanphamkhuyenmai, $bestseller);
                }
            }

            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

            //load dsdm
            $dsdm =  danhmuc_select_all();
            //load dssp
            $result = get_sanpham_all_admin("", 0, $page);
            $total_pages = $result['total_pages'];
            $dssp = $result['data'];

            include "view/sanpham/addsp.php";
            break;


        case 'updatespform':
            //load dsdm
            $dsdm =  danhmuc_select_all();
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                //san pham chi tiet
                $spct = get_onesp($_GET['id']);
            }
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            //load dssp

            $dssp = get_sanpham_all("", 0);

            include "view/sanpham/updatesanpham.php";
            break;

        case 'sanpham_update':
            //load dsdm
            $dsdm = danhmuc_select_all();
            //cap nhat sp
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $iddm = $_POST['iddm'];
                $tensanpham = $_POST['tensanpham'];
                $gia = $_POST['gia'];
                $giakhuyenmai = $_POST['giakhuyenmai'];
                $sanphamkhuyenmai = $_POST['sanphamkhuyenmai'];
                $bestseller = $_POST['bestseller'];
                $id = $_POST['id'];
                if ($_FILES["img"]["name"] != "") {
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);
                    $img = $target_file;
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    if (
                        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif"
                    ) {
                        $uploadOk = 0;
                    }

                    // if($uploadOk == 1){
                    //     move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                    //     sanpham_insert($iddm, $tensanpham, $img, $gia, $giakhuyenmai, $sanphamkhuyenmai, $bestseller);
                    // }
                } else {
                    $img = "";
                }

                sanpham_update($iddm, $tensanpham, $img, $gia, $giakhuyenmai, $sanphamkhuyenmai, $bestseller, $id);
            }

            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            //load dssp
            // $dssp = get_sanpham_all("", 0);
            $result = get_sanpham_all_admin("", 0, $page);
            $total_pages = $result['total_pages'];
            $dssp = $result['data'];

            include "view/sanpham/listsp.php";
            break;



        case 'listbill':
            if (isset($_POST['kyw']) && ($_POST['kyw']) != "") {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }

            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

            // $dsdm = danhmuc_select_all();
            // $result = get_sanpham_all_admin($kyw, $iddanhmuc, $page);
            // $total_pages = $result['total_pages'];
            // $dssp = $result['data'];

            $result = get_bill_all_admin($kyw, $page);
            $total_pages = $result['total_pages'];
            $dsdh = $result['data'];


            // $listbill = loadAll_bill($kyw, 0, 0);
            include "view/donhang/listbill.php";
            break;
        /* ----------------------------------- NEW ---------------------------------- */
        case 'updatebill':
            $id = $_GET['id'] ?? "";
            $value = $_GET['value'] ?? "";
            if (!empty($id) && !empty($value)) {
                updateStatusBill($id, $value);
            }
            header("Location: ?act=listbill");
            break;
        /* ----------------------------------- NEW ---------------------------------- */

        case 'delbill':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                delbill($id);
            }
            header("Location: ?act=listbill");
            break;
        /* ----------------------------------- NEW ---------------------------------- */
        case 'user':
            $users = getAllUser();
            include "view/taikhoan/listtaikhoan.php";
            break;
        case 'updateRole':
            $value = $_GET["value"] ?? 0;
            $userID = $_GET["id"];
            if(updateRole($value, $userID)){
                header("Location: ?act=user");
            }
            break;
        /* ----------------------------------- NEW ---------------------------------- */



        default:
            include "view/home_ad.php";
            break;
    }
} else {
    include "view/home_ad.php";
}






include "view/footer_ad.php";
