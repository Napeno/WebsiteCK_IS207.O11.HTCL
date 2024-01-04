<?php
    include "connect.php";
    $id = $_POST["id"];
    $num = 0;
    $sql = "SELECT hoadon.MaKH, TenKH, SUM(TongTien) from hoadon 
    INNER JOIN khachhang
    on hoadon.MaKH = khachhang.MaKH
    GROUP BY hoadon.MaKH, TenKH
    ORDER BY SUM(TongTien) DESC 
    LIMIT $id";
    $rs = $connect->query($sql);

    echo "$id khách hàng có số tiền thuê nhiều nhất";
    echo "<table border='1'>";
    echo "<tr><td>STT</td><td>Mã khách hàng</td><td>Tên Khách hàng</td><td>Tổng tiền thuê</td></tr>";
    while($row = $rs->fetch_row()) {
        $num += 1;
        echo "<tr><td>$num</td><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
    }
    echo "</table>";
?>
