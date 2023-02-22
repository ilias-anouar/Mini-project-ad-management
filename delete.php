<?php
include "connect.php";

include "clients.php";
include 'index.php';
echo $id;

// $sql = "SELECT * FROM annonce "
$sql = "DELETE   FROM `annonce`  where 'ad_id'  = '$id'";

//  LIMIT 3";
$result = $conn->query($sql);


// while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

// }
    ?>
    