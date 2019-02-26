<?php 
session_start();
if (isset($_GET['id_movie']))
	{
		 $_SESSION['id_movie']= $_GET['id_movie'];
	}

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

	<title>Fiche details</title>
	</head>
  	<body>
		<div class="container">
			<div class="row">
				<div class="col header">
					<h1 class="text-center col-12">CINEFA</h1>
					<?php
						include 'header2.php';
						include 'switch.php';
						
						$category_for_user="SELECT title_category,id_categories FROM CATEGORIES WHERE id_user=" . $_SESSION['id_user'];
						$title_category=connexion_query($bdd_name,$category_for_user);
						$category_query= "SELECT * FROM CATEGORIES WHERE 1";
						$category= connexion_query($bdd_name, $category_query);
						$user_query= "SELECT * FROM USERS WHERE 1";
						$users= connexion_query($bdd_name,$user_query);
						if (isset($_POST['note']))
							{
								$insert_query= "INSERT INTO MOVIES_NOTES(id_movie,id_user,note) 
										VALUES(" . $_SESSION['id_movie'] . ", " . $_SESSION['id_user'] . ", " . $_POST['note'] . ")";//ces deux lignes prépare la BDD à recevoir des données via des variables externe
								note_query($insert_query);
							}
	
					?>
					
				</div>
			</div>
			<div class="row box1">
				<div class="col slide1">
					<h2 class="text-center"><?php if (isset($bool)&& $bool==true){echo "Fiche De ". $name_title;} else{echo "Résultat des recherches";} ?></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<?php
					if (isset($_GET['id_movie']) OR isset($_GET['id_actor']) OR isset($_GET['id_director']) OR isset($search))
						{
						
						
							if (isset($bool))// les infos de movie/actor/director sont sauvegarder dans les mêmes variables qui changent selon leur id donc une ligne de code suffit pour les appeler.
							{
								
							
								if ($bool)
									{
										echo "<div class='card' style='width: 18rem;'>" 
										  . $data[0]['image'] .
										  "<div class='card-body'>
										    <p class='card-text'><br> ". $name_title ."<br>Age: ". $age_date . " ans</p></div><div col-4><p>";
								
										if (isset($_GET['id_actor'])) {
												echo "<p>Rôle dans :<br> ";
											}
										elseif (isset($_GET['id_director'])) {
												echo "<p>A réalisé :<br> ";
											}	
										for ($i=0; $i <count($data) ; $i++) { 
										 	
									  	echo $data[$i]['title'] . '<br>';}
									  	echo "</p></div>";


									}
								elseif (isset($search) && $bool==false)//on vérifie si une recherche est lancé
									{
										echo "<p class='text-center'> Acteurs - Films - Réalisateur: </p>";
										for ($i=0; $i <count($data) ; $i++)
											{ 
								 	 			echo "<p class='text-center'>". $data[$i]['name_actor']. " / ". $data[$i]['title'] . " / ". $data[$i]['name'] ."</p>";
								 	 		}
								 	 	/*echo "</p>";
								 	 	echo "<p class='text-center'> Films: </p>";
										for ($i=0; $i <count($data) ; $i++)
											{ 
								 	 			echo "<p class='text-center'>". $data[$i]['title'] ."</p>";
								 	 		}
								 	 	echo "</p>";
								 	 	echo "<p class='text-center'> Réalisateur: </p>";
										for ($i=0; $i <count($data) ; $i++)
											{ 
								 	 			echo "<p class='text-center'>". $data[$i]['name'] ."</p>";
								 	 		}
								 	 	*/echo "</p></div>";
								 	 	//var_dump($data);

								 	}
								
								elseif(!$bool)
									{

										echo "<div class='card' style='width: 18rem;'>" 
										  . $data[0]['image'] .
										  "<div class='card-body'>
										    <p class='card-text'><br> ". $name_title ."<br>Date de sortie: ". $age_date . "<br>Réalisateur: ";
										for ($i=0; $i <count($data) ; $i++) { 
										 	
									  	echo $data[$i]['name'] . '<br>';
									  }
									  echo "Acteurs: ";
									  	for ($i=0; $i <count($data) ; $i++) { 
										 	
									  	echo $data[$i]['name_actor'] . ' ';
									  }
									  	echo "</p></div>";
										 
									  	
										if(isset($_SESSION['id_user']))//si l'utilisateur est connecter il aura l'option lui perméttant de noter et d'ajouter un à ça liste
												{
													echo 
													"<div class='col-4'><p>Attribuer une note à ce film</p>
													<form method='post' action='fiches.php'>
														<input type='number' name='note' placeholder='note entre 1 à 5' max(5) min(1)>																								
																								
														<input type='submit'>
													</form></div>";
													echo 
													"<div class='col-4'><p>Ajouter ce film à votre liste</p>
													<form method='post' action='fiches.php'>
													<select name='favoris' id='favoris'>";
															for($j=0; $j <= count($users); $j++)
																{																	
																	if (isset($_SESSION['id_user']) && $_SESSION['id_user'] == $j)
																		{
																			for ($i=0; $i <count($title_category); $i++)
																				{ 
																					echo " <option name'select' value=" . $title_category[$i]['id_categories'] .">" . $title_category[$i]['title_category'] ."</option>";
																				}
																		}
																}
														echo 
														"</select>
														<input type='submit' value='ajouter'>
													</form></div>";	
												}
											//print_r($data);

														           						       					
									}
							}
						}

					elseif ($_POST['favoris'])
						 {
						 	$insert_query= "INSERT INTO CATEGORY_CONTENT(id_movie,id_category) 
							VALUES(" . $_SESSION['id_movie'] . ", " . $_POST['favoris'] . ")";//ces deux lignes prépare la BDD à recevoir des données via des variables externe
							note_query($insert_query);
						  	echo "<p> requête inséré ! Notation pris en compte! veuillez retourner à <a href='../'>l'accueil</a></p>";
						 }
					else
						{
							
						} 
			//else{echo "des Acteurs</h1>";} 

					?>	
							
				</div>
			

			
			<div class="row">
				<div class="col footer">
					<p class="text-center"></p>
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
	
