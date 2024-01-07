<?php 
    include "connnect.php";
    $sl = $_POST["sl"];
    $str = "
        select k.hoten, x.soxe, count(b.mabd)
        from   baoduong b, khachhang k, xe x
        where b.soxe = x.soxe and x.makh = k.makh     
        group by k.makh
        having count(b.mabd) >= '$sl'; 
    ";
    $rs = $connect->query($str);
    echo "<tr><th>Ho ten khach hang</th><th>So xe</th><th>So lan bao duong</th></tr>";
    while ($row = $rs->fetch_row()){
        echo " <tr>
            <td>$row[0]</td>
            <td>$row[1]</td>
            <td>$row[2]</td>
        </tr>";
    }
?>