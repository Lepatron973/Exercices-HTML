<?php
	switch (isset($_GET)) 
		{
			case isset($_GET['id_actor']):

				$id=$_GET["id_actor"];
				$name_title= $_GET['name'];
				$age_date= $_GET['age'];
				//$director= $_GET['id_director'];
				$bool=1;
				$sql_select= "SELECT title,ACTORS.image FROM MOVIES 
				INNER JOIN PLAYS ON MOVIES.id_movie = PLAYS.id_movie
				INNER JOIN ACTORS ON PLAYS.id_actor = ACTORS.id_actor
				WHERE PLAYS.id_actor= $id LIMIT 3";
				$data= connexion_query($bdd_name, $sql_select);	
				break;

			case isset($_GET['name']):

				$id=$_GET["id_director"];
				$name_title= $_GET['name'];
				$age_date= $_GET['age'];
				//$director= $_GET['id_director'];
				$bool=1;
				$sql_select= "SELECT title,DIRECTOR.image FROM MOVIES 
				INNER JOIN DIRECTOR ON MOVIES.id_director = DIRECTOR.id_director
				WHERE MOVIES.id_director=$id LIMIT 3";
				$data= connexion_query($bdd_name, $sql_select);						
				break;

			case isset($_GET['id_movie']):

				$id=$_GET["id_movie"];
				$name_title= $_GET['title'];
				$age_date= $_GET['release_date'];
				$director= $_GET['id_director'];
				$bool=0;
				$sql_select= "SELECT DIRECTOR.name,title,ACTORS.name_actor,MOVIES.image
								FROM MOVIES
								INNER JOIN DIRECTOR ON MOVIES.id_director = DIRECTOR.id_director
								INNER JOIN PLAYS ON MOVIES.id_movie = PLAYS.id_movie
								INNER JOIN ACTORS ON PLAYS.id_actor =  ACTORS.id_actor
								WHERE MOVIES.id_movie =" . $id;
				$data= connexion_query($bdd_name, $sql_select);
				//$data= connexion_query($bdd_name, $sql_select2);
				break;

			case isset($_GET['search_actor']):

				$search= $_GET['search_actor'];
				$i=0;
				$sql_search="SELECT * FROM ACTORS WHERE name LIKE '$search%'";
				$data= sql_search($bdd_name, $sql_search);
				foreach ($data as $key => $value)
					{
							foreach ($value as $cle => $valeur)
							{
								$data[$i]= $valeur;$i++;
							}
					}
				//var_dump($data);
				$bool=0;	
				break;

				case isset($_GET['search']):

				$search= $_GET['search'];
				$i=0;
				$sql_search="SELECT ACTORS.name_actor,title,DIRECTOR.name
									FROM DIRECTOR
									INNER JOIN MOVIES ON DIRECTOR.id_director = MOVIES.id_director
									INNER JOIN PLAYS ON MOVIES.id_movie = PLAYS.id_movie
									INNER JOIN ACTORS ON PLAYS.id_actor = ACTORS.id_actor
									WHERE name LIKE '$search%' OR name_actor LIKE '$search%' OR title LIKE '$search%'";
 
				$data= sql_search($bdd_name, $sql_search);
				
				$bool=0;	
				break;

				case isset($_GET['search_movie']):

				$search= $_GET['search_movie'];
				$i=0;
				$sql_search="SELECT * FROM MOVIES WHERE title LIKE '$search%'";
				$data= sql_search($bdd_name, $sql_search);
				foreach ($data as $key => $value)
					{
							foreach ($value as $cle => $valeur)
							{
								$data[$i]= $valeur;$i++;
							}
					}
				$bool=0;	
				break;

			default:
				"Pas de super-global GET ";
				break;
		}
	/*if(isset($_SESSION['id_user']))
		{
			$select_query="SELECT * FROM CATEGORIES WHERE id_user='" . $_SESSION['id_user'] . "'";	
			$data= connexion_query($bdd_name,$select_query);
		}*/
?>
