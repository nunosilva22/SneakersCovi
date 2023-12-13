<?php 
session_start();

// ligação à DataBase
$db = mysqli_connect("localhost", "root", "root", "projeto");

$username = "";
$email    = "";
$errors   = array(); 


// chama a função register quando o botão é clicado
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	global $db, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// Verifica se os campos estão preenchidos
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// Cria o registo
	if (count($errors) == 0) {
		$password = $password_1;

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO user (username, email, user_type, password) 
					  VALUES('$username', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location:http://localhost:8888/interface/SneakersCovi/Projeto/Home.html');
		}else{
			$query = "INSERT INTO multi_login (username, email, user_type, password) 
					  VALUES('$username', '$email', 'user', '$password')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['username'] = getUserById($logged_in_user_id); 
			$_SESSION['success']  = "You are now logged in";
			header('location:http://localhost:8888/interface/SneakersCovi/Projeto/Home.html');				
		}
	}
}

function getUserById($id){
	global $db;
	$query = "SELECT * FROM multi_login WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

if (isset($_POST['login_btn'])) {
	login();
}


// LOGIN USER
function login(){
	global $db, $username, $errors;

	$username = e($_POST['username']);
	$password = e($_POST['password']);

	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { 
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location:http://localhost:8888/interface/SneakersCovi/Projeto/Home.html');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location:http://localhost:8888/interface/SneakersCovi/Projeto/Home.html');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

?>