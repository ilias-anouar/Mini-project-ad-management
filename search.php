<?php
// session_start();

require 'connect.php';

if (isset($_POST['searchbtn'])) {
    // retrieve the form inputs using $_POST and store them in the $queryParams array
    if (!empty($_POST['City'])) {
        $queryParams[] = "City = '{$_POST['City']}'";
    }

    if (!empty($_POST['type'])) {
        $queryParams[] = "type = '{$_POST['type']}'";
    }

    if (!empty($_POST['category'])) {
        $queryParams[] = "category = '{$_POST['category']}'";
    }

    if (!empty($_POST['max_Price'])) {
        $queryParams[] = "price <= {$_POST['max_Price']}";
    }

    if (!empty($_POST['min_Price'])) {
        $queryParams[] = "price >= {$_POST['min_Price']}";
    }

    // construct the SQL query

    // $sql = "SELECT  a.*, i.image_path AS primary_image_path
    // FROM annonce a LEFT JOIN image_d_annonce i ON a.ad_id = i.ad_id AND i.primary_or_secondary = 'primary' " . implode(" AND ", $queryParams);
    // $sql = "SELECT annonce.*, img.image_path AS primary_image_path
    //     FROM annonce
    //     LEFT JOIN (
    //         SELECT ad_id, MIN(image_path) AS image_path
    //         FROM image_d_annonce
    //         WHERE primary_or_secondary = 'primary'
    //         GROUP BY ad_id
    //     ) img ON annonce.ad_id = img.ad_id
    //     WHERE " . implode(" AND ", $queryParams);

    $sql = "SELECT a.*, i.image_path AS primary_image_path 
    FROM annonce a 
    LEFT JOIN image_d_annonce i 
    ON a.ad_id = i.ad_id AND i.primary_or_secondary = 'primary' AND
    " . implode($queryParams);

    // execute the query and display the results
    $result = $conn->query($sql);
    $FilterResult = $result->fetchAll(PDO::FETCH_ASSOC);
    $primaryImagePaths = array();
    foreach ($FilterResult as $val) {
        $primaryImagePaths[$val['ad_id']] = $val['primary_image_path'];
    }
} else {

    $pageId;

    if (isset($_GET['pageId'])) {
        $pageId = $_GET['pageId'];
    } else {
        $pageId = 1;
    }

    $endIndex = $pageId * 6;
    $StartIndex = $endIndex - 6;


    // $announcesDATA = $conn->query("SELECT * FROM annonce Limit 8 OFFSET $StartIndex")->fetchAll(PDO::FETCH_ASSOC);
    $sql = ("SELECT * FROM `annonce` NATURAL JOIN `image_d_annonce` where Is_principale = 1 LIMIT 6 OFFSET $StartIndex");

    $page = 'SELECT * FROM annonce';

    // execute a query
    $annoncesLength = $conn->query($page)->rowCount();

    $pagesNum = 0;

    if (($annoncesLength % 6) == 0) {

        $pagesNum = $annoncesLength / 6;
    } else {
        $pagesNum = ceil($annoncesLength / 6);
    }
}

?>