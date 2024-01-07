<?php
    include "connect.php";
    $macv =$_POST["macv"];
    $mabd =$_POST["mabd"];
    $str = "delete from ct_bd where MACV='$macv' and MABD='$mabd'";
    $connect->query($str);
?>
