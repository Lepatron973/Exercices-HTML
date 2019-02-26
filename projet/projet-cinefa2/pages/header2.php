<?php
	require_once '../configuration/identifiant.php';
	include '../fonctions.php';
	$bdd_name= 'cinefa';
?>
<!--<form class='recherche text-right' method="get" action="fiches.php">
	<input type="search" name="search_movie" placeholder=" recherche">
	<input type="submit" name="valider">
</form>
<form class="tri" action="movies.php" method="post">
	<select name="pays" id="pays">
		<option value="france">non trié</option>
		<option value="espagne">tri/note</option>			           
	</select>
	<input type="submit" name="tri" value="valider">
</form>
<nav class="col-12 text-left">
	<ul>
		<li class="menu">Menu</li>
		<li><a href="movies.php">Films</a></li>
		<li><a href="directors.php">Réalisateurs</a></li>
		<li><a href="actors.php">Acteurs</a></li>
		<?php 
			/*if (!isset($_SESSION['id_user']))
			{

			echo'<li><a href="connexion.php">connexion</a></li>
				<li><a href="inscription.php">inscription</a></li>';
			}
			else
			{
			echo '<li><a href="user_area.php">Espace personnel</a></li>';
			}*/
		?>    
	</ul>
</nav>-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../">Acceuil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="movies.php">Films<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="directors.php">Réalisateurs</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link " href="actors.php" tabindex="-1">Acteurs</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Identification
        </a>
        <?php 
			if (!isset($_SESSION['id_user']))
			{

			echo'<div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="connexion.php">Connexion</a>
          <a class="dropdown-item" href="inscription">Inscription</a>';
			}
			else
			{
			echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="user_area.php">Espace personnel</a>';
			}
		?>    
        
          
        </div>
      </li>
    </ul>
    <form method='get' action='fiches.php' class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" name='search' placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
    </form>
  </div>
</nav>