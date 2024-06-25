
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Solicitud</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo CSS -->
</head>
<body>
    <div class="container">
        <h2>Confirmación de Solicitud</h2>
        
        <!-- Mostrar la tabla de turnos -->
        <h3>Historial de Turnos</h3>
        <table>
            <thead>
                <tr>
                    <th>Nombre Completo</th>
                    <th>Email</th>
                    <th>Fecha Deseada</th>
                    <th>Motivo de Consulta</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta SQL para obtener los turnos del usuario
                $sql = "SELECT nombre, email, fecha, motivo FROM turnos WHERE email = '$email'"; // $email debe ser la variable que contiene el email del usuario

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Mostrar los datos en la tabla
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nombre'] . "</td>";
                        echo "<td>" . $row['mail'] . "</td>";
                        echo "<td>" . $row['fecha'] . "</td>";
                        echo "<td>" . $row['motivo'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No se encontraron turnos para este usuario.</td></tr>";
                }

                // Cerrar conexión
                $conn->close();
                ?>
            </tbody>
        </table>
        
    </div>
</body>
</html>