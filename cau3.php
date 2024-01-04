<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
<form method="get">
    Mã hoá đơn : <select name="mahd" class='mahd'>
    <?php
         include "connect.php";
         $sql = "select MaHD from hoadon";
         $rs = $connect->query($sql);
         echo "<option >Chọn mã hoá đơn</option>";
         while($row = $rs->fetch_row())
            {
                echo "<option value ='".$row[0]."'>".$row[0]."</option>";
            }
     ?>
     </select>
</form>

<h2>Danh sách các phòng còn trống</h2> 

<form method = "get"><table border='1' class="room"></table></form>

<h2>Danh sách các phòng đã thêm</h2> 

<form method = "get"><table border='1' class="roomadded"></table></form>
<script>
    $(document).ready(function(){
        $('.mahd').change(function(){
            var id = $('.mahd').val();
            $.get("xulycau3.php", {id:id}, function(data, status){
                if (status == "success") {
                    $(".room").html(data);
                }
            })
            $.get("xulycau3_2.php", {id:id}, function(data, status){
                if (status == "success") {
                    $(".roomadded").html(data);
                }
            })
        });
    });
</script>

<script>
    $(document).ready(function(){
        $(document).on('click', '.them', function(){
            var mahd = $('.mahd').val();
            var num = $(this).closest('tr').find('td:eq(0)').text();
            var maphong = $(this).closest('tr').find('td:eq(1)').text();
            var tenphong = $(this).closest('tr').find('td:eq(2)').text();
            $.get("xylycau3_1.php", {maphong: maphong, mahd: mahd});
            $(".roomadded").append("<tr><td>" + num + "</td><td>" + maphong + "</td><td>" + tenphong + "</td><td><button class='xoa'>Xoá</button></td></tr>");
            $(this).parent().parent().remove();
        });
    });
</script>

<script>
    $(document).ready(function(){
        $(document).on('click', '.xoa', function(){
            var mahd = $('.mahd').val();
            var num = $(this).closest('tr').find('td:eq(0)').text();
            var maphong = $(this).closest('tr').find('td:eq(1)').text();
            var tenphong = $(this).closest('tr').find('td:eq(2)').text();
            $.get("xulycau3_3.php", {maphong: maphong, mahd: mahd});
            $(".room").append("<tr><td>" + num + "</td><td>" + maphong + "</td><td>" + tenphong + "</td><td><button class='them'>Thêm</button></td></tr>");
            $(this).parent().parent().remove();
        });
    });
</script>


