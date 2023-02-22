<!-- get announcement Cites -->
<?php
include "connect.php";
$sql = "SELECT Distinct `City` From `annonce`";
$cites = $conn->query($sql);
while ($city = $cites->fetch(PDO::FETCH_ASSOC)) {
    echo "<pre>";
    var_dump($city);
    echo "</pre>";
}
?>
<!-- filter by price using between operator  -->
<?php
include "connect.php";
$sql = " SELECT *  from `annonce`    where `price` between  1000 and 700000 ";
$prices = $conn->query($sql);
while ($price = $prices->fetch(PDO::FETCH_ASSOC)) {
    echo "<pre>";
    var_dump($price['price']);
    echo "</pre>";

}
?>
<!--filter by type sale   -->
<?php
include "connect.php";
$sql = " SELECT *  from `annonce` where `type` = 'sale'";
$types = $conn->query($sql);
while ($type = $types->fetch(PDO::FETCH_ASSOC)) {
    echo "<pre>";
    var_dump($type['type']);
    echo "</pre>";

}
?>
<!-- filter by type ,price  -->
<?php
include "connect.php";
$sql = " SELECT *  from `annonce` where `type` = 'sale' and  `price` between  6000 AND 3000000";
$filters = $conn->query($sql);

while ($filter = $filters->fetch(PDO::FETCH_ASSOC)) {
    echo "<pre>";
    var_dump($filter['title']);
    var_dump($filter['type']);
    var_dump($filter['price']);
    echo "</pre>";
}
?>
<!-- filter by city ,type,price,category -->
<?php
include "connect.php";
$sql = " SELECT *  from `annonce` where `category`='apartment' And `City`='tanger' AND `type` = 'sale' and  `price` between  6000 AND 3000000";
$result = $conn->query($sql);

while ($ad = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<pre>";
    var_dump($ad['title']);
    var_dump($ad['City']);
    var_dump($ad['type']);
    var_dump($ad['price']);
    var_dump($ad['category']);
    echo "</pre>";
}
?>

<?php
include "connect.php";
$sql = " SELECT `title` from `annonce` ";
$titles = $conn->query($sql);

while ($title = $titles->fetch(PDO::FETCH_ASSOC)) {
    echo "<pre>";
    var_dump($title);


    echo "</pre>";
}
?>

<?php
include "connect.php";
$sql = " SELECT `title` from `annonce` ";
$titles = $conn->query($sql);

while ($title = $titles->fetch(PDO::FETCH_ASSOC)) {
    echo "<pre>";
    var_dump($title['title']);
    echo "</pre>";
}
?>

<?php
include "connect.php";
$sql = "SELECT `image_url` FROM `image_d_annonce`";
$images = $conn->query($sql);

while ($image = $images->fetch(PDO::FETCH_ASSOC)) {
    echo "<pre>";
    var_dump($image);
    echo "</pre>";
}
?>