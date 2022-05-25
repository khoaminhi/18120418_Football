<?php
require_once "./../config/dbconnect.php";
require_once "./../controller/clubController.php";
require_once "./../model/clubModel.php";
$club=new ClubController();
$action="";
if (isset($_REQUEST["action"]))
{    
    $action = $_REQUEST["action"];
}

switch ($action) {
    case "add":
        $club->addClub();
        break;
    case "modify":
        $club->modifyClub();
        break;
}
?>