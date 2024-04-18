// banener 
let slideIndex = 0;
showSlides();

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 5000); // Change image every 5 seconds
}

function rateProduct() {
    let stars = document.getElementsByName("rate");
    let totalStars = 0;

    for (let i = 0; i < stars.length; i++) {
        if (stars[i].checked) {
            totalStars = parseInt(stars[i].value);
            break; // Dừng khi tìm thấy sao đã chọn
        }
    }

    // Hiển thị số sao tính được
    let ratingScoreElement = document.getElementById("ratingScore");
    ratingScoreElement.textContent = totalStars.toFixed(1);
}

document.addEventListener('DOMContentLoaded', function () {
    // Lấy tham chiếu đến form
    var loginForm = document.getElementById('loginForm');

    // Thêm sự kiện submit form
    loginForm.addEventListener('submit', function (event) {
        // Lấy giá trị của các trường nhập liệu
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        // Kiểm tra xem các trường đã được nhập hay chưa
        if (username.trim() === '' || password.trim() === '') {
            // Ngăn chặn form từ việc submit
            event.preventDefault();

            // Hiển thị thông báo lỗi
            alert('Vui lòng nhập đầy đủ thông tin đăng nhập.');
        }
    });

    // Xử lý sự kiện khi nhấn vào nút "Đăng ký Tài Khoản"
    var registerButton = document.querySelector('.row.p-3 a.btn-success');
    registerButton.addEventListener('click', function (event) {
        // Chuyển hướng đến trang đăng ký
        window.location.href = 'index.php?act=dangky';

        // Ngăn chặn thực hiện sự kiện mặc định của nút
        event.preventDefault();
    });
});

// function deleteCartItem(id) {
//     var confirmation = confirm("Bạn có chắc muốn xóa sản phẩm này khỏi giỏ hàng?");
//     if (confirmation) {
//         // Gửi yêu cầu xóa sản phẩm thông qua Ajax hoặc cập nhật session PHP tương ứng
//         // Sau đó cập nhật số lượng hiển thị
//         var soluongElement = document.getElementById("soluong_" + id);
//         if (soluongElement) {
//             var soluong = parseInt(soluongElement.innerHTML);
//             if (soluong > 0) {
//                 // Nếu số lượng lớn hơn 0, trừ 1
//                 soluongElement.innerHTML = soluong - 1;
//             } else {
//                 // Nếu số lượng là 1, xóa dòng sản phẩm
//                 var rowElement = soluongElement.parentNode;
//                 rowElement.parentNode.removeChild(rowElement);
//             }
//         }
//     }
// }

document.addEventListener("DOMContentLoaded", function () {
    $('.product-list-container').slick({
        slidesToShow: 6,  // Số lượng sản phẩm hiển thị trên mỗi slide
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-angle-right"></i></button>',
    });
});

// Không cần lấy giá sản phẩm từ PHP và chuyển đổi sang số
var giaSanPham = parseFloat(document.getElementById('gia_sanpham').innerText.replace(/\D/g, ''));

// Kiểm tra người dùng nhập chữ hay số
function isNumberKey(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    // Chặn các ký tự không phải số
    if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode !== 46) {
        event.preventDefault();
        return false;
    }
    return true;
}

// Tăng giảm số lượng
function decreaseValue() {
    var inputElement = document.querySelector('.check_sl');
    var currentValue = parseFloat(inputElement.value);

    // Giảm giá trị mỗi lần là 1 và không cho phép giảm khi xuống số âm
    if (currentValue >= 1) {
        inputElement.value = formatValue(currentValue - 1);
    } else {
        inputElement.value = "0";
    }

    // Cập nhật tổng tiền
    updateTotal(inputElement);
}

function increaseValue() {
    var inputElement = document.querySelector('.check_sl');
    var currentValue = parseFloat(inputElement.value);

    // Nếu giá trị là trống rỗng hoặc NaN, đặt lại giá trị thành 0
    if (isNaN(currentValue) || currentValue === "" || currentValue >= 99) {
        // inputElement.value = "0";
        return;
    } else {
        // Tăng giá trị mỗi lần là 1
        inputElement.value = formatValue(currentValue + 1);
    }

    // Cập nhật tổng tiền
    updateTotal(inputElement);
}

function updateTotal(element) {
    var quantity = parseFloat(element.value);

    // Tính tổng tiền dựa vào giá sản phẩm và số lượng
    var total = giaSanPham * quantity;

    // Lấy phần số nguyên và hiển thị
    var integerTotal = total.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }).split(' ')[0];

    // Hiển thị tổng tiền chỉ với phần số nguyên
    document.getElementById('thanh_tien_40753').innerText = integerTotal;

    // Lưu giá trị thành tiền vào hidden input nếu cần thiết
    document.getElementById('i_thanh_tien_40753').value = total;
}

function handleInput(element) {
    // Xử lý khi người dùng xóa dữ liệu và hiển thị 0
    if (element.value === "") {
        element.value = "0";
    }
}

function formatValue(value) {
    // Chuyển đổi thành số với một chữ số thập phân
    var formattedValue = parseFloat(value).toFixed(1);

    // Kiểm tra nếu có một chữ số thập phân và không phải ".0"
    if (formattedValue.includes('.') && !formattedValue.endsWith('.0')) {
        return formattedValue;
    } else {
        // Nếu không có chữ số thập phân hoặc là ".0", chuyển thành số nguyên
        return parseInt(value);
    }
}

// 

