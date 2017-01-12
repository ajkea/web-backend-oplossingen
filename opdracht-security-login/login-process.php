<?php
#functie om in te loggen
###########################

if (isset($_COOKIE['login']))
{
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'dashboard.php';
	header("Location: http://$host$uri/$extra");
	exit;
}

function login(){

		createCookieLogin();
		$selectUser = "SELECT salt, hashed_password FROM users WHERE email = :email";
		$db = new PDO("mysql:host=localhost;dbname=opdracht-security-login",'root','');
		$email = $_SESSION['email'];
		$controlLogin = $db->prepare($selectUser);
		$controlLogin->bindValue(':email',$_SESSION['email']);
		$controlLogin->execute();
		$saltDatabase = $controlLogin->fetchColumn();
		$hashed_password = $controlLogin->fetch(PDO::FETCH_ASSOC);

		$arrayCookie =  explode(',',$_COOKIE['login']);

		if($saltDatabase = $arrayCookie[1]){
			$_SESSION['notification'] = "Je email adres is niet teruggevonden in de database.";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'dashboard.php';
		header("Location: http://$host$uri/$extra");
		exit;
		}
		else
		{
			$_SERVER['notification'] = "Je paswoord en emailadres komen niet overeen, probeer het opnieuw.";
		}
	}

function passwordEncrypt(){
	$saltPassword = $_SESSION['password'] . uniqid(mt_rand(), true);
	$_SESSION['saltPassword'] = $saltPassword;
	$shaPassword = hash('sha256',$saltPassword);
	$_SESSION['shaPassword'] = $shaPassword;
}	

function createCookieLogin(){
	passwordEncrypt();
	$cookie_name = 'login';
	$cookieValue = $_SESSION['email'] . ',' . $_SESSION['shaPassword'];
	setcookie($cookie_name,$cookieValue,time() + (86400*30));
}

function getFormData(){
	$email = $_POST['email'];
	$_SESSION['email'] = $email;
	$password = $_POST['password'];
	$_SESSION['password'] = $password;
}

function userFound(){
	$db = new PDO("mysql:host=localhost;dbname=opdracht-security-login",'root','');
	$querySelectUser = "SELECT * FROM users WHERE email = :email";
	$queryLoginUser = "SELECT * FROM users WHERE email= :email AND hashed_password = :hashed_password";
	$user = $_POST['email'];


	$selectUser = $db->prepare($querySelectUser);
	$selectUser->bindValue(':email',$user);
	$selectUser->execute();

	$numberUsers = $selectUser->rowCount();
	return $numberUsers;
}
	
function redirect($numberUsers){
	if($numberUsers>0){

		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'dashboard.php';
		header("Location: http://$host$uri/$extra");
		exit;	}
	else
	{
		$_SESSION['notification'] = "Je email adres is niet teruggevonden in de database.";
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'login-form.php';
		header("Location: http://$host$uri/$extra");
		exit;
	}
	}

if(isset($_POST['login'])){
	getFormData();
	login();
	$aantalUsers = userFound();
	redirect($aantalUsers);
}
?>