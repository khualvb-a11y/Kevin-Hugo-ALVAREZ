<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Modificar Alumno</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<fieldset>
  <legend>Modificar  Alumno</legend>
  
  <form method="get" action="">
    <label>Seleccionar Alumno:</label>
    <select name="id_alumno" onchange="this.form.submit()" required id_alumno="id_alumno">
      <option value="">-- Selecciona un alumno --</option>
      <?php
      include("conexion.php");
      $sql = "SELECT id_alumno, nombre FROM alumnos ORDER BY nombre";
      $resultado = mysqli_query($conexion, $sql);
      while ($fila = mysqli_fetch_assoc($resultado)) {
        $selected = (isset($_GET['id_alumno']) && $_GET['id_alumno'] == $fila['id_alumno']) ? 'selected' : '';
        echo "<option value='{$fila['id_alumno']}' $selected>{$fila['id_alumno']} - {$fila['nombre']}</option>";
      }
      ?>
    </select>
  </form>
  
  <br>
  
  <?php
  if (isset($_GET['id_alumno'])) {
    $id_alumno = $_GET['id_alumno'];
    $sql = "SELECT * FROM alumnos WHERE id_alumno = '$id_alumno'";
    $resultado = mysqli_query($conexion, $sql);
    
    if (mysqli_num_rows($resultado) > 0) {
      $alumno = mysqli_fetch_assoc($resultado);
  ?>
  
  <form method="post" action="php/crud_modificar.php">
    <input type="hidden" name="id_alumno" value="<?php echo $alumno['id_alumno']; ?>">
    
<label>id_alumno</label>
    <input type="number" name="id_alumno" value="<?php echo $alumno['id_alumno']; ?>" required>
    <label>nombre</label>
    <input type="text" name="nombre" value="<?php echo $alumno['nombre']; ?>" required>
    
    <label>apellido</label>
    <input type="text" name="apellido" value="<?php echo $alumno['apellido']; ?>" required>
    <label>fecha_na</label>
    <input type="date" name="fecha_na" value="<?php echo $alumno['fecha_na']; ?>" required>
    <label>direccion</label>
    <input type="text" name="direccion" value="<?php echo $alumno['direccion']; ?>" required>
    
    <label>Teléfono:</label>
    <input type="tel" name="telefono" value="<?php echo $alumno['telefono']; ?>" pattern="\d{10}" required>
    <label>email</label>
    <input type="text" name="email" value="<?php echo $alumno['email']; ?>" required>
    <label>sexo</label>
    <input type="text" name="sexo" value="<?php echo $alumno['sexo']; ?>" required>

    <input type="submit" name="actualizar" value="Actualizar">
    <a href="modificar.php">🔄 Nueva Selección</a>
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