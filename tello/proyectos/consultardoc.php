<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Consultar Docente</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<fieldset>
  <legend>Consultar Docente</legend>
  
  <form method="get" action="">
    <label>Seleccionar docente:</label>
    <select name="id_docente" onchange="this.form.submit()" required>
      <option value="">-- Selecciona el docente --</option>
      <?php
      include("conexionbd.php");
      $sql = "SELECT id_docente,nombre FROM docentes ORDER BY nombre";
      $resultado = mysqli_query($conexion, $sql);
      while ($fila = mysqli_fetch_assoc($resultado)) {
        $selected = (isset($_GET['id_docente']) && $_GET['id_docente'] == $fila['id_docente']) ? 'selected' : '';
        echo "<option value='{$fila['id_docente']}' $selected>{$fila['id_docente']} - {$fila['nombre']}</option>";
      }
      ?>
    </select>
  </form>
  
  <br>
  
  <?php
  if (isset($_GET['id_docente'])) {
    $id_docente = $_GET['id_docente'];
    $sql = "SELECT * FROM docentes WHERE id_docente = '$id_docente'";
    $resultado = mysqli_query($conexion, $sql);
    
    if (mysqli_num_rows($resultado) > 0) {
      $alumno = mysqli_fetch_assoc($resultado);
  ?>
  
  <form>
    <label>Clave Docente:</label>
    <input type="number" name="id_docente" value="<?php echo $alumno['id_docente']; ?>" readonly>
    
    <label>Nombre Docente:</label>
    <input type="text" name="nombre" value="<?php echo $alumno['nombre']; ?>" readonly>
    
    <label>Apellido Docente</label>
    <input type="text" name="apellido" value="<?php echo $alumno['apellido']; ?>" readonly>
    
    <label> Especialidad</label>
    <input type="text" name="especialidad" value="<?php echo $alumno['especialidad']; ?>" readonly>

    <label>Teléfono:</label>
    <input type="tel" name="telefono" value="<?php echo $alumno['telefono']; ?>" readonly>
    
    <label>Fecha de contratacion</label>
    <input type="date" name="f_c" value="<?php echo $alumno['f_c']; ?>" readonly>
    
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