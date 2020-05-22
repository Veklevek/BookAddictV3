<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">

    <title>Document</title>
</head>
<body>

<?php 
//include("menu.php");
include("database.php");
?>
<div id="nav"><a href="index.php"> BookAddict </a></div>
<?php
       //requete 
    $requete = $bdd->query('SELECT isbn,nom ,titre ,prenom ,editeur.libelle AS libelle_editeur ,genre.libelle AS libelle_genre ,annee FROM livre
                        JOIN personne ON livre.editeur = personne.id
                        JOIN editeur ON livre.editeur = editeur.id
                        JOIN  genre ON livre.genre = genre.id 
                        ORDER BY annee DESC;');                     
    
//var_dump($requete);
// fetch pour aller chercher la requete
   while($d = $requete->fetch()){
?> 
<div id="blocbook">
<div>
    <p class="titre" style="margin-left: 200px;">  <h3> Titre : <br>  <?php  echo $d['titre']; ?> <h3><br> </p>
    <div id="imgminiature">
 <!--   <?php

$default="images/default.jpg";
$couverture='images/'.$d['isbn'].'.jpg style="width : 120px;padding-bottom:120px; margin-left: 300px; margin-top:-70px;">';
if(file_exists($couverture)){
    $img=$couverture;
    }else{
        $img=$default;
    }
    print'<img src="'.$img.'"/>';
    ?>
    -->
    <img src="images/<?php echo $d['isbn'];?>.jpg" style="width : 100px;padding-bottom:120px; margin-left: 300px; margin-top:-70px; margin-right: 300px;">
    </div><br>
    

    <p class="infobook"> Auteur :  <?php echo $d['prenom'] ." ". $d['nom'] ;?>  <br>
     Genre :  <?php echo $d['libelle_genre'] ;?>  <br>
     Editeur :  <?php echo $d['libelle_editeur'] ;?>  <br>
                       <div style="margin-left: 1050px; width:200px;"> <a href="detail-livre.php?isbn=<?php echo $d['isbn']; ?>"> Voir detail  </a></div> </p>

    </div>
   </div>
 
   
   <?php
   }
   //fermeture de ma requete
    $requete->closeCursor(); 
    ?>

</body>
</html>