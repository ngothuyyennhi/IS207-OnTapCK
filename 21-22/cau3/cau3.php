<html>
<head>
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<?php  
    include "connect.php";
    $str = "select * from congdan"; 
    $rs = $connect->query($str) ;
    echo " <table id='table3' border='1'>
    <tr><th>STT</th><th>Tên công dân</th><th>Giới tính</th><th>Nam sinh</th><th>Nuoc ve</th><th>Chuc nang</th></tr>"  ;
    $i = 0;
    while ($row = $rs->fetch_row()){
        $i++;
        echo  "<tr>
            <td> $i </td>
            <td> $row[1] </td>
        ";
        if ($row[2]) echo "<td>Nam</td>";
        else echo "<td>Nữ</td>";
        echo "
            <td> $row[3] </td>
            <td> $row[4] </td>
            <td> 
                
                <a href='Bai3_View.php?id={$row[0]}' id='View'' >View</a>
                <button id = 'Xoa' value='$row[0]' >Delete</a> 
            </td>
          </tr>  
        ";
    }
    echo "</table>";
 ?>
</body>
</html>

<script>
    $(document).ready(function(){
        $(document).on("click", "#Xoa", function(){
        // $('#Xoa').click(function(){
            var macd = $(this).attr('value');
            $(this).closest("tr").remove();
            $.post("Bai3_xoa.php",{
                macd:macd
            }),
            function(data,status){
            }
        })
        
    });

</script>

