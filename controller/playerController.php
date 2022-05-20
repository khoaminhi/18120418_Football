<?php
class PlayerController{
    private $cssRePath = "./../";
    private $CSS_PATH = "./../template/index/indexCSS.php";
    private $HEADER_PATH = "./../public/html/header.phtml";
    private $FOOTER_PATH = "./../public/html/footer.phtml";

    public function getAllPlayer(){
        $listAllPlayer = PlayerModel::getAllPlayer();
        $cssRePath = $this->cssRePath;
        $CSS_PATH = $this->CSS_PATH;
        $HEADER_PATH = $this->HEADER_PATH;
        $FOOTER_PATH = $this->FOOTER_PATH;
        
        $CONTENT_PATH = "./../view/getListPlayer.phtml";
        require_once("./../template/template.phtml");
    }

    public function getAllPlayerClub(){
        $listAllPlayer = PlayerModel::getAllPlayerClub();
        $cssRePath = $this->cssRePath;
        $CSS_PATH = $this->CSS_PATH;
        $HEADER_PATH = $this->HEADER_PATH;
        $FOOTER_PATH = $this->FOOTER_PATH;
        
        $CONTENT_PATH = "./../view/getListPlayerClub.phtml";
        require_once("./../template/template.phtml");
    }

    public function getAClubPlayer(){
        $clubID = $_GET["clubID"];
        $listAllPlayer = PlayerModel::getAClubPlayer($clubID);
        $cssRePath = $this->cssRePath;
        $CSS_PATH = $this->CSS_PATH;
        $HEADER_PATH = $this->HEADER_PATH;
        $FOOTER_PATH = $this->FOOTER_PATH;
        
        $CONTENT_PATH = "./../view/getListPlayerClub.phtml";
        require_once("./../template/template.phtml");
    }

    public function searchPlayer($keySearch){
        if(!isset($keySearch) or $keySearch == "")
            return -1;
        else{
            $result = PlayerModel::searchPlayer($keySearch);
            return $result;
        }
    }

    public function advancedSearch(){
        $playerName="";
        $playerPosition="";
        $playerNumber="";
        $playerNationality="";
        $playerClub="";

        if(isset($_GET["playerName"]) and $_GET["playerName"] != ""){
            $playerName = $_GET["playerName"];
        }
        if(isset($_GET["playerPosition"]) and $_GET["playerPosition"] != ""){
            $playerPosition = $_GET["playerPosition"];
        }
        if(isset($_GET["playerNumber"]) and $_GET["playerNumber"] != ""){
            $playerNumber = $_GET["playerNumber"];
        }
        if(isset($_GET["playerNationality"]) and $_GET["playerNationality"] != ""){
            $playerNationality = $_GET["playerNationality"];
        }
        if(isset($_GET["playerClub"]) and $_GET["playerClub"] != ""){
            $playerClub = $_GET["playerClub"];
        }

        $listPlayer = PlayerModel::advancedSearch($playerName, $playerPosition, $playerNumber, $playerNationality, $playerClub);
        if($listPlayer == -1){
            echo "Please enter a key search. Don't leave it blank. Controller!";
            return;
        }
        if($listPlayer == null){
            echo "No result found.";
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
} 