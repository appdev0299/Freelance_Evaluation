<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php
include('user_cont/head.php');
?>

<body class="theme_turquoise">
  <div class="layout-wrapper layout-content-navbar layout-without-menu">
    <div class="layout-container">
      <div class="layout-page">
        <?php
        include('user_cont/nav.php');
        ?>
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="col-lg-12 mb-2 order-0">
                <div class="card">
                  <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                      <div class="card-body">
                        <div class="col-md mb-5">
                          <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
                              <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img class="d-block w-100" src="../assets/img/elements/home1.jpg" alt="First slide" />
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="../assets/img/elements/home2.jpg" alt="Second slide" />
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </a>
                          </div>
                        </div>
                        <center>
                          <div class="button-container ">
                            <div class="row">

                              <a type="button" class="btn btn-xl btn btn-outline-info col-lg-6 col-md-6 col-6" href="evaluation0.php"><i class='bx bx-spreadsheet'></i> แบบประเมินความเสี่ยงโรงเบาหวาน</a>
                              <a type="button" class="btn btn-xl btn btn-outline-info col-lg-6 col-md-6 col-6" href="advice.php"><i class='bx bx-star'></i> คำแนะนำ</a>
                            </div>
                          </div>
                        </center>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="content-backdrop fade"></div>
        </div>
        <?php
        include('user_cont/footer.php');
        ?>
      </div>
    </div>
  </div>
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../assets/vendor/js/menu.js"></script>
  <script src="../assets/js/main.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <script defer src="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@v2.8.6/dist/cookieconsent.js"></script>
  <script defer src="cc-init.js"></script>

</body>

</html>