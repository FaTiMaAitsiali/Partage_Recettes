<?php 

 include_once('./../config/user.php');
 include_once('./../config/mysql.php');
 include_once('./../variables.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes -  Création de commentaire</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php include_once('../header.php'); ?>
    <form action="post_create.php" method="POST">
      <div class="mb-3 visually-hidden">
        <input class="form-control" type="text" name="recipe_id" value="<?php echo($recipe['recipe_id']); ?>" />
    </div>
    <div class="mb-3">
        <label for="comment" class="form-label">Postez un commentaire</label>
        <textarea class="form-control" placeholder="Soyez respectueux/se, nous sommes humain(e)s." id="comment" name="comment">
        </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    </div>

    <?php include_once('../pied.php'); ?>
</body>
</html>
