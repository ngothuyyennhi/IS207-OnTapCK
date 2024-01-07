<?php
 $macd = $_POST['macd'];
 $str = "select * from trieuchung tc, cn_tc c
 where tc.matrieuchung = c.matrieuchung and c.macongdan='$macd'";
 $rs=$connect->query($str);
 while ($row=$rs->fetch_row()){
    echo " <tr>
        <th>STT</th>
        <th>Ma TC</th>
        <th>Ten TC</th>
    </tr>";
    $i = 0;
    while ($row=$rs->fetch_row()){
        $i++;
        echo "<tr>
            <td> $i </td>
            <td> $row[0] </td>
            <td> $row[1] </td>
        </tr>";

    }
 }
?>