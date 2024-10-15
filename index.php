<?php 
    session_start();
    if(isset($_POST["name"]) && isset($_POST["password"])){
        $_SESSION["userLoggedIn"] = true;
        $_SESSION["name"] = $_POST["name"];
        $_SESSION["password"] = $_POST["password"];
    } else{
        $_SESSION["userLoggedIn"] = false;
    }

    if($_SESSION["userLoggedIn"]){
        $uriPrefix = "http://";
        if(!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on"){
            $uriPrefix = "https://";
        }
        $uri = $uriPrefix . $_SERVER["HTTP_HOST"];
        header("Location: $uri/Administration.php?page=Dashboard");
    } else {
        include "login.php";
    }
?>