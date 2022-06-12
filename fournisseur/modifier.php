<?php
include '../fonction.php';
$conn = connect();
$id = $_POST['id'];
$nom = $_POST['nom'];
$adresse = $_POST['adresse'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$requette = "UPDATE fournisseur SET nom_prenom='$nom', adresse='$adresse', email='$email', telephone='$telephone' WHERE id='$id'";
$resultat = $conn->query($requette);
if($resultat){
    header('location:fournisseur.php?modif=ok');

}


?>