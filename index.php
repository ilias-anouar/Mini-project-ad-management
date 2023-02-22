<?php
include "header.php";
// include_once "./component.php";
include "connect.php";

include "component.php";

// $sql = "SELECT * FROM annonce "
$sql = "SELECT * FROM `annonce` NATURAL JOIN `image_d_annonce` where Is_principale = 1";

//  LIMIT 3";
$result = $conn->query($sql);


while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<pre>";
    var_dump($row);
    echo "</pre>";


    ?>
    <div>

        <div class="container">
            <div class="col-auto col-sm-12 col-md-12 col-lg-4 col-xl-4"
                style="padding-top: 15px;padding-bottom: 15px;padding-right: 15px;padding-left: 15px;">
                <div class="bg-light border rounded shadow card" data-bss-hover-animate="pulse">
                    <img class="card-img-top mb-3" src="#" width="400" height="278">
                    <div class="card-body">
                        <div id="icon-span">
                            <p id="type-an">
                                <?php echo $row['type']; ?>
                            </p>
                        </div>
                        <h3 class="card-title" style="font-family: Antic, sans-serif;color: rgb(81,87,94);">
                            <?php echo $row['title']; ?>
                        </h3>
                        <h5 class="card-sub-title"
                            style="font-family: Antic, sans-serif;color: #38ae53;margin: 13px;margin-top: 10px;margin-right: 20px;margin-bottom: 18px;margin-left: 43px;font-size: 23px; width: 100%; ">
                            <strong>
                                <?php echo $row['category']; ?> |
                                <?php echo $row['price']; ?> $
                            </strong>
                        </h5>
                        <p class="card-text" style="font-family: Antic, sans-serif;color: rgb(81,87,94);">
                            <?php echo $row['City']; ?>
                        </p>
                        <button class="btn btn-danger" id="Details"
                            style="border: none;width: 100px;height: 38px;margin-left: 14px;color: A63F04;background: #A63F04;"
                            type="button" data-target="#Details<?php echo $row['ad_id'] ?>">Details</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php
}
;

$pdo = null;
?>