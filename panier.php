<?php
session_start();?>
<!DOCTYPE html>
<html lang="en" style="background-color :rgb(20, 41, 41);">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
</head>
<body>
<div id="nav"><a href="index.php" style="font-size: 50px; color: white"> BookAddict </a></div>

<center>
    <h1 style="color: white;margin-top:300px;"> Le livre a bien été ajouté au panier </h1>
    <h1 style="color: white;" > <a href="membre.php?idmembre=<?php echo $_SESSION['id'];?>">Voir votre panier / liste de reservation</a></h1>
<center>
    


<?php
include('database.php');



   
 
//requete pour afficher le panier 

if(!empty($_GET['idmembre']) && !empty($_GET['isbn'])) {


$idmembre = $_GET['idmembre'] ;
$isbnlivre = $_GET['isbn'] ;

$req = $bdd->prepare('INSERT INTO Panier(idmembre , isbnlivre) VALUES(?, ?)');
 $value = $req->execute(array(
    $idmembre , $isbnlivre));
     }
   


?>


</body>
</html>