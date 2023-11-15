<?php 
include_once('config/mysql.php');

//Récupération des variables à l'aide de MYSQL
$usersStatement = $sqlConnect->prepare("SELECT * FROM users");
$usersStatement->execute();
$users=$usersStatement->fetchAll();

$recipesStatement= $sqlConnect->prepare("SELECT * FROM recipes WHERE is_enabled = 1 ");
$recipesStatement->execute();
$recipes=$recipesStatement->fetchAll();

if( isset($_GET['limit']) && is_numeric($_GET['limit']) )
{
    $limit=(int) $_GET['limit'];
}
else{
    $limit=100;
}

//Si le cookie est présent

if( isset($_COOKIE['LOGGED_USER'])  || isset($_SESSION['LOGGED_USER']))
{
    $loggedUser=[
        'email' => $_COOKIE['LOGGED_USER'] ?? $_SESSION['LOGGED_USER'],
    ];
}
?>