<?php

    if(isset($_POST['btn']) == true){
        guimail();
    }

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function guimail()
{
    // require 'path/to/PHPMailer/src/Exception.php';
    // require '../../PHPMailer-master/src/Exception.php';
    // require '../../PHPMailer-master/src/PHPMailer.php';
    // require '../../PHPMailer-master/src/SMTP.php';

    require 'C:/Worksplace/Xampp/htdocs/Web_ShopThucPham/PHPMailer-master/src/Exception.php';
    require 'C:/Worksplace/Xampp/htdocs/Web_ShopThucPham/PHPMailer-master/src/PHPMailer.php';
    require 'C:/Worksplace/Xampp/htdocs/Web_ShopThucPham/PHPMailer-master/src/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2;                                       //hiển thị lại 0 để không hiển debug
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'sandbox.smtp.mailtrap.io';             //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'd71291506104e4';                       //SMTP username
        $mail->Password   = 'b2d3d7bc908e9e';                       //SMTP password
        $mail->SMTPSecure = 'tsl';                                  //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom('shopthucphamtoanvu@gmail.com', 'thucphamtoanvu');
        $mail->addAddress("{$_POST['email']}", 'khach hang');              
        //Content
        $mail->isHTML(true);                                            
        $mail->Subject = 'Thu gui tu khach hang';
        // $noidungthu = file_get_contents("noidungthulienhe.txt");
        // $noidungthu = str_replace(
        //     ['{email}' , '{sdt}' , '{noidung}'],
        //     [ $_POST['email'] , $_POST['sdt'] , $_POST['noidung'] ], 
        //     $noidungthu);

        $noidungthu = "
                        <h3>Khach hang da lien he</h3>
                        <hr>
                        <p> Email khach hang: <i> <b> {$_POST['email']} </b> </i> </p>
                        <p> SDT khach hang: <i> <b> {$_POST['sdt']} </b> </i> </p>
                        <p> Noi dung lien he: <i> <b> {$_POST['noidung']} </b> </i> </p>
                    ";

        $mail->Body = nl2br($noidungthu);

        $mail->smtpConnect(array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => false,
            )
        ));
        $mail->send();
        header("location: index.php");
        // echo 'Mail đẫ được gửi!';
    } catch (Exception $e) {
        echo "Mail không thể gửi. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-5 my-3">
            <div class="d-flex justify-content-center align-items-center">
                <h4 class="mb-2">Liên Hệ Với Chúng Tôi</h4>
            </div>
            <form method="post" action="">
                <div class="form-group mb-2">
                    <input type="email" class="form-control mt-2" id="inputEmail1" name="email" placeholder="Nhập email của bạn" required>
                </div>
                <div class="form-group mb-2">
                    <input type="tel" class="form-control mt-2" id="inputPhone1" name="sdt" placeholder="Nhập số điện thoại" required>
                </div>  
                <div class="form-group mb-2">
                    <textarea style="resize: none;  height: 200px;" class="form-control mt-2" id="inputContent1" rows="5" name="noidung" placeholder="Nhập nội dung email nếu bạn cần giúp đỡ!"></textarea>
                </div>
                <button name="btn" type="submit" class="btn btn-success mt-2" style="width: 100%;">Gửi</button>
            </form>
        </div>

        <div class="col-md-5 my-3"> 
            <div class="d-flex justify-content-center align-items-center">
                <h4 class="mb-2" style="color: #28a745;"><strong>THÔNG TIN VỀ SHOP THỰC PHẨM TOÀN VŨ</strong></h4>
            </div>
            <div class="container mt-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">1. Trụ sở chính bán lẻ lớn nhất tại Tp.HCM</h5>
                        <p class="card-text">
                            <span>- Địa chỉ: 1A/28 Hưng Phú P.8 Quận 8 Tp.HCM</span><br>
                            <span>- Số ĐKKD 0108783652 do Sở KHĐT Tp. Hồ Chí Minh</span><br>
                            <span>- Tổng Giám Đốc: Ông Nguyễn Văn A</span><br>
                            <span>- HOTLINE: 0246444444</span>
                        </p>
                    </div>
                </div>
                <!-- Thêm thông tin trụ sở khác -->
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">2. Chi nhánh 1</h5>
                        <p class="card-text">
                            <span>- Địa chỉ: 123 Nguyễn Văn Linh, Quận 7, Tp.HCM</span><br>
                            <span>- Số ĐKKD 0109641742 do Sở KHĐT Tp. Hồ Chí Minh</span><br>
                            <span>- Tổng Giám Đốc: Ông Nguyễn Văn B</span><br>
                            <span>- HOTLINE: 0123456789</span>
                        </p>
                    </div>
                </div>
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title">3. Chi nhánh 2</h5>
                        <p class="card-text">
                            <span>- Địa chỉ: 456 Lê Văn Việt, Quận 9, Tp.HCM</span><br>
                            <span>- Số ĐKKD 0108732567 do Sở KHĐT Tp. Hồ Chí Minh</span><br>
                            <span>- Tổng Giám Đốc: Ông Nguyễn Văn C</span><br>
                            <span>- HOTLINE: 0987654321</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ảnh bên phải -->
        <div class="col-md-2 my-3">
            <div class="row">
                <div class="col-md-12 mb-2 d-flex justify-content-center align-items-center">
                    <span>TIN TỨC MỚI NHẤT</span>
                </div>
                <div class="col-md-12 mt-3">
                    <img src="layout/assests/img/banner-web-be-250x250.jpg" class="img-fluid" alt="Image 2">
                </div>
                <div class="col-md-12 mt-1">
                    <a href="#" style="text-decoration: none;">Chương trình tuyển đại lý giống măng tây giá cả tốt</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 mt-2">
                    <img src="layout/assests/img/banner-web-be-250x250.jpg" class="img-fluid" alt="Image 2">
                </div>
                <div class="col-md-12 mt-1">
                    <a href="#" style="text-decoration: none;">Chương trình tuyển đại lý giống măng tây giá cả tốt</a>
                </div>
            </div>
        </div>
    </div>
</div>
