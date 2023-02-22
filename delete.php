<?php
include "header.php";
// include_once "./component.php";
include "connect.php";

// include "component.php";
include "index.php";


$id = $_GET['ad_id'];
echo $id;

// $sql = "SELECT * FROM annonce "
$sql = "DELETE  * FROM `annonce` NATURAL JOIN `image_d_annonce` where 'ad_id'  = $id";

//  LIMIT 3";
$result = $conn->query($sql);


while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    // echo "<pre>";
    // var_dump($row);
    // echo "</pre>";

}
    ?>
    