<?php
/* Este código está creando una interfaz de usuario para una aplicación de chat. Inicia una sesión,
incluye un archivo de configuración y comprueba si el usuario ha iniciado sesión comprobando si la
variable de sesión unique_id está configurada. Si el usuario no ha iniciado sesión, lo redirige a la
página de inicio de sesión. Luego incluye un archivo de encabezado y muestra la imagen de perfil, el
nombre y el estado del usuario. También proporciona una barra de búsqueda para buscar otros usuarios
con los que chatear. La interfaz de usuario se crea usando HTML y CSS, y la funcionalidad se
implementa usando JavaScript. */
session_start();
include_once "php/config.php";
if (!isset($_SESSION['unique_id'])) {
  header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Cerrar Sesión</a>
      </header>
      <div class="search">
        <span class="text">Selecciona un usuario para iniciar el chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">

      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>

</html>