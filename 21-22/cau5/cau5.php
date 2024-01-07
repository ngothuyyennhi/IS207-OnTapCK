
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    Ten diem cach ly 
    <?php 
        include "connect.php";
        $str = "select * from diemcachly;";
        $rs = $connect->query($str);
        echo "<select id='dcl'>";
        echo "<option name='tencd'>Chọn Tên điểm cách ly</option>";
        while ($row = $rs->fetch_row()) {
            echo "<option value='$row[0]'>" . $row[1] . "</option>";
        }
        echo "</select>";
    ?>
    Ten cong dan <select id="cd">
        <option> Chọn Tên công dân</option>";    
    </select>
    <h2>Danh sach cac trieu chung</h2>
    <table id='table'></table>
</body>
</html>

<script>
    $(document).ready(function(){
        $(document).on('change', '#dcl', function(event){
        // $('#dcl').change(function(event){
            var macl = $(this).val();
            $.post("Bai5_get.php", {macl: macl},
            function(data, status){
                if (status == "success") {
                    $('#cd').html(data);
                }
            });
        });

        $('#cd').change(function(event){
            var macd = $(globalThis).val();
            $.post("Bai5_lietke.php", {macd: macd},
            function(data, status){
                if (status == "success"){
                    $('#table').html(data);
                }
            });
        });
    });
</script>

