<?php
require 'db.php';
$message = '';
if (isset ($_POST['nombre'])  && isset($_POST['email']) ) {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $sql = 'INSERT INTO usuarios(nombre, email) VALUES(:nombre, :email)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':nombre' => $nombre, ':email' => $email])) {
    $message = 'Datos insertados correctamente';
  }
}
 ?>

<?php require 'header.php'; ?>
    <div class="container">
        <div class="card mt-5">
        <div class="card-header">
            <h2>Creando persona</h2>
        </div>
        <div class="card-body">
        <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
        <?php endif; ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Crear usuario</button>
                </div>
            </form>
        </div>
        </div>
    </div>
<?php require 'footer.php'; ?>