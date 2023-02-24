<?php
include "header.php";
include "connect.php";
$id = $_POST["detailesID"];

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

$result = array();
foreach ($result2 as $row) {
    $array = $row;
    array_push($result, $array);
}
?>
<!-- Slideshow container -->
<div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides">
        <div class="numbertext">1 / 5</div>
        <img src="images/<?php echo str_replace("C:fakepath", "", $result[0]['image_url']); ?>" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">2 / 5</div>
        <img src="images/<?php echo str_replace("C:fakepath", "", $result[1]['image_url']); ?>" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">3 / 5</div>
        <img src="images/<?php echo str_replace("C:fakepath", "", $result[2]['image_url']); ?>" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">4 / 5</div>
        <img src="images/<?php echo str_replace("C:fakepath", "", $result[3]['image_url']); ?>" style="width:100%">
    </div>

    <div class="mySlides">
        <div class="numbertext">5 / 5</div>
        <img src="images/<?php echo str_replace("C:fakepath", "", $result[4]['image_url']); ?>" style="width:100%">
    </div>
</div>

<style>
    * {
        box-sizing: border-box
    }

    /* Slideshow container */
    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }

    /* Hide the images by default */
    .mySlides {
        display: none;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active,
    .dot:hover {
        background-color: #717171;
    }
</style>

<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 3000); // Change image every 3 seconds
    }
</script>
<?php
// echo '<h1>Results from `annonce` table:</h1>';
// echo "<pre>";
// var_dump($result1);
// echo "</pre>";
?>
<div>
    <h1><?php echo $result1[0]['title'] ?></h1>
    <p>Price : <?php echo $result1[0]['price']?>$</p>
    <br>
    <p>Address : <?php echo $result1[0]['address']?></p>
    <br>
    <p>For <?php echo $result1[0]['type'] ?></p>
    <br>
    <p>Category : <?php echo $result1[0]['category'] ?></p>
</div>