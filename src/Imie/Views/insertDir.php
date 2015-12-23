<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Ajout réalisateur</title>
  </head>
  <body>
    <main>
      <h1>Saisir un réalisateur</h1>
      <a href="index.php?ctrl=director&act=indexDir">Retour à la liste des réalisateurs</a>
      <form action="index.php?ctrl=director&act=process" method="post">
        <input type="hidden" name="id" value="<?= $director->getDirectorId() ?>">
        <input type="text" name="directorName" value="<?= $director->getDirectorName() ?>" placeholder="prenom nom">
        <input type="submit" value="envoyer">
      </form>  
    </main>
  </body>
</html>
