<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Programmes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  </head>
  <body>
    <main>
      <h1>Liste des programmes</h1>
			
      <a href="index.php?ctrl=program&act=form">Insérer un nouveau programme</a>
      <table>
        <?php foreach ($programs as $program): ?>
          <tr>
            <td><?= $program->getProgramName() ?></td>
						<td><?= $program->getDuration() ?></td>
            <td>
              <a href="index.php?ctrl=program&act=delete&id=<?= $program->getProgramId() ?>"><i class="fa fa-trash"></i></a>
              <a href="index.php?ctrl=program&act=modForm&id=<?= $program->getProgramId() ?>"><i class="fa fa-pencil"></i></a>
            
            </td>

          </tr>
        <?php endforeach; ?>
      </table>
    </main>
  </body>
</html>