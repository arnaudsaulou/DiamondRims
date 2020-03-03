<?php

require('../../include/config.inc.php');
require('../../include/autoLoad.inc.php');

$db = new MyPDO;
$modelManager = new ModelManager($db);

$modelList = $modelManager->getAllModelsByBrand($_POST['brandId']);

$modelArray = array();

foreach ($modelList as $model) {
  $modelArray[] = array(
    'id' => $model->getModelId(),
    'name' => $model->getModelName()
  );
}

echo json_encode($modelArray);
?>
