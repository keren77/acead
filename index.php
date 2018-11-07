<?php
  include 'php/conexion.php';
  session_start();
  $intento=1;
  $consulta="SELECT valor FROM TBL_Parametros WHERE Parametro='ADMIN_INTENTOS_INVALIDOS'";
  $stmt = $mysqli->query($consulta);
  if($row=mysqli_fetch_array($stmt)){
    $intento=$row['valor'];
  }
  if(!isset($_GET['error'])){
      $error=0;
  }else{
    $error=$_GET['error'];
  }
  $r=false;
  if(isset($_SESSION['intentos'])&&$_SESSION['intentos']==$intento){
    $r=true;
  }

if((isset($_SESSION['id'])) && ($_SESSION['estado'] == 3)) {
    header("Location: home.php");
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/logo_mini.jpg">

    <title>Entrar</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  </head>

  <body class="text-center">
    <div class="form-signin">
    <form action="php/validar.php" method="post">
      <a href="index.html"><img class="mb-2" src="img/logo_inicio.jpg" alt="" width="80" height="100"></a>
      <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
      <label  class="sr-only">Codigo</label>
      <input type="text" id="user" name="user" class="form-control" placeholder="USER" maxlength="10" minlength="5"  style="text-transform:uppercase" autofocus="" required>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="pass" name="pass" class="form-control" placeholder="PASSWORD" maxlength="20" minlength="8" value="" autocomplete="off" required>
      <div class="checkbox mb-3">
        <label>
          <input id="verpass" type="checkbox" value="remember-me"> Ver Password
        </label>
      </div>
      <?php if($error==1){ ?>
      <label style="color: red;">Datos incorrectos</label>
      <?php } ?>
      <?php if($error==2){ ?>
      <label style="color: red;">Su usuario esta bloqueado o inactivo, favor comuniquese con el administrador</label>
      <?php } ?>
      <?php if($r){ ?>
      <label style="color: red;">A sobrepasado los intentos permitidos</label>
      <?php } ?>
      <button class="btn btn-lg btn-primary btn-block" id="btnEntrar" type="submit" <?php if($r){ ?> disabled="true" <?php  } ?> >Entrar</button>
      <button type="button" class="btn btn-link"><a href="recuperar.php">¿Olvidaste tu usuario y/o contraseña?</a></button>
      <button type="button" class="btn btn-link"><a href="RegistroPersonal.php">REGISTRATE</a></button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
      </form>
    </div>
    <script src="js/controlador.js"></script>
  </body>
</html>
