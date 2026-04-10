<form action="../controllers/guardar_usuario.php" method="POST">

Nombre
<input type="text" name="nombre">

Correo
<input type="email" name="correo">

Password
<input type="password" name="password">

Rol
<select name="rol">

<option value="usuario">Usuario</option>
<option value="admin">Admin</option>

</select>

<button>Guardar</button>

</form>