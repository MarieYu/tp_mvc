<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Ajout programme</title>
  </head>
  <body>
    <main>
      <h1>Saisir un programme</h1>
      <a href="index.php?ctrl=program&act=indexProg">Retour à la liste des programmes</a>
      <form action="index.php?ctrl=program&act=process" method="post">
        <input type="hidden" name="id" value="<?= $program->getProgramId() ?>">
        <input type="text" name="programName" value="<?= $program->getProgramName() ?>" placeholder="titre du programme">
        <input type="text" name="duration" value="<?= $program->getDuration() ?>" placeholder="durée en min">
        
        Réalisateur <select name="directorId"> 
          <?php foreach ($directors as $director):?>
            <option value="<?= $director->getDirectorId()?>"><?= $director->getDirectorName() ?></option>  
          <?php endforeach; ?>        
        </select>

        <input type="submit" value="envoyer">
      </form>  
    </main>
  </body>
</html>