<?php
require_once "./config/dbconnect.php";
require_once "./controller/loginlogout.php";
require_once "./controller/playerController.php";

LoginLogoutController::checkSession();

$cssRePath = "";
$CSS_PATH = "template/index/indexCSS.php";
$HEADER_PATH = "public/html/header.phtml";
$CONTENT_PATH = "./template/testFooterWithContent.phtml";
$FOOTER_PATH = "public/html/footer.phtml";

require_once("./template/template.phtml");
?>