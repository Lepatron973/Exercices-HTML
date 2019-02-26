<?php session_start(); ?>
<!doctype html>
<html lang="fr">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="script/style_pages.css">

  <title>CINEFA</title>
  </head>
    <body>
      <?php
    if (isset($_POST['deconnexion'])) {
      session_destroy();
    }
  require_once 'configuration/identifiant.php';
  $db_handle= mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
  $tab = array();
  //echo "connexion ok! <br>";
  $db_name= 'cinefa';
  $i=0;
  $db = mysqli_select_db($db_handle, $db_name);
  if ($db) 
    {
      //echo $db_name . " data base found";
      $rqt= "SELECT * FROM ACTORS";//sélectionne les donnée à afficher.

      $rqt2= "INSERT INTO `cinefa.ACTORS`(name,gender,age)
      VALUES ('Will Smith', 'M', '50')";//insert une donnée.

      $result_query= mysqli_query($db_handle, $rqt);//requête pour afficher/insérer etc..
      while ($db_field = mysqli_fetch_assoc($result_query))//boucle permettant d'afficher les données.
      {
        //print_r($db_field);
        //echo $db_field['title'] . '<br>';
        //echo $db_field . '<br>';
        //$tab[$i]=$db_field;//rentre les données dans un tableau pour les afficher plus tards hors de la boucle.*/
      }
  }else
    {
      echo $db_name ." database not found";
    }
  //mysqli_close($db_handle);//fermeture de la connexion à la BDD.
?>
   
      <div class="row">
        <div class="col header">
          <h1>CINEFA</h1>

          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="./">Acceuil</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="pages/movies.php">Films<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/directors.php">Réalisateurs</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link " href="pages/actors.php" tabindex="-1">Acteurs</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Identification
                  </a>
                  <?php 
                if (!isset($_SESSION['id_user']))
                {

                echo'<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="pages/connexion.php">Connexion</a>
                    <a class="dropdown-item" href="pages/inscription">Inscription</a>';
                }
                else
                {
                echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="pages/user_area.php">Espace personnel</a>';
                }
              ?>       
                  </div>
                </li>
              </ul>
              <form method='get' action='pages/fiches.php' class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" name='search' placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
              </form>
            </div>
          </nav>
        </div>
      </div>
      <h1>A la une</h1>
      <div class="row box1">	
        <div class="col-4 slide1">
          <img class="img1" src="https://s1.thcdn.com/productimg/1600/1600/11578430-3474528138246830.jpg">
        </div>
        <div class="col-4 slide2">
          <img class="img2" src="https://s1.thcdn.com/productimg/1600/1600/11525075-1634525258416861.jpg">
        </div>
        <div class="col-4 slide3">
          <img class="img3" src="https://s1.thcdn.com/productimg/1600/1600/12020758-1354642385900439.jpg">
        </div>
      </div>
      <div class="row">
        <div class="col footer">

        </div>
      </div>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
