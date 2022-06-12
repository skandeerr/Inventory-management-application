<?php
session_start();
if(!isset($_SESSION['name'])){
	header('location:../form/login-form-v16/Login_v16/form.php');

}
$id = intval($_GET['idc']);
include "../fonction.php";
if(!empty($_POST)){
  $produits = SearchProduit($_POST['search'],$id);
}else{
  $produits = getProduits();

}
  

$categories = getCategories();
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
    <link rel="stylesheet" href="style.css">

<!-- Bootstrap css -->
<link href="css/bootstrap.css?v=2.0" rel="stylesheet" type="text/css" />

<!-- Custom css -->
<link href="css/ui.css?v=2.0" rel="stylesheet" type="text/css" />
<link href="css/responsive.css?v=2.0" rel="stylesheet" type="text/css" />

<!-- Font awesome 5 -->
<link href="css/all.min.css" type="text/css" rel="stylesheet">
    

    <!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      .disp{
    background-color: red !important;
    color: white !important;
    font-size: 0.9rem !important;
    width:max-content; 
    border: 1px solid red;
    border-radius:5px;
}
.prod{
  font-size: 0.99rem !important;
}

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
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
  <form class="d-flex w-100" action="produit.php?idc=<?php echo $id?>" method="POST">
              <input class="form-control form-control-dark " type="search" placeholder="Search" aria-label="Search" name="search">
              <button class="btn btn-dark " type="submit"><i class="fa-solid fa-magnifying-glass"></i> </button>
            </form>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="../deconnexion.php">Sign out</a>
    </div>
    
  </div>
  
</header>


<div class="container-fluid">
  <div class="row">
  
    <?php
    include '../template/navigateur.php' 
    ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produits</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Ajouter</a>
        </div>
       
      </div>
      <?php
                if(isset($_GET['alert']) && $_GET['alert']== 'ok' ){
                    print ' <div class="alert alert-danger">
                    Produit est epuisé du stock
              </div>';
                }

?>
      
      <div class="container">
  <div class="row row-cols-3"> 
<?php foreach($produits as $produit){
  if((int) $produit['stock']> (int)$produit['stock_limit']){
    $disp ="disponible";
    $disabled="";
  }else{
    $disp="Non disponible";
    $disabled="disabled";
  }
  if($produit['categorie']==$id){
    print '<div class="col-lg-4 col-md-6 col-sm-6">
    <figure class="card card-product-grid">
      <div class="img-wrap" > 
        <img src="img/'.$produit['image'].'"> 
      </div>
      <figcaption class="info-wrap border-top">
        <div class="size">
          <p class="price fs-4 fw-bolder prod" >'.$produit['nom_produit'].'</p>
        </div> <!-- price-wrap.// -->
        <h5 class="mb-2 disp" style=""> '.$disp.'</h5>
        
        <a href="details_produit.php?idc='.$id.'&id='.$produit['id'].'" class="btn btn-outline-primary">Details</a>
        <button href="acheter.php?idc='.$id.'&id='.$produit['id'].'" '.$disabled.' class="btn btn-outline-info ms-1"><i class="fa-solid fa-cart-shopping"></i> Acheter</button>

        </figcaption>
    </figure>
          </div>';
  }
 
}      ?>
</div>
</div>		
</div>
</div>
    </main>

<!-- Modal Ajoutee -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Produits</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="ajout.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <input type="text" name="nom" required class="form-control"placeholder="Nom de Produit">
            </div>
            <div class="form-group">
               <textarea name="description"  class="form-control mt-3"  placeholder="description de la Produit" ></textarea>
           </div>
           <div class="form-group">
        <input type="number" name="prix"  required class="form-control mt-3"placeholder="Prix de Produit">
            </div>
           <div class="form-group">
        <input type="number" name="stock"  required class="form-control mt-3"placeholder="stock">
            </div>
            <div class="form-group">
        <input type="number" name="stock_limit"  required class="form-control mt-3"placeholder="Stock limit">
            </div>
            <div class="form-group">
        <input type="number" name="code"  required class="form-control mt-3"placeholder="code a barre">
            </div>
            <div class="form-group">
            <input type="file" name="image" required class="form-control mt-3">
           </div>
           <input type="hidden" name="categorie" value="<?php echo $id?>" >

 
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
      </form>
    </div>
  </div>
</div>

 
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
     <script>
      function popUpDeleteCategorie(){
        return confirm("voulez vous vraiment supprimer la categorie ?")
      }
    </script>
    <script src="../js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <script src="../js/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
</body>
</html>
