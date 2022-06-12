<?php 
include '../fonction.php';
$conn = connect();
$id = $_GET['id'];
$requette1 = "SELECT nom_produit,quantite FROM commande WHERE id=$id";
$resultat1 = $conn->query($requette1);
$nom_prod = $resultat1->fetch();
$quantite = $nom_prod[1];
$id_prod = $nom_prod[0];
$requette2 = "UPDATE produit SET stock=stock+$quantite, commande=0 WHERE id=$id_prod";
$resultat2 = $conn->query($requette2);
if($resultat2){
    $requette3 = "DELETE FROM commande WHERE id=$id";
    $resultat3 = $conn->query($requette3);
    if($resultat3){
        header('location:commande.php?val=ok');

    }

}



?>