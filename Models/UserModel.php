<?php 

function getUsers($db){
    return $db->query("SELECT * FROM users");
}

function getUsersSafe($db){
    return $db->query("SELECT `name`, surname, email, phone, office, `description`, log_time FROM users");
}

function getUserByEmail($email, $db){
    $user = $db->query("SELECT * FROM users WHERE email = '$email'");
    return $user->fetch_assoc();
}

function getUserById($id, $db){
    $user = $db->query("SELECT * FROM users WHERE id = $id");
    return $user->fetch_assoc();
}

function addUser($name, $surname, $email, $password, $phone, $office, $description, $adminRights, $db){
    if($name != "" && $surname != "" && $email != "" && $password != ""){
         $query = $db->prepare(
            "INSERT 
             INTO users (`name`, surname, email, `password`, phone, office, `description`, admin_rights) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
            );
        $hashedPassword = hash("sha256", $password);
        $query->bind_param("ssssssss", $name, $surname, $email, $hashedPassword, $phone, $office, $description, $adminRights);
        $query->execute();
    }
}

function editUser($userId, $name, $surname, $email, $phone, $office, $description, $adminRights, $db){
    if($name != "" && $surname != "" && $email != ""){
        $query = $db->prepare(
            "UPDATE users 
             SET `name` = ?, surname = ?, email = ?, phone = ?, office = ?, `description` = ?, admin_rights = ?
             WHERE id = ?"
            );
        $query->bind_param("sssssssi", $name, $surname, $email, $phone, $office, $description, $adminRights, $userId);
        $query->execute();

        if($userId == $_SESSION["loggedUserId"]){
            $_SESSION["adminStatus"] = $adminRights;
        }
    }
}

function deleteUser($userId, $db){
    return $db->query("DELETE FROM users WHERE id=$userId");
}


function userExists($email, $password, $db)
{
    $hashedPassword = hash("sha256", $password);
    $query = $db->prepare("SELECT id FROM users WHERE email = ? AND password = ?");
    $query->bind_param("ss", $email, $hashedPassword);
    $query->execute();
    $result = $query->get_result();
    return $result->num_rows != 0;
}


function updateLoginTime($email, $db)
{
    $logTime = date("Y-m-d H:i:s");
    $db->query("UPDATE users SET log_time = '$logTime' WHERE email = '$email'");
}

function getAdminStatus($id, $db)
{
    $user = $db->query("SELECT admin_rights FROM users WHERE id = '$id'");
    $userData = $user->fetch_assoc();
    return $userData["admin_rights"];
}
?>