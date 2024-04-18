<?php

$html_dssp_km = show_sp_km($dssp_km);

$html_dssp_new = show_sp($dssp_new);

$html_dssp_view = show_sp($dssp_view);

$html_dssp_best = show_sp($dssp_best);

?>

<!-- banner -->
<div class="my_maincontain my-3">
    <div class="container">
        <!-- Slideshow container -->
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="layout/assests/img/banner1.png" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="layout/assests/img/banner2.png" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="layout/assests/img/banner3.png" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="layout/assests/img/banner_sua.png" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="layout/assests/img/banner_giavi.jpg" style="width:100%">
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </div>
</div>

<!-- danhmuc -->
<div class="my_category my-3">
    <div class="container">
        <div class="cate-list">
            <div class="title_category">
                <span>DANH MỤC</span>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="cate-item">
                        <a href="index.php?act=sanpham&id_danhmuc=1" class="cate_link">
                            <img src="layout/assests/img/icon-rauxanh.png" alt="" class="cate-img">
                            <p class="cate-name">Nông sản</p>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="cate-item">
                        <a href="index.php?act=sanpham&id_danhmuc=2" class="cate_link">
                            <img src="layout/assests/img/icon-kingcrab.png" alt="" class="cate-img">
                            <p class="cate-name">Hải sản</p>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="cate-item">
                        <a href="index.php?act=sanphamkhac" class="cate_link">
                            <img src="layout/assests/img/icon-traicay.png" alt="" class="cate-img">
                            <p class="cate-name">Trái cây</p>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="cate-item">
                        <a href="index.php?act=sanpham&id_danhmuc=4" class="cate_link">
                            <img src="layout/assests/img/icon-hangnhapkhau.png" alt="" class="cate-img">
                            <p class="cate-name">Hàng nhập khẩu</p>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="cate-item">
                        <a href="index.php?act=sanpham&id_danhmuc=6" class="cate_link">
                            <img src="layout/assests/img/icon-giavi.png" alt="" class="cate-img">
                            <p class="cate-name">Gia vị</p>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="cate-item">
                        <a href="index.php?act=sanpham&id_danhmuc=7" class="cate_link">
                            <img src="layout/assests/img/icon-nuocngot.png" alt="" class="cate-img">
                            <p class="cate-name">Nước giải khác</p>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="cate-item">
                        <a href="index.php?act=sanphamkhac" class="cate_link">
                            <img src="layout/assests/img/icon-keo.png" alt="" class="cate-img">
                            <p class="cate-name">Bánh kẹo</p>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="cate-item">
                        <a href="index.php?act=sanpham&id_danhmuc=8" class="cate_link">
                            <img src="layout/assests/img/icon-sua.png" alt="" class="cate-img">
                            <p class="cate-name">Sữa</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- san pham sale -->
<div class="my_productsale my-3">
    <div class="container">
        <div class="productsale_list">
            <div class="row">
                <div class="col-md-2">
                    <img class="productsale_list-img d-flex" src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/flashsale/fb1088de81e42c4e538967ec12cb5caa.png" alt="">
                </div>
                
                <div class="col-md-8 d-flex align-items-center fs-5 fw-medium">
                    <div id="countdown" class="text-center"></div>
                </div>
                <div class="col-md-2 d-flex justify-content-center align-items-center">
                    <a href="index.php?act=sanphamgiamgia" class="ms-5 text-decoration-none"><span class="pe-1">Xem tất cả</span></a>
                    <span class="mr_lr pt-1" style="font-size: 10px;"><i class="fa-solid fa-angle-right"></i></span>
                </div>
            </div>
            <div class="row row-col-1 row-cols-md-6 product-list-container d-flex flex-nowrap overflow-auto">
                <?= $html_dssp_km; ?>
            </div>
        </div>
    </div>
</div>

<!-- san pham -->
<section class="my_productbest py-2">
    <div class="container">
        <h4 class="my_productbest-title">SẢN PHẨM BÁN CHẠY</h4>
    </div>
</section>

