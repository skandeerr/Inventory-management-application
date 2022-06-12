<?php 
include "../fonction.php";
$conn = connect();
$idp = $_GET['id'];
$requette1 = "SELECT stock FROM produit WHERE id='$idp'";
$resultat1 = $conn->query($requette1);
$stock = $resultat1->fetch();
var_dump($stock[0]);
if($stock[0]>0){
    $requette = "UPDATE produit SET stock=stock-1 WHERE id='$idp'";
    $resultat = $conn->query($requette);
    if($resultat){
        header("location:produit.php?idc=".$_GET['idc']."");
}
}else{
    header("location:produit.php?idc=".$_GET['idc']."&alert=ok");

}








?>