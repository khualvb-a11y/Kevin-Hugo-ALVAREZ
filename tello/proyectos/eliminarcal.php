<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Eliminar Calificacion</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<fieldset>
  <legend>Eliminar Calificacion</legend>
  
  <form method="post" action="crud_eliminarcal.php">
    <label>Seleccionar calificacion a Eliminar:</label>
    <select name="id_cal" required>
      <option value="">-- Selecciona una  calificacion --</option>
      <?php
      $sql = "SELECT id_cal, calificacion,fecha_captura FROM calificacion ORDER BY id_cal";
      $resultado = mysqli_query($conexion, $sql);
      
      while ($fila = mysqli_fetch_assoc($resultado)) {
         echo "<option value='{$fila['id_cal']}'>id_cal: {$fila['id_cal']} - {$fila['calificacion']} ({$fila['fecha_captura']})</option>";
      }
      
        
       
         
      
      mysqli_close($conexion);
      ?>
    </select>
    
    <br><br>
    <input type="submit" name="eliminar" value="Eliminar" onclick="return confirm('¿Estás seguro de que quieres eliminar esta calificacion?')">
    <a href="index.html">🏠 Regresar</a>
  </form>
</fieldset>
</body>
</html>