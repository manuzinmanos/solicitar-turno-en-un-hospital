<?php
// Configuración de conexión a la base de datos en 000webhost
$servername = "localhost";
$username = "id20691374_usuario"; // Reemplaza con tu nombre de usuario de MySQL en 000webhost
$password = "Garfield2.0"; // Reemplaza con tu contraseña de MySQL en 000webhost
$dbname = "id20691374_hospital"; // Nombre de la base de datos en 000webhost

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario y validar/sanitizar
$nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$fecha = mysqli_real_escape_string($conn, $_POST['fecha']);
$motivo = mysqli_real_escape_string($conn, $_POST['motivo']);

// Preparar consulta SQL para insertar datos con sentencia preparada
$sql_insert = "INSERT INTO turnos (nombre, email, fecha, motivo) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql_insert);
$stmt->bind_param("ssss", $nombre, $email, $fecha, $motivo);

// Ejecutar consulta preparada para insertar
if ($stmt->execute()) {
    // Consulta de inserción exitosa

    // Preparar consulta SQL para obtener todos los turnos registrados
    $sql_select = "SELECT nombre, motivo, fecha FROM turnos";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        $turnos = array();
        while ($row = $result->fetch_assoc()) {
            $turnos[] = $row;
        }
        // Devolver los datos como JSON
        echo json_encode(array('success' => true, 'turnos' => $turnos));
    } else {
        echo json_encode(array('success' => true, 'turnos' => array())); // No hay datos
    }

} else {
    // Error al ejecutar la consulta preparada
    echo json_encode(array('success' => false, 'error' => "Error al insertar datos: " . $conn->error));
}

// Cerrar consulta preparada y conexión
$stmt->close();
$conn->close();
?>