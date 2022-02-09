<?php 
include "conexion1.php";
session_start();
error_reporting(0);

//if(isset($_SESSION["email"])){
  //  header("Location: menu1.html");
//}
if(isset($_GET['cerrar_sesion'])){
	session_unset();

	session_destroy();
}
if(isset($_SESSION['rol_id'])){
	switch($_SESSION['rol_id']){
		case 1:
			header('Location: menu1.php');
		break;
		case 2:
			header('Location: panel.php');
		break;
		default:
	}
}
if(isset($_POST["submit"])){
    $matricula=$_POST["matricula"];
    $password=md5($_POST["password"]);
    
//if(isset($_POST['email']) && isset($_POST['password'])){
//	$email = $_POST['email'];
//	$password =md5($_POST['password']);

	$query = "SELECT * FROM usuarios WHERE matricula='$matricula' AND password='$password'";
    $result= mysqli_query($cone, $query);
	
	//$query->execute(['email' => $email, 'password' => $password]);
	$row = mysqli_fetch_array($result);
	
	//$row = $result->fetch(PDO::FETCH_NUM);
	if($row['rol_id'] == true){//admin
		$rol=$row[6];
		$_SESSION['rol_id'] = $rol;
		switch($_SESSION['rol_id']){
			case 1:
				header('Location: menu1.php');
			break;
			case 2:
				header('Location: panel.php');
			break;
			default:
		}
		
		// validar rol
		//		header('location: menu1.php');
		//}else
		//if($row['rol_id'] == 2){//admin
			// validar rol
		//			header('location: panel.php');
		}
	else{
		// no existe el usuario
		echo "El usuario o contraseña son incorrectos";
	
	}

}


mysqli_free_result($result);
mysqli_close($cone)





?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

	<title>Iniciar sesión</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-matricula">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="matricula" placeholder="Numero de empleado" name="matricula" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Contraseña" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Acceder</button>
			</div>
			<p class="login-register-text">¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a>.</p>
		</form>
	</div>
</body>
</html>