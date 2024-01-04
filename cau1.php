<form method="get">
    Mã khách hàng: <input type="text" name="makh" placeholder="Mã khách hàng">
    Tên khách hàng: <input type="text" name="tenkh" placeholder="Tên khách hàng">
    Số điện thoại: <input type="text" name="sdt" placeholder="Số điện thoại">
    Căn cước công dân: <input type="text" name="cccn" placeholder="Căn cước công dân">
    <input type="submit" name="themkh" value="Thêm">
</form>
<?php
    if(isset($_GET["themkh"]) && $_GET["themkh"]=="Thêm"){
        include "connect.php";
        $makh = $_GET["makh"];
        $tenkh = $_GET["tenkh"];
        $sdt = $_GET["sdt"];
        $cccn = $_GET["cccn"];
        $sql = "insert into khachhang(MaKH, TenKH, sdt, cccn) value('$makh', '$tenkh', '$sdt', '$cccn')";

        if($connect->query($sql) == true)
            echo "insert thành công";
        else
            echo "Không thành công";

    $connect->close();

    }
    
?>