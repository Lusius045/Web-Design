<?php
// verifica si el formulario se envió
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // esto agarra los datos que se pusieron en el formulario
    $nombres = htmlspecialchars(trim($_POST["nombres"]));
    $apellidos = htmlspecialchars(trim($_POST["apellidos"]));
    // filter sanitize es para que los datos no se manden con cosas invalidas (letras en el int o caracteres en email)
    $correo = filter_var(trim($_POST["correo"]), FILTER_SANITIZE_EMAIL);
    $dni = filter_var(trim($_POST["dni"]), FILTER_SANITIZE_NUMBER_INT);

    // si estan vacios deja un mensaje
    if (empty($nombres) || empty($apellidos) || empty($correo) || empty($dni)) {
        echo "Todos los campos son obligatorios.";
        exit();
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "Correo electrónico no válido.";
        exit();
    }

    // esto verifica los checks
    $trabajos = isset($_POST['berries']) ? $_POST['berries'] : [];

    // agrega los trabajos o pone ninguno en caso de que no haya ninguno
    if (!empty($trabajos)) {
        // esto hace que si se agarran mas de un trabajo se guarden los tres y se separen por una coma, porque todos estan guardados en un vector
        $trabajos_sel = implode(", ", $trabajos);
    } else {
        $trabajos_sel = "Ninguno";
    }

    // guarda los datos y dice que el formulario se envió 


    // echo muestra texto en pantalla (como un write) y los que tienen $ son variables, el br es para que el siguiente se escriba abajao
    echo "Nombre: $nombres<br>";
    echo "Apellido: $apellidos<br>";
    echo "Correo: $correo<br>";
    echo "DNI: $dni<br>";
    echo "Trabajos seleccionados: $trabajos_sel<br>";
    echo "Formulario enviado correctamente.";
}
?>