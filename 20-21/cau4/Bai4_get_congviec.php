
<?php
    include "connect.php";
    $soxe = $_POST['soxe'];
    $str="select tencv, dongia, ct_bd.macv, baoduong.mabd from baoduong join ct_bd ON baoduong.MABD = ct_bd.MABD join 
    congviec on ct_bd.MACV = congviec.MACV where baoduong.SOXE = '$soxe'";
    $rs=$connect->query($str);
    echo "<tr><th>Tên công việc</th><th>Đơn giá</th><th>Chức năng</th></tr>";
    while($row= $rs->fetch_row())
    {
        echo "<tr>
                <td>$row[0]</td>
                <td class='dongia'>$row[1]</td>";
        echo    "<td><button value1='$row[2]' value2='$row[3]' name='Xoa' class='Xoa'>";
        echo    "Xóa</button></td>
              </tr>";
    }
?>

