<?php
class PlayerModel{
    public $PlayerID;
    public $FullName;
    public $ClubID;
    public $DOB;
    public $Position;
    public $Nationality;
    public $Number;

    function __constructor(){
        $this->PlayerID="";
        $this->FullName="";
        $this->ClubID="";
        $this->DOB="";
        $this->Position="";
        $this->Nationality="";
        $this->Number="";
    }

    public static function getAllPlayer(){
        dbconnect::connect();
        $query = "SELECT * FROM player";
        $result = dbconnect::$conn->query($query);
        $listAllPlayer = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $player = new PlayerModel();
                $player->FullName = $row["FullName"];
                $player->Position = $row["Position"];
                $player->Nationality=$row["Nationality"];
                $player->Number=$row["Number"];                 
                $listAllPlayer[] = $player; //add an item into array
            }
        }
        dbconnect::disconnect();
        return $listAllPlayer;
    }

    public static function getAllPlayerClub(){
        dbconnect::connect();
        $query = "SELECT FullName, Position, Nationality, Number, ClubName "
         ."FROM player left JOIN club ON player.ClubID = club.ClubID";
        $result = dbconnect::$conn->query($query);
        $listAllPlayer = array();

        if ($result) 
        {            
            foreach ($result as $row) {
                $player = new PlayerModel();
                $player->FullName = $row["FullName"];
                $player->Position = $row["Position"];
                $player->Nationality = $row["Nationality"];
                $player->Number=$row["Number"];
                $player->ClubName=$row["ClubName"];            
                $listAllPlayer[] = $player;
            }
        }
        dbconnect::disconnect();
        return $listAllPlayer;
    }

    public static function getAClubPlayer($clubID){
        dbconnect::connect();
        $query = "SELECT FullName, Position, Nationality, Number, ClubName "
         ."FROM player left JOIN club ON player.ClubID = club.ClubID "
         ."where player.ClubID=".$clubID;
        $result = dbconnect::$conn->query($query);
        $listAllPlayer = array();

        if ($result) 
        {            
            foreach ($result as $row) {
                $player = new PlayerModel();
                $player->FullName = $row["FullName"];
                $player->Position = $row["Position"];
                $player->Nationality = $row["Nationality"];
                $player->Number=$row["Number"];
                $player->ClubName=$row["ClubName"];            
                $listAllPlayer[] = $player;
            }
        }
        dbconnect::disconnect();
        return $listAllPlayer;
    }

    public static function searchPlayer($keySearch){
        dbconnect::connect();
        $query = "SELECT FullName, Position, Nationality, Number, ClubName "
         ."FROM player left JOIN club ON player.ClubID = club.ClubID "
         ."where player.FullName like '%$keySearch%' or player.Number like '%$keySearch%' "
         . "or player.Position like '%$keySearch%' or player.Nationality like '%$keySearch%' "
         . "or club.ClubName like '%$keySearch%'";
        $result = dbconnect::$conn->query($query);
        $listAllPlayer = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $player = new PlayerModel();
                $player->FullName = $row["FullName"];
                $player->Position = $row["Position"];
                $player->Nationality = $row["Nationality"];
                $player->Number=$row["Number"];
                $player->ClubName=$row["ClubName"];            
                $listAllPlayer[] = $player;
            }
        }
        dbconnect::disconnect();
        return $listAllPlayer;
    }

    public static function advancedSearch($playerName, $playerPosition, $playerNumber, $playerNationality, $playerClub){
        dbconnect::connect();
        $query = "SELECT FullName, Position, Nationality, Number, ClubName "
         ."FROM player left JOIN club ON player.ClubID = club.ClubID where ";
        $whereArray = array();
        $whereArrLen = 0;
        if($playerName != "")
            $whereArray[] = "player.FullName like '%$playerName%'";
        if($playerPosition != "")
            $whereArray[] = "player.Position like '%$playerPosition%' ";
        if($playerNumber != "")
            $whereArray[] = "player.Number like '%$playerNumber%' ";
        if($playerNationality != "")
            $whereArray[] = "player.Nationality like '%$playerNationality%' ";
        if($playerClub != "")
            $whereArray[] = "club.ClubName like '%$playerClub%'";
            
        $whereArrLen = count($whereArray);
        for($i = 0; $i < $whereArrLen; $i++){
            if($i == 0)
                $query .= $whereArray[$i];
            else
                $query .= " and ".$whereArray[$i];
        }
    
        $result = dbconnect::$conn->query($query);
        $listAllPlayer = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $player = new PlayerModel();
                $player->FullName = $row["FullName"];
                $player->Position = $row["Position"];
                $player->Nationality = $row["Nationality"];
                $player->Number=$row["Number"];
                $player->ClubName=$row["ClubName"];            
                $listAllPlayer[] = $player;
            }
        }
        dbconnect::disconnect();
        return $listAllPlayer;
    }

}
?>