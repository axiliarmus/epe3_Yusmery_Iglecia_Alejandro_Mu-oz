<?php
include 'db.php';

// Inicializar variables de filtro
$nombre = "";
$proveedor = "";

// Verificar si se han enviado parámetros de búsqueda
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["nombre"])) {
        $nombre = $_GET["nombre"];
    }
    if (isset($_GET["proveedor"])) {
        $proveedor = $_GET["proveedor"];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menu Vendedor</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Repuestos</h1>
        <form class="form-inline mb-3" method="GET" action="">
            <div class="form-group mr-2">
                <label for="nombre" class="sr-only">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo htmlspecialchars($nombre); ?>">
            </div>
            <div class="form-group mr-2">
                <label for="proveedor" class="sr-only">Proveedor</label>
                <input type="text" class="form-control" id="proveedor" name="proveedor" placeholder="Proveedor" value="<?php echo htmlspecialchars($proveedor); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        <a href="agregar_repuesto.php" class="btn btn-primary mb-3">Agregar Repuesto</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Proveedor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Construir la consulta SQL con los filtros aplicados
                $sql = "SELECT * FROM Repuestos WHERE 1=1";
                
                if (!empty($nombre)) {
                    $sql .= " AND NombreRepuesto LIKE '%" . $conn->real_escape_string($nombre) . "%'";
                }
                if (!empty($proveedor)) {
                    $sql .= " AND Proveedor LIKE '%" . $conn->real_escape_string($proveedor) . "%'";
                }
                
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['RepuestoID']}</td>
                                <td>{$row['NombreRepuesto']}</td>
                                <td>{$row['CantidadStock']}</td>
                                <td>{$row['PrecioUnitario']}</td>
                                <td>{$row['Proveedor']}</td>
                                <td>
                                    <a href='editar_repuesto.php?id={$row['RepuestoID']}' class='btn btn-warning btn-sm'>Editar</a>
                                    <a href='eliminar_repuesto.php?id={$row['RepuestoID']}' class='btn btn-danger btn-sm'>Eliminar</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No hay repuestos disponibles</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
