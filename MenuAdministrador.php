<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menu Administrador</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Usuarios</h1>
        <a href="agregar_usuario.php" class="btn btn-primary mb-3">Agregar Usuario</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>RUT</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM usuarios";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['Rut']}</td>
                                <td>{$row['Correo']}</td>
                                <td>{$row['Contraseña']}</td>
                                <td>{$row['Tipo']}</td>
                                <td>
                                    <a href='editar_usuario.php?Rut={$row['Rut']}' class='btn btn-warning btn-sm'>Editar</a>
                                    <a href='eliminar_usuario.php?Rut={$row['Rut']}' class='btn btn-danger btn-sm'>Eliminar</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No hay usuarios disponibles</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

