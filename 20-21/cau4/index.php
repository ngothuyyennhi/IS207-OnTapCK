<html>
 <head>
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 </head>
 <body>
    <div>
        Chọn số xe: <select id='soxe'></select>
        <!-- load data ở ngày nhận -->
        <?php
            include "connect.php";
            $str = "select ngaynhan from baoduong";
            $rs = $connect->query($str);
            echo "Ngày nhận xe: ";
            echo "<select id='date'>";
            echo "<option>Chọn ngày nhận xe</option>";
            while ($row = $rs->fetch_row()) {
                echo "<option value='$row[0]'>" . $row[0] . "</option>";
            }
            echo "</select>";
        ?>

    </div>
        <div>Thành tiền<input id="thanhtien"></div>
    <div>
    <table border="1" id="congviec">
 
    </table>
    </div>
    <button id='thanhtoan'>Thanh toan</button>
 </body>
        
 
</html>





<script>
    $(document).ready(function() {
        // Liệt kê số xe được bảo dưỡng dựa vào ngày nhận
        $('#date').change(function(event) {
            var date = $('#date').val();
            $.post("Bai4_get.php", {
            //gửi về server biến ngày từ thẻ date
                date: date
            },
            function(data, status) {
                if (status == "success") {
                    // set data ở thẻ soxe
                    $("#soxe").html(data);
                }
            }
            )
        });
        // Khi chọn số xe hiển thị công việc trong đợt bảo dưỡng của xe
        $('#soxe').change(function(event) {
            var soxe = $('#soxe').val();
            $.post("Bai4_get_congviec.php", {
                soxe: soxe
            },
            function(data, status) {
                if (status == "success") {
                    $("#congviec").html(data);
                }
            }
            )
        });
        // Nhấn Xóa 
        $(document).on("click", ".Xoa", function() {
        // $('.Xoa').click(function() {
            // <button value1='$row[2]' value2='$row[3]' name='Xoa' id='Xoa'>
            var macv = $(this).attr('value1');
            var mabd = $(this).attr('value2');
            $(this).closest("tr").remove();
            $.post("Bai4_xoa_congviec.php", {
                macv: macv,
                mabd: mabd
            },
            function(data, status) {
                if (status == "success") {}
            }
            )
        });
        // Nhấn thanh toán cập nhật NGAYTRA và THANHTIEN trong bảo dưỡng
        $(document).on("click", "#thanhtoan", function() {

            var soxe = $('#soxe').val();
            var sum = 0;
            parseFloat(sum);
            $(".dongia").each(function() {
                var dongia = parseFloat($(this).html());
                sum = sum + dongia;
            });
            //set thanhtien thanh sum
            $('#thanhtien').val(sum);
            //cập nhật ở database
            $.post("Bai4_thanhtoan.php", {
                sum: sum,
                soxe: soxe
            },
            function(data,status) {
                if (status == "sucesss") {}
            }
            )
        });
    });
 </script>