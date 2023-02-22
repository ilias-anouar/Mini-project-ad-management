<?php
include "connect.php";
include "clients.php";
include 'index.php';
// $deleted = $id;
echo $id;

// $sql = "SELECT * FROM annonce "
// $sql = "DELETE FROM `annonce` WHERE `annonce`.`ad_id` = $deleted";
// $stmt = $conn->prepare($sql);
// $stmt->execute();
$sql = "DELETE FROM annonce WHERE id=$id";

// use exec() because no results are returned
$conn->exec($sql);




// while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

// }
    ?>
    