<link rel="stylesheet" href="../css/style.css">
<?php 
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
  $requette1 = "SELECT stock,stock_limit,commande FROM produit ";

  $resultat1 = $conn->query($requette1);
  $stock = $resultat1->fetchAll();
  $n=0;
  for($i=0;$i<count($stock);$i++){
    if($stock[$i][0] <= $stock[$i][1] && $stock[$i][2] == 0){
      $n++;
    }
  }
  $commandes = getCommande();

  
  $a=0;
  foreach($commandes as $c ){
    $a++;
  }
  

?>

<style>
  .not {
           animation-duration: .8s;
        animation-name: clignoter;
        animation-iteration-count: infinite;
        transition: none;
     
     
}
.back {
  background-color: #dee2e6;
}
@keyframes clignoter {
    0%   { opacity:1; }
    40%   {opacity:0; }
    100% { opacity:1; }
  }
</style>
<nav class="col-md-2 d-none d-md-block bg-light sidebar ">
          <div class="sidebar-sticky ml">
            <ul class="nav flex-column ">
            <li class="nav-item  mb-2 "  <?php if($n>0){ print'class="not"';}?> >
                <a class="nav-link "   href="../profil/profil.php">
                  <span data-feather="file" ></span>
                 
                  Profil <i class="fa-solid fa-bell"></i>(<?php echo $n ?>)
                </a>
              </li>
            <li class="nav-item mb-2">
                <a class="nav-link " href="../categorie/categorie.php">
                  <span data-feather="home"></span>
                  Categorie <span class="sr-only">(current)</span>
                </a>
              </li>
              
             
              <li class="nav-item mb-2">
                <a class="nav-link" href="../commande/commande.php">
                  <span data-feather="shopping-cart"></span>
                  Commande (<?php echo $a ?>)
                </a>
              </li>
              <li class="nav-item mb-2">
                <a class="nav-link" href="../fournisseur/fournisseur.php">
                  <span data-feather="users"></span>
                  Fournisseur
                </a>
              </li>
              
              
              
              
            </ul>

          </div>
        </nav>
      