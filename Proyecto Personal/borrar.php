<?php
$archivo = "datos.json";

if (isset($_POST['id'])) {
    $id = (int) $_POST['id'];

    if (file_exists($archivo)) {
        $datos = json_decode(file_get_contents($archivo), true);

        // Verificamos que el índice exista
        if (isset($datos[$id])) {
            unset($datos[$id]);

            // Reindexamos el array para que no queden huecos
            $datos = array_values($datos);

            // Guardamos de nuevo el JSON
            file_put_contents($archivo, json_encode($datos, JSON_PRETTY_PRINT));
        }
    }
}

// Volvemos al listado
header("Location: ver_datos.php");
exit;
?>
