
<?php
/*Lignes de commande connection a la base de donnée */
try{

$bdd = new PDO('mysql:host=localhost;dbname=bibliotheque;charset=utf8', 'root', 'root');
}

catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}


    
?>