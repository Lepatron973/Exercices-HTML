<?php 
	session_start();
	
	$bdd_name="cinefa";
	

	$bool=0;		 
?>
<!doctype html>
<html lang="fr">
	<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../script/style_pages.css">

	<title>Espace personnel</title>
	</head>
  	<body>
		<div class="container">
			<section>
			<div class="row">
				<div class="col-12 header">
					<h1 class="text-center">CINEFA</h1>
					<?php
						include 'header2.php';
						if (isset($_POST['pseudo']))
								{
									$select_query= "SELECT ref_user,pseudo,password FROM USERS WHERE pseudo='" . $_POST['pseudo'] . "';";

									$data= connexion_query($bdd_name,$select_query);
										$identifiant= $data[0]['pseudo'] . " " . $data[0]['password']; 
										$donnees= $_POST["pseudo"] . " " . sha1($_POST["pass"]);
									if ($donnees== $identifiant) 
										{
											$bool=1;
											//echo "connexion ok !";
											$_SESSION['id_user']=$data[0]['ref_user'];	
										}
									else{
											$bool=0;
											echo "connexion échoué !";
										}
								}
						if (isset($_SESSION['id_user']))
							{
								
								
								if (isset($_POST['title_category']))
									{
										$title=$_POST["title_category"];
										$release_date=date('d/m/y');
										$id_user=$_SESSION['id_user'];
										$insert_query= 'INSERT INTO CATEGORIES(title_category,creation_date,id_user) 
												VALUES("'. $title . '","' . $release_date . '","' . $id_user . '")';//ces deux lignes prépare la BDD à recevoir des données via des variables externe
										note_query($insert_query);
									}
							
								$select_query="SELECT * FROM CATEGORIES WHERE 1";
								$category_for_user="SELECT title_category,id_categories FROM CATEGORIES WHERE id_user=" . $_SESSION['id_user'];	
								$data= connexion_query($bdd_name,$select_query);
								$id_user;
								$title_category=connexion_query($bdd_name,$category_for_user);
								//var_dump($data);

								$print_list_query="SELECT MOVIES.title,CATEGORIES.title_category FROM MOVIES
								INNER JOIN CATEGORY_CONTENT ON MOVIES.id_movie = CATEGORY_CONTENT.id_movie
								INNER JOIN CATEGORIES ON CATEGORY_CONTENT.id_category = CATEGORIES.id_categories
								INNER JOIN USERS ON CATEGORIES.id_user = USERS.ref_user
								WHERE ref_user=". $_SESSION['id_user'];
								$movie_list=connexion_query($bdd_name,$print_list_query);

	?>
					
				</div>
			</div>
		</section>
		<section>
			<div class="row box1">
				<div class="col-4">
					<form class='text-left deconnexion' method="post" action="../index.php">
						<input type="submit" name="deconnexion" value="deconnexion">
					</form>
				</div>
				<div class="col-4">
					<h2>Espace personnel</h2>
				</div>

				

			</div>
		</section>
		<section>
			<div class="row">			
				<div class="col-4 slide1">
					<form method="post" action="user_area.php">
						<label for="title_category"> Créé votre liste: </label>
						<input type="text" name="title_category" placeholder="titre de votre liste">
						<input type="submit" value="créer">
					</form><br>
					<h3>Vos listes:</h3><br>
					<?php 
						for ($i=0; $i <count($title_category) ; $i++) { 
							echo '<h5>'. $title_category[$i]['title_category'] . '</h5>';
						}
						
					 ?>
				</div>	
				<div class="col-4 slide2">
					<?php 
						if (isset($_POST['title_category']))
							{
								echo "liste " . $title . " ajouté!";
							}
						else {
							echo //vide une liste
								"<form method='post' action='user_area.php'>
								<label> vider votre liste</label><br>
								<select name='vider' id='vider'>";
										
																												
										
													
														for ($i=0; $i <count($title_category); $i++)
															{ 
																echo " <option name'select' value=" . $title_category[$i]['id_categories'] .">" . $title_category[$i]['title_category'] ."</option>";
															}
													
											
									echo 
									"</select>
									<input type='submit' value='vider'>
								</form><br>";
									////////////supprime une liste
								echo
								"<form method='post' action='user_area.php'>
								<label> supprimer une liste</label><br>
								<select name='del_list' id='vider'>";
										
																												
										
													
														for ($i=0; $i <count($title_category); $i++)
															{ 
																echo " <option name'select' value=" . $title_category[$i]['id_categories'] .">" . $title_category[$i]['title_category'] ."</option>";
															}
													
											
									echo 
									"</select>
									<input type='submit' value='delete'>
								</form>";	
						}
						if (isset($_POST['vider'])) {
							$del_query="DELETE FROM CATEGORY_CONTENT WHERE id_category=" . $_POST['vider'];
							mysql_query($bdd_name,$del_query); 
						}

						elseif (isset($_POST['del_list'])) {
							$del_query="DELETE FROM CATEGORY_CONTENT WHERE id_category=" . $_POST['del_list'];
							$del_list_query="DELETE FROM CATEGORIES WHERE CATEGORIES.id_categories=" . $_POST['del_list'];
							note_query($del_query);
							note_query($del_list_query);
						}
						

					?>
					
				</div>
				<div class="col-4 slide3">
					<?php echo "<p>liste de film</p>";
						for ($i=0; $i <count($movie_list) ; $i++)
						{
							echo "<p>Liste " . $movie_list[$i]['title_category'] . " : " . $movie_list[$i]['title'] . "</p>";
						}
					 ?>
				</div>
								
									<?php 
						}
					else
						{
							echo "<p>Veuillez vous connecter pour accédér à votre espace personnel: <a href='connexion.php'>connexion</a></p>";
						} 
									?>
					</div>
			
			</section>
			<div class="row">
				<div class="col footer">

				</div>
			</div>

		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>
