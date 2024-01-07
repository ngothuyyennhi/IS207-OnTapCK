<?php 
    include "connect.php";
    $id = $_GET["id"];
    $str = "select * from congdan where MaCongDan='$id'";
    $rs = $connect->query($str);
    $str2= "select * from diemcachly";
    $rs2 = $connect->query($str2);
    echo "<form action='Bai4_update.php' method='post'>";
    
    while ($row=$rs->fetch_row()) {
        echo "
        Ma cong dan <input type='text' value='$id' name='macd'></input><br>
        Ten cong dan <input type='text' value='$row[1]' name='tencd' readonly></input><br>
        Gioi tinh ";
        if($row[2]){
            echo "
            <input type='hidden' name='gioitinh' value='0'>
            <input type='checkbox' checked name='gioitinh'></input><br>";
        } else { 
            echo "<input type='checkbox' name='gioitinh'></input><br>";
        }
        echo "Nam sinh <input type='text' value='$row[3]' name='namsinh'></input><br>
            Nuoc ve <input type='text' value='$row[4]' name='nuocve'></input><br>";
        echo "Tên điểm cách ly: <select name='madcl'>";
        while ($row2=$rs2->fetch_row()) {
            echo "<option name='madcl' value='$row2[0]'>".$row2[1]."</option>";
        }
        echo "</select><br>";
        // echo "<option value='$row[4]'>$row[5]</option>";
        // while($rowDCL = $resultDCL->fetch_assoc()) {
        //     if($rowDCL['TenDiemCachLy'] !== $row[5])
        //         echo "<option value='".$rowDCL['MaDiemCachLy']."'>".$rowDCL['TenDiemCachLy']."</option>";
        // }
    }
    echo "<button id='Submit' value='Update'>Update</button>
        </form>";
    
?>
