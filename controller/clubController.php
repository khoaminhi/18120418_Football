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
}