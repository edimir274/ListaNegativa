<?php
// Carpeta para guardar imágenes
$carpetaImagenes = "imagenes/";
if (!is_dir($carpetaImagenes)) {
    mkdir($carpetaImagenes, 0777, true);
}

// Recibir datos
$nombre = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$sucursal = $_POST['sucursal'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$imagenPath = "";

// Guardar imagen
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
    $imagenNombre = time() . "_" . basename($_FILES["imagen"]["name"]);
    $imagenPath = $carpetaImagenes . $imagenNombre;
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $imagenPath);
}

// Archivo JSON
$archivo = "datos.json";
$datos = [];

// Si ya existen datos, cargarlos
if (file_exists($archivo)) {
    $contenido = file_get_contents($archivo);
    $datos = json_decode($contenido, true) ?? [];
}

// Agregar nuevo registro
$datos[] = [
    "nombre" => $nombre,
    "apellido" => $apellido,
    "sucursal" => $sucursal,
    "descripcion" => $descripcion,
    "imagen" => $imagenPath,
    "fecha" => date("Y-m-d H:i:s")
];

// Guardar nuevamente en JSON
file_put_contents($archivo, json_encode($datos, JSON_PRETTY_PRINT));

echo "Datos guardados correctamente. <a href='ver_datos.php'>Ver datos</a>";
?>
