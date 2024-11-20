<?php
require("Models/UserModel.php");
$mysqli = $_SESSION["db"];

function rememberUserIdAndStatus($email, $db){
    $user = getUserByEmail($email, $db);
    $_SESSION["loggedUserId"] = $user["id"];
}


$_SESSION["invalidLoginMessage"] = "&nbsp";
if (isset($_POST["email"]) && isset($_POST["password"])) {
    if(userExists($_POST["email"], $_POST["password"], $mysqli)){
        rememberUserIdAndStatus($_POST["email"], $mysqli);
        updateLoginTime($_POST["email"], $mysqli);
        $id = $_SESSION["loggedUserId"];
        $_SESSION["adminStatus"] = getAdminStatus($id, $mysqli);
        $_SESSION["auth"] = true;
        header("Location: $GLOBALS[url]/dashboard/show");
        exit();
    } else {
        $_SESSION["invalidLoginMessage"] = "Invalid email or password.";
    }
}

include "Views/$router[controller]/show.php";
