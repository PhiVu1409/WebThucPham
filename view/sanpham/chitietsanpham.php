<?php
    foreach ($dssp_one as $sp) {
        extract($sp);
        $hinh = $img_path . $img; //lấy đường dẫn hình 
        $gia_formatted = number_format($gia, 0, ',', '.');
        $giakm_formatted = number_format($giakhuyenmai, 0, ',', '.');
    }

    $dssm = danhmuc_select_all();
?>

<nav class="bread-crumb">
    <div class="container">
        <ul class="breadcrumb">
            <li class="home">
                <a class="home-link" href="index.php">
                    <i class="fa-solid fa-house"></i>
                </a>
                <span class="mr_lr"><i class="fa-solid fa-angle-right"></i></span>
            </li>
            <li>
                <a class="changeurl" href="index.php?act=sanpham"><span>Sản phẩm</span></a>
                <span class="mr_lr"><i class="fa-solid fa-angle-right"></i></span>
            </li>
            <?php
                foreach ($dssm as $dm) {
                    if ($sp['iddm'] == $dm['id']) {
                        echo '
                            <li>
                                <a class="changeurl nav-link" href="index.php?act=sanpham&iddm=' . $dm['id'] . '">' . $dm['tendanhmuc'] . '</a>
                            </li>
                        ';
                    }
                }
            ?>
            <li>
                <?php
                    echo ' 
                            <span class="mr_lr ps-2"><i class="fa-solid fa-angle-right"></i></span>
                            <strong> <span> ' . $tensanpham . ' </span></strong>
                    ';
                ?>
            </li>
        </ul>
    </div>
</nav>


