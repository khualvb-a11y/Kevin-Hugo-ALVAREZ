<?php include("conexion.php"); 

if (isset($_POST['enviar'])) {
 $id_docente = $_POST['id_docente'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $especialidad = $_POST['especialidad'];
    $telefono = $_POST['telefono'];
    $f_c= $_POST['f_c'];
  
    

  $sql = "INSERT INTO docentes (id_docente,nombre,apellido,especialidad,telefono,f_c) VALUES ('$id_docente', '$nombre', '$apellido', '$especialidad', '$telefono' ,'$f_c')";
  $resultado = mysqli_query($conexion, $sql);

  if ($resultado) {
    echo "<script>
            alert('Docente insertado correctamente');
            window.location.href = '../insertardoc.html';
          </script>";
  } else {
    echo "<script>
            alert('Error al insertar');
            window.location.href = '../insertardoc.html';
          </script>";
  }
}
?>