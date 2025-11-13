<DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Consultar calificacion</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<fieldset>
  <legend>Consultar Calificacion</legend>
  
  <form method="get" action="">
    <label>Seleccionar calificacion:</label>
    <select name="id_cal" onchange="this.form.submit()" required>
      <option value="">-- Selecciona la calificacion --</option>
      <?php
      include("conexion.php");
      $sql = "SELECT id_cal,calificacion FROM calificacion ORDER BY calificacion";
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
  
  <form>
    <label>id_calificacion:</label>
    <input type="number" name="id_cal" value="<?php echo $alumno['id_cal']; ?>" readonly>
    
    <label>fecha_calificacion</label>
    <input type="date" name="fecha_captura" value="<?php echo $alumno['fecha_captura']; ?>" readonly>
    
    <label>clave_docente:</label>
    <input type="number" name="id_docente" value="<?php echo $alumno['id_docente']; ?>" readonly>

    <label>id_materia:</label>
    <input type="number" name="id_materia" value="<?php echo $alumno['id_materia']; ?>" readonly>

     <label>id_alumno:</label>
    <input type="number" name="id_alumno" value="<?php echo $alumno['id_alumno']; ?>" readonly> 

    <label>Calificacion:</label>
    <input type="number" name="calificacion" value="<?php echo $alumno['calificacion']; ?>" readonly>

    <a href="consultacal.php">🔄 Nueva Selección</a>
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