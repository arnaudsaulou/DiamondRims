<?php
session_start();

require("include/CONFIG.inc.php");
require("include/autoLoad.inc.php");

$db = new MyPDO();
$brandManager = new BrandManager($db);
$modelManager = new ModelManager($db);
$pictureManager = new PictureManager($db);
$carManager = new CarManager($db);
$userManager = new UserManager($db);

require_once("include/header.inc.php");
require_once("include/text.inc.php");
require_once("include/footer.inc.php");
?>
