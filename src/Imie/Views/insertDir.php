<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Ajout réalisateur</title>
  </head>
  <body>
    <main>
      <h1>Saisir un réalisateur</h1>
      <form action="index.php?ctrl=director&act=insert" method="post">
        <input type="text" name="directorName" placeholder="prenom nom">
        <input type="submit" value="envoyer">
      </form>  
    </main>
  </body>
</html>
