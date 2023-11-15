<?php 
try{
   $sqlConnect=new PDO('mysql:host=localhost;dbname=partage_de_recettes;port=3307;charset=utf8',
                       'root',
                       'root');

   $sqlConnect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
   die("Erreur : ".$e->getMessage());
}


?>