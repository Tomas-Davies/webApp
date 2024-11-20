<?php 
if(!$authorized) die();

session_destroy();
header("Location: $GLOBALS[url]");
?>