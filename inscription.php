<?php
include("database.php");
 
if(isset($_POST['forminscription'])) {
   $pseudo = htmlspecialchars($_POST['pseudo']);
   
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);
   if(!empty($_POST['pseudo']) AND  !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
      $pseudolength = strlen($pseudo);
      if($pseudolength <= 255) {
        
                  if($mdp == $mdp2) {
                     $insertmbr = $bdd->prepare('INSERT INTO Membre(Pseudo, Mdp, Type) VALUES(?, ?, "membre")');
                     $insertmbr->execute(array($pseudo, $mdp));
                     $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>


<html style="background-color :rgb(20, 21, 41)">
   <head>
      <title>Inscription</title>
      <meta charset="utf-8">
   </head>
   <body>
   <div id="nav"><a href="index.php" style="font-size: 40px; color: white;"> BookAddict </a></div>
      <div align="center">
         <h2 style="color:white;">Inscription</h2>
         <br/>
         
         <form method="POST" action="">
            <table style="color:white;">
               <tr>
                  <td align="right">
                     <label for="pseudo">Pseudo :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
                  </td>
               </tr>
                  <td align="right">
                     <label for="mdp">Mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp2">Confirmation du mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
                  </td>
               </tr>


               <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <input type="submit" name="forminscription" value="Je m'inscris" />
                  </td>
               </tr>
            </table>
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>