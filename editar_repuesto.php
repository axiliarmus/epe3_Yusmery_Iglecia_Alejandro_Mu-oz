<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];
    $proveedor = $_POST["proveedor"];

    $sql = "UPDATE Repuestos SET NombreRepuesto='$nombre', CantidadStock='$cantidad', PrecioUnitario='$precio', Proveedor='$proveedor' WHERE RepuestoID=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: MenuVendedor.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $id = $_GET["id"];
    $sql = "SELECT * FROM Repuestos WHERE RepuestoID=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Repuesto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Repuesto</h1>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $row['RepuestoID']; ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $row['NombreRepuesto']; ?>" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad en Stock:</label>
                <input type="number" id="cantidad" name="cantidad" class="form-control" value="<?php echo $row['CantidadStock']; ?>" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio Unitario:</label>
                <input type="number" step="0.01" id="precio" name="precio" class="form-control" value="<?php echo $row['PrecioUnitario']; ?>" required>
            </div>
            <div class="form-group">
                <label for="proveedor">Proveedor:</label>
                <input type="text" id="proveedor" name="proveedor" class="form-control" value="<?php echo $row['Proveedor']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
