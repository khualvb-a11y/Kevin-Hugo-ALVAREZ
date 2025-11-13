<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Modificar Cakificacion</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<fieldset>
  <legend>Modificar Calificacion</legend>
  
  <form method="get" action="">
    <label>Seleccionar la calificacion:</label>
    <select name="id_cal" onchange="this.form.submit()" required id_cal="id_cal">
      <option value="">-- Selecciona una calificacion --</option>
      <?php
      include("conexion.php");
      $sql = "SELECT id_cal, calificacion FROM calificacion ORDER BY calificacion";
      $resultado = mysqli_query($conexion, $sql);
      while ($fila = mysqli_fetch_assoc($resultado)) {
        $selected = (isset($_GET['id_cal']) && $_GET['id_cal'] == $fila['id_cal']) ? 'selected' : '';
        echo "<option value='{$fila['id_cal']}' $selected>{$fila['id_cal']} - {$fila['calificacion']}</option>";
      }
      ?>
    </select>
  </form>
  
  <br>
  
  <?php
  if (isset($_GET['id_cal'])) {
    $id_cal = $_GET['id_cal'];
    $sql = "SELECT * FROM calificacion WHERE id_cal = '$id_cal'";
    $resultado = mysqli_query($conexion, $sql);
    
    if (mysqli_num_rows($resultado) > 0) {
      $alumno = mysqli_fetch_assoc($resultado);
  ?>
  
  <form method="post" action="crud_modificarcal.php">
    <input type="hidden" name="id_cal" value="<?php echo $alumno['id_cal']; ?>">
    
<
    <label>id_calificacion:</label>
    <input type="number" name="id_cal" value="<?php echo $alumno['id_cal']; ?>" required>

        <label>id_docente:</label>
    <input type="number" name="id_docente" value="<?php echo $alumno['id_docente']; ?>" required>

    <label>id_materia:</label>
    <input type="number" name="id_materia" value="<?php echo $alumno['id_materia']; ?>"required >
    
    <label>id_alumno:</label>
    <input type="number" name="id_alumno" value="<?php echo $alumno['id_alumno']; ?>" required> 
    
    <label>calificacion:</label>
    <input type="number" name="calificacion" value="<?php echo $alumno['calificacion']; ?>" required>
    
    <input type="submit" name="actualizar" value="Actualizar">
    <a href="modicardoc.php">🔄 Nueva Selección</a>
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