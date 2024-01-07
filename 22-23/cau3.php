
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php
include "connect.php";
$str1 = "SELECT mahd FROM hoadon";
$rs1 = $connect->query($str1);

echo "Mã hóa đơn";
echo "<select id='mahd'>
        <option> Chọn mã hóa đơn </option>";

while ($row1 = $rs1->fetch_row()) {
    echo "<option value='$row1[0]'>" . $row1[0] . "</option>";
}

echo "</select>";

// Fetching the list of available rooms
$str2 = "SELECT * FROM phong";
$rs2 = $connect->query($str2);

echo "<h2>Danh sách phòng trống</h2>
        <table id='tblthem'> 
        <tr><th> STT </th><th> Mã phòng  </th><th> Tên phòng </th><th> Chức năng </th></tr>";

$i = 0;

while ($row2 = $rs2->fetch_row()) {
    if ($row2[2] == 'Trong') {
        $i++;
        echo " <tr>
                <td>$i</td>
                <td>$row2[0]</td>
                <td>$row2[1]</td>
                <td><button class='Them' value1='$row2[0]' value2='$row2[1]' value3='$i'>Thêm</button></td>
            </tr>";
    }
}

echo "</table>";

// Displaying the list of reserved rooms
echo "<h2>Danh sách phòng đã thêm</h2>
        <table id='tblxoa'> 
        <tr><th> STT </th><th> Mã phòng  </th><th> Tên phòng </th><th> Chức năng </th></tr>";

$j = 0;
$rs2->data_seek(0);

while ($row2 = $rs2->fetch_row()) {
    if ($row2[2] == 'Da co khach') {
        $j++;
        echo " <tr>
                <td>$j</td>
                <td>$row2[0]</td>
                <td>$row2[1]</td>
                <td><button class='Xoa' value='$row2[0]'>Xóa</button></td>
            </tr>";
    }
}

echo "</table>";
?>



<script>
    $(document).ready(function () {
        $('.Xoa').click(function () {
            var maphong = $(this).attr('value');
            var stt =<?php echo $j?>;
            $.post("Bai3_xoa.php", {maphong: maphong, stt:stt}, function (data, status) {
                if (status == "success") {
                    $('#tblthem').append(data);
                    $(this).closest("tr").remove();

                }
            })
        })
        //Them...
    });
</script>