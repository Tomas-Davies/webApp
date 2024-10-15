<?php 
    session_start();
    session_destroy();
    $uriPrefix = "http://";
    if(!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on"){
        $uriPrefix = "https://";
      }
      $uri = $uriPrefix . $_SERVER["HTTP_HOST"];
    header("Location: $uri");
    exit();
?>