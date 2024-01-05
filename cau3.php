<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
            $.get("xulycau3.php", {id: id}, function(response){
                if (response) {
                    var data = response.split("@");
                    $(".room").html(data[0]);
                    $(".roomadded").html(data[1]);
                }
            });
        });
    });
</script>

<script>
    $(document).on('click', '.them', function(){
        var id = $('.mahd').val();
        var maphong = $(this).attr('id');
        $.get("xulycau3_1.php", {maphong: maphong, mahd: id});
        $.get("xulycau3.php", {id: id}, function(response){
            if (response) {
                var data = response.split("@");
                $(".room").html(data[0]);
                $(".roomadded").html(data[1]);
            }
        });
    });
</script>

<script>
    $(document).on('click', '.xoa', function(){
        var id = $('.mahd').val();
        var maphong = $(this).attr('id');
        $.get("xulycau3_2.php", {maphong: maphong, mahd: id});
        $.get("xulycau3.php", {id: id}, function(response){
            if (response) {
                var data = response.split("@");
                $(".room").html(data[0]);
                $(".roomadded").html(data[1]);
            }
        });
    });
</script>


