<?php
include '../fonction.php';
$conn = connect();
$id = $_GET['id'];
$requette ="DELETE FROM commande WHERE id=$id";

$resultat = $conn->query($requette);
if($resultat){
        header('location:commande.php?sup=ok');
    }





?>