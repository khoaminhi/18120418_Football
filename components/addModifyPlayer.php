<?php
require_once "./../config/dbconnect.php";
require_once "./../controller/playerController.php";
require_once "./../model/playerModel.php";
$player=new PlayerController();
$action="";
if (isset($_REQUEST["action"]))
{    
    $action = $_REQUEST["action"];
}

switch ($action) {
    case "create":
        $player->getAllPlayer();
        break;
    case "update":
        $player->getAllPlayerClub();
        break;
}
?>