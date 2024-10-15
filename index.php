<?php 
    session_start();
    if(isset($_POST["name"]) && isset($_POST["password"])){
        $_SESSION["userLoggedIn"] = true;
        $_SESSION["name"] = $_POST["name"];
        $_SESSION["password"] = $_POST["password"];
    } else if(!isset($_SESSION["userLoggedIn"])){
        $_SESSION["userLoggedIn"] = false;
    }

    if($_SESSION["userLoggedIn"]){
        $page = $_GET["pozadavek"] ?? "Dashboard";

        if ($page == "Logout") {
            $uri = "http://";
            if(!empty($_SERVER["HTTPS"]) && ($_SERVER["HTTPS"] == "on")){
                $uri = "https://";
            }
            session_destroy();
            header("Location: $uri".$_SERVER["HTTP_HOST"]);
            exit();
        }
        include "top-wrapper.php";
        if ($page == "Dashboard") {
            include "dashboard.php";
        } elseif ($page == "Users") {
            include "users.php";
        } elseif ($page == "Items") {
            include "items.php";
        } elseif ($page == "Others") {
            include "others.php";
        } else {
            include "error.php";
        }
        include "bottom-wrapper.php";
    } else {
        include "login.php";
    }
?>