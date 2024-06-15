<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rut = $_POST["Rut"];
    $correo = $_POST["Correo"];
    $contraseña = $_POST["Contraseña"];
    $tipo = $_POST["Tipo"];

    $sql = "UPDATE usuarios SET Correo='$correo', Contraseña='$contraseña', Tipo='$tipo' WHERE Rut='$rut'";

    if ($conn->query($sql) === TRUE) {
        header("Location: MenuAdministrador.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    if (isset($_GET["Rut"])) {
        $rut = $_GET["Rut"];
        $sql = "SELECT * FROM usuarios WHERE Rut='$rut'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "No se encontró el usuario.";
            exit();
        }
    } else {
        echo "RUT no especificado.";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Usuario</h1>
        <form action="" method="post">
            <input type="hidden" name="Rut" value="<?php echo $row['Rut']; ?>">
            <div class="form-group">
                <label for="Correo">Correo:</label>
                <input type="email" id="Correo" name="Correo" class="form-control" value="<?php echo $row['Correo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="Contraseña">Contraseña:</label>
                <input type="text" id="Contraseña" name="Contraseña" class="form-control" value="<?php echo $row['Contraseña']; ?>" required>
            </div>
            <div class="form-group">
                <label for="Tipo">Tipo:</label>
                <input type="text" id="Tipo" name="Tipo" class="form-control" value="<?php echo $row['Tipo']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
