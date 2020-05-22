<?php
session_start();
 //include("menu.php");
?>

<!DOCTYPE html>
<html lang="en" style="background-color :rgb(20, 21, 41);">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="nav"><a href="index.php" style="font-size: 50px; color: white"> BookAddict </a></div>
<center>
<h1 style="color: white;"> Espace Membre </h1>
<center>
<h2 style="color: white;"> Bonjour 
<?php 
    echo  $_SESSION['Pseudo'];
?>

</h2>

<br>
<br>
<br>
<br>
<br>
<br>
<h1 style="color: white;"> Vos réservations </h1>


<?php
include('database.php');
 $idmembre = $_GET['idmembre'];
 
 $req=$bdd->prepare("Select *
                    From Panier
                    Join livre On panier.isbnlivre = livre.isbn
                    Where   idmembre = '$idmembre'");

$req->execute(array($idmembre));

while($d = $req->fetch()){

   ?> <h2 style="color:white;"> <?php echo $d['titre']; ?> </h2>
    
    <img style="width : 200px; margin-left : 20px;" src="images/<?php echo $d['isbn'];?>.jpg">
    <?php
} ?>









</body>
</html>