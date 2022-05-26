<?php
class LoginLogoutController
{
    public function viewHome()
    {
        $CONTENT_PATH = "./template.testFooterWithContent.phtml";
        require_once("./template/template.phtml");
    }

    public static function checkSession($pathRedirect="Location:components/loginout.php"){
        session_start();
        if(!isset($_SESSION["userid"])){
            header($pathRedirect);
        }
    }

    public function login()
    {
        $username = "";
        $password = "";
        if (isset($_POST["username"]) and $_POST["username"] != "")
        {
            $username = urldecode($_POST["username"]);
        }
        if (isset($_POST["password"]) and $_POST["password"] != "")
        {
            $password = urldecode($_POST["password"]);
        }
        $result = false;
        if($username == "" or $password == "")
        {
            echo "<script>alert('Please input username and password!');</script>";
        }

        $result = LoginLogoutModel::login($username, $password);
        if ($result == true)
        {
            echo "<script>window.location.href='/18120418_Football/index.php'</script>";
        }
        else
        {
            echo "<script>alert('Login failed!'); window.location.href='loginout.php'</script>";
        }
    }

    public function logout()
    {
        session_start();
        unset($_SESSION["userid"]);
        header("Location:loginout.php");
    }
}
?>