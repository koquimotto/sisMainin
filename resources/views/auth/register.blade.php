<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
</head>
<body>
    <form action="{{ route('register.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nombres"><br>
        <input type="text" name="surname" placeholder="Apellidos"><br>
        <select name="slc" id="">
            <option value="admin">Admin</option>
            <option value="warehouseman">Almacenero (a)</option>
        </select><br>
        <input type="email" name="email" placeholder="email"><br>
        <input type="password" name="password" placeholder="Contraseña">
        <button type="submit">Registrar</button>
    </form>
</body>
</html>