<?php

if(isset($_COOKIE['LOGGED_USER']) || isset($_SESSION['LOGGED_USER']))
{
    $loggedUser=[
        'email' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'],
    ];
}
else{
    throw new Exception('Il Il faut être authentifié pour ajouter des recettes');
}

?>