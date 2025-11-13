<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Modificar Materia</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<fieldset>
  <legend>Modificar  materia</legend>
  
  <form method="get" action="">
    <label>Seleccionar materia:</label>
    <select name="id_materia" onchange="this.form.submit()" required id_materia="id_materia">
      <option value="">-- Selecciona una materia --</option>
      <?php
      include("conexion.php");
      $sql = "SELECT id_materia, nombre FROM materias ORDER BY nombre";
      $resultado = mysqli_query($conexion, $sql);
      while ($fila = mysqli_fetch_assoc($resultado)) {
        $selected = (isset($_GET['id_materia']) && $_GET['id_materia'] == $fila['id_materia']) ? 'selected' : '';
        echo "<option value='{$fila['id_materia']}' $selected>{$fila['id_materia']} - {$fila['nombre']}</option>";
      }
      ?>
    </select>
  </form>
  
  <br>
  
  <?php
  if (isset($_GET['id_materia'])) {
    $id_materia= $_GET['id_materia'];
    $sql = "SELECT * FROM materias WHERE id_materia = '$id_materia'";
    $resultado = mysqli_query($conexion, $sql);
    
    if (mysqli_num_rows($resultado) > 0) {
      $alumno = mysqli_fetch_assoc($resultado);
  ?>
  
  <form method="post" action="crud_modificarmat.php">
    <input type="hidden" name="id_materia" value="<?php echo $alumno['id_materia']; ?>">
    
<label>id_materia</label>
    <input type="number" name="id_materia" value="<?php echo $alumno['id_materia']; ?>" required>
    <label>nombre_materia</label>
    <input type="text" name="nombre" value="<?php echo $alumno['nombre']; ?>" required>
    
    <label>descripcion</label>
    <input type="text" name="descripcion" value="<?php echo $alumno['descripcion']; ?>" required>
    <label>creditos</label>
    <input type="number" name="creditos" value="<?php echo $alumno['creditos']; ?>" required>
    <label>horas_semana</label>
    <input type="number" name="h_sem" value="<?php echo $alumno['h_sem']; ?>" required>
    <input type="submit" name="actualizar" value="Actualizar">
    <a href="modificarmat.php">🔄 Nueva Selección</a>
    <a href="index.html">🏠 Regresar</a>
  </form>
  
  <?php
    }
    mysqli_close($conexion);
  }
  ?>
  
</fieldset>
</body>
</html>