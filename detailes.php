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
<nav class="navbar navbar-expand-lg fixed-top" id="nav">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample"
            aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarButtonsExample">
            <!-- Left links -->
            <ul class=" me-auto mb-2 mb-lg-0 nav nav-pills">
                <li class="nav-item mr-4">
                    <a class="nav-link text-warning" href="home.php">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Slideshow container -->
<div class="d-flex gap-5">
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
            margin-top: 6em;
            margin-left: 2em;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }
        .mt-7{
            margin-top: 6em;
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
    <div class="mt-7">
        <h1>
            <?php echo $result1[0]['title'] ?>
        </h1>
        <p>Price :
            <?php echo $result1[0]['price'] ?>$
        </p>
        <br>
        <p>Address :
            <?php echo $result1[0]['address'] ?>
        </p>
        <br>
        <p>For
            <?php echo $result1[0]['type'] ?>
        </p>
        <br>
        <p>Category :
            <?php echo $result1[0]['category'] ?>
        </p>
    </div>
</div>