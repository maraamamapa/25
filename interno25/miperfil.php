<?php
include 'seguridad.php';
$sesion=new Seguridad();
if (isset($_SESSION['usuario'])==false) {
  header('location: index.php');
}else {
  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Mi perfil</title>
    </head>
    <body>
      <form class="" action="miperfil.php" method="post">
        <?php
          include 'usuario.php';
          $perfil=new Usuario();

          $formperfil=$perfil->MiPerfil($_SESSION['usuario']);
          foreach ($formperfil as $fila) {
            echo "<input type='text' name='email' value='".$fila['email']."' readonly><br><br>";
            echo "<input type='text' name='nombre' value='".$fila['nombre']."'><br><br>";
            echo "<input type='text' name='apellidos' value='".$fila['apellidos']."'><br><br>";
            echo "<input type='text' name='rol' value='".$fila['rol']."' readonly><br><br>";
          }
         ?>
         <select class="" name="roles">
          <option value="CAMBIAR ROL">CAMBIAR ROL</option>
          <option value= "user">USUARIO</option>
          <option value= "superAdmin">SUPER USUARIO</option>
          <option value="ADMIN">ADMINISTRADOR</option>
          <option value= "usuarioVIP">USUARIO VIP</option>
          <option value= "usuarioEmpresa">USUARIO EMPRESA</option>

         </select>
         <br><br>
         <input type="submit" name="actualizar" value="Actualizar">
      </form>
      <?php
      if((isset($_POST['email'])) && (!empty($_POST['email'])) &&
            (isset($_POST['nombre'])) && (!empty($_POST['nombre'])) &&
            (isset($_POST['apellidos'])) && (!empty($_POST['apellidos']))&&
      (isset($_POST['roles'])) && (!empty($_POST['roles']))) {
      $actualizarperfil=$perfil->ActualizarMiPerfil($_POST['email'], $_POST['nombre'], $_POST['apellidos'], $_POST['roles']);

    }
      ?>
    </body>
  </html>
  <?php
}

 ?>
