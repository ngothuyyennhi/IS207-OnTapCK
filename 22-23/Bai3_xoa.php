<?php 
    include "connect.php";
    $id = $_POST["maphong"];
    $stt = $_POST["stt"];
    $stt++;
    $str = "update phong set tinhtrang='Trong' where maphong='$id'";
    $connect->query($str);
    $sqlQuery = "SELECT * FROM phong WHERE maphong ='$id'";
    $result = $connect->query($sqlQuery);
    while ($row = $result->fetch_row()) {
        echo "<tr>
                <td>$stt</td>
                <td class='maphong'>$row[0]</td>
                <td class='tenphong'>$row[1]</td>
                <td><button id='Them'>Thêm</button></td>
              </tr>";
    }
?>
