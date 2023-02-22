<?php
include "connect.php";
$id = $_POST['id'];
echo $id;
$sql = "START TRANSACTION;
DELETE FROM `image_d_annonce` WHERE `ad_id` = $id;
DELETE FROM `annonce` WHERE `ad_id` = $id;
COMMIT"
;
$stmt = $conn->exec($sql);
header('Location: clients.php')

    ?>
    