<?php 
    include "connect.php";
    $thanhtien = $_POST["sum"];
    $soxe = $_POST["soxe"];
    $ngaytra = date("Y-m-d"); 

    $str = "UPDATE baoduong
            SET ngaytra = '$ngaytra', thanhtien = '$thanhtien'
            WHERE SOXE = '$soxe'";
    $connect->query($str);
?> 
