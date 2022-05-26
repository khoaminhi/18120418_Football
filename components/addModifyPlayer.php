<?php
require_once "./../config/dbconnect.php";
require_once "./../controller/playerController.php";
require_once "./../model/playerModel.php";
require_once "./../controller/loginlogout.php";

LoginLogoutController::checkSession("Location:loginout.php");

$player=new PlayerController();
$action="";
if (isset($_REQUEST["action"]))
{    
    $action = $_REQUEST["action"];
}

switch ($action) {
    case "add":
        $player->addPlayer();
        break;
    case "modify":
        $player->modifyPlayer();
        break;
    case "viewModify":
        $player->viewModifyPlayer();
        break;
    case "delete":
        $player->deletePlayer();
        break;
    default:
        $player->getAllClub();
        break;
}
?>