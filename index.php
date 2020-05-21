<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <link rel="stylesheet" href="index.css">
<div id="nav"><p style="font-size: 90px; color: white;"> BookAddict</p></div>

<?php 
include("database.php"); ?>

<h2>Profil de <?php echo $_SESSION['pseudo']; ?></h2>

 <a href="home.php"> Liste des livres </a> </br>
 <a href="listeauteur.php"> Liste des auteurs </a></br>
<a href="formaddbook.php"> Ajouter un livre </a></br>
<a href="formaddauteur.php"> Ajouter un Auteur </a></br>
<a href="formaddlangue.php"> Ajouter une langue </a></br>
<a href="formaddgenre.php"> Ajouter un genre </a></br>
<a href="#"> Supprimer un livre </a></br>

</br>
</br>
<a href="inscription.php">S'inscrire</a></br>
<a href="connexion.php">Se connecter</a></br>
<a href="deconnexion.php">Se déconnecter</a></br>



<!-- Barre de navigation -->

</body>
</html>