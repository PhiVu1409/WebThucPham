<?php
    $html_dssp_km = show_sp_km($dssp_km);

    $html_dssp_new = show_sp($dssp_new);

    $html_dssp_view = show_sp($dssp_view);

    $html_dssp_best = show_sp($dssp_best);
?>

<div class="my_cart">
    <div class="container">
        <div id="cart">
            <div class="row">
                <div class="col-7">
                    <div class="card shadow mb-3 mt-3">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Giỏ Hàng</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <?php
                                            viewcart();
                                        ?>
                                    </thead>
                                </table>
                            </div>
                            <?php
                                if (empty($_SESSION['mycart'])) {
                                    echo '
                                            <span style="display: block; text-align: center; font-size: 16px;">
                                                Không có sản phẩm nào trong giỏ hàng.
                                            </span>';
                                }   
                            ?>
                        </div>
                        
                    </div>
                </div>
                <div class="col-5">
                    <div class="card shadow mb-3 mt-3">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Chi Tiết Giỏ Hàng</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <?php
                                            viewChiTietCart();
                                        ?>
                                    </thead>
                                </table>
                                <div class="container">
                                    <div class="row justify-content-end">
                                        <div class="col-auto">
                                            <?php 
                                                if (!empty($_SESSION['mycart'])) {
                                                    echo '
                                                        <a href="index.php?act=bill" class="text-decoration-none">
                                                            <input type="button" value="Thanh Toán">
                                                        </a>';
                                                }   
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

    //cho hiển thị thêm sản phẩm khi có sản phẩm trong giỏ hàng
    
    // if (!empty($_SESSION['mycart'])) {
    //     echo '
    //         <div class="my_productsale my-3">
    //             <div class="container">
    //                 <div class="row">
    //                     <div class="col-md-12 my-2">
    //                         <h4 class="my_productbest">SẢN PHẨM LIÊN QUAN</h4>
    //                     </div>
    //                 </div>
    //                 <div class="productsale_list"> 
    //                     <div class="row row-col-1 row-cols-md-6 product-list-container d-flex flex-nowrap overflow-auto">';
    //     echo $html_dssp_view;
    //     echo '
    //                     </div>
    //                 </div>
    //             </div>
    //         </div>';
    // }   

    
    //cho hiển thị sản phẩm khi không có sản

    echo '
        <div class="my_productsale my-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 my-2">
                        <h4 class="my_productbest">SẢN PHẨM LIÊN QUAN</h4>
                    </div>
                </div>
                <div class="productsale_list"> 
                    <div class="row row-col-1 row-cols-md-6 product-list-container d-flex flex-nowrap overflow-auto">';
    echo $html_dssp_view;
    echo '
                    </div>
                </div>
            </div>
        </div>';
     
?>




