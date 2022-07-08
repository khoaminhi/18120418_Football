<?php
session_start();
require_once "./../config/dbconnect.php";
require_once "./../controller/loginlogout.php";
require_once "./../model/loginlogout.php";

$cssRePath = "../";
$CSS_PATH = "../template/index/indexCSS.php";
$HEADER_PATH = "../public/html/header.phtml";
$CONTENT_PATH = "../view/login.phtml";
$FOOTER_PATH = "../public/html/footer.phtml";

require_once("../template/template.phtml");

$loginout = new LoginLogoutController();

$action = "";
if (isset($_REQUEST["action"]))
{    
    $action = $_REQUEST["action"];
}
 
switch ($action)
{
    case "login":
        $loginout->login();
        break;
    case "logout":
        $loginout->logout();
        break;
}
?>