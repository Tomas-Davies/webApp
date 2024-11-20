<?php 

$urlPrefix = "http";

if(!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on"){
    $urlPrefix = "https";
}
$host = $_SERVER["HTTP_HOST"];
$url = "$urlPrefix://$host";

session_start();
$authorized = $_SESSION["auth"] ?? null;

function connectToDatabase(){
    $db_host = "db";
    $db_user = "root";
    $db_password = "toor";
    $db_db = "db";
    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_db);

    return $mysqli;
}

function processURL(){
    $URL = explode("/", $_GET["url"] ?? "");
    $controller = $URL[0] ?? null;
    $method = $URL[1] ?? null;
    $paramsCount = count($URL);

    $params = [];
    for($i = 2; $i < $paramsCount; $i++){
        $params[] = $URL[$i] ?? null;
    }

    return ["controller" => $controller, "method" => $method, "params" => $params];
}

$mysqli = connectToDatabase();
$_SESSION["db"] = $mysqli;

if($mysqli->connect_error){
    echo "Error: $mysqli->connect_error";
    exit();
}

if($authorized){
    $router = processURL();
} else {
    $router = ["controller" => "login", "method" => null, "params" => null];
}

if($router["controller"]){
    include "Controllers/$router[controller].php";    
} else {
    include "error.php";
}


$mysqli->close();
?>