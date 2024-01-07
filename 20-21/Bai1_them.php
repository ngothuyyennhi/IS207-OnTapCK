<?php
 include "connect.php";
 $makh = $_POST['makh'];
 $tenkh = $_POST['tenkh'];
 $sdt = $_POST['sdt'];
 $str="insert into khachhang (makh,hoten,dienthoai) values ('$makh','$tenkh','$sdt')";
 $rs=$connect->query($str);
?>
