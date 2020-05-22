<?php
session_start();
?>
<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
    <link rel="stylesheet" href="index.css">
<div id="nav"><p style="font-size: 90px; color: white; background-color :rgb(20, 21, 41);padding-left:480px;margin-left:-480px;"> BookAddict</p></div>

<?php 
include("database.php"); ?>

<h2>Bienvenue <?php 
echo $_SESSION['Type'];
echo $_SESSION['Pseudo']; ?></h2>



<?php if(isset($_SESSION['id']) ){?>
<?php if($_SESSION['Type'] == "Admin"){ ?>

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
<?php }
} ?>

    <?php if($_SESSION['Type'] == "Membre"){ ?>

    <a href="home.php"> Liste des livres </a> </br>
    <a href="listeauteur.php"> Liste des auteurs </a></br>
    <a href="#"> Supprimer un livre </a></br>

    </br>
    </br>
    <a href="inscription.php">S'inscrire</a></br>
    <a href="connexion.php">Se connecter</a></br>
    <a href="deconnexion.php">Se déconnecter</a></br>

    
    <?php }
    else {?>
    <a href="home.php"> Liste des livres </a> </br>
    <a href="listeauteur.php"> Liste des auteurs </a></br>
    <a href="#"> Supprimer un livre </a></br>

    </br>
    visiteur
    </br>
    <a href="inscription.php">S'inscrire</a></br>
    <a href="connexion.php">Se connecter</a></br>
    <a href="deconnexion.php">Se déconnecter</a></br>
    <?php } ?>



<!-- Barre de navigation -->

</body>
</html>