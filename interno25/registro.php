<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
  </head>
  <body>
    <form class="" action="registro.php" method="post">
      Email:<input type="text" name="email" value=""><br><br>
      Nombre:<input type="text" name="nombre" value=""><br><br>
      Apellidos:<input type="text" name="apellidos" value=""><br><br>
      Contraseña:<input type="password" name="pass" value=""><br><br>
      Vuelve a escribir la contraseña:<input type="password" name="pass2" value=""><br><br>
      <input type="submit" name="Registrarse" value="Registrarse">
    </form>
    <a href="index.php">Iniciar sesion</a><br>
    <?php
    $comprobacion=0;
    if (isset($_POST['email']) && isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['pass']) && isset($_POST['pass2'])) {
      include 'usuario.php';
      $usuario= new Usuario();

      $tabla=$usuario->Comprobaremail($_POST['email']);

      if ($tabla==null) {
        echo "El correo ya esta registrado.";
      }else {
        if ($_POST['pass']==$_POST['pass2']) {
          $resultado=$usuario->Insertarusuario($_POST["nombre"],  $_POST["apellidos"], $_POST["email"], $_POST["pass"]);
          if ($resultado==null) {
            echo "Error";
          }else {
            echo "Nombre: " .$resultado['nombre'] ."<br><br>";
            echo "Apellidos: " .$resultado['apellidos'] ."<br><br>";
            echo "usuario: " .$resultado['email'] ."<br><br>";
            }
          }else {
            echo "<a href='registro.php'>Algo falla, revisa tu contraseña.</a>";
        }
      }


    }
     ?>
  </body>
</html>
