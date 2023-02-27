<?php
include "connect.php";
include "logIn.php";
include "header.php";
$city = "SELECT DISTINCT `City` FROM `annonce`";
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

  $filter = ("SELECT * FROM `annonce` NATURAL JOIN `image_d_annonce` where Is_principale = 1 AND " . implode(" AND ", $queryParams));
  $filter = $conn->query($filter);

} else {

  $pageId;

  if (isset($_GET['pageId'])) {
    $pageId = $_GET['pageId'];
  } else {
    $pageId = 1;
  }

  $endIndex = $pageId * 6;
  $StartIndex = $endIndex - 6;

  $sql = ("SELECT * FROM `annonce` NATURAL JOIN `image_d_annonce` where Is_principale = 1 LIMIT 6 OFFSET $StartIndex");

  $page = 'SELECT * FROM annonce';

  $result = $conn->query($sql);

  $annoncesLength = $conn->query($page)->rowCount();

  $pagesNum = 0;

  if (($annoncesLength % 6) == 0) {

    $pagesNum = $annoncesLength / 6;
  } else {
    $pagesNum = ceil($annoncesLength / 6);
  }
}
$citys = $conn->query($city);
// User input to select sorting field and order
if (isset($_POST['date_sort'])) {
  $sort_field = 'publication_date';
  $sort_order = $_POST['date_order'];

  // SQL query to select cards and sort by specified field and order
  $sql = "SELECT * FROM annonce NATURAL JOIN `image_d_annonce` where Is_principale = 1 ORDER BY $sort_field $sort_order LIMIT 6 OFFSET $StartIndex";
  $stmt = $conn->query($sql);
  // Fetch the sorted cards
  $sorted = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $page = 'SELECT * FROM annonce';

  $result = $conn->query($sql);

  $annoncesLength = $conn->query($page)->rowCount();

  $pagesNum = 0;

  if (($annoncesLength % 6) == 0) {

    $pagesNum = $annoncesLength / 6;
  } else {
    $pagesNum = ceil($annoncesLength / 6);
  }
}
if (isset($_POST['price_sort'])) {
  $sort_field = 'price';
  $sort_order = $_POST['price_order'];

  // SQL query to select cards and sort by specified field and order
  $sql = "SELECT * FROM annonce NATURAL JOIN `image_d_annonce` where Is_principale = 1 ORDER BY $sort_field $sort_order LIMIT 6 OFFSET $StartIndex";
  $stmt = $conn->query($sql);
  // Fetch the sorted cards
  $sorted = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $page = 'SELECT * FROM annonce';

  $result = $conn->query($sql);

  $annoncesLength = $conn->query($page)->rowCount();

  $pagesNum = 0;

  if (($annoncesLength % 6) == 0) {

    $pagesNum = $annoncesLength / 6;
  } else {
    $pagesNum = ceil($annoncesLength / 6);
  }
}

?>
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

<!-- Modal Sign up -->
<div class="modal fade" id="signUp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img src="image/imagereader41.JPG" style="width: 185px" alt="logo" />
          <h4 class="">Create Your Account</h4>
        </div>
        <form action="signUp.php" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <label class="form-label" for="firstName">First Name:</label>
                <input type="text" id="firstName" class="form-control form-control-lg" name="firstName" required />
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="form-outline">
                <label class="form-label" for="lastName">Last Name:</label>
                <input type="text" id="lastName" class="form-control form-control-lg" name="lastName" required />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-4 pb-2">
              <div class="form-outline">
                <label class="form-label" for="emailAddress">Email:</label>
                <input type="email" id="emailAddress" class="form-control form-control-lg" name="email" required />
              </div>
            </div>
            <div class="col-md-6 mb-4 pb-2">
              <div class="form-outline">
                <label class="form-label" for="phoneNumber">Phone Number:</label>
                <input type="tel" id="phoneNumber" class="form-control form-control-lg" name="phonNumber" required />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-4 pb-2">
              <div class="form-outline">
                <label class="form-label" for="emailAddress">Password:</label>
                <input type="password" id="emailAddress" class="form-control form-control-lg" name="password"
                  required />
              </div>
            </div>
            <div class="col-md-6 mb-4 pb-2">
              <div class="form-outline">
                <label class="form-label" for="phoneNumber">confirm password:</label>
                <input type="password" id="phoneNumber" namee="confirmPassword" class="form-control form-control-lg"
                  required />
              </div>
            </div>
          </div>
          <div class="text-center pt-1 mb-5 pb-1">
            <button class="btn w-100 btn-log-in" onclick="signUp()" type="submit" name="sign_up">
              Sign Up
            </button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>
