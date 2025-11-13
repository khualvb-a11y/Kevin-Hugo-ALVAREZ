<?php include("conexionmat.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Eliminar Materia</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<fieldset>
  <legend>Eliminar Materia</legend>
  
  <form method="post" action="crud_eliminarmat.php">
    <label>Seleccionar Materia a Eliminar:</label>
    <select name="id_materia" required>
      <option value="">-- Selecciona una  materia --</option>
      <?php
      $sql = "SELECT id_materia, nombre,descripcion FROM materias ORDER BY id_materia";
      $resultado = mysqli_query($conexionmat, $sql);
      
      while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<option value='{$fila['id_materia']}'>id_materia: {$fila['id_materia']} - {$fila['nombre']} ({$fila['descripcion']})</option>";
      }
      
      mysqli_close($conexionmat);
      ?>
    </select>
    
    <br><br>
    <input type="submit" name="eliminar" value="Eliminar" onclick="return confirm('¿Estás seguro de que quieres eliminar esta materia?')">
    <a href="index.html">🏠 Regresar</a>
  </form>
</fieldset>
</body>
</html>