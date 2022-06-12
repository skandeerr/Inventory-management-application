<?php
session_start();
if(!isset($_SESSION['name'])){
	header('location:../form/login-form-v16/Login_v16/form.php');
}
include '../fonction.php';
$fournisseurs = getFournisseur();
$categories = getCategories();
$produits = getProduits();
$commandes = getCommande();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<link rel="stylesheet" href="../css/style.css">

<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      span {
        font-size: 0.8rem !important;

      }
      a{
    font-size: 0.8rem !important;
}
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Admin</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="../deconnexion.php">Sign out</a>
    </div>
  </div>
</header>
 <!-- Button trigger modal -->

<div class="container-fluid">
  <div class="row">
  
    <?php
    include '../template/navigateur.php' 
    ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Commande</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Ajouter</a>
        </div>
      </div>
      <?php
                if(isset($_GET['val']) && $_GET['val']== 'ok' ){
                    print ' <div class="alert alert-success">
                    Commande valide avec succes
              </div>';
                }

?>
<?php
                if(isset($_GET['sup']) && $_GET['sup']== 'ok' ){
                    print ' <div class="alert alert-success">
                    Commande Supprimee avec succes
              </div>';
                }

?>
<?php
                if(isset($_GET['erreur']) && $_GET['erreur']== 'duplicate' ){
                    print ' <div class="alert alert-danger">
                    Commande deja existe 
              </div>';
                }

?>
  <?php
    foreach($commandes as $commande){
      foreach($produits as $produit){
          if($produit['id'] == $commande['nom_produit']){
            $nom_produit = $produit['nom_produit'];
          }
      }
      foreach($fournisseurs as $fournisseur){
        if($fournisseur['id'] == $commande['fournisseur']){
          $nom = $fournisseur['nom_prenom'];
        }
      }
     print '<div class=" color  border-customr row mb-3">
     <div class="col-md-2">
         <div class="border-rigth  text-center">
         <span>Nom de Produit :</span> <div > '.$nom_produit.'</div>
         </div>
     </div>
     <div class="col-md-2 border-rigth ">
             <div class="col">
             <div class="row">
                 <div class="  text-center">
                 <span>Quantite :</span> <div > '.$commande['quantite'].'</div>
           </div>
             </div>
             
            
         </div>
     
     </div>
     <div class="col-md-2 border-rigth ">
     <div class="col">
     <div class="row">
         <div class="  text-center">
         <span>Fournisseur :</span> <div > '.$nom.'</div>
   </div>
     </div>
     
    
 </div>

</div>
    <div class="col-md-3 border-rigth ">
    <div class="col">
    <div class="row">
        <div class="  text-center">
        <span>Date de Commande :</span> <div> '.$commande['date_demande'].'</div>
    </div>
    </div>


    </div>

    </div>
     <div class="col-md-3 border-rigth">
         <div class="row">
             <div class="col-md-6">
                 <a type="button" onclick="return popUpValiderCommande()" href="valider.php?id='.$commande['id'].'"  class="btn btn-link decoration"><i class="fa-solid fa-check"></i> </br> Valider</a>
             </div>
             <div class="col-md-6">
                 <a type="button" onclick="return popUpDeleteCommande()" href="supprimer.php?id='.$commande['id'].'" class="btn btn-link decoration"><i class="fa-solid fa-trash-can"></i> </br> Supprimer</a>
             </div>
             
         </div>
     </div>
 </div>';
    }

  
?>
  
  </div>
</div>
  
    </main>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Commande</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="ajout.php" method="POST" >
        <div class="form-group">
        <select name="fournisseur" class="form-control" >
          <?php foreach($fournisseurs as $fournisseur)  
          print '
            <option value="'.$fournisseur['id'].'">'.$fournisseur['nom_prenom'].'</option>
          '
          ?>
          </select>
        </div>
        
        <div class="form-group mt-3">
        <select name="produit" class="form-control" >
        <option value="">--Produits--</option>
          <?php foreach($produits as $p)  
          print '
            <option value="'.$p['id'].'">'.$p['nom_produit'].'</option>
          '
          ?>
          </select>
        </div>
        <div class="form-group">
          <input type="number" step="1" class="form-control mt-3" name="quantite" placeholder="Quantite">
        </div> 
            
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
      </form>
    </div>
  </div>
</div>
  </body>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
    <script>
      function popUpDeleteCommande(){
        return confirm("voulez vous vraiment supprimer la Commande ?")
      }
    </script>
    <script>
      function popUpValiderCommande(){
        return confirm("voulez vous vraiment valider la Commande ?")
      }
    </script>
    <script src="../js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <script src="../js/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
</html>
