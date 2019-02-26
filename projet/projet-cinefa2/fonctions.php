<?php 
function connexion_query($bdd_name,$sql_query)
	{
		$data = array();
		$i=0;
		$bdd_handle= mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
		if ($bdd_handle)
		{
			$bdd_connexion = mysqli_select_db($bdd_handle, $bdd_name);
			if ($bdd_connexion) 
				{
					
					$query= mysqli_query($bdd_handle, $sql_query);
					while ($bdd_array = mysqli_fetch_assoc($query))
					{
						$data[$i]= $bdd_array;
						$i++;	
					}
					return $data;			
				}
			else
				{
					echo $bdd_name ." database not found";
				}
			mysqli_close($bdd_handle);
		}
		
	}
	function note_query($insert_query)
		{
			$data = array();
			$i=0;
			$bdd_name="cinefa";
			$bdd_handle= mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
			if ($bdd_handle)
				{
					$bdd_connexion = mysqli_select_db($bdd_handle, $bdd_name);
					if ($bdd_connexion) 
						{
							 $insert_query;
							$query= mysqli_query($bdd_handle, $insert_query);	
						}
					else
						{
							echo $bdd_name ." database not found";
						}
					mysqli_close($bdd_handle);
				}
		}
function sql_search($bdd_name,$sql_query)
	{
		$data = array();
		$i=0;
		$bdd_handle= mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
		if ($bdd_handle)
		{
			$bdd_connexion = mysqli_select_db($bdd_handle, $bdd_name);
			if ($bdd_connexion) 
				{
					
					$query= mysqli_query($bdd_handle, $sql_query);
					while ($bdd_array = mysqli_fetch_assoc($query))
					{
						$data[$i]= $bdd_array;
						$i++;	
					}
					return $data;			
				}
			else
				{
					echo $bdd_name ." database not found";
				}
			mysqli_close($bdd_handle);
		}
	}

?>