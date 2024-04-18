<?php
    $danhmucs = danhmuc_select_all();
    $html_dssp_new = show_sp($dssp_new);
?>

<section class="my_product mt-2">
    <div class="container">
        <div class="row">
            <div class="col-md-2 mt-3">
                <div class="nav flex-column nav-pills">
                    <a class="nav-link bg-success text-light">
                        <i class="fa-solid fa-bars"></i>
                        <span class="ms-2 fw-bolder"> DANH MỤC </span>
                    </a>
                    <a class="nav-link" href="index.php?act=sanpham">
                        Tất cả sản phẩm
                    </a>
                    <?php
                        foreach ($danhmucs as $danhmuc) {
                            echo '<a class="nav-link" href="index.php?act=sanpham&id_danhmuc=' . $danhmuc['id'] . '">' . $danhmuc['tendanhmuc'] . '</a>';
                        }     
                    
                    ?>
                </div>
            </div>

        
            <div class="col-md-10 py-1">
                <div class="col-md-2 py-1">
                    <h4>Lọc theo giá:</h4>
                    <select id="priceFilter">
                        <option value="5000">5,000đ - 10,000đ</option>
                        <option value="10000">10,000đ - 15,000đ</option>
                        <option value="15000">15,000đ - 20,000đ</option>
                        <option value="20000">20,000đ - 25,000đ</option>
                        <option value="25000">25,000đ - 30,000đ</option>
                    </select>
                </div>
                <div class="row row-col-1 row-cols-md-5">
                
                <?php 
                    foreach ($dssp as $sp) {
                        extract($sp); // lấy tối đa 25 sản phẩm load lên
                        $hinh = $img_path.$img; //lấy đường dẫn hình 
                        $linksp ="index.php?act=chitietsanpham&id=" .$id;
                        $gia_formatted = number_format($gia, 0, ',', '.');
                        echo '
                                <a class="home-product__item border-top" href="'.$linksp.'">
                                    <div class="product-item__img"
                                        style="background-image: url('.$hinh.');">
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
                                        <span class="product-item__origin-name">Đà Lạc</span>
                                    </div>
                                </a>';
                    }
                ?>
                </div>
                    <!-- <div class="col">
                        <a class="home-product__item" href="#">
                            <div class="product-item__img"
                                style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                            </div>
                            <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                            </h4>
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

                    <div class="col">
                        <a class="home-product__item" href="#">
                            <div class="product-item__img"
                                style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                            </div>
                            <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                            </h4>
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

                    <div class="col">
                        <a class="home-product__item" href="#">
                            <div class="product-item__img"
                                style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                            </div>
                            <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                            </h4>
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

                    <div class="col">
                        <a class="home-product__item" href="#">
                            <div class="product-item__img"
                                style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                            </div>
                            <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                            </h4>
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

                    <div class="col">
                        <a class="home-product__item" href="#">
                            <div class="product-item__img"
                                style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                            </div>
                            <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                            </h4>
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

                    <div class="col">
                        <a class="home-product__item" href="#">
                            <div class="product-item__img"
                                style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                            </div>
                            <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                            </h4>
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

                    <div class="col">
                        <a class="home-product__item" href="#">
                            <div class="product-item__img"
                                style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                            </div>
                            <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                            </h4>
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

                    <div class="col">
                        <a class="home-product__item" href="#">
                            <div class="product-item__img"
                                style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                            </div>
                            <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                            </h4>
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

                    <div class="col">
                        <a class="home-product__item" href="#">
                            <div class="product-item__img"
                                style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                            </div>
                            <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                            </h4>
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

                    <div class="col">
                        <a class="home-product__item" href="#">
                            <div class="product-item__img"
                                style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                            </div>
                            <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                            </h4>
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

                    <div class="col">
                        <a class="home-product__item" href="#">
                            <div class="product-item__img"
                                style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                            </div>
                            <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                            </h4>
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

                    <div class="col">
                        <a class="home-product__item" href="#">
                            <div class="product-item__img"
                                style="background-image: url(https://admin.nongsandungha.com/wp-content/uploads/2021/07/cai-xoan-2.jpg);">
                            </div>
                            <h4 class="product-item__name">Rau cải xoăn Kale xanh Đà Lạt (Cải Kale xanh)
                            </h4>
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
                    </div> -->


                <!-- Phân trang -->
                <ul class="pagination home-product__pagination">
                    <li class="pagination-item">
                        <a href="" class="pagination-item__link">
                            <i class="pagination-item__icon fa-solid fa-angle-left"></i>
                        </a>
                    </li>
                    <li class="pagination-item pagination-item__active">
                        <a href="index.php&page=1" class="pagination-item__link">1</a>
                    </li>
                    <li class="pagination-item">
                        <a href="index.php&page=2" class="pagination-item__link">2</a>
                    </li>
                    <li class="pagination-item">
                        <a href="" class="pagination-item__link">3</a>
                    </li>
                    <li class="pagination-item">
                        <a href="" class="pagination-item__link">4</a>
                    </li>
                    <li class="pagination-item">
                        <a href="" class="pagination-item__link">5</a>
                    <li class="pagination-item">
                        <a href="" class="pagination-item__link pagination-link-no-page">...</a>
                    </li>
                    <li class="pagination-item">
                        <a href="" class="pagination-item__link">14</a>
                    </li>
                    <li class="pagination-item">
                        <a href="" class="pagination-item__link">
                            <i class="pagination-item__icon fa-solid fa-angle-right"></i>
                        </a>
                    </li>
                </ul>

            </div>

        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var products = document.querySelectorAll('.home-product__item');

        document.getElementById('priceFilter').addEventListener('change', function (event) {
            var selectedPrice = parseInt(event.target.value); 

            products.forEach(function (product) {
                var productPrice = parseInt(product.querySelector('.product-item__price-current').textContent.replace(/\D/g, ''));
                if (productPrice >= selectedPrice && productPrice < selectedPrice + 5000) {
                    product.style.display = 'block'; 
                } else {
                    product.style.display = 'none'; 
                }
            });
        });
    });
</script>
