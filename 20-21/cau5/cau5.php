<!-- Liệt kê số xe (SOXE) có số lần bảo dưỡng được nhập vào từ textfield 
(dùng kỹ thuật lập trình Ajax) (1.0 điểm) - Khi người dùng nhập số lượng 
cần liệt kê vào textfield và nhấn Enter thì chương trình liệt kê số lần bảo 
dưỡng của xe (SOXE) và họ tên khách hàng (chủ xe) có số lần bảo dưỡng lớn 
hơn số nhập ở textfield và hiển thị bảng nằm bên dưới. -->
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    Chọn số lần bảo dưỡng <input type="text" id="sl">
    <table border=1" id="cau5"></table>
</body>
</html>
<script>
    $(document).ready(function() {
        $('#sl').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                var sl = $("#sl").val();
                $.post("Bai5_lietke.php", {
                    sl: sl
                },
                function(data,status){
                    if (status == "success") {
                        $("#cau5").html(data);
                    }
                }
                )
            }
            
        }
        )
       
    });
</script>

