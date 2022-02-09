<?php

session_start();
if(!isset($_SESSION['rol_id'])){
    header('Location: index.php');
}else{
    if($_SESSION['rol_id'] != 1){
        header('Location: index.php');
    }
}
?>

<?php

include "conexion1.php";
error_reporting(0);
session_start();


if(isset($_POST["submit"])){
    $nombre=$_POST["nombre"];
    $paterno=$_POST["paterno"];
    $materno=$_POST["materno"];
    //$username=$_POST["username"];
    $matricula=$_POST["matricula"];
    $password= md5($_POST["password"]);
    $cpassword= md5 ($_POST["cpassword"]);
    $rol_id=$_POST["lst_Dominio"];    
    
    if($password==$cpassword){
        $sql="SELECT * FROM usuarios WHERE matricula='$matricula'";
        $result= mysqli_query($cone, $sql);
        if(!$result->num_rows > 0){
            
            $sql="INSERT INTO usuarios (nombre,paterno,materno,matricula,password,rol_id)
            VALUE ('$nombre', '$paterno', '$materno', '$matricula', '$password','$rol_id')";
            $result=mysqli_query($cone,$sql);
            
            if($result){
                echo "<script>alert('Usuario registrado con éxito')</script>";
                $nombre="";
                $paterno="";
                $materno="";
                $matricula="";
                $_POST["password"]="";
                $_POST["cpassword"]="";
                $rol_id="";
                
            }else{
                echo "<script>alert('Hay un error')</script>";
            }
            
            
        }else{
            echo "<script>alert('El correo ya existe')</script>";
        }
    }else{
            echo "<script>alert('Las contraseñas no coinciden')</script>";        
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
	
	<title>Formulario de registro</title>
    <script type="text/javascript">
      function mayusculas(e){
        e.value = e.value.toUpperCase();
      }
    </script>
</head>
<body style="background: url('CSS//co.png') no-repeat; background-size: cover;">
    
	<div class="container">
		<form action="" method="POST" class="login-matricula">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Registrar usuario</p>
            <h2><a href="menu1.php">MENU</a></h2>
            <div class="input-group">
				<input type="text" onkeyup="mayusculas(this);" required placeholder="Nombre" name="nombre" value="<?php echo $nombre; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" onkeyup="mayusculas(this);" required placeholder="Apellido Paterno" name="paterno" value="<?php echo $paterno; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" onkeyup="mayusculas(this);" required placeholder="Apellido Materno" name="materno" value="<?php echo $materno; ?>" required>
			</div>
			<!--<div class="input-group">
				<input type="text" placeholder="Usuario" name="username" value="<?php echo $username; ?>" required>
			</div>-->
			<div class="input-group">
				<input type="matricula" placeholder="Numero de empleado" name="matricula" value="<?php echo $matricula; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Contraseña" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirmar contraseña" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
            
            <div>
            <select name="lst_Dominio">
            <option value="1">ADMINISTRADOR</option>
            <option value="2">USUARIO</option>
            </select>
            </div>
			<div class="input-group">
				<button name="submit" class="btn">Registrar</button>
			</div>
			
		</form>
	</div>
</body>
</html>