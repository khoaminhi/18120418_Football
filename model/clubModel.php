<?php
class ClubModel{
    public $ClubID;
    public $ClubName;
    public $Shortname;
    public $StadiumID;
    public $CoachID;

    function __constructor(){
        $this->ClubID = "";
        $this->ClubName="";
        $this->Shortname="";
        $this->StadiumID="";
        $this->CoachID="";
    }

    public static function getAllClub(){
        dbconnect::connect();
        $query = "SELECT * FROM club";
        $result = dbconnect::$conn->query($query);
        $listAllClub = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $club = new ClubModel();
                $club->ClubID = $row['ClubID'];
                $club->ClubName = $row["ClubName"];
                $club->Shortname = $row["Shortname"];
                $club->StadiumID = $row["StadiumID"];
                $club->CoachID = $row["CoachID"];
                $listAllClub[] = $club; //add an item into array
            }
        }
        dbconnect::disconnect();
        return $listAllClub;
    }

    public static function createClub($clubName, $clubShortName, $clubStadiumID, $clubCoachID){
        dbconnect::connect();
        //check stadium id if exist
        $query = "SELECT StadiumID FROM stadium WHERE StadiumID = '$clubStadiumID'";
        $result = dbconnect::$conn->query($query);
        if($result == false){
            echo "Stadium ID does not exist!";
            return false;
        }
        if (mysqli_num_rows($result) <= 0) {
            echo "Stadium ID does not exist";
            return;
        }

        //check coach id if exist
        $query = "SELECT CoachID FROM coach WHERE CoachID = '$clubCoachID'";
        $result = dbconnect::$conn->query($query);
        if (mysqli_num_rows($result) <= 0) {
            echo "Coach ID does not exist";
            return;
        }

        //create new club id by geting max club id
        $getMaxIDClubQuery = "SELECT MAX(ClubID) as maxID FROM club";
        $result = dbconnect::$conn->query($getMaxIDClubQuery);
        $row = $result->fetch_assoc();
        $maxID = $row["maxID"];
        $maxID++;

        $query = "INSERT INTO club (ClubID, ClubName, Shortname, StadiumID, CoachID) 
            VALUES ('$maxID', '$clubName', '$clubShortName', '$clubStadiumID', '$clubCoachID')";
        $result = dbconnect::$conn->query($query);
        dbconnect::disconnect();
        return $result;
    }

    public static function modifyClub($clubID, $clubName, $clubShortName, $clubStadiumID, $clubCoachID){
        dbconnect::connect();
        //check stadium id if exist
        $query = "SELECT StadiumID FROM stadium WHERE StadiumID = '$clubStadiumID'";
        $result = dbconnect::$conn->query($query);
        if (mysqli_num_rows($result) <= 0) {
            echo "Stadium ID does not exist";
            return;
        }

        //check coach id if exist
        $query = "SELECT CoachID FROM coach WHERE CoachID = '$clubCoachID'";
        $result = dbconnect::$conn->query($query);
        if (mysqli_num_rows($result) <= 0) {
            echo "Coach ID does not exist";
            return;
        }

        //check club id if exist
        $query = "SELECT ClubID FROM club WHERE ClubID = '$clubID'";
        $result = dbconnect::$conn->query($query);
        if (mysqli_num_rows($result) <= 0) {
            echo "Club ID does not exist";
            return;
        }

        $query = "UPDATE club SET ClubName = '$clubName', Shortname = '$clubShortName', StadiumID = '$clubStadiumID', 
            CoachID = '$clubCoachID' WHERE ClubID = '$clubID'";
        $result = dbconnect::$conn->query($query);
        dbconnect::disconnect();
        return $result;
    }
}