<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Consultar Materia</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<fieldset>
  <legend>Consultar Materia</legend>
  
  <form method="get" action="">
    <label>Seleccionar materai:</label>
    <select name="id_materia" onchange="this.form.submit()" required>
      <option value="">-- Selecciona la materia --</option>
      <?php
      include("conexion.php");
      $sql = "SELECT id_materia,nombre FROM materias ORDER BY nombre";
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
    $id_materia = $_GET['id_materia'];
    $sql = "SELECT * FROM materias WHERE id_materia = '$id_materia'";
    $resultado = mysqli_query($conexion, $sql);
    
    if (mysqli_num_rows($resultado) > 0) {
      $alumno = mysqli_fetch_assoc($resultado);
  ?>
  
  <form>
    <label>ID Materia:</label>
    <input type="number" name="id_materia" value="<?php echo $alumno['id_materia']; ?>" readonly>
    
    <label>Nombre Materia:</label>
    <input type="text" name="nombre" value="<?php echo $alumno['nombre']; ?>" readonly>
    
    <label>Descripción:</label>
    <input type="text" name="descripcion" value="<?php echo $alumno['descripcion']; ?>" readonly>
    
    <label>Creditos</label>
    <input type="number" name="creditos" value="<?php echo $alumno['creditos']; ?>" readonly>
    
    <label>Horas semanales</label>
    <input type="number" name="h_sem" value="<?php echo $alumno['h_sem']; ?>" readonly>
    
    
    
    <a href="consulta.php">🔄 Nueva Selección</a>
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