<?php 
if(!$authorized) die();

if($router["method"] == "show"){
    include "top-wrapper.php";
    include "Views/$router[controller]/$router[method].php";
    include "bottom-wrapper.php";
}

else{
    echo "neplatná akce";
}
?>