<!DOCTYPE html>
<html style="background-color :rgb(10, 41, 41);">
<head>

  <meta charset="utf-8">
  
  

<body> 
<a href="index.php" style="font-size:40px; color:white">BookAddict</a>
    <center style="color:white;">
      


   
    <h2 style="color :white">Liste des auteurs</h2>
    
<?php
session_start();
//affichage des données
include('database.php');
$requete=$bdd->query('SELECT isbn,titre,nom,prenom,genre.libelle as genre,langue.libelle as langue,editeur.libelle as editeur,annee,role.libelle as role FROM `auteur`
                    join role on auteur.idRole=role.id
                    join personne on auteur.idPersonne=personne.id
                    join livre on auteur.idLivre=livre.isbn
                    JOIN genre on livre.genre=genre.id
                    JOIN editeur on livre.editeur=editeur.id
                    JOIN langue on livre.langue=langue.id');
// barre de recherche des auteurs
if(isset($_GET['q']) AND !empty($_GET['q'])){ 
$q=htmlspecialchars($_GET['q']);
$requete=$bdd->query('SELECT isbn,titre,nom,prenom,genre.libelle as genre,langue.libelle as langue,editeur.libelle as editeur,annee,role.libelle as role,personne.id FROM `auteur`
                    join personne on auteur.idPersonne=personne.id
                    join role on auteur.idRole=role.id
                    join livre on auteur.idLivre=livre.isbn
                    JOIN genre on livre.genre=genre.id
                    JOIN editeur on livre.editeur=editeur.id
                    JOIN langue on livre.langue=langue.id
                    WHERE personne.id ="'.$q.'"');
}
?>


<form method="GET">
<?php
//try catch  requete personne
$option_per="SELECT * FROM `personne`";
try{
    $stmt_per=$bdd->prepare($option_per);
    $stmt_per->execute();
    $results_per=$stmt_per->fetchAll();
}
catch(Exception $ex)
{
    echo($ex->getMessage());
}
?>

<!-- liste déroulante recherche par auteur -->
    <select name="q" >
    <option>Recherche par Auteur</option>
    <?php foreach($results_per as $output_per){?>
    <option value="<?php echo $output_per["id"];?>"><?php echo $output_per["id"].".".$output_per["prenom"].' '.$output_per['nom']?></option>
    <?php } ?>
    </select></br>
<input type="submit" value="search">
</form>
<?php while($bdd=$requete->fetch()) { ?>
<hr><b>
<?php 

//affichage des informations
echo $bdd['titre'].'<br>'
.$bdd['editeur'].'<br>'.$bdd['nom'].' '.$bdd['prenom'].'<br>'.$bdd['genre'].'<br>'.$bdd['langue'].'<br>'.$bdd['annee']?></b>
<?php } ?>
</center>

    
        
   


</body>
</html>