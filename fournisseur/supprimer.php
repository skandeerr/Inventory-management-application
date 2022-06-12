<?php
include '../fonction.php';
$conn = connect();
$id = $_GET['id'];
$requette ="DELETE FROM fournisseur WHERE id=$id";
$resultat = $conn->query($requette);
if($resultat){
    header('location:fournisseur.php?sup=ok');
}

?>