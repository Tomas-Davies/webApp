<?php 

function getLastLogins($db){
    return $db->query("SELECT * FROM users ORDER BY log_time DESC LIMIT 10");
}
?>