<div class="product__details">
    <div class="container">
        <div class="row product__details-content">
            
            <div class="col-md-5">
                <div class="product__details-link">
                    <div class="slider">
                        <div class="slider">
                            <?php
                            echo '
                                <img src="' . $hinh . '" alt="cai xoan" class="product__details-img col-md-12 mySlides" >
                            ';
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <?php
                echo '
                    <div class="product__details-title">
                        <span>' . $tensanpham . '</span>
                    </div>
                    ';
                ?>

                <div class="product__thanh-phan">
                    <span class="rating__chi-so" id="ratingScore">4.0 </span>
                    <div class="rating" onclick="rateProduct()">
                        <input value="5" name="rate" id="star5" type="radio">
                        <label title="text" for="star5"></label>
                        <input value="4" name="rate" id="star4" type="radio" checked="">
                        <label title="text" for="star4"></label>
                        <input value="3" name="rate" id="star3" type="radio">
                        <label title="text" for="star3"></label>
                        <input value="2" name="rate" id="star2" type="radio">
                        <label title="text" for="star2"></label>
                        <input value="1" name="rate" id="star1" type="radio">
                        <label title="text" for="star1"></label>
                    </div>
                </div>

                <div class="product__thanh-phan">
                    <span class="thanh-phan__name">Thành phần: </span>
                    <p class="thanh-phan__noidung">100% Rau Cải xoăn xanh loại 1: Tươi, non, giòn, ngọt</p>
                </div>
                <div class="product__thanh-phan">
                    <span class="thanh-phan__name">Mùa vụ: </span>
                    <p class="thanh-phan__noidung">Quanh năm</p>
                </div>
                <div class="product__thanh-phan">
                    <span class="thanh-phan__name">Đóng gói: </span>
                    <p class="thanh-phan__noidung">300gram trở lên</p>
                </div>
                <div class="product__thanh-phan">
                    <span class="thanh-phan__name">Lưu ý: </span>
                    <p class="thanh-phan__noidung">Không bán lẻ các tỉnh ngoài HN và HCM Giao hàng trong 24-72h
                    </p>
                </div>
                <div class="product__thanh-phan">
                    <span class="thanh-phan__name">Hạn sử dụng: </span>
                    <p class="thanh-phan__noidung">3-5 ngày trong tủ lạnh</p>
                </div>
                <div class="product__thanh-phan">
                    <span class="thanh-phan__name">Xuất xứ: </span>
                    <p class="thanh-phan__noidung">Đà Lạt, Việt Nam</p>
                </div>

                <div class="product-so-luong">
                    <input type="hidden" name="_token" value="5YKwNcYMAr51k86UYi80mtMSVQqNkugHmOrHJbz5">
                    <input name="product_id" type="hidden" value="328">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="price_hn cursor font16">
                                <input type="radio" id="i_price_hn" name="local" value="hn" checked="">
                                <label for="i_price_hn"> Hà nội</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="price_hcm cursor font16">
                                <input type="radio" id="i_price_hmc" name="local" value="hcm">
                                <label for="i_price_hcm"> Hồ Chí Minh</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="price_hcm cursor font16">
                                <input type="radio" id="i_price_hmc" name="local" value="khac">
                                <label for="i_price_hcm"> Khác</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="details__chu-y">
                                <i><b>* Lưu ý:</b> Bấm vào giá tại địa điểm để xem bảng giá</i>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12 pb-10">
                            <div class="price_ti">Bảng giá Hà Nội</div>
                        </div>
                        <div class="col-3">
                            <span clas="table-title">Phân loại</span>
                        </div>
                        <div class="col-3 product__table-title">
                            <span clas="table-title">Giá</span>
                        </div>
                        <div class="col-3 product__table-title">
                            <span clas="table-title">Số lượng</span>
                        </div>
                        <div class="col-3 product__table-title">
                            <span clas="table-title">Thành tiền</span>
                        </div>
                    </div>
                    <form action="index.php?act=addtocart" method="post">
                        <div class="row mt-10">
                            <div class="col-3">
                                <span>1kg</span>
                            </div>
                            <?php
                               if ($sanphamkhuyenmai == 1) {
                                // Nếu sản phẩm có khuyến mãi, hiển thị giá khuyến mãi
                                echo '
                                    <div class="col-3 text-center">
                                        <span id="gia_sanpham">' . $giakm_formatted . '</span> đ
                                    </div>
                                ';
                                } else {
                                    // Nếu sản phẩm không có khuyến mãi, hiển thị giá gốc
                                    echo '
                                        <div class="col-3 text-center">
                                            <span id="gia_sanpham">' . $gia_formatted . '</span> đ
                                        </div>
                                    ';
                                }
                            ?>

                            <div class="col-3 text-center">
                                <div class="soluong">
                                    <span class="counter-btn decrease-btn" onclick="decreaseValue()"> - </span>
                                    <input type="text" min="1" max="1000" name="soluong" value="1" step="1" class="check_sl" oninput="handleInput(this)" onkeypress="return isNumberKey(event)">
                                    <span class="counter-btn increase-btn" onclick="increaseValue()"> + </span>
                                </div>
                            </div>
                        
                            <div class="col-3 text-center font-weight-bold">
                                <span class="thanh-tien" id="thanh_tien_40753">0</span>
                                <input type="hidden" value="" id="i_thanh_tien_40753">
                            </div>

                            <div class="dangkybutton ptb-10">
                                <div class="row">
                                    <div class="col-3 text-left">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                            <input type="hidden" name="tensanpham" value="<?= $tensanpham ?>">
                                            <input type="hidden" name="img" value="<?= $hinh ?>">
                                            <input type="hidden" name="gia" value="<?= $gia_formatted ?>">
                                            <input type="hidden" name="giamoi" value="<?= $giakm_formatted ?>">
                                            <input type="hidden" name="sanphamkhuyenmai" value="<?= $sanphamkhuyenmai ?>">
                                            <button type="submit" class="text-button add_cart btn btn-primary w-100" data-toggle="modal" data-target="#popup_login">Thêm giỏ hàng</button>
                                        <!-- <a href="index.php?act=addtocart" class="text-button add_cart btn btn-primary w-100" data-toggle="modal" data-target="#popup_login">Thêm giỏ hàng</a> -->
                                    </div>

                                    <div class="col-3 text-right">
                                        <a href="index.php?act=lienhe" class="text-button add_cart btn btn-danger w-100" data-toggle="modal" data-target="#popup_login">Mua lẻ</a>
                                    </div>

                                    <div class="col-3 text-center">
                                        <a href="index.php?act=lienhe" class="text-button btn btn-primary w-100" data-toggle="modal" data-target="#popup_mua_si">Mua sỉ</a>
                                    </div>
                                    <div class="col-3 text-left">
                                        <a href="index.php?act=lienhe" class="text-button btn btn-success w-100" data-toggle="modal" data-target="#popup_dk_ncc">Đăng ký NCC</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="thong-tin__san-pham">
    <div class="container">
        <div class="row product__details-comment">
            <div class="col comment-title">
                <div class="huong-dan-san-pham">
                    <span>Mô tả sản phẩm</span>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-2 product__mo-ta">
                    <span class="thanh-phan__name">Hướng dẫn sử dụng: </span>
                </div>
                <div class="col product__mo-ta">
                    <p class="thanh-phan__noidung">Dùng để chế biến các món ăn (rau cải xoăn hấp, xào, luộc, salad,...), làm nước ép, sinh tố</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 product__mo-ta">
                    <span class="thanh-phan__name">Hướng dẫn bảo quản: </span>
                </div>
                <div class="col product__mo-ta">
                    <p class="thanh-phan__noidung">
                        Bảo quản cải xoăn bằng cách đựng trong túi nilon,
                        loại bỏ càng nhiều không khí càng tốt. Cất trong tủ lạnh,
                        và có thể giữ trong 5 ngày. Để càng lâu, cải xoăn sẽ càng bị đắng.
                        Không rửa trước khi lưu trữ vì điều này sẽ khiến rau bị hư hỏng.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 product__mo-ta">
                    <span class="thanh-phan__name">Giao hàng: </span>
                </div>
                <div class="col product__mo-ta">
                    <p class="thanh-phan__noidung"> Hỗ trợ giao hàng nội thành Thành Phố Hồ Chí Minh trong ngày </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="comment__product">
    <div class="container">
        <div class="row comment__product-title">
            <div class="col">
                <div class="comment">
                    <p>
                        <strong>User1:</strong>
                        This is a great product!
                    </p>
                </div>
                <div class="comment">
                    <p>
                        <strong>User2:</strong>
                        I love it too!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="my_product">
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Danh sách sản phẩm -->
                <div class="home-product">
                    <div class="row sm-gutter">
                        <?php
                            foreach ($sp_cung_loai as $sp_cung_loai) {
                                extract($sp_cung_loai);

                                $hinh = $img_path . $img; //lấy đường dẫn hình 
                                $linksp = "index.php?act=chitietsanpham&id=" . $id;
                                $gia_formatted = number_format($gia, 0, ',', '.');
                                $giakhuyenmai_formatted = number_format($giakhuyenmai, 0, ',', '.');
                                echo '
                                    <div class="col-md-2">
                                        <a class="home-product__item border-top" href="' . $linksp . '">
                                            <div class="product-item__img"  
                                                style="background-image: url(' . $hinh . ');">
                                            </div>
                                            <h4 class="product-item__name">' . $tensanpham . '</h4>
                                            <div class="product-item__price">
                                                <span class="product-item__price-current">' . $gia_formatted . 'đ</span>
                                            </div>
                                            <div class="product-item__action">
                                                <div class="product-item__rating">
                                                    <i class="rating__star-gold fa-solid fa-star"></i>
                                                    <i class="rating__star-gold fa-solid fa-star"></i>
                                                    <i class="rating__star-gold fa-solid fa-star"></i>
                                                    <i class="rating__star-gold fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>

                                                <span class="item-sold">' . $daban . ' đã bán</span>
                                            </div>

                                            <div class="product-item__origin">
                                                <span class="product-item__brand">Rau</span>
                                                <span class="product-item__origin-name">Đà Lạc</span>
                                            </div>
                                        </a>
                                    </div> ';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>