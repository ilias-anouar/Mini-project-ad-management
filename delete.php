<?php
include "connect.php";
include "clients.php";
// include 'index.php';
// $deleted = $id;
$id = $_POST['id'];
echo $id;

$sql = "START TRANSACTION;
DELETE FROM `image_d_annonce` WHERE `ad_id` = $id;
DELETE FROM `annonce` WHERE `ad_id` = $id;
COMMIT"
;

$stmt = $conn->exec($sql);

// $sql = "DELETE FROM annonce WHERE `ad_id`=$id";
// $sql = "SELECT FROM `annonce` NATURAL JOIN `image_d_annonce` where `ad_id` = $id ";
// $stmt = $conn->exec($sql);
header('Location: clients.php')


// while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

// }
    ?>
    