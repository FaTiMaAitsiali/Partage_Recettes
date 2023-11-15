<?php if(!isset($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) 
         || !isset($_POST['message']) || empty($_POST['message']) )
      {
        echo 'il faut un email et un message pour soumettre le formulaire.';
        
        //arreter l'execution du Php
        return;
      }

$email=$_POST['email'];
$message=$_POST['message'];

?>
<?php 
  // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
  if( isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] == 0 )
  {
    //testons si le fichier n'est pas tros gros 
    if($_FILES['screenshot']['size'] <= 1000000 )
    { 
       //testons si l'extension est autorisé
       $fileInfo = pathinfo($_FILES['screenshot']['name']);
       $extension = $fileInfo['extension'];
       $allowedExtensions = ['jpg','png','gif','jpeg'];

       if( in_array($extension , $allowedExtensions)  )
       {
          //On peut valider le + et le stocker définitivement
          move_uploaded_file($_FILES['screenshot']['tmp_name'],'uploads/'.basename($_FILES['screenshot']['name']));
          echo "L'envoi a bien été effectué !";
       }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Site de recettes - Formulaire de Contact</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet">
</head>
<body>
       <h1>Message bien reçu !</h1>
       <div class="card">
          <div class="card-body">
            <h5 class="card-title">Rappel de vos informations</h5>
            <p class="card-text"><b>Email</b> : <?php echo ($email) ;?></p>
            <p class="card-text"><b>Message</b> : <?php echo  /*strip_tags*/htmlspecialchars($message); ?></p>
          </div>  
       </div>
</body>
</html>