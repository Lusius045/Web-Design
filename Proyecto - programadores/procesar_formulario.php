<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $dni = $_POST['dni'];
    $trabajo = isset($_POST['trabajo']) ? $_POST['trabajo'] : '';

    $sql = "INSERT INTO usuarios (nombres, apellidos, correo, dni, trabajo) VALUES ('$nombres', '$apellidos', '$correo', '$dni', '$trabajo')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>