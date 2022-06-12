<?php
function connect(){
    // 1- connexion a la BD
    $servername = "localhost";
    $DBuser = "root" ;
    $DBpassword ="" ;
    $DBname = "pfa" ;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
      return $conn;
    }
function getFournisseur(){
  $conn = connect();
  // 2 - creation de la requette
  $requette = "SELECT * FROM fournisseur";
  // 3- execution de la requette
$resultat = $conn->query($requette);
// 4- resultat de la requette 
$fournisseur = $resultat->fetchAll();
  return $fournisseur;
}
function getCategories(){
  $conn = connect();
  $requette = "SELECT * FROM categorie";
  $resultat = $conn->query($requette);
  $categorie = $resultat->fetchAll();
  return $categorie;


}
function getProduits(){
  $conn = connect();
  $requette = "SELECT * FROM produit";
  $resultat = $conn->query($requette);
  $produit = $resultat->fetchAll();
  return $produit;
}
function SearchProduit($keyword,$idc){
  $conn = connect();
  // 2 - creation de la requette
  $requette = "SELECT * FROM produit WHERE nom_produit LIKE '%$keyword%' AND categorie='$idc'" ;
  // 3- execution de la requette
  $resultat = $conn->query($requette);
  // 4- resultat de la requette 
  $produits = $resultat->fetchAll();
  return $produits ; 
}
function SearchCategorie($keyword){
  $conn = connect();
  // 2 - creation de la requette
  $requette = "SELECT * FROM categorie WHERE nom LIKE '%$keyword%' " ;
  // 3- execution de la requette
  $resultat = $conn->query($requette);
  // 4- resultat de la requette 
  $categories = $resultat->fetchAll();
  return $categories ; 
}
function notif(){
$conn = connect();
$requette1 = "SELECT * FROM produit WHERE stock<=stock_limit ";

$resultat1 = $conn->query($requette1);
$stock = $resultat1->fetchAll();

return $stock;
}
function getCommande(){
  $conn = connect();
  $requette = "SELECT * FROM commande";
  $resultat = $conn->query($requette);
  $commandes = $resultat->fetchAll();
  return $commandes;
}
?>