<?php
    include "connect.php";
    $date = $_POST['date'];
    $str="select distinct soxe from baoduong join ct_bd ON baoduong.MABD = 
    ct_bd.MABD where NGAYNHAN = '$date'";
    $rs=$connect->query($str);
    // echo "<option>Chọn số xe</option>";
    while($row= $rs->fetch_row())
    {
    echo "<option value='$row[0]'>".$row[0]."</option>";
    }
?>

