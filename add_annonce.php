    <?php
    include 'logIn.php';
    include 'connect.php';
    include "header.php";
    ?>

  <body>
    <!-- Navbar -->
      <nav class="navbar navbar-expand-lg fixed-top" id="nav">
        <!-- Container wrapper -->
        <div class="container">
          <!-- Toggle button -->
          <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
            data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false"
            aria-label="Toggle navigation">
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
              <span>Add annonce</span> <i class="fa-solid fa-plus"></i>
            </button>
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="" alt="" srcset="images/bighouse.jpg" style="width: 30px; height: 30px;border-radius: 50%;">
                Profile
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">profile</a>
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
        <!-- ========== div  ==========-->
        <div class="" id="slider-three">
            <div class="d-flex justify-content-between">
                <h2>Sort By</h2>
                <div>
                    price
                    <button><i class="fa-sharp fa-solid fa-arrow-up-wide-short"></i></button>
                    <button><i class="fa-sharp fa-solid fa-arrow-down-wide-short"></i></button>
                </div>
                <div>
                    Date
                    <button><i class="fa-sharp fa-solid fa-arrow-up-wide-short"></i></button>
                    <button><i class="fa-sharp fa-solid fa-arrow-down-wide-short"></i></button>
                </div>
            </div>
        </div>


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