<!DOCTYPE html>
<html>
    <head>
        <title>Notre première instruction : echo</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h2>Affichage de texte avec PHP</h2>
        
        <p>
            Cette ligne a été écrite entièrement en HTML.<br />
            <?php echo("Celle-ci a été écrite entièrement en PHP."); 
            /*----------------
              --Commentaire---
              ---------------- */
            ?>
        </p>
        <p>Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i:s'); //la date d'aujourd'hui?></p>
    </body>
</html>