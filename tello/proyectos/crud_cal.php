<?php include("conexion.php"); 

if (isset($_POST['enviar'])) {
    $id_cal = $_POST['id_cal'];
    $fecha_captura = $_POST['fecha_captura'];
    $id_docente = $_POST['id_docente'];
    $id_materia = $_POST['id_materia'];
    $id_alumno = $_POST['id_alumno'];
    $calificacion= $_POST['calificacion'];

  $sql = "INSERT INTO calificacion (id_cal,fecha_captura,id_docente,id_materia,id_alumno,calificacion) VALUES ('$id_cal', '$fecha_captura','$id_docente','$id_materia','$id_alumno','$calificacion')";
  $resultado = mysqli_query($conexion, $sql);

  if ($resultado) {
    echo "<script>
            alert('calificacion insertada correctamente');
            window.location.href = '../insertarcal.html';
          </script>";
  } else {
    echo "<script>
            alert('Error al insertar');
            window.location.href = '../insertarcal.html';
          </script>";
  }
}
?>
