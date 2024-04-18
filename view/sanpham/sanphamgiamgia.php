<?php
    $danhmucs = danhmuc_select_all();
    $html_dssp_km = show_sp_km($dssp_km);
    
    // $pageSize = 10;
    // $startRow = 0;
    // $pageNum = 1;
    // if(isset($_GET['pageNum'])) $pageNum = $_GET['pageNum'];
    // $startRow = ($pageNum-1) * $pageSize;

    // $html_page = sanpham_select_page($startRow, $pageSize);

?>

<section class="my_product mt-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-1">
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
            <h5 class="mt-2 pt-1">DANH SÁCH SẢN PHẨM ĐƯỢC GIẢM GIÁ</h5>
                <div class="row row-col-1 row-cols-md-6">

                    <?=$html_dssp_km;?>

                </div>


                <!-- Phân trang -->
                <ul class="pagination home-product__pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="index.php?act=sanphamgiamgia">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="index.php?act=sanphamgiamgia&pageNum=1">1</a></li>
                            <li class="page-item"><a class="page-link" href="index.php?act=sanphamgiamgia&pageNum=2">2</a></li>
                            <li class="page-item"><a class="page-link" href="index.php?act=sanphamgiamgia&pageNum=3">3</a></li>
                            <li class="page-item"><a class="page-link" href="index.php?act=sanphamgiamgia">Next</a></li>
                        </ul>
                    </nav>


                    <!-- <li class="pagination-item">
                        <a href="" class="pagination-item__link">
                            <i class="pagination-item__icon fa-solid fa-angle-left"></i>
                        </a>
                    </li>
                    <li class="pagination-item pagination-item__active">
                        <a href="" class="pagination-item__link">1</a>
                    </li>
                    <li class="pagination-item">
                        <a href="" class="pagination-item__link">2</a>
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
                    </li> -->
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