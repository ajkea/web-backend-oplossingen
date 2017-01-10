<?php

#database + queries
function connectDatabase(){
	$db = new PDO("mysql:host=localhost;dbname=opdracht-security-login",'root','');
	return $db;
	}
	$queryInsert = "INSERT INTO `users`(`email`, `salt`, `hashed_password`, `last_login_time`) VALUES (:email,:salt,:hashed_password,:lastLoginTime)";
	$querySelectEmail = "SELECT * FROM users where email like ':email'";

#functies
###############################

	#ophalen data uit form
	################################
	function getFormData(){
		$email = $_POST['email'];
		$_SESSION['email'] = $email;

		$password = $_POST['password'];
		$_SESSION['password'] = $password;
	}

	#email validatie
	###############################
	function checkEmail(){
		$emailBool = filter_var($_SESSION['email'],FILTER_VALIDATE_EMAIL);
		if($emailBool){
			$_SESSION['notification'] = "<br><b>geldig emailadres</b><br>";
			return $realEmail = true;
		}
		else{
			$_SESSION['notification'] = "<br><b>fake emailadres</b><br>";
			return $realEmail = false;
		}
	}

	#genereren random password
	###############################
	function generatePassword($length) {
		$passwordRequirements = FALSE;

		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+-*/$%@#_';
		    
	    while(!$passwordRequirements){




			#maakt random wachtwoord
		    $charactersLength = strlen($characters);
		    $randomPassword = '';
		    for ($i = 0; $i < $length+1; $i++)#null-based dus + 1 
		    {
		        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
		    }

		    #vormt string naar array
		    $arrayCharacters = str_split($randomPassword);


		    #voorwaarden paswoord requirements voldaan
		    $alfabetSmall = FALSE;
			$alfabetCaps = FALSE;
			$numeric = FALSE;
			$symbol = FALSE;


		    #loopen array
		    foreach ($arrayCharacters as $value) {
		   


			    if($numeric && $alfabetSmall && $alfabetCaps && $symbol ){
			    	$passwordRequirements = TRUE;
			    	$alfabetSmall = FALSE;
					$alfabetCaps = FALSE;
					$numeric = FALSE;
					$symbol = FALSE;
			    }	
			    else
			    {
			    	$passwordRequirements = FALSE;
			    	if (ctype_digit($value)){
			    		$numeric = TRUE;
			    	}

			    	if (ctype_lower($value)){
			    		$alfabetSmall = TRUE;
			    	}

			    	if (ctype_upper($value)){
			    		$alfabetCaps = TRUE;
			    	}

			    	if (ctype_punct($value)){
			    		$symbol = TRUE;
			    	}
			    }//einde else voor controle voorwaarde
			}//foreach loop
		}//einde while
		return $randomPassword;
	}


	#nakijken of email al eens voorkomt
	##############################
	function emailDoubleCheck($email,$db){
		$querySelectEmail = "SELECT * FROM users where email like :email";
		$selectEmail = $db->prepare($querySelectEmail);
		$selectEmail->bindValue(':email',$email);
		$selectEmail->execute();
		$numberEmail =  $selectEmail->rowCount();
		if($numberEmail > 0){
			$_SESSION['notification'] = "<br>er is al zo'n email adres<br>";
			return $uniqueEmail = false;
		}
		else{
			$_SESSION['notification'] = "<br>nieuw emailadres<br>";
			return $uniqueEmail = true;
		}
	}

	#password encryptie
	function passwordEncrypt(){
	$saltPassword = $_SESSION['password'] . uniqid(mt_rand(), true);
	$_SESSION['saltPassword'] = $saltPassword;
	$shaPassword = hash('sha256',$saltPassword);
	$_SESSION['shaPassword'] = $shaPassword;
	}	
#buttons
###############################
if(isset($_POST['generate'])){
	$randomPassword = generatePassword(8);
	$_SESSION['password'] = $randomPassword;
	echo $randomPassword;
}

if(isset($_POST['register'])){

	register();
}

#functies knoppen
###############################

function register(){
	$realEmail = checkEmail();
	getFormData();
	$db = new PDO("mysql:host=localhost;dbname=opdracht-security-login",'root','');
	$db = connectDatabase();
	if($realEmail){
	$uniqueEmail = emailDoubleCheck($_SESSION['email'], $db);
	}
	else
	{
		$uniqueEmail = false;
	}
	#passwords zijn nu gekend:
	passwordEncrypt();
	$_SESSION['timestamp'] = date(DATE_ATOM);

	if($uniqueEmail && $realEmail){
		insertUser($db);
		createCookieLogin();

		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'dashboard.php';
		header("Location: http://$host$uri/$extra");
		exit;

	}
}

function insertUser($db){
	$queryInsert = "INSERT INTO `users`(`email`, `salt`, `hashed_password`, `last_login_time`) VALUES (:email,:salt,:hashed_password,:lastLoginTime)";

	$registerAccount=$db->prepare($queryInsert);
	$registerAccount->bindValue(':email',$_SESSION['email']);
	$registerAccount->bindValue(':salt',$_SESSION['saltPassword']);
	$registerAccount->bindValue(':hashed_password',$_SESSION['shaPassword']);
	$registerAccount->bindValue(':lastLoginTime',$_SESSION['timestamp']);
	$registerAccount->execute();
}

function createCookieLogin(){
	$cookie_name = 'login';
	$cookieValue = $_SESSION['email'] . ',' . $_SESSION['shaPassword'];
	setcookie($cookie_name,$cookieValue,time() + (86400*30));
}



?>