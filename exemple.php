<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ceci est une page de test avec des balises PHP</title>
</head>
<body>
    <h2> Page de test </h2>
    <p>
         Cette page contient du code HTML avec des balises PHP.</br>
        <?php echo "<strong>Quelle \"couleur\" vous préférer?</strong>";?></br>
        Voici quelque petits tests :
    </p>
    <ul>
        <li style="color:blue;">Texte en bleu</li>
        <li style="color:red;">Texte en rouge</li>
        <li style="color:green;">Texte en vert</li>        
    </ul>
    <?php 
     echo "<strong>*L'ecriture est une methode de s'exprimer *</strong>";
     $userAge=17;
     $userAge=33;
     $userAge=44; 

     $myName="Mathieu Nebra";

     $isAuthor=true;
     $isAdministrator=false;

     $noValue=NULL;
     echo "</br>Bonjour $myName est bienvenue sur le site!";
     echo '</br>Bonjour '.$myName.' est bienvenue sur le site!';
    ?>



    <!-- Les conditions -->
    <?php 
    $is_enabled=true;
    $is_owner=false;
    if($is_enabled == true)
    {
        echo "</br>Vous etes autoriser à accéder au site !";
    }
    else{
        echo "Accès Refusé !!";
    }

    if($is_enabled)
    {

    }
    if(! $is_enabled)
    {
        
    }
    if($is_enabled && $is_owner)
    {
        echo "Accès à la recette valider</br>";
    }
    else{
        echo "Accès à la recette interdit !</br>";
    }

        $grade = 10;
        
        switch ($grade) // on indique sur quelle variable on travaille
        { 
            case 0: // dans le cas où $grade vaut 0
                echo "Tu es vraiment un gros nul !!!";
            break;
            
            case 5: // dans le cas où $grade vaut 5
                echo "Tu es très mauvais";
            break;
            
            case 7: // dans le cas où $grade vaut 7
                echo "Tu es mauvais";
            break;
            
            case 10: // etc. etc.
                echo "Tu as pile poil la moyenne, c'est un peu juste…";
            break;
            
            case 12:
                echo "Tu es assez bon";
            break;
            
            case 16:
                echo "Tu te débrouilles très bien !";
            break;
            
            case 20:
                echo "Excellent travail, c'est parfait !";
            break;
            
            default:
                echo "Désolé, je n'ai pas de message à afficher pour cette note";
        }

        $userAge=24;
        $isAdult= ($userAge >= 17)?true:false;
        $isAdult= ($userAge >= 17);

        $lines=1;
        while($lines <=40)
        {
            echo 'Je ne dois pas regarder les mouches voler quand j\'apprends le PHP.<br />';
            $lines++;
        }
        $line=1;
        while($line <=10)
        {
            echo 'je suis la phrase N°'.$line.'.<br />';
            $line++;
        }
      //---Tableau Numéroté
      $recipes=['Cassoulet','Couscous','Escalope Milanaise','Salade César',];
      $recipes=array('Cassoulet','Couscous','Escalope Milanaise');
      //---Tableu Associatif
      $recipes=[
        'title'=> 'Cassoulet',
        'reciope'=>'Etape1: des flageolets , Etape2: ____',
        'author'=>'JohnDoe@exmple.com',
        'enabled'=>true,
      ];
      /* foreach($recipes as $recipe)
       {
        echo $recipe;
       }

      $recipe['title']='Cassoulet';
      $recipe['recipe']='Etape1: des flageolets , Etape2: ____';
      $recipe['author']='JohnDoe@exmple.com';
      $recipe['enabled']=true;
      echo $recipe['title'];


      for( $line=0 ; $line<=1 ; $line++ )
      {
        echo $recipe[$line][0];
      }*/

      $recettes=[
             [
                'title' => 'Cassoulet',
                'recipe' => '',
                'author' => 'mickael.andrieu@exemple.com',
                'is_enabled' => true,
             ],
             [
                'title' => 'Couscous',
                'recipe' => '',
                'author' => 'mickael.andrieu@exemple.com',
                'is_enabled' => false,
            ],
            [
                'title' => 'Escalope milanaise',
                'recipe' => '',
                'author' => 'mathieu.nebra@exemple.com',
                'is_enabled' => true,
            ],
            [
                'title' => 'Salade Romaine',
                'recipe' => '',
                'author' => 'laurene.castor@exemple.com',
                'is_enabled' => false,
            ],
        ];
        
        foreach($recettes as $recipe)
        {
            echo $recipe['title'].' contribué(e) par : '.$recipe['author']. '</br>';
        }
        
        echo '<pre>';
        print_r($recettes);
        echo '</pre>';


        $recipe1=[
            'title' => 'Couscous' ,
            'recipe' => '1- ........ / 2- .........',
            'author' => 'HHHHHHHHH',
            'enabled' => true,
        ];
        foreach($recipe1 as $property => $propertyValue)
        {
            echo '[ '.$property. '] vaut '.$propertyValue; 
        }

        if(array_key_exists('title',$recipe1))
        {
            echo 'La clé title est existe!!';
        }
        if(array_key_exists('commentaire',$recipe1))
        {
            echo 'La clé commentaire existe dans le tableau';
        }

        $users=[
            'Ahmed Sfrioui',
            'Ali Baba',
            'Said naciri',
        ];
        if(in_array('Ahmed Sfrioui',$users))
        {
            echo '</br>Ahmed Sfrioui est parmi les utilisateurs';
        }
        if(in_array('Zineb ',$users))
        {
            echo '</br>Zineb est parmi les utilisateurs du site!';
        }
        $positionAhmed=array_search('Ahmed Sfrioui',$users);
        echo 'la clé de Ahmed Sfrioui est  : '.$positionAhmed.'</br>';
        $positionAli=array_search('Ali Baba',$users);
        echo 'La position de Ali est : '.$positionAli; 

?> 
   
  <?php  $checkenRecipesEnabled=true; ?>
  <?php if($checkenRecipesEnabled): ?>
  <h1>Liste des recettes à base de poulet</h1>
  <?php endif; ?>
</body>
</html>












