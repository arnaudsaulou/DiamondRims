<?php

//Handle the model update
if(isset($_POST['modelNameInput']) && isset($_POST['modelDescriptionInput']) &&
isset($_POST['modelHorsePowerInput']) && isset($_GET['action'])){

  if($_GET['action'] == 0) {

    //Create Model object with POST values
    $newModel= new Model(
      array(
        "MODEL_NAME"=>$_POST['modelNameInput'],
        "MODEL_HORSE_POWER"=>$_POST['modelHorsePowerInput'],
        "MODEL_DESCRIPTION"=>$_POST['modelDescriptionInput'],
        "BRAND_ID" => $_GET['brand']
      )
    );

    //Call manager to create new brand in the database
    $modelManager->addModel($newModel);

  } elseif ($_GET['action'] == 1) {
    //Create Model object with POST values
    $updatedModel= new Model(
      array(
        "MODEL_ID"=>$_GET['id'],
        "MODEL_NAME"=>$_POST['modelNameInput'],
        "MODEL_HORSE_POWER"=>$_POST['modelHorsePowerInput'],
        "MODEL_DESCRIPTION"=>$_POST['modelDescriptionInput']
      )
    );

    //Call manager to update model in the database
    $modelManager->updateModel($updatedModel);
  }

  //Redirect the user
  //exit(header("Location:./index.php?page=4&option=1&brand=",$_GET['brand']));
  ?><script> window.location.href="./index.php?page=4&option=1";  </script><?php

}


//If a special action to a special model has been asked
if(isset($_GET['action'])){

  $brandName = $brandManager->getBrandById($_GET['brand'])->getBrandName();

  //Add
  if($_GET['action'] == 0) {

    ?>

    <h3 class="col-12 mb-4 mt-4">Add a new <?php echo $brandName; ?> model</h3>

    <!--  Display add model form -->
    <form class="col-md-12" action="index.php?page=4&option=1&action=0&brand=<?php echo $_GET['brand']; ?>" method="post">
      <div class="form-group">
        <label for="modelNameInput">Model name</label>
        <input
        type="text" class="form-control" id="modelNameInput" name="modelNameInput"
        placeholder="Please enter a name for this model" required >
      </div>

      <div class="form-group">
        <label for="modelDescriptionInput">Model description</label>
        <textarea
        class="form-control" id="modelDescriptionInput" rows="3" name="modelDescriptionInput"
        placeholder="Please enter a description for this model" required></textarea>
      </div>

      <div class="form-group">
        <label for="modelHorsePowerInput">Model horse power</label>
        <input
        type="number" class="form-control" id="modelHorsePowerInput" name="modelHorsePowerInput"
        placeholder="Please enter the horse power of this model" min="1" max="2500"
        required >
      </div>

      <button type="submit" class="btn btn-primary col-sm-2 offset-sm-10">VALIDATE</button>
    </form>


    <?php
    //Update
  } elseif($_GET['action'] == 1 && isset($_GET['id'])) {

    $model = $modelManager->getModelById($_GET['id']);
    ?>

    <h3 class="col-12 mb-4 mt-4">Update a <?php echo $brandName; ?> model</h3>

    <!--  Display update model form -->
    <form class="col-md-12" action="index.php?page=4&option=1&action=1&id=<?php echo $_GET['id'] ?>" method="post">
      <div class="form-group">
        <label for="modelNameInput">Model name</label>
        <input
        type="text" class="form-control" id="modelNameInput" name="modelNameInput"
        placeholder="Please enter a name for this model" value="<?php echo $model->getModelName(); ?>"
        required >
      </div>

      <div class="form-group">
        <label for="modelDescriptionInput">Model description</label>
        <textarea
        class="form-control" id="modelDescriptionInput" rows="3" name="modelDescriptionInput"
        placeholder="Please enter a description for this model"
        required><?php echo $model->getModelDescription(); ?></textarea>
      </div>

      <div class="form-group">
        <label for="modelHorsePowerInput">Model horse power</label>
        <input
        type="number" class="form-control" id="modelHorsePowerInput" name="modelHorsePowerInput"
        placeholder="Please enter the horse power of this model" min="1" max="2500"
        value="<?php echo $model->getModelHorsePower(); ?>"
        required >
      </div>

      <button type="submit" class="btn btn-primary col-sm-2 offset-sm-10">VALIDATE</button>
    </form>

    <?php
    //Delete
  }elseif($_GET['action'] == 2 && isset($_GET['id'])) {
    //Call manager to delete model in the database
    $modelManager->deleteModelById($_GET['id']);

    //Redirect the user
    ?><script> window.location.href="./index.php?page=4&option=1";  </script><?php

  }

  //View
} else {

  //If a brand has been specified
  if(isset($_GET['brand'])){
    ?>
    <!-- Display the brands list -->
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Power</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>


        <?php
        $modelList = $modelManager->getAllModelsByBrand($_GET['brand']);

        foreach ($modelList as $model) {
          ?>
          <tr>
            <th scope="row"><?php echo $model->getModelName(); ?></th>
            <td><?php echo $model->getModelDescription(); ?></td>
            <td><?php echo $model->getModelHorsePower(); ?>bhp</td>
            <td>
              <a href="index.php?page=4&option=1&action=1&brand=<?php echo $model->getBrandId(); ?>&id=<?php echo $model->getModelId(); ?>">
                <img class="crudIcon" src="assets/icon/pencilIcon.png" alt="pencil icon">
              </a>
            </td>
            <td>
              <a href="index.php?page=4&option=1&action=2&brand=<?php echo $model->getBrandId(); ?>&id=<?php echo $model->getModelId(); ?>">
                <img class="crudIcon" src="assets/icon/binIcon.png" alt="bin icon">
              </a>
            </td>
          </tr>
          <?php
        }

        ?>

      </tbody>

    </table>

    <?php

    //List brands available
  } else {
    ?>

    <div class="row">

      <?php
      $brandList = $brandManager->getAllBrands();

      foreach ($brandList as $brand) {
        ?>
        <a href="index.php?page=4&option=1&brand=<?php echo $brand->getBrandId(); ?>" class="m-1">
          <button type="button" class="btn btn-dark">
            <?php echo $brand->getBrandName(); ?>
          </button>
        </a>

        <?php
      }
      ?>

    </div>

    <?php
  }

}
