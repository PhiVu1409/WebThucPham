// Lấy ngày hiện tại và tháng hiện tại
var today = new Date();
var currentMonth = today.getMonth() + 1; // Tháng bắt đầu từ 0

// Tính số ngày của tháng hiện tại
function daysInMonth(month, year) {
  return new Date(year, month, 0).getDate();
}
var days = daysInMonth(currentMonth, today.getFullYear());

// Mảng chứa số liệu doanh thu cho từng ngày trong tháng, bao gồm cả ngày không có dữ liệu
var monthlyData = [];

// Lấy ngày hiện tại và điều chỉnh để lấy ngày đầu tiên của tháng
var firstDayOfMonth = new Date(today.getFullYear(), currentMonth - 1, 1);

// Duyệt qua từng ngày trong tháng và kiểm tra xem có dữ liệu doanh thu cho ngày đó không
for (var i = 1; i <= days; i++) {
  var currentDate = new Date(today.getFullYear(), currentMonth - 1, i);

  // Kiểm tra xem có dữ liệu doanh thu cho ngày đó không
  // Ở đây có thể thay bằng cách truy xuất dữ liệu từ cơ sở dữ liệu hoặc bất kỳ nguồn dữ liệu nào khác
  var revenueForDay = getRevenueForDate(currentDate);

  // Thêm giá trị doanh thu hoặc null vào mảng monthlyData
  monthlyData.push(revenueForDay !== null ? revenueForDay : 0); // Thay null bằng 0 cho những ngày không có dữ liệu
}

// Mảng nhãn chứa ngày trong tháng
var labels = [];
for (var i = 1; i <= days; i++) {
  labels.push(i.toString());
}

// Dữ liệu doanh thu
var data = {
  labels: labels,
  datasets: [{
    label: 'Doanh thu',
    data: monthlyData,
    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Màu nền
    borderColor: 'rgba(54, 162, 235, 1)', // Màu viền
    borderWidth: 1
  }]
};

// Tùy chọn biểu đồ
var options = {
  scales: {
    yAxes: [{
      ticks: {
        beginAtZero: true,
        callback: function(value, index, values) {
          return value >= 1000 ? (value / 1000).toFixed(1) + ' tr' : value;
        }
      }
    }]
  }
};

// Vẽ biểu đồ cột
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar', // Thay đổi loại biểu đồ thành 'bar' để vẽ biểu đồ cột
  data: data,
  options: options
});

// Hàm giả lập lấy dữ liệu doanh thu cho một ngày cụ thể
function getRevenueForDate(date) {
  // Trong ví dụ này, dữ liệu doanh thu được giả lập ngẫu nhiên
  // Bạn có thể thay thế hàm này bằng cách truy xuất dữ liệu từ cơ sở dữ liệu hoặc bất kỳ nguồn dữ liệu nào khác
  // Đảm bảo trả về giá trị doanh thu cho ngày được cung cấp
  if (Math.random() < 0.5) {
    return Math.floor(Math.random() * 10000); // Giả lập dữ liệu doanh thu từ 0 đến 999
  } else {
    return null; // Trả về null nếu không có dữ liệu cho ngày đó
  }
}
