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
            $listPlayer = PlayerModel::searchPlayer($keySearch);
            if($listPlayer == -1){
                echo "Please enter a key search. Don't leave it blank. Controller!";
                return;
            }
            if($listPlayer == null){
                echo "No result found.";
                return;
            }
            include "./../view/viewSearchResult.phtml";
            return;
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
        include "./../view/viewSearchResult.phtml";
    }
    
    public function addPlayer(){
        $playerName="";
        $playerPosition="";
        $playerNumber="";
        $playerNationality="";
        $playerDOB ="";
        $playerClubID="";

        if(isset($_POST["playerName"]) and $_POST["playerName"] != ""){
            $playerName = $_POST["playerName"];
        }
        if(isset($_POST["playerPosition"]) and $_POST["playerPosition"] != ""){
            $playerPosition = $_POST["playerPosition"];
        }
        if(isset($_POST["playerNumber"]) and $_POST["playerNumber"] != ""){
            $playerNumber = $_POST["playerNumber"];
        }
        if(isset($_POST["playerNationality"]) and $_POST["playerNationality"] != ""){
            $playerNationality = $_POST["playerNationality"];
        }
        if(isset($_POST["playerClubID"]) and $_POST["playerClubID"] != ""){
            $playerClubID = $_POST["playerClubID"];
        }
        if(isset($_POST["playerDOB"]) and $_POST["playerDOB"] != ""){
            $playerDOB = $_POST["playerDOB"];
        }

        $result=true;
        $result = PlayerModel::createPlayer($playerName, $playerPosition, $playerNumber, 
            $playerNationality, $playerClubID, $playerDOB);
        if($result==true){
            echo "<script>alert('Add player successfully!');</script>";
        }
        else{
            echo "<script>alert('Add player failed!');</script>";
        }
        require_once "./../model/clubModel.php";
        $this->getAllClub();
    }

    public function getAllClub(){
        require_once "./../model/clubModel.php";
        $clubs = ClubModel::getAllClub();
        $cssRePath = "./../";
        $CSS_PATH = "./../template/index/indexCSS.php";
        $HEADER_PATH = "./../public/html/header.phtml";
        $FOOTER_PATH = "./../public/html/footer.phtml";

        $CONTENT_PATH = "./../view/addPlayer.phtml";
        require_once("./../template/template.phtml");
    }

    public function modifyPlayer(){
        $playerID = "";
        $playerName="";
        $playerPosition="";
        $playerNumber="";
        $playerNationality="";
        $playerDOB ="";
        $playerClubID="";

        if(isset($_POST["playerID"]) and $_POST["playerID"] != ""){
            $playerID = $_POST["playerID"];
        }
        if(isset($_POST["playerName"]) and $_POST["playerName"] != ""){
            $playerName = $_POST["playerName"];
        }
        if(isset($_POST["playerPosition"]) and $_POST["playerPosition"] != ""){
            $playerPosition = $_POST["playerPosition"];
        }
        if(isset($_POST["playerNumber"]) and $_POST["playerNumber"] != ""){
            $playerNumber = $_POST["playerNumber"];
        }
        if(isset($_POST["playerNationality"]) and $_POST["playerNationality"] != ""){
            $playerNationality = $_POST["playerNationality"];
        }
        if(isset($_POST["playerClubID"]) and $_POST["playerClubID"] != ""){
            $playerClubID = $_POST["playerClubID"];
        }
        if(isset($_POST["playerDOB"]) and $_POST["playerDOB"] != ""){
            $playerDOB = $_POST["playerDOB"];
        }

        $result=true;
        $result = PlayerModel::updatePlayer($playerID, $playerName, $playerPosition, $playerNumber, 
            $playerNationality, $playerClubID, $playerDOB);
        if($result==true){
            echo "<script>alert('Modify player successfully!');</script>";
        }
        else{
            echo "<script>alert('Modify player failed!');</script>";
        }
    }

    public function viewModifyPlayer(){
        require_once "./../model/clubModel.php";
        $clubs = ClubModel::getAllClub();
        $cssRePath = "./../";
        $CSS_PATH = "./../template/index/indexCSS.php";
        $HEADER_PATH = "./../public/html/header.phtml";
        $FOOTER_PATH = "./../public/html/footer.phtml";

        $CONTENT_PATH = "./../view/modifyPlayer.phtml";
        require_once("./../template/template.phtml");
    }

    public function deletePlayer(){
        $playerID = "";
        if(isset($_POST["playerID"]) and $_POST["playerID"] != ""){
            $playerID = $_POST["playerID"];
        }
        $result=true;
        $result = PlayerModel::deletePlayer($playerID);
        if($result==true){
            echo "<script>alert('Delete player successfully!');</script>";
        }
        else{
            echo "<script>alert('Delete player failed!');</script>";
        }
    }
} 