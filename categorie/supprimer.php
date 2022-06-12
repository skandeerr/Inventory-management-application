<?php
include '../fonction.php';
$conn = connect();
$id = $_GET['idc'];
$requette1 ="DELETE FROM categorie WHERE id=$id";
$resultat = $conn->query($requette1);
if($resultat){
    $requette2 ="DELETE FROM produit WHERE categorie=$id" ;
    $resultat1 =$conn->query($requette2);
    if($resultat1){
        header('location:categorie.php?sup=ok');
    }
} 




?>