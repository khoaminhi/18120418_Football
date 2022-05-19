<?php
require_once "./../config/dbconnect.php";
require_once "./../controller/playerController.php";
require_once "./../model/playerModel.php";
$player=new PlayerController();
$player->getAllPlayer();
?>