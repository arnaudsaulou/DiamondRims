<h1 class="text-center text-white d-none d-lg-block site-heading">
  <span class="text-primary site-heading-upper mb-3" style="font-size: 65px;color: rgb(244,172,21);">
    <img src="assets/img/DiamondRimsLogo.svg" style="width: 83px;" alt="Diamond rims logo">
    &nbsp;DIAMOND RIMS&nbsp;
  </span>
  <span class="site-heading-lower" style="font-size: 41px;">
    DIAMOND IS ETERNAL.<br>SO IS OUR CRAFTMANSHIP.<br>
  </span>
</h1>

<div class="container">

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Search</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse">
      <form class="form-inline my-2 my-lg-0 col-12" action="#" method="post">

        <ul class="navbar-nav mr-auto col-7">

          <li class="nav-item">
            <select class="nav-link" id="brandSelect" name="brandId" onchange="brandSelectListener();">
              <optgroup label="Brand">
                <option value="0">Toutes</option>
                <?php foreach ($brandManager->getAllBrands() as $brand) { ?>
                  <option value="<?php echo $brand->getBrandId(); ?>" <?php if(isset($_POST["brandId"]) && $brand->getBrandId() == $_POST["brandId"]) { ?> selected <?php } ?>>
                    <?php echo $brand->getBrandName(); ?>
                  </option>
                <?php } ?>
              </optgroup>
            </select>
          </li>

          <li class="nav-item">
            <select class="nav-link <?php if(!isset($_POST["modelId"])){ echo "d-none"; } ?>" id="modelSelect" name="modelId" onchange="modelSelectListener();">
              <optgroup label="Model" id="modelGroup">
                <option value="0">Tous</option>
              </optgroup>
            </select>
          </li>

          <li class="nav-item">
            <select class="nav-link <?php if(!isset($_POST["milageRange"])){ echo "d-none"; } ?>" id="milageSelect" name="milageRange">
              <optgroup label="Milage">
                <option value="-1" <?php if(isset($_POST["milageRange"]) && $_POST["milageRange"] == -1){ echo "selected"; }?>>Indifférent</option>
                <option value="0" <?php if(isset($_POST["milageRange"]) && $_POST["milageRange"] == 0){ echo "selected"; }?>>Neuf</option>
                <option value="100" <?php if(isset($_POST["milageRange"]) && $_POST["milageRange"] == 100){ echo "selected"; }?>>&lt; 100 km</option>
                <option value="1000" <?php if(isset($_POST["milageRange"]) && $_POST["milageRange"] == 1000){ echo "selected"; }?>>&lt; 1000 km</option>
                <option value="10000" <?php if(isset($_POST["milageRange"]) && $_POST["milageRange"] == 10000){ echo "selected"; }?>>&lt; 10000 km</option>
              </optgroup>
            </select>
          </li>
        </ul>

        <button class="btn btn-outline-success my-2 my-sm-0 col-1 offset-3" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <div class="row product-list dev">

    <?php

    if(isset($_POST["brandId"]) && $_POST["brandId"] != 0){
      if(isset($_POST["modelId"]) && $_POST["modelId"] != 0){
        if(isset($_POST["milageRange"]) && $_POST["milageRange"] != -1){
          $filterArray = array($_POST["brandId"],$_POST["modelId"],$_POST["milageRange"]);
          $carList = $carManager->getCarsWithFilter($filterArray);
        } else {
          $filterArray = array($_POST["brandId"],$_POST["modelId"]);
          $carList = $carManager->getCarsWithFilter($filterArray);
        }
      } else{
        $filterArray = array($_POST["brandId"]);
        $carList = $carManager->getCarsWithFilter($filterArray);
      }
    } else {
      $carList = $carManager->getAllCars();
    }

    foreach ($carList as $car) {
      $model = $modelManager->getModelById($car->getModelId());
      $brand = $brandManager->getBrandById($model->getBrandId());
      $picture = $pictureManager->getMainPictureByCarId($car->getCarId());
      ?>

      <div class="col-sm-6 col-md-4 product-item animation-element slide-top-left">

        <div class="product-container">

          <div class="row">
            <div class="col-md-12">
              <a class="product-image" href="index.php?page=7&id=<?php echo $car->getCarId(); ?>">
                <img src="public/carPictures/<?php echo $picture->getPictureName(); ?> " alt="<?php echo $picture->getPictureDescription(); ?>">
              </a>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <h2>
                <a href="index.php?page=7&id=<?php echo $car->getCarId(); ?>"><?php echo $brand->getBrandName(), " - ", $model->getModelName(); ?></a>
              </h2>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <p class="product-description">
                <?php
                $description = $car->getCarDescription();
                if(strlen($description) > 255){
                  echo substr($description, 0, 255), "...";
                } else {
                  echo $description;
                }

                ?>
              </p>
              <div class="row">
                <div class="col-6">
                  <form action="index.php?page=7&id=<?php echo $car->getCarId(); ?>" method="POST">
                    <button class="btn btn-dark" type="submit">Buy Now!</button>
                  </form>
                </div>
                <div class="col-6">
                  <p class="product-price">$<?php echo $car->getCarPrice(); ?> </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
</div>

<!-- TODO -->
<?php if(isset($_POST["brandId"])){ ?>
  <script type="text/javascript"> brandSelectListener(); </script>
<?php } ?>


<script src="assets/js/products.js" async defer></script>
