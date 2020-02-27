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

<div class="container bg-faded p-2">
  <h2 class="text-left pt-4 pb-4 pl-2"><?php echo $brand->getBrandName(), " - ", $model->getModelName(); ?></h2>
  <div class="row">
    <div class="col-md-8">
      <img class="img-fluid" src="public/carPictures/<?php echo $mainPicture->getPictureName(); ?> " alt="<?php echo $mainPicture->getPictureDescription(); ?>">
    </div>
    <div class="col-md-4">
      <h5 class="text-center my-3">Car Description</h5>
      <p><?php echo $car->getCarDescription(); ?></p>
    </div>

  </div>

  <div class="row">
    <h5 class="text-center my-3">Car Details</h5>
    <ul class="list-unstyled">
      <li><p class="col-4 p-0">Color</p><p class="col-4 offset-1"><?php echo $car->getCarColor(); ?></p></li>
      <li><p class="col-4 p-0">Motor</p><p class="col-4 offset-1"><?php echo $model->getModelHorsePower(); ?></p></li>
      <li><p class="col-4 p-0">Milage</p><p class="col-4 offset-1"><?php echo $car->getCarMilage(); ?></p></li>
      <li><p class="col-4 p-0">Price</p><p class="col-4 offset-1"><?php echo $car->getCarPrice(); ?></p></li>
    </ul>
  </div>

  <?php if(count($sidePictures) > 0) { ?>

    <h3 class="my-4">Other pictures</h3>
    <div class="row" style="background-color: rgba(255,255,255,0.85);">

      <?php foreach ($sidePictures as $picture) { ?>

        <div class="col-sm-6 col-md-3 mb-4">
          <img class="img-fluid" src="public/carPictures/<?php echo $picture->getPictureName(); ?> " alt="<?php echo $picture->getPictureDescription(); ?>">
        </div>

      <?php } ?>

      <button class="btn btn-primary col-10 offset-1 col-sm-2 offset-sm-9 ">Buy now !</button>

    </div>
  <?php } else { ?>
    <button class="btn btn-primary col-10 offset-1 col-sm-2 offset-sm-9 ">Buy now !</button>
  <?php } ?>
</div>
