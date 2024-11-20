<?php
if (!$authorized) die();
require("Models/UserModel.php");
$mysqli = $_SESSION["db"];



// SHOW
if ($router["method"] == "show") {
    $loggedUserId = $_SESSION["loggedUserId"];
    $users = getUsers($mysqli);
    include "top-wrapper.php";
    include "Views/$router[controller]/$router[method].php";
    include "bottom-wrapper.php";
}

// ADD
elseif ($router["method"] == "add") {
    if (isset($_POST["userId"])) {
        $adminRights = isset($_POST['isAdmin']) ? 1 : 0;
        addUser(
            $_POST["name"],
            $_POST["surname"],
            $_POST["email"],
            $_POST["password"],
            $_POST["phone"],
            $_POST["office"],
            $_POST["description"],
            $adminRights,
            $mysqli
        );
        header("Location: $GLOBALS[url]/users/show");
        exit();
    }

    include "top-wrapper.php";
    include "Views/$router[controller]/$router[method].php";
    include "bottom-wrapper.php";
}

// DELETE
elseif ($router["method"] == "delete") {
    $userId = $router["params"][0];
    $user = deleteUser($userId, $mysqli);
    http_response_code(200);
    exit();
}

// EDIT
elseif ($router["method"] == "edit" && $router["params"][0]) {
    if (isset($_POST["userId"])) {
        $adminRights = isset($_POST['isAdmin']) ? 1 : 0;
        editUser(
            $_POST["userId"],
            $_POST["name"],
            $_POST["surname"],
            $_POST["email"],
            $_POST["phone"],
            $_POST["office"],
            $_POST["description"],
            $adminRights,
            $mysqli
        );
        header("Location: $GLOBALS[url]/users/show");
        exit();
    } else {
        $id = $router["params"][0];
        $user = getUserById($id, $mysqli);
        if ($user) {
            $adminStatus = $_SESSION["adminStatus"] ?? 0;
            include "top-wrapper.php";
            include "Views/$router[controller]/$router[method].php";
            include "bottom-wrapper.php";
        } else {
            include "error.php";
        }
    }
// GET JSON USERS
} elseif ($router["method"] == "get") {
    header("Access-Control-Allow-Origin: http://localhost:3000");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Headers: Content-Type");
    header('Content-Type: application/json');

    $users = getUsersSafe($mysqli);
    echo json_encode($users->fetch_all());
    http_response_code(200);
}
// INVALID METHOD
else {
    echo "neplatná akce";
}