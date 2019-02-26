<?php 
		if (isset($_POST['del_list'])) {
			echo "connexion réussi!<br>";
			echo $_POST['del_list'];
			//var_dump($_POST);
			echo $_POST['vider'];

		}
		elseif (isset($_POST['vider'])) {
			echo "connexion réussi!<br>";
			
			//var_dump($_POST);
			echo $_POST['vider'];

		}
		else{
			echo "connexion échoué. retour à la <a href='user_area.php'>page</a> précédente";
		}
 ?>