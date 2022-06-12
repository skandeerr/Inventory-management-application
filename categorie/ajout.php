<?php
include "../fonction.php";
$conn = connect();
$nom = $_POST['nom'];
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image = $_FILES["image"]["name"];
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
  var_dump($image);
  $images = (string)$image;
  $requette1 = 'INSERT INTO `categorie`(`nom`,`photo`) VALUES("'.$nom.'","'.$images.'") ';
  $resultat = $conn->query($requette1);
  if($resultat){
      header('location:categorie.php?ajout=ok');
  }


?> 