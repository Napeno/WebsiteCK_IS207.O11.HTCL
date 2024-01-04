<form method="get">
    Tên khách hàng: <select name="makh">
     <?php
         include "connect.php";
         $sql = "select MaKH, TenKH from khachhang";
         $rs = $connect->query($sql);
         while($row = $rs->fetch_row())
            {
                echo "<option value ='".$row[0]."'>".$row[1]."</option>";
            }
     ?>   
    </select>
    Mã hoá đơn: <input type="text" name="mahd">
    Tên hoá đơn: <input type="text" name="tenhd">
    Tổng tiền: <input type="text" name="tongtien">
    <input type="submit" name="themhd" value ="Thêm">
</form>
<?php
    include "connect.php";
    if(isset($_GET["themhd"]) && $_GET["themhd"]=="Thêm")
    {
        $makh = $_GET["makh"];
        $mahd = $_GET["mahd"];
        $tenhd = $_GET["tenhd"];
        $tongtien = $_GET["tongtien"];
        $sql = "insert into hoadon(MaHD, TenHD, MaKH, TongTien) 
                value('$mahd', '$tenhd', '$makh', '$tongtien')";

        if($connect->query($sql))
            echo "Thành công";
        else
            echo "Thất bại";
    }
    $connect->close();
?>
