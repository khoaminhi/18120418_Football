<?php
require_once "./../config/dbconnect.php";
require_once "./../controller/clubController.php";
require_once "./../model/clubModel.php";
$player=new ClubController();
$player->getAllClub();
?>