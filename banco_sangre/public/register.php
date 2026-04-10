<link rel="stylesheet" href="../assets/style.css">
<form method="POST" action="../controllers/AuthController.php">
    <div class="auth-page">

  <div class="auth-container">

    <h2>Registrarse</h2>

    <form method="POST" action="../controllers/AuthController.php">
      <input type="hidden" name="action" value="register">

      <div class="input-group">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <i class="fa-solid fa-user"></i>
      </div>

      <div class="input-group">
        <input type="email" name="correo" placeholder="Correo electrónico" required>
        <i class="fa-solid fa-envelope"></i>
      </div>

      <div class="input-group">
        <input type="password" name="password" placeholder="Contraseña" required>
        <i class="fa-solid fa-lock"></i>
      </div>

      <div class="input-group">
        <input type="text" name="telefono" placeholder="Teléfono" required>
        <i class="fa-solid fa-phone"></i>
      </div>

      <button type="submit">Registrarse</button>
    </form>

    <a href="login.php">Ya tengo cuenta</a>

  </div>

</div>
</form>