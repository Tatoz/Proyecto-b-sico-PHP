<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM usuarios WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$persona = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['nombre'])  && isset($_POST['email']) ) {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  date_default_timezone_set('America/Bogota');
  $fecha = date("Y-m-d h:i:s a");
  $sql = 'UPDATE usuarios SET nombre=:nombre, email=:email WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':nombre' => $nombre, ':email' => $email, ':id' => $id])) {
    header("Location: index.php");
  }
}
 ?>

<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Actualizar datos</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input value="<?= $persona->nombre; ?>" type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $persona->email; ?>" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Actualizar datos</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>