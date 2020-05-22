
<html style="background-color :rgb(20, 41, 41)">
<div id="nav"><a href="index.php" style="font-size: 50px; color: white"> BookAddict </a></div>
<?php
//var_dump($donnee);
//var_dump($detail);
include("database.php");
$isbn = $_GET['isbn'];

        $detail = $bdd->prepare('SELECT isbn, titre, nom, prenom, role.libelle AS libelle_role, editeur.libelle AS libelle_editeur, genre.libelle AS libelle_genre, langue.libelle AS libelle_langue , nbpages, annee
                               FROM Livre
                               JOIN editeur ON livre.editeur = editeur.id
                               JOIN auteur ON livre.isbn = auteur.idLivre
                               JOIN personne ON auteur.idPersonne = personne.id
                               JOIN genre ON livre.genre = genre.id
                               JOIN langue ON livre.langue = langue.id
                               JOIN role ON auteur.idRole = role.id
                               WHERE isbn = :isbn');
        $detail->execute(array(
               'isbn' => $isbn));
while($donnee = $detail->fetch())
             {
             ?>
             
<div align="center" style="color:white;">
             <img src="images/<?php echo $donnee['isbn'];?>.jpg">

             <p>
                 Titre : <?php echo $donnee['titre'];?> <br>

                    Auteur : <?php echo $donnee['prenom'] . " " . $donnee['nom'];?> <br>

                    Rôle : <?php echo $donnee['libelle_role'];?> <br>

                    Editeur : <?php echo $donnee['libelle_editeur'];?> <br>

                    Genre : <?php echo $donnee['libelle_genre'];?> <br>

                    Langue : <?php echo $donnee['libelle_langue'];?><br>

                    Nombre de pages : <?php

                    if($donnee['nbpages'] = "NULL"){
                        echo "Inconnu";
                    }else{
                        echo $donnee['nbpages'];
                    }?> <br>

                    Année de publication : <?php echo $donnee['annee'];?>
             </p>
             </div>


             <?php 

            }

            $detail->closeCursor();

            ?>

            </html>