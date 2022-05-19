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
                $listAllClub[] = $club; //add an item into array
            }
        }
        dbconnect::disconnect();
        return $listAllClub;
    }
}