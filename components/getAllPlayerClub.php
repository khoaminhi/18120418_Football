<?php
require_once "./../config/dbconnect.php";
require_once "./../controller/playerController.php";
require_once "./../model/playerModel.php";
$player=new PlayerController();
$action="";
$clubID="";
$keySearch="";
if (isset($_REQUEST["action"]))
{    
    $action = $_REQUEST["action"];
}
if(isset($_GET["keySearch"])){
    $keySearch=$_GET["keySearch"];
}
if (isset($_GET["clubID"])) {
    $clubID = $_GET["clubID"];
}

function searchPlayer($player, $keySearch){
    $listPlayer = $player->searchPlayer($keySearch);
    if($listPlayer == -1){
        echo "Please enter a key search. Don't leave it blank. Controller!";
        return;
    }
    
    $result = "<table>
        <tr>
            <th>Full Name</th>
            <th>Position</th>
            <th>Number</th>
            <th>Nationality</th>
            <th>Club</th>
        </tr>";
    foreach($listPlayer as $p){
        $result = $result . "<tr>
        <td>
            $p->FullName
        </td>
        <td>
            $p->Position
        </td>
        <td>
            $p->Number
        </td>
        <td>
            $p->Nationality
        </td>
        <td>
            $p->ClubName
        </td>
        </tr>";
    }
    $result .= "</table>";
    echo $result;
}

switch ($action) {
    case "getAllPlayer":
        $player->getAllPlayer();
        break;
    case "getAllPlayerClub":
        $player->getAllPlayerClub();
        break;
    case "getAClubPlayer":
        $player->getAClubPlayer();
        break;
    case "searchPlayer":
        if($_REQUEST["keySearch"]=="")
            echo "Please enter a key search. Don't leave it blank.";
        else
            searchPlayer($player, $keySearch);
        break;
    default:
        $player->getAllPlayerClub();
        break;
}
?>