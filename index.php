<?php
require_once "./config/dbconnect.php";
$cssRePath = "";
$CSS_PATH = "template/index/indexCSS.php";
$HEADER_PATH = "public/html/header.phtml";
$CONTENT_PATH = "template/testFooterWithContent.phtml";
$FOOTER_PATH = "public/html/footer.phtml";

require_once("./template/template.phtml");

$action = "";
if (isset($_REQUEST["action"]))
{    
    $action = $_REQUEST["action"];
}
 
switch ($action)
{
    case "list":      
        $controller = new SinhVienController();
        $controller->listAll();
        break;
}
?>