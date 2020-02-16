<?php

//Handle the model update
if(isset($_POST['modelNameInput']) && isset($_POST['modelDescriptionInput']) && isset($_POST['modelHorsePowerInput'])){

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
  $modelManager->updateModelById($updatedModel);

  //Redirect the user
  header("location:./index.php?page=4&option=1");
  exit;
}


//If a special action to a special model has been asked
if(isset($_GET['action']) && isset($_GET['id'])){

  //Update
  if($_GET['action'] == 1) {

    $model = $modelManager->getModelById($_GET['id']);
    ?>

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
        <label for="modelHorsePowerInput">Model description</label>
        <input
        type="number" class="form-control" id="modelHorsePowerInput" name="modelHorsePowerInput"
        placeholder="Please enter the horse power of this model" min="1" max="2500"
        value="<?php echo $model->getModelHorsePower(); ?>"
        required >
      </div>

      <button type="submit" class="btn btn-primary col-sm-2 offset-sm-10">VALIDATE</button>
    </form>

    <?php

  }

  //Delete
  elseif($_GET['action'] == 2) {
    //Call manager to delete model in the database
    $modelManager->deleteModelById($_GET['id']);

    //Redirect the user
    header("location:./index.php?page=4&option=1");
    exit;
  }
}

//View
else {

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
              <a href="index.php?page=4&option=1&action=1&id=<?php echo $model->getModelId(); ?>">
                <img class="crudIcon" src="assets/icon/pencilIcon.png" alt="pencil icon">
              </a>
            </td>
            <td>
              <a href="index.php?page=4&option=1&action=2&id=<?php echo $model->getModelId(); ?>">
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
