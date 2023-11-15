<?php
session_start();
include_once('./../config/user.php');
include_once('./../config/mysql.php');
include_once('./../variables.php');

if( !isset($_POST['id']) || !isset($_POST['title']) || !isset($_POST['recipe']) )
{
    echo 'Il manque des infirmations pour permettre l\'édition du recette !';
    return;
}
$id=$_POST['id'];
$title=$_POST['title'];
$recipe=$_POST['recipe'];

$updateRecipeStat=$sqlConnect->prepare("UPDATE recipes SET title=:title , recipe=:recipe WHERE recipe_id=:id");
$updateRecipeStat->execute([
    'title' => $title,
    'recipe'=> $recipe,
    'id'    => $id,
]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Site de recettes - Modification de Recette</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">
     <?php include_once('../header.php'); ?>
     <h1>Recette Modifiée avec succès ! </h1> 
     <div class="card" >
          <div class="card-body">
            <h5 class="card-title"><?php echo $title;  ?></h5>
            <p class="card-text"><b>Email : </b><?php echo $loggedUser['email'] ;?></p>
            <p class="card-text"><b>Recette : </b><?php echo strip_tags($recipe); ?></p> 
          </div>  
     </div>
    </div>  
    <?php include_once('../pied.php'); ?>
</body>
</html>