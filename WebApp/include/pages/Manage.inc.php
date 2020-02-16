<h1 class="text-center text-white d-none d-lg-block site-heading">
  <span class="text-primary site-heading-upper mb-3" style="font-size: 65px;color: rgb(244,172,21);">
    <img src="assets/img/DiamondRimsLogo.png" style="width: 83px;" /> DIAMOND RIMS </span>
  </h1>
  <div class="float-left col-md-2 p-3 fill" style="background-color: rgba(230,167,86,0.9);">
    <a href="index.php?page=4&option=0"><button class="btn btn-dark col-md-10 offset-md-1" type="button">BRANDS</button></a>
    <a href="index.php?page=4&option=1"><button class="btn btn-dark col-md-10 offset-md-1 mt-3" type="button">MODELS</button></a>
    <a href="index.php?page=4&option=2"><button class="btn btn-dark col-md-10 offset-md-1 mt-3" type="button">CARS</button></a>
  </div>
  <div class="float-right col-md-10">
    <section class="float-left py-5 col-md-12" style="background-color: #ffffff;">
      <h1 class="display-4">Brands</h1>
      <hr/>
      <div class="col-md-10 offset-md-1">

<?php
        if (isset($_GET['option'])){

          switch ($_GET['option']) {
            case 0:
            include_once('ManageBrands.inc.php');
            break;

            case 1:
            include_once('ManageBrands.inc.php');
            break;

            case 2:
            include_once('ManageBrands.inc.php');
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
