<h1 class="text-center text-white d-none d-lg-block site-heading">
  <span class="text-primary site-heading-upper mb-3">
    <img src="assets/img/DiamondRimsLogo.svg" alt="Diamond Rims logo" class="diamondRimsLogo"/> DIAMOND RIMS </span>
  </h1>
  <div class="float-left col-md-2 p-3 fill">

    <form class="mb-2" action="index.php?page=4&option=0" method="post">
      <button class="btn btn-dark col-md-10 offset-md-1" type="submit">BRANDS</button>
    </form>

    <form class="mb-2" action="index.php?page=4&option=1" method="post">
      <button class="btn btn-dark col-md-10 offset-md-1" type="submit">MODELS</button>
    </form>

    <form action="index.php?page=4&option=2" method="post">
      <button class="btn btn-dark col-md-10 offset-md-1" type="submit">CARS</button>
    </form>

  </div>

  <div class="float-right col-md-10">

    <section class="float-left py-5 col-md-12 manageBackground">

      <?php
      if (isset($_GET['option'])){

        switch ($_GET['option']) {
          case 0:
          ?>

          <div class="container">
            <div class="row align-items-center">
              <div class="col-3">
                <div class="card-body">
                  <p class="display-4">Brands</p>
                </div>
              </div>
              <div class="col-1 offset-8">
                <div class="card-body">
                  <form action="index.php?page=4&option=0&action=0" method="post">
                    <button class="btn btn-dark button5 align-middle" type="submit"><h1>+</h1></button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <?php
          break;

          case 1:
          ?>

          <div class="container">
            <div class="row align-items-center">
              <div class="col-3">
                <div class="card-body">
                  <p class="display-4">Models</p>
                </div>
              </div>

              <?php
              if(isset($_GET['brand'])){
                ?>

                <div class="col-1 offset-8">
                  <div class="card-body">
                    <form action="index.php?page=4&option=1&action=0&brand=<?php echo $_GET['brand']; ?>" method="post">
                      <button class="btn btn-dark button5 align-middle" type="submit"><h1>+</h1></button>
                    </form>
                  </div>
                </div>

                <?php
              }
              ?>

            </div>
          </div>

          <?php
          break;

          case 2:
          ?>

          <div class="container">
            <div class="row align-items-center">
              <div class="col-3">
                <div class="card-body">
                  <p class="display-4">Cars</p>
                </div>
              </div>

              <?php
              if(isset($_GET['brand'])){
                ?>

                <div class="col-1 offset-8">
                  <div class="card-body">
                    <form action="index.php?page=4&option=2&action=0&brand=<?php echo $_GET['brand']; ?>" method="post">
                      <button class="btn btn-dark button5 align-middle" type="submit"><h1>+</h1></button>
                    </form>
                  </div>
                </div>

                <?php
              }
              ?>

            </div>
          </div>

          <?php
          break;

          default:
          ?>

          <div class="container">
            <div class="row align-items-center">
              <div class="col-3">
                <div class="card-body">
                  <p class="display-4">Brands</p>
                </div>
              </div>
              <div class="col-1 offset-8">
                <div class="card-body">

                  <form action="index.php?page=4&option=0&action=0" method="post">
                    <button class="btn btn-dark button5 align-middle" type="submit"><h1>+</h1></button>
                  </form>

                </div>
              </div>
            </div>
          </div>

          <?php
          break;
        }
      } else {
        ?>

        <div class="container">
          <div class="row align-items-center">
            <div class="col-3">
              <div class="card-body">
                <p class="display-4">Brands</p>
              </div>
            </div>
            <div class="col-1 offset-8">
              <div class="card-body">

                <form action="index.php?page=4&option=0&action=0" method="post">
                  <button class="btn btn-dark button5 align-middle" type="submit"><h1>+</h1></button>
                </form>

              </div>
            </div>
          </div>
        </div>

        <?php
      }
      ?>

      <hr/>
      <div class="col-md-10 offset-md-1">

        <?php
        if (isset($_GET['option'])){

          switch ($_GET['option']) {
            case 0:
            include_once('ManageBrands.inc.php');
            break;

            case 1:
            include_once('ManageModels.inc.php');
            break;

            case 2:
            include_once('ManageCars.inc.php');
            break;

            default:
            //Should never happen
            include_once('ManageBrands.inc.php');
            break;
          }
        } else {
          include_once('ManageBrands.inc.php');
        }
        ?>

      </div>
    </section>
  </div>
  <div class="clearfix"></div>
