<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Correos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Correos Registrados</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Correo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT correo FROM usuarios";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['correo']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td class='text-center'>No hay correos registrados</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
