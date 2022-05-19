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
        else
            $result = PlayerModel::searchPlayer($keySearch);
            return $result;
    }
} 