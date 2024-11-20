<?php 
if(!$authorized) die();

require("Models/DashboardModel.php");
$mysqli = $_SESSION["db"];

// SHOW
if($router["method"] == "show"){
    $users = getLastLogins($mysqli);
    include "top-wrapper.php";
    include "Views/$router[controller]/$router[method].php";
    include "bottom-wrapper.php";
}
else{
    echo "neplatná akce";
}
?>