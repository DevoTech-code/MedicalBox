<?php 

session_start();

$name = "medicalbox";
$pass = password_hash("medicalB25", PASSWORD_DEFAULT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$nameform = $_POST['name'];
	$passform = $_POST['pass'];

	if ($nameform === $name && password_verify($passform, $pass)) {
        // Connexion réussie
		header("Location: admin/index.html");
		exit;
	} else {
        // Échec de la connexion
		$_SESSION['error'] = "Identifiant ou mot de passe incorrect.";
		header("Location: " . $_SERVER['PHP_SELF']);
		exit;
	}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Médical box - Login</title>

	<!-- favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="admin/IMG/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="admin/IMG/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="admin/IMG/favicon/favicon-16x16.png">
	<link rel="manifest" href="admin/IMG/favicon/site.webmanifest">
</head>
<body>
	<div class="T">M</div>
	<div class="B">B</div>

	<form action="" method="POST">
		<div>
			<h2>Médical Box</h2>
			<p>
				votre outil de gestion médical
			</p>
			<?php if (!empty($_SESSION['error'])): ?>
				<p style="color: red;"><?= htmlspecialchars($_SESSION['error']); ?></p>
				<?php unset($_SESSION['error']); ?>
			<?php endif; ?>
		</div>
		

		<label for="name">Identifiant*:</label>
		<input type="text" name="name" id="name">

		<label for="pass">Mot de passe*:</label>
		<input type="password" name="pass" id="pass">

		<button type="submit">Se connecter</button>
		<p>by DevoTech</p>
	</form>
</body>
</html>