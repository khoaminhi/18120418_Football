<?php
//session_start();
class LoginLogoutModel{
    public static function login($username, $password){
        dbconnect::connect();
        $result = false;
        $query = "SELECT * FROM user WHERE name = '$username' AND password = '$password'";
        $result = dbconnect::$conn->query($query);
        if($result->num_rows <= 0){
            $result = false;
        }
        else{
            $row = $result->fetch_assoc();
            $_SESSION["userid"] = $row["userid"];
            $result = true;
        }
        dbconnect::disconnect();
        return $result;
    }
}
?>