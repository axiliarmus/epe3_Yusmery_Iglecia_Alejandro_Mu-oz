<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title text-center">Inicio de Sesión</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        include 'db.php';

                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
                            if (isset($_POST["Correo"]) && isset($_POST["Contraseña"])) {
                                $correo = $_POST["Correo"];
                                $contraseña = $_POST["Contraseña"];

                                // Consulta SQL para buscar al usuario
                                $sql = $conn->prepare("SELECT Correo, Contraseña, Tipo FROM usuarios WHERE Correo = ?");
                                $sql->bind_param("s", $correo);
                                $sql->execute();
                                $sql->store_result();

                                if ($sql->num_rows > 0) {
                                    $sql->bind_result($correo_bd, $contraseña_bd, $tipo);
                                    $sql->fetch();

                                    // Verificar la contraseña
                                    if ($contraseña === $contraseña_bd) {
                                        // Inicio de sesión exitoso, redirigir al menú correspondiente
                                        if ($tipo === 'Administrador') {
                                            header("Location: MenuAdministrador.php");
                                            exit();
                                        } elseif ($tipo === 'Vendedor') {
                                            header("Location: MenuVendedor.php");
                                            exit();
                                        }
                                    } else {
                                        echo "<div class='alert alert-danger'>Correo o contraseña incorrectos.</div>";
                                    }
                                } else {
                                    echo "<div class='alert alert-danger'>Correo o contraseña incorrectos.</div>";
                                }

                                $sql->close();
                            } else {
                                echo "<div class='alert alert-danger'>Por favor, complete ambos campos.</div>";
                            }
                        }
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="Correo">Correo:</label>
                                <input type="text" id="Correo" name="Correo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Contraseña">Contraseña:</label>
                                <input type="password" id="Contraseña" name="Contraseña" class="form-control" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary btn-block">Ingresar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS (opcional, si lo necesitas) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
