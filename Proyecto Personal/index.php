<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
</head>
<body>
    <h2>Enviar datos</h2>
    <form action="guardar.php" method="post" enctype="multipart/form-data">
        <label>Nombre: <input type="text" name="nombre" required></label><br><br>
        <label>Apellido: <input type="text" name="apellido" required></label><br><br>
        <label>Sucursal: <input type="text" name="sucursal" required></label><br><br>
        <label>Descripción: <textarea name="descripcion" required></textarea></label><br><br>
        <label>Imagen: <input type="file" name="imagen" accept="image/*" required></label><br><br>
        <button type="submit">Enviar</button>
    </form>

    <p><a href="ver_datos.php">Ver datos guardados</a></p>
</body>
</html>
