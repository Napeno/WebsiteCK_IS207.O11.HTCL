<?php
    include "connect.php";
    $mahd = $_GET["mahd"];
    $maphong = $_GET["maphong"];
    $sql = "INSERT INTO thue(MaHD, MaPhong) 
            VALUES ('$mahd', '$maphong')";

    if($connect->query($sql)) {
        echo "Thành công";
    } else {
        echo "Thất bại: " . $connect->error;
    }
?>
