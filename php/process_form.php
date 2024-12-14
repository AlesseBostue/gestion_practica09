<?php

$requiredFields = ['user', 'password', 'email', 'gender'];
$missingFields = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = htmlspecialchars(trim($_POST["user"]));
    $pass = htmlspecialchars(trim($_POST["password"]));
    $mail = htmlspecialchars(trim($_POST["email"]));
    $gend = htmlspecialchars(trim($_POST["gender"]));

    foreach($requiredFields as $field) {
        if (empty(trim($_POST[$field] ?? ''))){
            $missingFields[] = $field;
        }
    }

    if (!empty($missingFields)) {
        echo "Los siguientes campos son obligatorios: " . implode(", ", $missingFields);
        $missingFields = [];
        exit;
    }

    // Presentación del mensaje de éxito
    echo "
        <link rel='stylesheet' href='../libs/bootstrap-5.3.3-dist/css/bootstrap.css'>
        <link rel='stylesheet' href='../css/style.css'>
        <div class='container mt-4'>
            <div class='alert alert-success' role='alert'>
                <h4 class='alert-heading'>¡Registro exitoso!</h4>
                <ul class='list-group'>
                    <li class='list-group-item'><strong>Nombre:</strong> $user</li>
                    <li class='list-group-item'><strong>Correo:</strong> $mail</li>
                    <li class='list-group-item'><strong>Contraseña:</strong> $pass</li>
                    <li class='list-group-item'><strong>Género:</strong> " . ($gend == 1 ? 'Masculino' : ($gend == 2 ? 'Femenino' : 'Otros')) . "</li>
                </ul>
                <div class='row center-btn' style='margin: .5rem'>
                    <a href='../index.html' class='btn btn-primary'>volver</a>
                </div>
            </div>
          </div>";
    
}

?>