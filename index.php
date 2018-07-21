<?php require 'db.php'; 
$sql = 'SELECT * FROM usuarios';
$statement = $connection->prepare($sql);
$statement->execute();
$usuarios = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<?php require 'header.php'; ?>
    <div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Lista de Usuarios</h2>
            <!-- Añadi este comentario como prueba !-->
            <!-- Añadi este comentario como prueba en bash!-->
            <!-- Añadi este comentario como prueba en editor github!-->
             <!-- Añadi este comentario como prueba en editor github para sourcetree!-->
              <!-- sdsdsd-->
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Password</th>
                <th>Acción</th>
                </tr>
                <tr>
                <?php foreach($usuarios as $person): ?>
                <td><?= $person->id; ?></td>
                <td><?= $person->nombre; ?></td>
                <td><?= $person->email; ?></td>
                <td><?= $person->pass; ?></td>
                <td>
                <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Editar</a>
                <a onclick="return confirm('Seguro que quieres borrar a este usuario?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Eliminar</a>
                </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    </div>
<?php require 'footer.php'; ?>