<main>
  <!-- ========== div serch by city and type and categories and price ==========-->
  <div class="" id="slider-three">
    <div id="btn-serch">
      <div class="form-filter d-flex">
        <form action="search.php" method="POST" class="w-100 d-flex justify-content-center align-items-center gap-1">
          <label for="" class="d-flex gap-1">
            <span>city:</span>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="City">
              <option value="#"></option>
              <?php
              while ($data = $citys->fetch(PDO::FETCH_ASSOC)) {
                foreach ($data as $city) {
                  echo "<option value='$city'>$city</option>";
                }
              }
              ?>
            </select>
          </label>
          <label for="" class="d-flex ml-1 gap-1">
            <span>category:</span>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="category">
              <option value="#"></option>
              <option value="apartment">Apartment</option>
              <option value="house">House</option>
              <option value="villa">Villa</option>
              <option value="office">Office</option>
              <option value="land">land</option>
            </select>
          </label>
          <label for="" class="d-flex ml-1 gap-1">
            <span>Type:</span>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="type">
            <option value="#"></option>
              <option value="rent">For Rent</option>
              <option value="sale">For Sale</option>
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
  <div class="d-flex gap-3">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
      <input id="date_order" name="date_order" type="hidden" value="ASC">
      <button id="date_sort" class="btn btn-warning" type="submit" name="date_sort">
        Sort by date <span id="date"><i class="fa-solid fa-sort-up"></i></span>
      </button>
    </form>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
      <input id="price_order" name="price_order" type="hidden" value="ASC">
      <button id="price_sort" class="btn btn-warning" type="submit" name="price_sort">
        Sort by price <span id="price"><i class="fa-solid fa-sort-up"></i></span>
      </button>
    </form>
  </div>
  <div class="container mt-5 d-flex flex-wrap gap-5 justify-content-center">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <div class="card wow text-center">
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
            <h4 class="card-title" style="font-family: Antic, sans-serif;color: rgb(81,87,94);">
              <?php echo $row['title']; ?>
            </h4>
            <h5 class="card-sub-title" style="font-family: Antic, sans-serif;color: #38ae53;font-size: 23px; width: 100%; ">
              <strong>
                <?php echo $row['category']; ?> |
                <?php echo $row['price']; ?>$
              </strong>
            </h5>
            <p class="card-text text-center" style="font-family: Antic, sans-serif;color: rgb(81,87,94);">
              <?php echo $row['City']; ?>
            </p>
            <form action="detailes.php" method="post">
              <input type="hidden" name="detailesID" value="<?php echo $row['ad_id'] ?>">
              <button class=" btn btn-danger" name="Details" id="Details<?php echo $row['ad_id'] ?>"
                style="border: none;width: 90px;height: 38px;color: #fff;background: #A63F04;" type="submit"
                data-target="#Details<?php echo $row['ad_id'] ?>">Details</button>
            </form>
          </div>
        </div>
        <?php
      }
    } elseif (isset($_POST['searchbtn'])) {
      while ($row = $filter->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <div class="card wow text-center">
          <img class="card-img-top mb-3 img-card"
            src="images/<?php echo str_replace("C:fakepath", "", $row['image_url']); ?>">
          <div class="card-body">
            <div id="icon-span">
              <p id="type-an">
                <?php echo $row['type']; ?>
              </p>``````````````````````````````````````````````````````````````````
              <form action="" method="GET">
                <input type="hidden" name="id" value="<?php echo $row['ad_id']; ?>">
              </form>
            </div>
            <h4 class="card-title" style="font-family: Antic, sans-serif;color: rgb(81,87,94);">
              <?php echo $row['title']; ?>
            </h4>
            <h5 class="card-sub-title" style="font-family: Antic, sans-serif;color: #38ae53;font-size: 23px; width: 100%; ">
              <strong>
                <?php echo $row['category']; ?> |
                <?php echo $row['price']; ?>$
              </strong>
            </h5>
            <p class="card-text text-center" style="font-family: Antic, sans-serif;color: rgb(81,87,94);">
              <?php echo $row['City']; ?>
            </p>
            <form action="detailes.php" method="post">
              <input type="hidden" name="detailesID" value="<?php echo $row['ad_id'] ?>">
              <button class=" btn btn-danger" name="Details" id="Details<?php echo $row['ad_id'] ?>"
                style="border: none;width: 90px;height: 38px;color: #fff;background: #A63F04;" type="submit"
                data-target="#Details<?php echo $row['ad_id'] ?>">Details</button>
            </form>
          </div>
        </div>
        <?php
      }
    } elseif (isset($_POST['date_sort'])) {
      for ($i = 0; $i < count($sorted); $i++) {
        ?>
        <div class="card wow text-center">
          <img class="card-img-top mb-3 img-card"
            src="images/<?php echo str_replace("C:fakepath", "", $sorted[$i]['image_url']); ?>">
          <div class="card-body">
            <div id="icon-span">
              <p id="type-an">
                <?php echo $sorted[$i]['type']; ?>
              </p>
              <form action="" method="GET">
                <input type="hidden" name="id" value="<?php echo $sorted[$i]['ad_id']; ?>">
              </form>
            </div>
            <h4 class="card-title" style="font-family: Antic, sans-serif;color: rgb(81,87,94);">
              <?php echo $sorted[$i]['title']; ?>
            </h4>
            <h5 class="card-sub-title" style="font-family: Antic, sans-serif;color: #38ae53;font-size: 23px; width: 100%; ">
              <strong>
                <?php echo $sorted[$i]['category']; ?> |
                <?php echo $sorted[$i]['price']; ?>$
              </strong>
            </h5>
            <p class="card-text text-center" style="font-family: Antic, sans-serif;color: rgb(81,87,94);">
              <?php echo $sorted[$i]['City']; ?>
            </p>
            <form action="detailes.php" method="post">
              <input type="hidden" name="detailesID" value="<?php echo $sorted[$i]['ad_id'] ?>">
              <button class=" btn btn-danger" name="Details" id="Details<?php echo $sorted[$i]['ad_id'] ?>"
                style="border: none;width: 90px;height: 38px;color: #fff;background: #A63F04;" type="submit"
                data-target="#Details<?php echo $sorted[$i]['ad_id'] ?>">Details</button>
            </form>
          </div>
        </div>
        <?php
      }
    } elseif (isset($_POST['price_sort'])) {
      for ($i = 0; $i < count($sorted); $i++) {
        ?>
        <div class="card wow text-center">
          <img class="card-img-top mb-3 img-card"
            src="images/<?php echo str_replace("C:fakepath", "", $sorted[$i]['image_url']); ?>">
          <div class="card-body">
            <div id="icon-span">
              <p id="type-an">
                <?php echo $sorted[$i]['type']; ?>
              </p>
              <form action="" method="GET">
                <input type="hidden" name="id" value="<?php echo $sorted[$i]['ad_id']; ?>">
              </form>
            </div>
            <h4 class="card-title" style="font-family: Antic, sans-serif;color: rgb(81,87,94);">
              <?php echo $sorted[$i]['title']; ?>
            </h4>
            <h5 class="card-sub-title" style="font-family: Antic, sans-serif;color: #38ae53;font-size: 23px; width: 100%; ">
              <strong>
                <?php echo $sorted[$i]['category']; ?> |
                <?php echo $sorted[$i]['price']; ?>$
              </strong>
            </h5>
            <p class="card-text text-center" style="font-family: Antic, sans-serif;color: rgb(81,87,94);">
              <?php echo $sorted[$i]['City']; ?>
            </p>
            <form action="detailes.php" method="post">
              <input type="hidden" name="detailesID" value="<?php echo $sorted[$i]['ad_id'] ?>">
              <button class=" btn btn-danger" name="Details" id="Details<?php echo $sorted[$i]['ad_id'] ?>"
                style="border: none;width: 90px;height: 38px;color: #fff;background: #A63F04;" type="submit"
                data-target="#Details<?php echo $sorted[$i]['ad_id'] ?>">Details</button>
            </form>
          </div>
        </div>
        <?php
      }
    }
    ;
    ?>
    <?php
    $pdo = null;
    ?>
</main>
<?php if ($_SERVER["REQUEST_METHOD"] == "GET" || isset($_POST['date_sort']) || isset($_POST['price_sort'])) { ?>
  <nav class="mt-5 mb-5 " aria-label="Page navigation example">
    <ul class=" flex-wrap pagination justify-content-center">
      <?php for ($i = 1; $i <= $pagesNum; $i++) { ?>
        <li class="page-item"><a class="page-link" href="<?php echo "index.php?pageId=" . $i ?>"><?php echo $i; ?></a></li>
      <?php } ?>
    </ul>
  </nav>
<?php }
?>
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
<script src="script.js"></script>
</body>

</html>