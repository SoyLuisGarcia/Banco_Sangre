<link rel="stylesheet" href="../assets/style.css">

<div class="login-page">
  <div class="auth-page">

  <div class="auth-container">

    <h2>Iniciar Sesión</h2>

    <form action="../controllers/AuthController.php" method="POST">
      <input type="hidden" name="action" value="login">

      <div class="input-group">
        <input type="email" name="correo" placeholder="Correo electrónico" required>
        <i class="fa-solid fa-envelope"></i>
      </div>

      <div class="input-group">
        <input type="password" name="password" placeholder="Contraseña" required>
        <i class="fa-solid fa-lock"></i>
      </div>

      <button type="submit">Iniciar sesión</button>
    </form>

    <a href="register.php">Registrarse</a>

  </div>

</div>

</form>



