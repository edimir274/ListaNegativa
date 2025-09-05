<?php
$archivo = "datos.json";
$datos = [];

if (file_exists($archivo)) {
    $contenido = file_get_contents($archivo);
    $datos = json_decode($contenido, true) ?? [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos Guardados</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        img { max-width: 100px; }
    </style>
</head>
<body>
    <h2>Listado de datos enviados</h2>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Sucursal</th>
            <th>Descripción</th>
            <th>Imagen</th>
            <th>Fecha</th>
        </tr>
        <?php foreach ($datos as $fila): ?>
            <tr>
                <td><?= htmlspecialchars($fila['nombre']) ?></td>
                <td><?= htmlspecialchars($fila['apellido']) ?></td>
                <td><?= htmlspecialchars($fila['sucursal']) ?></td>
                <td><?= htmlspecialchars($fila['descripcion']) ?></td>
                <td>
                    <?php if (!empty($fila['imagen'])): ?>
                        <img src="<?= htmlspecialchars($fila['imagen']) ?>" alt="Imagen">
                    <?php endif; ?>
                </td>
                <td><?= $fila['fecha'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="index.php">Volver al formulario</a></p>
</body>
</html>

<?php
$archivo = "datos.json";

// Si el archivo existe lo leemos, si no, inicializamos vacío
$datos = file_exists($archivo) ? json_decode(file_get_contents($archivo), true) : [];
?>

<h2>Lista de registros</h2>
<ul>
<?php foreach ($datos as $index => $dato): ?>
    <li>
        <?php echo "Nombre: " . htmlspecialchars($dato['nombre']) . 
                   " | Apellido: " . htmlspecialchars($dato['apellido']) . 
                   " | Sucursal: " . htmlspecialchars($dato['sucursal']) . 
                   " | Descripción: " . htmlspecialchars($dato['descripcion']); ?>

        <!-- Botón de borrar -->
        <form action="borrar.php" method="post" style="display:inline;">
            <input type="hidden" name="id" value="<?php echo $index; ?>">
            <button type="submit">Borrar</button>
        </form>
    </li>
<?php endforeach; ?>
</ul>
