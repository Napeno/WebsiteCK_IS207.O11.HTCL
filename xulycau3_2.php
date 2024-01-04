<?php
    include "connect.php";
    $id = $_GET["id"];
    $sql = "SELECT phong.MaPhong, TenPhong FROM phong INNER JOIN thue
    ON phong.MaPhong = thue.MaPhong WHERE MaHD = '$id'
    ";
    $rs = $connect->query($sql);
    $num = 0;


    echo "<tr><td>STT</td><td>Mã phòng</td><td>Tên Phòng</td><td>Chức năng</td></tr>";

    while($row = $rs->fetch_row()) {
        $num += 1;
        echo "<tr><td>$num</td><td>$row[0]</td><td>$row[1]</td><td><button class='xoa'>Xoá</button></tr>";
    }
?>


