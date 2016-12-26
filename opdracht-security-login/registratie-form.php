<html>
	<head>
		<title>Opdracht security login</title>
	</head>
	
	<body>
		<style>
		*{
			font-family: arial;
		}
			
			ul{
				list-style: none;
			}
			
			li{
				margin:10px;
			}
		</style>
		<h1>Registreren</h1>
		<form action="registratie-process.php">
			<ul>
				<li>
					<label for="email">Email</label>
					<input type="text" name="email" id="email">
				</li>
				
				<li>
					<label for="password">Paswoord</label>
					<input type="password" name="password" id="password">
					
					<input type="submit" name="generate-password" value="genereer een paswoord">
				</li>
			
				<li>
					<input type="submit" name="submit" value="registreer">
				</li>
	
		</form>
	</body>
</html>