<section class="my_product">
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Danh sách sản phẩm -->
                <div class="home-product">
                    <div class="row sm-gutter">
                        <!-- Hiển thị 5 sản phẩm trên cùng 1 hàng -->
                        <!-- product-item -->
                        <?= $html_dssp_new; ?>

                        <?php for ($i = 0; $i < 15; $i++) { ?>
                            <div class="col-md-2">
                                <a class="home-product__item" href="#">
                                    <div class="product-item__img" style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                                    </div>
                                    <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)</h4>
                                    <div class="product-item__price">
                                        <span class="product-item__price-oud">100.00đ</span>
                                        <span class="product-item__price-current">89.00đ</span>
                                    </div>
                                    <div class="product-item__action">
                                        <div class="product-item__rating">
                                            <i class="rating__star-gold fa-solid fa-star"></i>
                                            <i class="rating__star-gold fa-solid fa-star"></i>
                                            <i class="rating__star-gold fa-solid fa-star"></i>
                                            <i class="rating__star-gold fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>

                                        <span class="item-sold">88 đã bán</span>
                                    </div>

                                    <div class="product-item__origin">
                                        <span class="product-item__brand">Rau</span>
                                        <span class="product-item__origin-name">Đà Lạc</span>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-2 text-center">
                <button class="btn btn-lg btn-block" style="color: aliceblue; font-size: 18px; font-weight: 400; background-color: #52a851; margin: 10px 0;">Xem tiếp</button>
            </div>
        </div>

    </div>
</section>




                            
<script>
  // Function to update the countdown timer
  function updateCountdown() {
    // Get the current time
    var now = new Date().getTime();
    
    // Set the first event's start time to 11:00:00 and end time to 12:00:00
    var startTime1 = new Date();
    startTime1.setHours(9);
    startTime1.setMinutes(0);
    startTime1.setSeconds(0);

    var endTime1 = new Date();
    endTime1.setHours(11);
    endTime1.setMinutes(30);
    endTime1.setSeconds(0);

    // Set the second event's start time to 7:00:00 and end time to 10:00:00
    var startTime2 = new Date();
    startTime2.setHours(13);
    startTime2.setMinutes(0);
    startTime2.setSeconds(0);

    var endTime2 = new Date();
    endTime2.setHours(15);
    endTime2.setMinutes(0);
    endTime2.setSeconds(0);

    // Set the third event's start time to 15:00:00 and end time to 19:00:00
    var startTime3 = new Date();
    startTime3.setHours(19);
    startTime3.setMinutes(0);
    startTime3.setSeconds(0);

    var endTime3 = new Date();
    endTime3.setHours(21);
    endTime3.setMinutes(30);
    endTime3.setSeconds(0);

    // If current time is before start time or after end time of all events, display a message
    if ((now < startTime1.getTime() || now >= endTime1.getTime()) && (now < startTime2.getTime() || now >= endTime2.getTime()) && (now < startTime3.getTime() || now >= endTime3.getTime())) {
      document.getElementById("countdown").innerHTML = "";
      return;
    }

    // Initialize distance to a large value
    var distance = Infinity;

    // Check distance for the first event
    if (now >= startTime1.getTime() && now < endTime1.getTime()) {
      distance = Math.min(distance, endTime1.getTime() - now);
    }

    // Check distance for the second event
    if (now >= startTime2.getTime() && now < endTime2.getTime()) {
      distance = Math.min(distance, endTime2.getTime() - now);
    }

    // Check distance for the third event
    if (now >= startTime3.getTime() && now < endTime3.getTime()) {
      distance = Math.min(distance, endTime3.getTime() - now);
    }

    // Calculate hours, minutes, and seconds
    var hours = Math.floor(distance / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Format the time string
    var timeString = padZero(hours) + "h " + padZero(minutes) + "m " + padZero(seconds) + "s";

    // Display the time string
    document.getElementById("countdown").innerHTML = timeString;
  }

  // Function to add leading zero to single digit numbers
  function padZero(num) {
    return (num < 10 ? "0" : "") + num;
  }

  // Call the updateCountdown function every second
  setInterval(updateCountdown, 1000);

  // Initial call to display the countdown immediately
  updateCountdown();
</script>
