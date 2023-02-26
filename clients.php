<?php
// include 'logIn.php';
session_start();
include 'connect.php';
include "header.php";

$client_id = $_SESSION['client_id'];
$sql = "SELECT * FROM `annonce` NATURAL JOIN `image_d_annonce`  where   client_id = '$client_id' AND Is_principale = 1 ";
$result = $conn->query($sql);
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
            <a class="nav-link text-white" href="home.php">Home</a>
          </li>
          <li class="nav-item mr-4">
            <a class="nav-link text-warning" href="clients.php">My Annonce</a>
          </li>
        </ul>
        <!-- Button SIGN UP -->
        <button type="button" class="btn me-3 btn-success" id="btn-addAnnonce" data-toggle="modal"
          data-target="#addAnnonceModal">
          <a href="form.php"><span>Add annonce</span> <i class="fa-solid fa-plus"></i></a>
        </button>
        <!-- button LOG IN -->
        <!-- <div class="d-flex align-items-center">
              <a type="button" class="btn nav-link px-3 me-2 text-white d-flex align-items-center gap-1 sign-in"
                data-toggle="modal" data-target="#btn">
                Profile
                <i class="fa-solid fa-user"></i>
              </a>
            </div> -->
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
              <iclass="fa-solid fa-right-from-bracket"></iclass=>
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
    </div>

    <!--=============== show cards ================ -->
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
              <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['ad_id']; ?>">

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
            <div class="d-flex gap-3">
              <button type="button" class="btn btn-warning"
                style="border: none;width: 90px;height: 38px;" data-toggle="modal"
                data-target="#Edit<?php echo $row['ad_id'] ?>">
                Edit
              </button>
              <button type="button" class="btn btn-danger" data-toggle="modal"
                data-target="#Delet<?php echo $row['ad_id'] ?>">
                Delete
              </button>
              </form>
              <form action="detailes.php" method="post">
                <input type="hidden" name="detailesID" value="<?php echo $row['ad_id'] ?>">
                <button class=" btn btn-danger" name="Details" id="Details"
                  style="border: none;width: 90px;height: 38px;color: #fff;background: #A63F04;" type="submit"
                  data-target="#Details<?php echo $row['ad_id'] ?>">Details</button>
              </form>
            </div>
          </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="Delet<?php echo $row['ad_id'] ?>" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Annonce</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="delete.php" method="post">
                  Are you sure you want to delete Announce
                  <?php echo $row['title'] ?>?
                  <p>
                    <?php echo $id ?>
                  </p>
                  <input type="hidden" value="<?php echo $row['ad_id'] ?>">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-danger" name="delete">Delete</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <?php
        if (isset($_POST["Details"])) {

          $id = $_POST["id"];
          $sql = "SELECT * FROM `annonce` NATURAL JOIN `image_d_annonce`   WHERE ad_id =$id  ";
          $result = $conn->query($sql);

          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<pre>";
            var_dump($row);
            echo "</pre>";
          }
        }
        ;
        ?>




        <!-- Modal Edite -->
        <div class="modal fade" id="Edit<?php echo $row['ad_id'] ?>" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Annonce</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" method="post">
                  <h2 class="fw-bold">Add advert</h2>

                  <div class="d-flex justify-content-evenly">
                    <div>
                      <div class="form-floating mb-3">
                        <input name="title" type="text" class="form-control shadow-none" id="floatingInput"
                          placeholder="Title" value="<?php echo $row['title']; ?>"></input>
                        <label for="floatingInput">Title</label>
                      </div>

                      <div class="form-floating mb-3">
                        <input type="text" name="city" class="form-control shadow-none" placeholder="City" id="floating"
                          value="<?php echo $row['City'] ?>"></input>
                        <label for="floating">City</label>
                      </div>

                      <div class="form-floating mb-3">
                        <input name="country" type="text" class="form-control shadow-none" id="floating"
                          placeholder="Country" value="<?php echo $row['Contry'] ?>"></input>
                        <label for="floating">Country</label>
                      </div>

                      <div class="form-floating mb-3">
                        <input name="date" type="date" class="form-control shadow-none" id="floating" placeholder="Date"
                          value="<?php echo $row['publication_date']; ?>" disabled></input>
                        <label for="floating">Date</label>
                      </div>
                    </div>

                    <div>
                      <div class="form-floating mb-3">
                        <input name="price" type="number" class="form-control shadow-none" id="floatingPassword"
                          placeholder="Price" value="<?php echo $row['price']; ?>"></input>

                        <label for="floatingPassword">Price</label>
                      </div>

                      <div class="form-floating mb-3">
                        <select name="type" class="form-control shadow-none" aria-label=".form-select" id="type">
                          <?php
                          $type = array("sale", "rent");
                          for ($i = 0; $i < count($type); $i++) {
                            if ($type[$i] == $row['type']) {
                              echo "<option value='$type[$i]' selected>$type[$i]</option>";
                            } else {
                              echo "<option value='$type[$i]'>$type[$i]</option>";
                            }
                          }
                          ?>
                        </select>
                        <label for="Type">Type</label>
                      </div>
                      <div class="form-floating mb-3">
                        <select name="Category" class="form-control shadow-none" aria-label=".form-select" id="Category">
                          <?php
                          $category = array("apartment", "house", "villa", "office", "land");
                          for ($i = 0; $i < count($category); $i++) {
                            if ($category[$i] == $row['category']) {
                              echo "<option value='$category[$i]' selected>$category[$i]</option>";
                            } else {
                              echo "<option value='$category[$i]'>$category[$i]</option>";
                            }
                          }
                          ?>
                        </select>
                        <label for="Category">Category</label>
                      </div>
                      <div class="input-group mb-3">
                        <input type="file" id="Image" class="form-control" id="inputGroupFile04"
                          aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        <button class="btn btn-success" type="button" id="inputGroupFileAddon04"><i
                            class="fa-solid fa-plus"></i></button>
                      </div>
                      <div id="upload">
                        <?php
                        // $id = $row["ad_id"];
                        // $send = "SELECT * FROM `image_d_annonce`  where `ad_id`=$id";
                        // $result = $conn->query($send);
                        // while ($arry = $result->fetch(PDO::FETCH_ASSOC)) {
                        //   $image_url = $arry["image_url"];
                        //   echo `<div class="input-group mb-3">
                        //   <div class="input-group-text btn-success">
                        //   <input class="form-check-input mt-0" type="Radio" value="$image_url" name="is_principal" aria-label="Checkbox for following text input">
                        //   </div>
                        //   <input name='image${i}' type="text" class="form-control" aria-label="Text input with checkbox" value="$image_url">
                        //   <button class="btn btn-danger close" onclick="remove(this)" type="button" id="button-addon2"><span aria-hidden="true">&times;</span></button>
                        //   </div> `;
                        // }
                        ?>
                      </div>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center align-items-center mb-3 mt-3">
                    <button name="update" type="submit" class="btn btn-primary">Update</button>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <?php
      }
      ;
      ?>
      <?php
      if (isset($_POST["update"])) {
        include_once("/form.php");
        $title = $_POST["title"];
        $city = $_POST["city"];
        $country = $_POST["country"];
        $date = $_POST["date"];
        $price = $_POST["price"];
        $type = $_POST["type"];
        $Category = $_POST["Category"];
        $image_principal = $_POST["is_principal"];
        $images = array();
        for ($i = 1; $i <= 5; $i++) {
          $image['name'] = "image$i";
          $image['path'] = $_POST["image$i"];
          $image['type'] = check_type($_POST["image$i"], $image_principal);
          array_push($images, $image);
        }
        $update = new Announcement($title, $price, $date, $city, $country, $Category, $type, $images);
      }
      ?>
      <script>
        function remove(that) {
          let item = that.closest("div");
          item.remove();
        }
        let i = 0;
        let addedimages = document.getElementById("inputGroupFileAddon04")
        addedimages.addEventListener('click', function () {
          i++
          let image = document.getElementById("Image");
          let div = document.getElementById("upload");
          let input = document.createElement('div')
          input.innerHTML = `<div class="input-group mb-3">
<div class="input-group-text btn-success">
<input class="form-check-input mt-0" type="Radio" value="${image.value}" name="is_principal" aria-label="Checkbox for following text input">
</div>
<input name='image${i}' type="text" class="form-control" aria-label="Text input with checkbox" value="${image.value}">
<button class="btn btn-danger close" onclick="remove(this)" type="button" id="button-addon2"><span aria-hidden="true">&times;</span></button>
</div>`;
          image.value = ""
          div.append(input);
        })
      </script>
  </main>
  <!-- ==================- Modal -=============================== -->
  <!-- MODAL DELETE -->
  <div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Annonce</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="delete.php?id=<?php echo $row['ad_id'] ?>" method="post">
            Are you sure you want to delete Annonce <?php echo $row['title'] ?>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-danger" name="delete">Delete</button>
        </div>
        </form>
      </div>
    </div>
  </div>

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
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2023
    </div>
    <!-- Copyright -->
  </footer>
  <!--============== link script bootstrap ================ -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
  <!-- library JS sweet alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- link JS -->
  <script src="script.js"></script>
</body>

</html>