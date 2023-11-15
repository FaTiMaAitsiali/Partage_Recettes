<?php 
session_start();
include_once('./../config/user.php');
include_once('./../config/mysql.php');

if( !isset($_POST['id']) )
{
    echo 'Il faut un identifiant de recette pour la supprimer !';
    return;
}

$deleteRecipeStat=$sqlConnect->prepare('DELETE FROM recipes WHERE recipe_id = :id');
$deleteRecipeStat->execute([
    'id' => $_POST['id'],
]);

?>
