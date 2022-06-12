<?php
include '../fonction.php';
$conn = connect();
$produit = $_POST['produit'];
$quantite = $_POST['quantite'];
$date=date("Y-m-d");
$fournisseur = $_POST['fournisseur'];
var_dump($produit);
$requette = "INSERT INTO commande(fournisseur,nom_produit,quantite,date_demande) VALUES('$fournisseur','$produit','$quantite','$date')";
$resultat = $conn->query($requette);
var_dump($resultat);
if($resultat){
    header('location:commande.php?ajout=ok');}







?>