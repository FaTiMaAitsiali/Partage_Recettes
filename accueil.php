<?php include_once('config/mysql.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Page d'accueil</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <!-- Navigation -->
    <?php include_once('header.php'); ?>

    <!-- Formulaire de connexion -->
    <?php include_once('login.php'); ?>
        <h1>Site de Recettes !</h1>

<?php 
   $recipesStatement =$sqlConnect->prepare('SELECT * FROM recipes WHERE author=:author AND is_enabled=:is_enabled');
    $recipesStatement->execute([
    'author'  => 'mickael.andrieu@exemple.com',
    'is_enabled' => 1,
  ]);
  $recipes = $recipesStatement->fetchAll();
  //On affiche chaque recette une à une
  foreach($recipes as $recipe)
  {
?>
   <h3><?php echo $recipe['title'] ; ?></h3>
   <div><?php echo $recipe['recipe']; ?></div>
  <i><?php echo $recipe['author']; ?></i>
<?php }?>




