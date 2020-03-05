<h1 class="text-center text-white d-none d-lg-block site-heading">
  <span class="text-primary site-heading-upper mb-3" style="font-size: 65px;color: rgb(244,172,21);">
    <img src="assets/img/DiamondRimsLogo.svg" style="width: 83px;">
    &nbsp;DIAMOND RIMS&nbsp;
  </span>
</h1>

<?php

$car = $carManager->getCarById($_GET["id"]);
$model = $modelManager->getModelById($car->getModelId());
$brand = $brandManager->getBrandById($model->getBrandId());
$mainPicture = $pictureManager->getMainPictureByCarId($car->getCarId());
$sidePictures = $pictureManager->getPicturesByCarId($car->getCarId());

?>

<div class="container bg-faded p-4">
  <h2 class="text-left pl-2"><?php echo $brand->getBrandName(), " - ", $model->getModelName(); ?></h2>
  <div class="row mt-4">
    <div class="col-md-8">
      <img class="img-fluid" src="public/carPictures/<?php echo $mainPicture->getPictureName(); ?> " alt="<?php echo $mainPicture->getPictureDescription(); ?>">
    </div>
    <div class="col-md-4">
      <h5 class="text-center my-3">Car Description</h5>
      <p><?php echo $car->getCarDescription(); ?></p>
    </div>

  </div>

  <div class="mt-4">
    <h5>Car Details</h5>
    <ul >
      <li ><p class="col-4 p-0"></p><p class="col-4 offset-1 text-left"></p></li>
      <li class="col-12"><p class="col-4 p-0"></p><p class="col-4 offset-1 text-left"></p></li>
      <li class="col-12"><p class="col-4 p-0"></p><p class="col-4 offset-1 text-left"></p></li>
      <li class="col-12"><p class="col-4 p-0"></p><p class="col-4 offset-1 text-left"></p></li>
    </ul>


    <div class="table-responsive">
      <table class="col-10 offset-1 table table-condensed">
        <tr>
          <td>Color</td>
          <td><?php echo $car->getCarColor(); ?></td>
        </tr>

        <tr>
          <td>Motor</td>
          <td><?php echo $model->getModelHorsePower(); ?></td>
        </tr>

        <tr>
          <td>Milage</td>
          <td><?php echo $car->getCarMilage(); ?></td>
        </tr>

        <tr>
          <td>Price</td>
          <td><?php echo $car->getCarPrice(); ?></td>
        </tr>
      </table>
    </div>
  </div>



<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">

    <?php
      $i = 1;
      foreach ($sidePictures as $picture) {
    ?>
      <div class="mySlides col-12">

        <img
          class="col-8 offset-2"
          src="public/carPictures/<?php echo $picture->getPictureName(); ?>"
          alt="<?php echo $picture->getPictureDescription(); ?>">

      </div>

    <?php
        $i++;
      }
    ?>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>

    <div class="col-12 row">
    <?php
      $i = 1;
      foreach ($sidePictures as $picture) {
    ?>

    <div class="col-4 m-0 p-0">
      <img
        class="demo cursor"
        onclick="currentSlide(<?php echo $i; ?>)"
        src="public/carPictures/<?php echo $picture->getPictureName(); ?>"
        alt="<?php echo $picture->getPictureDescription(); ?>"
        style="width:100%;">
    </div>

    <?php
        $i++;
      }
    ?>
  </div>

  </div>
</div>

  <?php
  if(count($sidePictures) > 0) {
    $i = 1;
    ?>

    <h5 class="my-4">Other pictures</h5>
    <div class="row">

    <?php foreach ($sidePictures as $picture) { ?>

      <div class="col-sm-6 col-md-3 mb-4 column">
        <img
        class="img-fluid hover-shadow cursor"
        src="public/carPictures/<?php echo $picture->getPictureName(); ?>"
        alt="<?php echo $picture->getPictureDescription(); ?>"
        onclick="openModal();currentSlide(<?php echo $i; ?>)"
        style="width:100%">
      </div>

      <?php
      $i++;
    }
    ?>

      <button class="btn btn-primary col-10 offset-1 col-sm-2 offset-sm-9" onclick="buyNow();">Buy now !</button>

    </div>
<?php } else { ?>
  <button class="btn btn-primary col-10 offset-1 col-sm-2 offset-sm-9 " onclick="buyNow();">Buy now !</button>
<?php } ?>
</div>

<script src="assets/js/productDetails.js" async defer></script>
