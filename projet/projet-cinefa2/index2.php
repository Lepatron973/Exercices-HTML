<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta name="" description="">
	<link rel="stylesheet" type="text/css" href="script/style.css">
	<meta charset="UTF-8">
	<title>Site</title>
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
		<section class="container">
			<header>
				<h1>CINEFA</h1>
				<form class='recherche' method="get" action="#">
					<input type="search" name="search" placeholder=" recherche">
					<input type="submit" name="valider">
				</form>
			</header>
			<nav>
				<ul>
					<li class="menu">Menu</li>
					<li><a href="pages/movies.php">Films</a></li>
					<li><a href="pages/directors.php">Réalisateurs</a></li>
					<li><a href="pages/actors.php">Acteurs</a></li>
					<?php 
						 if (!isset($_SESSION['id_user']))
						{
											  
							echo'<li><a href="pages/connexion.php">connexion</a></li>
								<li><a href="pages/inscription.php">inscription</a></li>';
						}
						else
						{
							echo '<li><a href="pages/user_area.php">Espace personnel</a></li>';
						}
					?>		
				</ul>
			</nav>
			<section class="container2"> 
				<h2>Accueil</h2>
				<section class="container3">
					<!--<article class="slide1"><img class="img1" src="https://s1.thcdn.com/productimg/1600/1600/11578430-3474528138246830.jpg"></article>
					<article class="slide2"><img class="img2" src="https://s1.thcdn.com/productimg/1600/1600/11525075-1634525258416861.jpg"></article>
					<article class="slide3"><img class="img3" src="https://s1.thcdn.com/productimg/1600/1600/12020758-1354642385900439.jpg"></article>-->
				</section>
			</section>
			<footer></footer>
		</section>
		<?php mysqli_close($db_handle);//fermeture de la connexion à la BDD.?>
	</body>
</html>