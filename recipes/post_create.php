<?php 
session_start();
include_once('./../config/mysql.php');
include_once('./../config/user.php');

 if( !isset($_POST['title']) || !isset($_POST['recipe']) )
 {
    echo 'Il faut un titre et une recette pour soumettre le formulaire !';
    return;
 }
?>
<?php
$title=$_POST['title'];
$recipe=$_POST['recipe'];

//Faire l'insertion en base
$insertRecipeStat=$sqlConnect->prepare('INSERT INTO recipes(title,recipe,author,is_enabled) VALUES(:title,:recipe,:author,:is_enabled)');
$insertRecipeStat->execute([
    'title'=>$title,
    'recipe'=>$recipe,
    'author'=>$loggedUser['email'],
    'is_enabled' => 1,
]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Site de recettes - Ajout de Recette</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">
     <?php include_once('../header.php'); ?>
     <h1>Recette Ajoutée avec succès ! </h1> 
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