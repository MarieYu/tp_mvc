<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Réalisateurs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>
    <main>
      <h1>Liste des réalisateurs</h1>

      <a href="index.php?ctrl=director&act=form">Insérer un nouveau réalisateur</a>
      <table>
        <?php foreach ($directors as $director): ?>
          <tr>
            <td><?= $director->getDirectorName() ?></td>

            <td>
              <a href="index.php?ctrl=director&act=delete&id=<?= $director->getDirectorId() ?>"><i class="fa fa-trash"></i></a>
              <a href="index.php?ctrl=director&act=modForm&id=<?= $director->getDirectorId() ?>"><i class="fa fa-pencil"></i></a>
            </td>

          </tr>
        <?php endforeach; ?>
      </table>
    </main>
  </body>
</html>
