<?php
    include "connect.php";
    $id = $_POST["id"];
    $sql = "SELECT MaHD from hoadon WHERE MaKH = '$id'";
    $rs = $connect->query($sql);
    echo "<option>Chọn mã hoá đơn</option>";
    while($row = $rs->fetch_row()) {
        echo "<option value ='".$row[0]."'>".$row[0]."</option>";
    }
    echo "</table>";
?>
