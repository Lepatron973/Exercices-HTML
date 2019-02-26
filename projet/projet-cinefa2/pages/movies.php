<?php session_start(); ?>
<!doctype html>
<html lang="fr">
	<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../script/style_pages.css">

	<title>CINEFA</title>
	</head>
  	<body>
		<div class="container">
			<div class="row">
				<div class="col header">
					<h1 class="text-center col-12">CINEFA</h1>
					<?php
						include 'header2.php';
						$note=0;
						$id_user= 2;
						$sql_select= "SELECT * FROM MOVIES";
						$data= connexion_query($bdd_name,$sql_select);
						if (isset($_POST['submit']))
							$note+= $_POST['note'];
					?>
					
				</div>
			</div>
			<div class="row box1">
				<div class="col slide1">
					<form name="tri" action="movies.php" method="post">
						<select name="selector" id="pays">
							<option value="trie">non trié</option>
							<option value="trie">tri/note</option>			           
						</select>
						<input class="tri-submit" type="submit" name="tri" value="valider">
					</form>
					<?php
						if (!isset($_POST['selector']))
							{
								for ($i=0; $i < count($data) ; $i++)
									{ 
										echo "<p class='text-center'><a href='fiches.php?id_movie=" . $data[$i]['id_movie'] . "&&title=" . $data[$i]['title'] ."&&release_date=" . $data[$i]['release_date'] . "&&id_director=" . $data[$i]['id_director'] . "'>". $data[$i]['title'] . "</a></p>"; if ($note){echo $note;}
									}
									
									
							}
							else
									{
										$sql_tri= "SELECT *, AVG(note) FROM `MOVIES_NOTES` INNER JOIN MOVIES ON MOVIES_NOTES.id_movie = MOVIES.id_movie GROUP BY title;";
										$data= connexion_query($bdd_name, $sql_tri);
										for ($i=0; $i <count($data) ; $i++)
											{
												echo "<p class='text-center'><a href='fiches.php?id_movie=" . $data[$i]['id_movie'] . "&&title=" . $data[$i]['title'] ."&&release_date=" . $data[$i]['release_date'] . "&&id_director=" . $data[$i]['id_director'] . "'>". $data[$i]['title'] . " note: " . $data[$i]['AVG(note)'] . "</a></p>";
											}
											
									}
						?>				
				</div>
			</div>
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

