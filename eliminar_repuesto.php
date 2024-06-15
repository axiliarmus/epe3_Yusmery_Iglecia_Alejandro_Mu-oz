<?php
include 'db.php';

$id = $_GET["id"];

$sql = "DELETE FROM Repuestos WHERE RepuestoID=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: MenuVendedor.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
