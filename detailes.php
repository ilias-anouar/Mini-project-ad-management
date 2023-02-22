<?php
include "header.php";
include "connect.php";
$id = $_POST["detailesID"];
// $sql = "START TRANSACTION;
// SELECT * FROM `annonce` WHERE `ad_id` = $id;
// SELECT * FROM `image_d_annonce` WHERE `ad_id` = $id;
// COMMIT";
// $sql = "SELECT * FROM `annonce` LEFT JOIN `image_d_annonce`  where   ad_id = '$id'";
// $result = $conn->query($sql);
// while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
//     echo "<pre>";
//     var_dump($row);
//     echo "</pre>";
// }
$conn->beginTransaction();

// prepare and execute the first SELECT query
$stmt1 = $conn->prepare('SELECT * FROM `annonce` WHERE `ad_id` = ?');
$stmt1->execute([$id]);

// fetch the first result set
$result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

// prepare and execute the second SELECT query
$stmt2 = $conn->prepare('SELECT * FROM `image_d_annonce` WHERE `ad_id` = ?');
$stmt2->execute([$id]);

// fetch the second result set
$result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

// commit the transaction
$conn->commit();

// display the results
echo '<h1>Results from `annonce` table:</h1>';
foreach ($result1 as $row) {
    echo '<p>';
    foreach ($row as $column => $value) {
        echo $column . ': ' . $value . '<br>';
    }
    echo '</p>';
}

echo '<h1>Results from `image_d_annonce` table:</h1>';
foreach ($result2 as $row) {
    echo '<p>';
    foreach ($row as $column => $value) {
        echo $column . ': ' . $value . '<br>';
    }
    echo '</p>';
}

?>