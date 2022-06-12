<?php
include '../fonction.php';
$conn = connect();
$fournisseur = $_POST['fournisseur'];
$quantite = $_POST['quantite'];
$nom_prod = $_POST['nom'];
var_dump($nom_prod);
$date=date("Y-m-d");
$commande = 1;
$requette2 ="UPDATE produit SET commande='$commande' WHERE id='$nom_prod' ";
$requette = 'INSERT INTO `commande`(`fournisseur`,`nom_produit`,`quantite`,`date_demande`) VALUES("'.$fournisseur.'","'.$nom_prod.'","'.$quantite.'","'.$date.'") ';
$resultat1 = $conn->query($requette);
$resultat2 = $conn->query($requette2);
if($resultat1 && $resultat2){
    header("location:profil.php?comm=ok");
}



?>