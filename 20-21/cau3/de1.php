<html>
<head>
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 </head>
<body>
 <table>
 <tr>
    <td>Số xe</td>
    <td><input type="text" id="soxe"></td>
 </tr>
 <tr>
    <td>Họ tên khách hàng</td>
    <td><input type="text" id="tenkh"></td>
 </tr>
 <tr>
    <td>Mã bảo dưỡng</td>
    <td><input type="text" id="mabd"></td>
 </tr>
 <tr>
    <td>Số km</td>
    <td><input type="text" id="sokm"></td>
 </tr>
 <tr>
    <td>Nội dung</td>
    <td><input type="text" id="noidung"></td>
 </tr>
 </table>
    <button id="Submit" value="Thêm">Thêm</button>
    <div id="result"></div>
</body>
</html>
//
 <script>
 $(document).ready(function() {
    $('#soxe').keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        //Enter: 13 Tab:9
        if (keycode == '13') {
            var soxe = $("#soxe").val(); 
            console.log(soxe)
            $(".classdiv1").html("1");
            $.post("Bai3_get_tenkh.php", {
                soxe:soxe
            }, 
            function(data, status) {
            if (status == 'success') {
                $('#tenkh').val(data);
            }
            });
            }
    });

    $("#Submit").click(function() {
        var soxe = $("#soxe").val();
        var mabd = $("#mabd").val();
        var sokm = $("#sokm").val();
        var noidung = $("#noidung").val();
        $.post("Bai3_them.php", {
            soxe: soxe,
            mabd: mabd,
            sokm: sokm, 
            noidung: noidung,
        },
        function(data, status) {
            if (status == "success") {
                $("#result").html(data); 
            }
            // else {
            //     $("#result").html("Thêm thất bại.");
            // }
        }
        )
    });
 });
 </script>

