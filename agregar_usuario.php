<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rut = $_POST["Rut"];
    $correo = $_POST["Correo"];
    $contraseña = $_POST["Contraseña"];
    $tipo = $_POST["Tipo"];

    $sql = "INSERT INTO usuarios (Rut, Correo, Contraseña, Tipo) VALUES ('$rut', '$correo', '$contraseña', '$tipo')";

    if ($conn->query($sql) === TRUE) {
        header("Location: MenuAdministrador.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Agregar Usuario</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="Rut">RUT:</label>
                <input type="text" id="Rut" name="Rut" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Correo">Correo:</label>
                <input type="email" id="Correo" name="Correo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Contraseña">Contraseña:</label>
                <input type="text" id="Contraseña" name="Contraseña" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Tipo">Tipo:</label>
                <input type="text" id="Tipo" name="Tipo" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
</body>
</html>
