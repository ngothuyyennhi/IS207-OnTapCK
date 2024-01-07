<?php 
    include "connect.php";
    $cd = $_POST["macd"];
    $str = "delete from congdan where MaCongDan='$cd'";
    $connect->query($str);
?>