<?php
 $macl = $_POST['macl'];
 $str = "select distinct tencongdan 
 from congdan d join diemcachly c on d.madiemcachly=c.madiemcachly
 where d.madiemcachly = '$macl'";
 $rs=$connect->query($str);
 while ($row=$rs->fetch_row()){
    echo "<option value='$row[0]'>" . $row[1] . "</option>";
 }
?>