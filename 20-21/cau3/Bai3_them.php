
<?php
 include "connect.php";
 $soxe = $_POST['soxe'];
 $mabd = $_POST['mabd'];
 $sokm = $_POST['sokm'];
 $noidung = $_POST['noidung'];
 $today = date("Y/m/d");
 $str="insert into baoduong values 
('$mabd','$today','null','$sokm','$noidung','$soxe','null')";
 $rs=$connect->query($str);
?>