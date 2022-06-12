<?php
include "../fonction.php";
$conn = connect();
$nom = $_POST['nom'];
$prix = $_POST['prix'];
$stock = $_POST['stock'];
$code = $_POST['code'];
$description = $_POST['description'];
$categorie =$_POST['categorie'];
$stock_limit = $_POST['stock_limit'];
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image = $_FILES["image"]["name"];
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
  var_dump($categorie);
$commande = 0;
$requette = 'INSERT INTO `produit`(`nom_produit`,`code_barre`,`stock`,`categorie`,`image`,`prix`,`description`,`stock_limit`,`commande`) VALUES("'.$nom.'","'.$code.'","'.$stock.'","'.$categorie.'","'.$image.'","'.$prix.'","'.$description.'","'.$stock_limit.'","'.$commande.'") ';
$resultat = $conn->query($requette);

  if($resultat){
      header("location:produit.php?idc=".$categorie."");
  }











?>