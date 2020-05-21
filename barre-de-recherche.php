<?php
//affiche les données
    $sql = $bdd->query('SELECT titre,isbn,nom,prenom,role.libelle as role,editeur.libelle as editeur,genre.libelle  as genre FROM `auteur`
join livre on auteur.idLivre=livre.isbn
join role on auteur.idRole=role.id
JOIN personne on auteur.idPersonne=personne.id
INNER JOIN genre on livre.genre=genre.id
INNER JOIN editeur on livre.editeur=editeur.id
where role.id=1
order by titre');
// barre de recherche prise de donées
if(isset($_GET['q']) AND !empty($_GET['q'])){ 
$q=htmlspecialchars($_GET['q']);
$sql=$bdd->query('SELECT titre,isbn,nom,prenom,genre.libelle as genre,role.libelle as role,langue.libelle as langue,editeur.libelle as editeur,annee FROM `auteur`
join personne on auteur.idPersonne=personne.id
join role on auteur.idRole=role.id
join livre on auteur.idLivre=livre.isbn
JOIN genre on livre.genre=genre.id
JOIN editeur on livre.editeur=editeur.id
JOIN langue on livre.langue=langue.id
WHERE titre LIKE "%'.$q.'%"
order by titre');
}
?>
<form method="GET">
<input type="search" name="q" placeholder="Recherche">
<input type="submit" value="search">
</form>