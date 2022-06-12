<?php
include '../fonction.php';
$conn = connect();
$nom = $_POST['nom'];
$adresse = $_POST['adresse'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
try{
$requette = "INSERT INTO fournisseur(nom_prenom,adresse,email,telephone) VALUES ('$nom','$adresse','$email','$telephone')";
$resultat = $conn->query($requette);
if($resultat){
    header('location:fournisseur.php?ajout=ok');}
 } catch(PDOException $e) {
    
    if($e->getcode() == 23000){
        header('location:fournisseur.php?erreur=duplicate');
    }
  }


?>