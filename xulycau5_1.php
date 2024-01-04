<?php
    include "connect.php";
    $id1 = $_POST["id1"];
    $id2 = $_POST["id2"];
    $num = 0;
    $sql = "SELECT phong.MaPhong, LoaiPhong from phong
    INNER JOIN thue
    ON phong.MaPhong = thue.MaPhong
    INNER JOIN hoadon
    ON hoadon.MaHD = thue.MaHD
    WHERE MaKH = '$id1' AND hoadon.MaHD = '$id2'";
    $rs = $connect->query($sql);
    echo "<h3>Danh sách các loại phòng trong hoá đơn</h3>";
    echo "<table border='1'>";
    echo "<tr><td>Số thứ tự</td><td>Mã phòng</td><td>Loại phòng</td></tr>";
    while($row = $rs->fetch_row()) {
        $num += 1;
        echo "<tr><td>$num</td><td>$row[0]</td><td>$row[1]</td></tr>";
    }
    echo "</table>";
?>
