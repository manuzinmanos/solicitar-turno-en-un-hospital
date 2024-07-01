<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_completo = $_POST['nombre_completo'];
    $email = $_POST['email'];
    $fecha_turno = $_POST['fecha_turno'];
    $motivo_consulta = $_POST['motivo_consulta'];

    $sql = "INSERT INTO Turnos (nombre_completo, email, fecha_turno, motivo_consulta) VALUES ('$nombre_completo', '$email', '$fecha_turno', '$motivo_consulta')";

    if ($conexion->query($sql) === TRUE) {
        $mensaje = "Turno solicitado correctamente.";
    } else {
        $mensaje = "Error: " . $sql . "<br>" . $conexion->error;
    }

    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Formulario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .blurry-image {
            filter: blur(1px);
            width: 100%; /* Ancho completo */
            max-width: 400px; /* Ancho máximo */
            margin-bottom: 20px; /* Margen inferior */
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($mensaje)) : ?>
            <h2><?php echo $mensaje; ?></h2>
            <img src="hospital.jpg" class="blurry-image">
            <table>
                <tr>
                    <th>Nombre Completo</th>
                    <th>Email</th>
                    <th>Fecha del Turno</th>
                    <th>Motivo de la Consulta</th>
                </tr>
                <tr>
                    <td><?php echo $nombre_completo; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $fecha_turno; ?></td>
                    <td><?php echo $motivo_consulta; ?></td>
                </tr>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>