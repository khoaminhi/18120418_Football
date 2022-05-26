<?php
require_once "./../config/dbconnect.php";
require_once "./../controller/clubController.php";
require_once "./../model/clubModel.php";
require_once "./../controller/loginlogout.php";

LoginLogoutController::checkSession("Location:loginout.php");
$club=new ClubController();
$club->getAllClub();
?>