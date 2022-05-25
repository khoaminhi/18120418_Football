<?php
class ClubController{
    private $cssRePath = "./../";
    private $CSS_PATH = "./../template/index/indexCSS.php";
    private $HEADER_PATH = "./../public/html/header.phtml";
    private $FOOTER_PATH = "./../public/html/footer.phtml";

    public function getAllClub(){
        $listAllClub = ClubModel::getAllClub();
        $cssRePath = $this->cssRePath;
        $CSS_PATH = $this->CSS_PATH;
        $HEADER_PATH = $this->HEADER_PATH;
        $FOOTER_PATH = $this->FOOTER_PATH;
        
        $CONTENT_PATH = "./../view/getListClub.phtml";
        require_once("./../template/template.phtml");
    }

    public function addClub(){
        $clubName = "";
        $clubShortName="";
        $clubStadiumID="";
        $clubCoachID="";

        if(isset($_POST["clubName"]) and $_POST["clubName"] != ""){
            $clubName = urldecode($_POST["clubName"]);
        }
        if(isset($_POST["clubShortName"]) and $_POST["clubShortName"] != ""){
            $clubShortName = urldecode($_POST["clubShortName"]);
        }
        if(isset($_POST["clubStadiumID"]) and $_POST["clubStadiumID"] != ""){
            $clubStadiumID = urldecode($_POST["clubStadiumID"]);
        }
        if(isset($_POST["clubCoachID"]) and $_POST["clubCoachID"] != ""){
            $clubCoachID = URLDECODE($_POST["clubCoachID"]);
        }

        $result=true;
        $result = ClubModel::createClub($clubName, $clubShortName, 
            $clubStadiumID, $clubCoachID);
        if($result==true){
            echo "<script>alert('Add club successfully!'); window.location.href='getAllClub.php'</script>";
        }
        else{
            echo "<script>alert('Add club failed!');window.location.href='getAllClub.php'</script>";
        }
    }

    public function modifyClub(){
        $clubID = "";
        $clubName="";
        $clubShortName="";
        $clubStadiumID="";
        $clubCoachID="";

        if(isset($_POST["clubID"]) and $_POST["clubID"] != ""){
            $clubID = urldecode($_POST["clubID"]);
        }
        if(isset($_POST["clubName"]) and $_POST["clubName"] != ""){
            $clubName = urldecode($_POST["clubName"]);
        }
        if(isset($_POST["clubShortName"]) and $_POST["clubShortName"] != ""){
            $clubShortName = urldecode($_POST["clubShortName"]);
        }
        if(isset($_POST["clubStadiumID"]) and $_POST["clubStadiumID"] != ""){
            $clubStadiumID = urldecode($_POST["clubStadiumID"]);
        }
        if(isset($_POST["clubCoachID"]) and $_POST["clubCoachID"] != ""){
            $clubCoachID = urldecode($_POST["clubCoachID"]);
        }

        $result=true;
        $result = ClubModel::modifyClub($clubID, $clubName, $clubShortName, 
            $clubStadiumID, $clubCoachID);
        if($result==true){
            echo "<script>alert('Modify club successfully!');</script>";
        }
        else{
            echo "<script>alert('Modify club failed!');</script>";
        }
    }
}