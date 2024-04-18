<div class="container-fluid">
        <h1 class="h4 mb-2 text-gray-800">DANH MỤC SÁCH ĐƠN HÀNG</h1>
        <section>
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng</h6>
                    <form action="index.php?act=sanpham" method="post" enctype="multipart/form-data" class="d-flex">
                    </form>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Mã người dùng</th>
                                    <th>Tên</th>
                                    <th>Địa chỉ</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Quyền</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($users as $user){
                                        ?>
                                        <tr>
                                            <td><?= $user['id'] ?></td>
                                            <td><?= $user['name'] ?></td>
                                            <td><?= $user['address'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td><?= $user['tel'] ?></td>
                                            <td><?= ($user['role'] == 0) ? "user" : "admin" ?></td>
                                            <td>
                                                <a style="text-decoration: none;" href="?act=updateRole&value=0&id=<?= $user['id'] ?>">User</a>
                                                <a style="text-decoration: none;" href="?act=updateRole&value=1&id=<?= $user['id'] ?>">Admin</a>
                                            </td>
                                        </tr>
                                        <?php //HTML
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            

        </section>
    </div>