<?php 
session_start();

include_once('./../config/user.php');
include_once('./../config/mysql.php');
include_once('./../variables.php');
include_once('./../fonctions.php');
if( !isset($_GET['id']) && is_numeric($_GET['id']) )
{
    echo 'La recette n\'existe pas';
    return;
}
$recipe_id=$_GET['id'];
$retrieveRecipeWithCommentsStatement=$sqlConnect->prepare(
        "SELECT     * 
         FROM       recipes r
         LEFT JOIN  comments c
         ON         r.recipe_id=c.recipe_id
         WHERE      r.recipe_id = :id ");
$retrieveRecipeWithCommentsStatement->execute([
    'id'  => $recipe_id,
]);         
$recipeWithComments=$retrieveRecipeWithCommentsStatement->fetchAll(PDO::FETCH_ASSOC);
$recipe=[
    'recipe_id' => $recipeWithComments[0]['recipe_id'],
    'title'     => $recipeWithComments[0]['title'],
    'recipe'    => $recipeWithComments[0]['recipe'],
    'author'    => $recipeWithComments[0]['author'],
    'comments'   => [],
];

foreach($recipeWithComments as $comment){
    if(!is_null($comment['comment_id']))
    {
        $recipe['comments'][]=[
            'comment_id' => $comment['comment_id'],
            'comment'    => $comment['comment'],
            'user_id'    => (int)$comment['user_id'],
        ];
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - <?php echo($recipe['title']); ?></title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php include_once('../header.php'); ?>
        <h1><?php echo($recipe['title']); ?></h1>
        <div class="row">
            <article class="col">
                <?php echo($recipe['recipe']); ?>
            </article>
            <aside class="col">
                <p><i>Contribuée par <?php echo($recipe['author']); ?></i></p>
            </aside>
        </div>

        <?php if(count($recipe['comments']) > 0): ?>
        <hr />
        <h2>Commentaires</h2>
        <div class="row">
            <?php foreach($recipe['comments'] as $comment): ?>
                <div class="comment">
                    <p><?php echo($comment['comment']); ?></p>
                    <i>(<?php echo(display_user($comment['user_id'], $users)); ?>)</i>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <hr />
        <?php if (isset($loggedUser)) : ?>
            <?php include_once('./../comments/create.php'); ?>
        <?php endif; ?>
    </div>
    <?php include_once('../pied.php'); ?>
</body>
</html>