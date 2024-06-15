<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];
    $proveedor = $_POST["proveedor"];

    $sql = "INSERT INTO Repuestos (NombreRepuesto, CantidadStock, PrecioUnitario, Proveedor) VALUES ('$nombre', '$cantidad', '$precio', '$proveedor')";

    if ($conn->query($sql) === TRUE) {
        header("Location: MenuVendedor.php");
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
    <title>Agregar Repuesto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Agregar Repuesto</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad en Stock:</label>
                <input type="number" id="cantidad" name="cantidad" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio Unitario:</label>
                <input type="number" step="0.01" id="precio" name="precio" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="proveedor">Proveedor:</label>
                <input type="text" id="proveedor" name="proveedor" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
</body>
</html>
