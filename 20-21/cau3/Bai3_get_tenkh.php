
<?php
 include "connect.php";
 $soxe = $_POST['soxe'];
 $str="select HOTEN from xe join khachhang ON xe.MAKH = khachhang.MAKH 
where SOXE = '$soxe'";
 $rs=$connect->query($str);
 $row= $rs->fetch_row();
 echo $row[0];
?> 