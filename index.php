<?php
// include_once "./component.php";
include "connect.php";

include "component.php";
include "logIn.php";
include "header.php";
// $sql = "SELECT * FROM annonce "
$sql = "SELECT * FROM `annonce` NATURAL JOIN `image_d_annonce` where Is_principale = 1";

//  LIMIT 3";
$result = $conn->query($sql);





    ?>



<nav class="navbar navbar-expand-lg fixed-top" id="nav">
      <!-- Container wrapper -->
      <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand me-2" href="https://mdbgo.com/">
          <img
            src="image/logo.png"
            height="16"
            alt="MDB Logo"
            loading="lazy"
            style="margin-top: -1px"
          />
        </a>

        <!-- Toggle button -->
        <button
          class="navbar-toggler"
          type="button"
          data-mdb-toggle="collapse"
          data-mdb-target="#navbarButtonsExample"
          aria-controls="navbarButtonsExample"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarButtonsExample">
          <!-- Left links -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item mr-4">
              <a class="nav-link text-white" href="">Home</a>
            </li>
          </ul>

          <!-- Button SIGN UP -->
          <!-- Button trigger modal -->
            <button type="button" class="btn nav-link px-3 me-2 text-white d-flex align-items-center gap-1 sign-in" data-bs-toggle="modal" data-bs-target="#signUp">
                <span>Sign Up</span>
                <i class="fa-solid fa-user-plus"></i>
            </button>






          <!-- <button
            type="button"
            class="btn nav-link px-3 me-2 text-white d-flex align-items-center gap-1 sign-in"
            data-toggle="modal"
            data-target="#btn-signup"
          >

          </button> -->
          <!-- button LOG IN -->
          <div class="d-flex align-items-center">

                <!-- Button trigger modal -->
            <button type="button" class="btn nav-link px-3 me-2 text-white d-flex align-items-center gap-1 sign-in" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Log In <i class="fa-solid fa-user"></i>
            </button>

            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn nav-link px-3 me-2 text-white d-flex align-items-center gap-1 sign-in" data-bs-target="#exampleModal">
                Log In <i class="fa-solid fa-user"></i>
            </button> -->
            <!-- <a
              type="button"
              
              data-toggle="modal"
              data-target="#btn-login"
            >
              
              
            </a> -->
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
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <img
                src="image/Real_Estate_logo_-_Fait_avec_PosterMyWall__1_-removebg-preview.png"
                style="width: 185px"
                alt="logo"
              />
              <h4 class="">Create Your Account</h4>
            </div>

            <form  action="signUp.php" method = "POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" for="firstName">First Name:</label>
                    <input
                      type="text"
                      id="firstName"
                      class="form-control form-control-lg"
                      name="firstName"
                      required
                    />
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" for="lastName">Last Name:</label>
                    <input
                      type="text"
                      id="lastName"
                      class="form-control form-control-lg"
                      name="lastName"
                      required
                    />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <label class="form-label" for="emailAddress">Email:</label>
                    <input
                      type="email"
                      id="emailAddress"
                      class="form-control form-control-lg"
                      name="email"
                      required
                    />
                  </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <label class="form-label" for="phoneNumber"
                      >Phone Number:</label
                    >
                    <input
                      type="tel"
                      id="phoneNumber"
                      class="form-control form-control-lg"
                      name="phonNumber"
                      required
                    />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <label class="form-label" for="emailAddress">Password:</label>
                    <input
                      type="password"
                      id="emailAddress"
                      class="form-control form-control-lg"
                      name="password"
                      required
                    />
                  </div>
                </div>
                <div class="col-md-6 mb-4 pb-2">
                  <div class="form-outline">
                    <label class="form-label" for="phoneNumber"
                      >confirm password:</label
                    >
                    <input
                      type="password"
                      id="phoneNumber"
                      namee="confirmPassword"
                      class="form-control form-control-lg"
                      required
                    />
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
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
</div>










<!-- ============================================================== -->
    <div class="container mt-5  d-flex ">

    <?php
    
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        // echo "<pre>";
        // var_dump($row);
        // echo "</pre>";
        $id = $row['ad_id'] ;
    
    ?>


            <div class="col-auto col-sm-12 col-md-12 col-lg-4 col-xl-4"
                style="padding-top: 15px;padding-bottom: 15px;padding-right: 15px;padding-left: 15px; ">
                <div class="bg-light border rounded shadow card" data-bss-hover-animate="pulse">

                    <img class="card-img-top mb-3" src="images/<?php  echo str_replace("C:fakepath","",$row['image_url']);?>"
                      width="400" height="278">
                    <div class="card-body">
                        <div id="icon-span">
                            <p id="type-an">
                                <?php echo $row['type'] ; ?>
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
                        <p class="card-text" style="font-family: Antic, sans-serif;color: rgb(81,87,94);">
                            <?php echo $row['City']; ?>
                        </p>
                        <button class="btn btn-danger" id="Details"
                            style="border: none;width: 100px;height: 38px;margin-left: 14px;color: A63F04;background: #A63F04;"
                            type="button" data-target="#Details<?php echo $id ?>">Details</button>
                    </div>
                </div>
            </div>
     
    </div>






    <?php
}
;

$pdo = null;
?>
<!-- librarry JS sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js%22%3E</script>