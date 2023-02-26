<?php
session_start();
include "connect.php";
include "header.php";
// $sql = "SELECT * FROM annonce "
$sql = "SELECT * FROM `annonce` NATURAL JOIN `image_d_annonce` where Is_principale = 1";
$result = $conn->query($sql);
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
<!-- link font awesome library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
  integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- link CSS -->
<link rel="stylesheet" href="styles.css" />
</head> -->

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top" id="nav">
    <!-- Container wrapper -->
    <div class="container">
      <!-- Navbar brand -->
      <a class="navbar-brand me-2" href="https://mdbgo.com/">
        <!-- <img src="image/logo.png" height="16" alt="MDB Logo" loading="lazy" style="margin-top: -1px" /> -->
      </a>
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
          <li class="nav-item mr-4">
            <a class="nav-link text-white" href="clients.php">My Annonce</a>
          </li>
        </ul>
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <img src="" alt="" srcset="images/bighouse.jpg" style="width: 30px; height: 30px;border-radius: 50%;">
            Profile
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="profile.php">profile</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a href="logout.php" class="dropdown-item">
              logout
              <i class="fa-solid fa-right-from-bracket"></i>
            </a>
          </div>
        </div>

      </div>
      <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
  </nav>

  <main>
    <!-- ========== div serch by city and type and categories and price ==========-->
    <div class="" id="slider-three">
      <div id="btn-serch">
        <div class="form-filter d-flex">
          <form action="search.php" method="POST" class="w-100 d-flex justify-content-center align-items-center gap-1">
            <label for="" class="d-flex gap-1">
              <span>city:</span>
              <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="type">
                <option value="Tanger">Tanger</option>
                <option value="Rabat">Rabat</option>
                <option value="Marakech">Marakech</option>
                <option value="Fes">Fes</option>
              </select>
            </label>
            <label for="" class="d-flex ml-1 gap-1">
              <span>type:</span>
              <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="type">
                <option value="apartment">apartment</option>
                <option value="House">House</option>
                <option value="Villa">Villa</option>
                <option value="desk">desk</option>
                <option value="ground">ground</option>
              </select>
            </label>
            <label for="" class="d-flex ml-1 gap-1">
              <span>categories:</span>
              <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="type">
                <option value="Rent">For Rent</option>
                <option value="Sale">For Sale</option>
              </select>
            </label>
            <label for="" class="d-flex ml-1 gap-1" id="max-price">
              <span>Max Price: </span>
              <input name="max_Price" type="number" min="0" />
            </label>
            <label for="" class="d-flex ml-1 gap-1" id="min-Price">
              <span>Min Price:</span>
              <input name="min_Price" type="number" min="0" />
            </label>
            <button name="searchbtn" type="submit" class="btn btn-primary ml-4" id="btn-search">
              Search
            </button>
          </form>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <div class="container mt-5 d-flex flex-wrap gap-5 justify-content-center">
      <?php
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['ad_id'];
        ?>
        <div class="card wow">
          <img class="card-img-top mb-3 img-card"
            src="images/<?php echo str_replace("C:fakepath", "", $row['image_url']); ?>">
          <div class="card-body">
            <div id="icon-span">
              <p id="type-an">
                <?php echo $row['type']; ?>
              </p>
              <form action="" method="GET">
                <input type="hidden" name="id" value="<?php echo $row['ad_id']; ?>">
              </form>
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
            <p class="card-text text-center" style="font-family: Antic, sans-serif;color: rgb(81,87,94);">
              <?php echo $row['City']; ?>
            </p>
            <form action="detailes.php" method="post">
              <input type="hidden" name="detailesID" value="<?php echo $row['ad_id'] ?>">
              <button class=" btn btn-danger" name="Details" id="Details"
                style="border: none;width: 90px;height: 38px;margin-left: 14px;color: #fff;background: #A63F04;"
                type="submit" data-target="#Details<?php echo $row['ad_id'] ?>">Details</button>
            </form>
          </div>
        </div>
        <?php
      }
      ;
      $pdo = null;
      ?>
  </main>
  <!-- ============ footer ================= -->
  <footer class="bg-light text-center text-white mt-5">
    <!-- Grid container -->
    <div class="container p-4 pb-0 bg-light">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn text-white btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i
            class="fab fa-facebook-f"></i></a>

        <!-- Twitter -->
        <a class="btn text-white btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i
            class="fab fa-twitter"></i></a>

        <!-- Google -->
        <a class="btn text-white btn-floating m-1" style="background-color: #dd4b39" href="#!" role="button"><i
            class="fab fa-google"></i></a>

        <!-- Instagram -->
        <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button"><i
            class="fab fa-instagram"></i></a>

        <!-- Linkedin -->
        <a class="btn text-white btn-floating m-1" style="background-color: #0082ca" href="#!" role="button"><i
            class="fab fa-linkedin-in"></i></a>
        <!-- Github -->
        <a class="btn text-white btn-floating m-1" style="background-color: #333333" href="#!" role="button"><i
            class="fab fa-github"></i></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2023
    </div>
    <!-- Copyright -->
  </footer>
  <!-- ============== link script bootsrap ================ -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
  <!-- librarry JS sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- link JS -->
  <!-- <script src="script.js"></script> -->
</body>

</html>