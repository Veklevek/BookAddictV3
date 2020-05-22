<?php
session_start();
// ajoute de ma barre de navigation
 //include("menu.php");
 /*Formulaire Ajout d'un livre */
?>


<html style="background-color: rgb(43, 41, 41)">

</br>
<div id="nav"><a href="index.php" style="font-size: 50px; color: white"> BookAddict </a></div>
<p style="margin-left: 500px; font-size: 45px; color: white"> Ajouter un livre</p>
<div id="form" style=" border: 2px solid black;
    background-color :rgb(20, 41, 41);
    align-content: center;">
<div id="center" style="margin-left:500px; font-size: 30px;color: white;">
<form action="" method="POST">
<label for="titre" name='titre'>Titre</label>
    <input type="text" id="txtMot" name='titre'placeholder="titre"> <br>
    <label for="nom" name='nom'>Nom</label>
    <input type="text" id="txtMot" name='nom'placeholder="nom"> <br>
    <label for="prenom" name='prenom'>Prenom</label>
    <input type="text" id="txtMot" name='prenom'placeholder="prenom"> <br>
    <label for="isbn" name='isbn'>Isbn</label> 
    <input type="text" id="txtMot2" name='isbn'placeholder="isbn" > <br> 
    <label for="editeur" name='editeur'>Editeur</label>
    <select name="editeur" >
        <option value="1">Belfond</option>
        <option value="2">Flammarion</option>
        <option value="3">Librio</option>
        <option value="4">Pocket</option>
        <option value="5">Larousse</option>
        <option value="6">Le livre de poche</option>
        <option value="7">Folio Théâtre</option>
        <option value="8">Phillipe Picquier</option>
        <option value="9">Guardian</option>
    </select> </br>
    <label for="genre" name='genre'>Genre</label>
    <select  name="genre">
   <option value="4">Essai</option>
   <option value="3">Nouvelle</option>
   <option value="5">Poésie</option>
   <option value="2">Roman</option>
   <option value="1">Théâtre</option>
 </select></br>
 <label for="annee" name='annee'>Année</label>
    <input type="number" id="txtMot2"  name='annee' placeholder="annee" > <br> 
    <label for="langue" name='langue'>Langue</label>
 <select name="langue"> 
    <option value="1"> Anglais</option>
     <option value="2"> Français</option>
     <option value="3"> Japonais</option>
     <option value="4"> Espagnol</option>
     <option value="5"> Italien</option> </select> <br>
     <label for="nbpages" name='nbpages'>Nombre de Pages</label>
    <input type="number" name='nbpages'placeholder="nbpages" > <br> 

    <input type="submit" value="Ajouter le livre" id="btnValider"> <br> 
    </div>
</div>    


</form>
<!-- vérification saisie -->
<script>
                                                var btnValider = document.getElementById('btnValider');
                                                btnValider.addEventListener("click" , valider);
                                                    function valider()  {
                                                            var txtMot = document.getElementById('txtMot');
                                                            var txtMot2 = document.getElementById('txtMot2');
                                                            if(txtMot.value == "") {
                                                                alert("Tu t'es trompé ! ");
                                                            } else {
                                                                txtMot.readOnly = true ;
                                                            }
                                                            if(txtMot2.value == "0" || "") {
                                                                alert("Tu t'es trompé ! ");
                                                            } else {
                                                                txtMot2.readOnly = true ;
                                                            }

                                                    }
                                    </script>
                                    
<?php
// Connexion à MySQL
$bdd=new PDO('mysql:host=localhost;dbname=bibliotheque;charset=utf8', 'root', 'root');

// vérification avec isset pour toute les données neccessaire + Transformer $_POST en variable simplifer
if(isset($_POST['isbn']) AND isset($_POST['titre']) AND isset($_POST['editeur']) AND isset($_POST['genre'])AND isset($_POST['annee'])AND isset($_POST['langue'])AND isset($_POST['nbpages'])
AND isset($_POST['nom'])AND isset($_POST['prenom'])){ 
   $titre=$_POST['titre'];
   $isbn=$_POST['isbn'];
   $editeur = $_POST['editeur'];
   $genre = $_POST['genre'];
   $annee = $_POST['annee'];
   $langue = $_POST['langue'];
   $nbpages = $_POST['nbpages'];
   $nom = $_POST['nom'];
   $prenom = $_POST['prenom'];
   
//requete
   $requete = $bdd->prepare("INSERT INTO livre(titre , isbn , editeur ,genre, annee , langue , nbpages )VALUES(?,?,?,?,?,?,?)");
    $requete->execute(array($titre ,$isbn ,$editeur,$genre, $annee,$langue ,$nbpages ));
    $requete2 = $bdd->prepare("INSERT INTO personne(nom, prenom)VALUES(?,?)");
    $requete2->execute(array($nom, $prenom));
   // var_dump($requete);
}


?>

</html>