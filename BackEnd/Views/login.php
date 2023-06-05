<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in | Tu Promesa</title>

  <link rel="shortcut icon" href="../Util/img/Logo.jpeg" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../Util/css/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Util/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="../Util/img/Logo.jpeg" class="profile-user-img img-fluid img-circle" alt="">
    <a href="../index.html"><b>Tu</b>PROMESA</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Incio Sesion</p>

      <form id="form-login">
        <div class="input-group mb-3">
          <input id="user" type="text" class="form-control" placeholder="User" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="pass" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="social-auth-links text-center mb-3">
            <button type="Submit" href="" class="btn btn-block btn-primary">
                Iniciar Sesion
            </button> 
        </div>
      </form>


      <p class="mb-1">
        <a href="">Olvide mi contrasena</a>
      </p>
      <p class="mb-0">
        <a href="" class="text-center">Registrarse</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../Utl/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../Utl/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../Utl/js/adminlte.min.js"></script>

<script src="login.js"></script>
</body>
</html>
