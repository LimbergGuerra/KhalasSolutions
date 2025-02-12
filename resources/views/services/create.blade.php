<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Servicio</title>
</head>
<body>
    <h1>Crear Nuevo Servicio</h1>
    <form action="{{ route('admin.services.store') }}" method="POST">
        @csrf
        <label for="name">Nombre del Servicio:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description" rows="5"></textarea>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
