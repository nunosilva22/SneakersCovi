<?php include('functions.php') ?>

<!DOCTYPE html>
<html>
<head>
	
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="regist.css">
	<title>Registo</title>
    
</head>
<body>
	<div class="top">
		<h2>Registar</h2>
	</div>
<form method="post" action="register.php">
	<?php echo display_error();?>
	
	<div class="input-group">
		<label><b>Utilizador</b></label>
		<input type="text" name="username" value="<?php echo $username; ?>" placeholder="Nome de utilizador..">
	</div>
	<div class="input-group">
		<label><b>Email</b></label>
		<input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email..">
	</div>
	<div class="input-group">
		<label><b>Password</b></label>
		<input type="password" name="password_1" placeholder="Password..">
	</div>
	<div class="input-group">
		<label><b>Confirmar password</b></label>
		<input type="password" name="password_2" placeholder="Repetir password.." >
		
	</div>
	<div class="input-group">
		<button type="submit"  name="register_btn">Registar</button>
	</div>
</form>	
	<div class="container" style="background-color: rgb(178, 177, 177); color: #ffffff; opacity:95%;">
		Já és membro? <a href="../Home.html" style="text-decoration: none">Login</a>
	</div>

</body>
</html>
