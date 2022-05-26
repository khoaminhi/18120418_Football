<?php
require_once "./../config/dbconnect.php";
require_once "./../controller/playerController.php";
require_once "./../model/playerModel.php";
require_once "./../controller/loginlogout.php";

LoginLogoutController::checkSession("Location:loginout.php");
$player=new PlayerController();
$player->getAllPlayer();
?>