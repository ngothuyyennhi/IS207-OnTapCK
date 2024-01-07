<html>
<body>
 <div>
 Chọn số xe: <select id='soxe'></select>
 <?php
    include "connect.php";
    $str = "select * from baoduong";
    $rs = $connect->query($str);
    echo "Ngày nhận xe: ";
    echo "<select id='date'>";
    echo "<option>Chọn ngày nhận xe</option>";
    while ($row = $rs->fetch_row()) {
    echo "<option value='$row[1]'>" . $row[1] . "</option>";
    }
    echo "</select>";
 ?>
 <div>Thành tiền<input id="thanhtien"></div>
 <table border="1" id="congviec"></table>
 <button id='thanhtoan'>Thanh toan</button>
</body>
</html>
<script>
 $(document).ready(function() {
    $('#date').change(function(event) {
        var date = $('#date').val();
        $.post("Bai4_get.php", {
        date: date
        },
        function(data, status) {
        if (status == "success") {
        $("#soxe").html(data);
        }
        }
    )
 });
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
    $(".Xoa").live("click", function() {
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
    $('#thanhtoan').live("click", function() {
        var sum = 0;
        parseFloat(sum);
        $(".dongia").each(function() {
        var dongia = parseFloat($(this).html());
        sum = sum + dongia;
        });
        $('#thanhtien').val(sum);
        });
    });
 </script>
<?php
    include "connect.php";
    $date = $_POST['date'];
    $str="select distinct soxe from baoduong join ct_bd ON baoduong.MABD = 
    ct_bd.MABD where NGAYNHAN = '$date'";
    $rs=$connect->query($str);
    echo "<option>Chọn số xe</option>";
    while($row= $rs->fetch_row())
    {
    echo "<option value='$row[0]'>".$row[0]."</option>";
    }
?>
<?php
    include "connect.php";
    $soxe = $_POST['soxe'];
    $str="select *from baoduong join ct_bd ON baoduong.MABD = ct_bd.MABD join 
    congviec on ct_bd.MACV = congviec.MACV where baoduong.SOXE = '$soxe'";
    $rs=$connect->query($str);
    echo "<tr><th>Tên công việc</th><th>Đơn giá</th><th>Chức năng</th></tr>";
    while($row= $rs->fetch_row())
    {
    echo "<tr><td>$row[10]</td><td class='dongia'>$row[11]</td>";
    echo "<td><button value1='$row[9]' value2='$row[0]' name='Xoa' 
    class='Xoa'>";
    echo "Xóa</button></td></tr>";
    }
?>
<?php
    include "connect.php";
    $macv =$_POST["macv"];
    $mabd =$_POST["mabd"];
    $str = "delete from ct_bd where MACV='$macv' and MABD='$mabd'";
    $connect->query($str);
?>