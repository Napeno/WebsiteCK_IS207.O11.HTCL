<?php
    include "connect.php";
    $id = $_GET["id"];

    // data1
    $sql1 = "SELECT MaPhong, TenPhong FROM phong
    EXCEPT 
    SELECT phong.MaPhong, TenPhong FROM phong INNER JOIN thue
    ON phong.MaPhong = thue.MaPhong WHERE MaHD = '$id'";
    $rs1 = $connect->query($sql1);
    $num = 0;

    $data1 = "<tr><td>STT</td><td>Mã phòng</td><td>Tên Phòng</td><td>Chức năng</td></tr>";

    while($row = $rs1->fetch_row()) {
        $num += 1;
        $data1 .= "<tr><td>$num</td><td>$row[0]</td><td>$row[1]</td><td><input type='button' id = '$row[0]' class= 'them' value='Thêm'></td></tr>";
    }

    // data2
    $sql2 = "SELECT phong.MaPhong, TenPhong FROM phong INNER JOIN thue
    ON phong.MaPhong = thue.MaPhong WHERE MaHD = '$id'";
    $rs2 = $connect->query($sql2);
    $num = 0;

    $data2 = "<tr><td>STT</td><td>Mã phòng</td><td>Tên Phòng</td><td>Chức năng</td></tr>";

    while($row = $rs2->fetch_row()) {
        $num += 1;
        $data2 .= "<tr><td>$num</td><td>$row[0]</td><td>$row[1]</td><td><input type='button' id = '$row[0]' class= 'xoa' value='Xoá'></td></tr>";
    }

    echo $data1 . "@" . $data2;
?>
