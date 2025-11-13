<?php include("conexionbd.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Eliminar Alumno</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<fieldset>
  <legend>Eliminar Alumno</legend>
  
  <form method="post" action="php/crud_eliminar.php">
    <label>Seleccionar Alumno a Eliminar:</label>
    <select name="id_alumno" required>
      <option value="">-- Selecciona un alumno --</option>
      <?php
      $sql = "SELECT id_alumno, nombre, apellido FROM alumnos ORDER BY id_alumno";
      $resultado = mysqli_query($conexion, $sql);
      
      while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<option value='{$fila['id_alumno']}'>id_alumno: {$fila['id_alumno']} - {$fila['nombre']} ({$fila['apellido']})</option>";
      }
      
      mysqli_close($conexion);
      ?>
    </select>
    
    <br><br>
    <input type="submit" name="eliminar" value="Eliminar" onclick="return confirm('¿Estás seguro de que quieres eliminar este alumno?')">
    <a href="index.html">🏠 Regresar</a>
  </form>
</fieldset>
</body>
</html>