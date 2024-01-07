<html>
<body>
    <form method="post" action="Bai2_them.php">
        <?php
            include "connect.php";
            $str = "select makh,hoten from khachhang";
            $rs = $connect->query($str);
            echo "Mã khách hàng: ";
            echo "<select name='makh'>";
            echo "<option>Chọn mã khách hàng</option>";
            while ($row = $rs->fetch_row()) {
            echo "<option value='$row[0]'>" . $row[1] . "</option>";
            }
            echo "</select>";
        ?>

        Mã hợp đồng     <input type="text" name="mahd" id="">
        Tên hợp đồng    <input type="text" name="tenhd" id="">
        Tổng tiền       <input type="text" name="tongtien" id="">
        <button id="Submit" value="Thêm">Them</button>
    </form>

    <div id="result"></div>
</body>
</html>
