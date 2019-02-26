<?php 
session_start();
require_once '../configuration/identifiant.php';
include '../fonctions.php';
$select_query="SELECT pseudo,mail FROM `USERS` WHERE 1";
$bdd_name= 'cinefa';
$data= connexion_query($bdd_name,$select_query);

?>
 <!DOCTYPE html>
<html>
     <head>
          <meta charset="utf-8" />
          <title>titre</title>
          <link rel="stylesheet" type="text/css" href="../script/style3.css">
     </head>

     <body class="conteneur">
     
    <header class="element">
      <h1>Inscription</h1>
    </header>
        <nav class="element">
      <a class="nav" href="../index.php">Accueil</a>
    </nav>
    <article class="formulaire">
 
<?php
//If form not submitted, display form.
if (!isset($_POST['submit']))
  {
    ?>
     
    <form method="post" action="inscription.php">
                    <p>
                        <label for="pseudo">Pseudo: </label><br />
                        <input type="text" name="pseudo" id="pseudo" required />
                   </p>
                   <p>
                        
                         <label for="address">Adresse: </label><br />
                         <input type="text" name="address" id="address" required />
                   </p>

                   
                   <p>
                        <label for="mail">Mail: </label><br />
                        <input type="text" name="mail" id="mail" required />
                   </p>
                   <p>
                        <label for="phone">Téléphone: </label><br />
                        <input type="number" name="phone" id="phone" required />
                   </p>
                   <p>
                        <label for="pass">Mot de passe: </label><br />
                        <input type="password" name="pass" id="pass" required />
                   </p>
                   <p>
              <input type="submit" name="submit" value="Valider" />
            </p>


    </form>
    </article>
   
  <?php
  //If form submitted, process input.
  }
  
  else{
   $_SESSION['pseudo']= $_POST['pseudo'];
   $_SESSION['pass']= $_POST['pass'];
   $password= sha1($_POST['pass']);

  //Retrieve string from form submission.
          $insert_query= 'INSERT INTO USERS(pseudo,address,mail,phone,password) 
            VALUES("'. $_POST['pseudo'] . '","' . $_POST['address'] . '","' . $_POST['mail'] . '","' . $_POST['phone'] . '","' . $password . '")';
          echo "Bien joué maintenant connecte toi pour accéder au quiz<a href='connexion.php'> clique ici</a>";
          note_query($insert_query); 
  }
  ?>
 
</body>
</html>