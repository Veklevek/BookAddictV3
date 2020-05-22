<?php
session_start();
 
include("database.php");
 
if(isset($_POST['formconnexion'])) {
   $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($pseudoconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare('SELECT * FROM Membre WHERE Pseudo = ? AND Mdp = ?');
      $requser->execute(array($pseudoconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['Pseudo'] = $userinfo['Pseudo'];
         $_SESSION['Type'] = $userfinfo['Type'];
        header("Location: index.php");
      } else {
         $erreur = "Mauvais pseudo ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !  è_é  ";
   }
}
?>
<html style="background-color :rgb(20, 31, 41)">
   <head>
      <title >Connexion</title>
      <meta charset="utf-8">
   </head>
   <body>
   <div id="nav"><a href="index.php" style="font-size: 40px; color: white;"> BookAddict </a></div>
      <div align="center">
         <h2 style="color:white;">Connexion</h2>
         <br /><br />
         <form method="POST" action="">
            <input type="text" name="pseudoconnect" placeholder="Pseudo" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter " />
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>