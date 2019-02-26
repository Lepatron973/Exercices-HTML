

<!DOCTYPE html>
<html>
     <head>
          <meta charset="utf-8" />
          <title>titre</title>
          <link rel="stylesheet" type="text/css" href="../script/style3.css">
     </head>

     <body class="conteneur">
    <header class="element">
      <h1>Connexion</h1>
    </header>
        <nav class="element">
      <a class="nav" href="../index.php">Accueil</a>
    
    </nav>
    <article class="formulaire">

      <form method="post" action="user_area.php">
        

            <p>
                <label for="pseudo">Pseudo: </label><br />
                <input type="text" name="pseudo" id="pseudo" />
            </p>
            <p>
                <label for="pass">Mot de passe: </label><br />
                <input type="password" name="pass" id="pass" />
            </p>
            <p>
             <input type="submit" name="submit">
            </p>
      </form>
    </article>   
    </body>
</html>      