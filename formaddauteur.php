
<html style="background-color: rgb(43, 41, 41)">
<?php
session_start();
/*Formulaire Ajout auteur */
//include("menu.php");
?>
<div id="nav"><a href="index.php" style="font-size: 50px; color: white"> BookAddict </a></div>
</br>
<p style="margin-left: 500px; font-size: 45px; color: white"> Ajouter un Auteur</p>
<div id="form" style=" border: 2px solid black;
    background-color :rgb(20, 41, 41);
    align-content: center;">
<div id="center" style="margin-left:500px; font-size: 30px;color: white;">
<form action="" method="POST">

    <label for="nom" name='nom'>Nom</label>
    <input type="text" id="txtMot" name='nom'placeholder="nom"> <br>
    <label for="prenom" name='prenom'>Prenom</label>
    <input type="text" id="txtMot" name='prenom'placeholder="prenom"> <br>
    

    <input type="submit" value="Ajouter l'auteur" id="btnValider"> <br> 
    </div>
</div>    


</form>
<!-- Vérification saisie en JS -->
<script>
                                                var btnValider = document.getElementById('btnValider');
                                                btnValider.addEventListener("click" , valider);
                                                    function valider()  {
                                                            var txtMot = document.getElementById('txtMot');
                                                            
                                                            if(txtMot.value == "") {
                                                                alert("Tu t'es trompé ! ");
                                                            } else {
                                                                txtMot.readOnly = true ;
                                                            }
                                                            
                                                    }
                                    </script>
                                    
<?php
// Connexion à MySQL
$bdd=new PDO('mysql:host=localhost;dbname=bibliotheque;charset=utf8', 'root', 'root');
// vérification avec isset pour toute les données neccessaire + Transformer $_POST en variable simplifer
if(isset($_POST['nom'])AND isset($_POST['prenom'])){ 
   $nom = $_POST['nom'];
   $prenom = $_POST['prenom'];
   

   //requete
    $requete = $bdd->prepare("INSERT INTO personne(nom, prenom)VALUES(?,?)");
    $requete->execute(array($nom, $prenom));
   // var_dump($requete);  j'utilise cette commande pour débug
}


?>
</html>