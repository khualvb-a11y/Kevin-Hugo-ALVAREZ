<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Modificar Docente</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>
<fieldset>
  <legend>Modificar Docente</legend>
  
  <form method="get" action="">
    <label>Seleccionar Docente:</label>
    <select name="id_docente" onchange="this.form.submit()" required id_docente="id_docente">
      <option value="">-- Selecciona un docente --</option>
      <?php
      include("conexion.php");
      $sql = "SELECT id_docente, nombre FROM docentes ORDER BY nombre";
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
  
  <form method="post" action="crud_modificardoc.php">
    <input type="hidden" name="id_docente" value="<?php echo $alumno['id_docente']; ?>">
    
<label>Clave_Docente</label>
    <input type="number" name="id_docente" value="<?php echo $alumno['id_docente']; ?>" required>
    <label>Nombre docente</label>
    <input type="text" name="nombre" value="<?php echo $alumno['nombre']; ?>" required>
    
    <label>Apellido Docente</label>
    <input type="text" name="apellido" value="<?php echo $alumno['apellido']; ?>" required>
    <label>Especialidad</label>
    <input type="text" name="especialidad" value="<?php echo $alumno['especialidad']; ?>" required>
    <label>Teléfono:</label>
    <input type="tex" name="telefono"  value="<?php echo $alumno['telefono']; ?>" required>
    <br><br>
    <label>Fecha de contratacion</label>
    <input type="date" name="f_c" value="<?php echo $alumno['f_c']; ?>" required>
   
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