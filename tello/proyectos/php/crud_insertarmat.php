<?php include("conexion.php"); 

if (isset($_POST['enviar'])) {
    $id_materia = $_POST['id_materia'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $creditos = $_POST['creditos'];
    $h_sem = $_POST['h_sem'];
    

  $sql = "INSERT INTO materias (id_materia,nombre,descripcion,creditos,h_sem) VALUES ('$id_materia', '$nombre', '$descripcion', '$creditos', '$h_sem')";
  $resultado = mysqli_query($conexion, $sql);

  if ($resultado) {
    echo "<script>
            alert('materia insertado correctamente');
            window.location.href = '../insertarmat.html';
          </script>";
  } else {
    echo "<script>
            alert('Error al insertar');
            window.location.href = '../insertarmat.html';
          </script>";
  }
}
?>