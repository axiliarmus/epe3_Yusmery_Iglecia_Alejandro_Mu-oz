<?php
include 'db.php';

if (isset($_GET["Rut"])) {
    $rut = $_GET["Rut"];

    $sql = "DELETE FROM usuarios WHERE Rut='$rut'";

    if ($conn->query($sql) === TRUE) {
        header("Location: MenuAdministrador.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "RUT no especificado.";
    exit();
}
?>
