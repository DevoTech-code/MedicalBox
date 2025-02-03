<?php 

session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Medical Bloc - Enregistrer un patient</title>
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
	<link rel="stylesheet" type="text/css" href="../CSS/save.css">

	<!-- favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="../IMG/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../IMG/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../IMG/favicon/favicon-16x16.png">
	<link rel="manifest" href="../IMG/favicon/site.webmanifest">

</head>
<body>
	<header>
		<div id="logo">Centre de traitement médicale</div>
		<div class="divider">
			
		</div>
		<nav>
			<a href="../index.html">Acceuil</a>
			<a href="save.php" id="active">Enregistrer un patient</a>
			<a href="export.php">Exporter un ficher</a>
			<a href="info.php">Informations patients</a>
			<a href="about.php">À propos du cabinet</a>
			<a href="logout.php">Se deconnecter</a>

		</nav>
		<div class="button-menu">
			<h2>Menu</h2>
		</div>
	</header>
	<div class="menu">
		<a href="../index.html">Acceuil</a>
		<a href="save.php" id="active">Enregistrer un patient</a>
		<a href="export.php">Exporter un ficher</a>
		<a href="info.php">Informations patients</a>
		<a href="about.php">À propos du cabinet</a>
		<a href="logout.php">Se deconnecter</a>
	</div>
	<main>
		<section class="home">
			<a href="../index.html">acceuil></a><a href="save.php">Enregistrer un patient</a>
		</section>
		<section class="save-fiche">
			<h2 class="text">Fiche de renseignement</h2>
			<!-- Afficher le message de réussite -->
			<div class="success-message">
				<?php if (!empty($_SESSION['save_in'])): ?>
					<p><?= htmlspecialchars($_SESSION['save_in']) ?></p>
					<?php unset($_SESSION['save_in']); ?>
				<?php endif; ?>

				<?php if (!empty($_SESSION['save_out'])): ?>
					<p><?= htmlspecialchars($_SESSION['save_out']) ?></p>
					<?php unset($_SESSION['save_out']); ?>
				<?php endif; ?>
			</div>


			<form action="../process/save.php" method="POST">
				<fieldset>
					<legend>Information personnel</legend>
					<div class="item">
						<div class="box">
							<label for="name">Noms*:</label>
							<input type="text" name="name" id="name" required>
						</div>
						<div class="box">
							<label for="prenom">Prénoms*:</label>
							<input type="text" name="prenom" id="prenom" required>
						</div>
					</div>

					<div class="item">
						<div class="box">
							<label for="birth">Date de naissance*:</label>
							<input type="date" name="birth" id="birth">
						</div>
						<div class="box">
							<label for="nationalite">Nationalité*:</label>
							<input type="text" name="nationalite" id="nationalite">
						</div>
					</div>

					<div class="checkox">
							<label>Sexe*:</label>
						<div class="c">
							<label for="m">Masculin:</label>			
							<input type="radio" name="sexe" id="m" value="M">
						</div>
						<div class="c">
							<label for="f">Feminin:</label>
							<input type="radio" name="sexe" id="f" value="F">
						</div>
						
						
					</div>

					<div class="item">
						<div class="box">
							<label for="etat_civil">Etat civil: </label>
							<select name="etat_civil" id="etat_civil">
								<option value="">---Selectionnez l'etat civil---</option>
								<option value="marie">Mariré(e)</option>
								<option value="celibataire">Célibataire</option>
								<option value="divorce">Divorcé(e)</option>
								<option value="Veuf(ve)">Veuf(ve)</option>
							</select>
						</div>
					</div>

					<div class="item">
						<div class="box">
							<label for="Profession">Profession:</label>
							<input type="text" name="Profession" id="Profession">
						</div>
						<div class="box">
							<label for="tel">Tel*:</label>
							<input type="tel" name="tel" id="tel">
						</div>
					</div>

					<div class="item">
						<div class="box">
							<label for="poids">Poids (en kg):</label>
							<input type="text" name="poids" id="poids" placeholder="Exemple: 75.8">
						</div>
						<div class="box">
							<label for="taille">Taille (en mètre):</label>
							<input type="text" name="taille" id="taille" placeholder="Exemple: 1.68">
						</div>
						<div class="box">
							<label for="tour">Tour de taille:</label>
							<input type="text" name="tourT" id="tour">
						</div>
						<div class="box">
							<label for="bmi">BMI:</label>
							<input type="text" name="bmi" id="bmi">
						</div>
					</div>

					<div class="item">
						<div class="box">
							<label for="motif">Motif de consultation:</label>
							<textarea name="motif"></textarea>
						</div>
					</div>
				</fieldset>

				<fieldset>
					<legend>Facteurs de risque cardiovasculaire</legend>

					<div class="checkox">
						<label>HTA:</label>
						<div class="c">
							<label for="1">Oui</label>					
						<input type="radio" name="hta" id="1" value="oui">
						</div>
						<div class="c">
							<label for="2">Non</label>
						<input type="radio" name="hta" id="2" value="non">
						</div>
					</div>

					<div class="checkox">
						<label>Obésité:</label>
						<div class="c">
							<label for="3">Oui</label>					
						<input type="radio" name="obesite" id="3" value="oui">
						</div>
						<div class="c">
							<label for="4">Non</label>
						<input type="radio" name="obesite" id="4" value="non">
						</div>
					</div>

					<div class="checkox">
						<label>Hérédité:</label>
						<div class="c">
							<label for="5">Oui</label>					
						<input type="radio" name="heredite" id="5" value="oui">
						</div>
						<div class="c">
							<label for="6">Non</label>
						<input type="radio" name="heredite" id="6" value="non">
						</div>
					</div>

					<div class="checkox">
						<label>Diabête:</label>
						<div class="c">
							<label for="7">Oui</label>					
						<input type="radio" name="diabete" id="7" value="oui">
						</div>
						<div class="c">
							<label for="8">Non</label>
						<input type="radio" name="diabete" id="8" value="non">
						</div>
					</div>

					<div class="checkox">
						<label>Cholestérol:</label>
						<div class="c">
							<label for="9">Oui</label>					
						<input type="radio" name="cholesterol" id="9" value="oui">
						</div>
						<div class="c">
							<label for="10">Non</label>
						<input type="radio" name="cholesterol" id="10" value="non">
						</div>
					</div>

					<div class="checkox">
						<label>Tabac:</label>
						<div class="c">
							<label for="11">Oui</label>					
						<input type="radio" name="tabac" id="11" value="oui">
						</div>
						<div class="c">
							<label for="12">Non</label>
						<input type="radio" name="tabac" id="12" value="non">
						</div>
					</div>

					<div class="checkox">
						<label>Sédentarité:</label>
						<div class="c">
							<label for="13">Oui</label>					
						<input type="radio" name="sedentarite" id="13" value="oui">
						</div>
						<div class="c">
							<label for="14">Non</label>
						<input type="radio" name="sedentarite" id="14" value="non">
						</div>
						
						
					</div>

					<div class="item">
						<div class="box">
							<label for="atcd">ATCD:</label>
							<textarea name="atcd" id="atcd"></textarea>
						</div>
						<div class="box">
							<label for="allergie">Allergie:</label>
							<textarea name="allergie" id="allergie"></textarea>

						</div>
						<div class="box">
							<label for="medoc">Médicaments:</label>
							<textarea name="medicaments" id="medoc"></textarea>

						</div>

					</div>
				</fieldset>
				
				<fieldset>
					<legend>Signe Fonctionnels</legend>
					<div class="table">
						<table>
							<thead>
								<tr>
									<th>Date</th>
									<th><input type="date" name="date" id=""></th>
									<th><input type="date" name="date" id=""></th>
									<th class="td"><input type="date" name="date" id=""></th>
									
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>PAS</td>
									<td><input type="text" name="pas" id=""></th>
									<td><input type="text" name="pas" id=""></th>
									<td class="td"><input type="text" name="pas" id=""></th>
									
								</tr>
								<tr>
									<td>PAD</td>
									<td><input type="text" name="pad" id=""></th>
									<td><input type="text" name="pad" id=""></th>
									<td class="td"><input type="text" name="pad" id=""></th>
									
								</tr>
								<tr>
									<td>FC</td>
									<td><input type="text" name="fc" id=""></th>
									<td><input type="text" name="fc" id=""></th>
									<td class="td"><input type="text" name="fc" id=""></th>
									
								</tr>
								<tr>
									<td>Temperature</td>
									<td><input type="text" name="temperature" ></th>
									<td><input type="text" name="temperature" ></th>
									<td><input type="text" name="temperature" ></th>
									
								</tr>
							</tbody>
						</table>
					</div>
					<div>
						<label>Syndrome:</label>
						<textarea name="syndrome"></textarea>
					</div>
					<div>
						<label>Hypothese diagnostic:</label>
						<textarea name="HD"></textarea>
					</div>
					<div>
						<label>ECG:</label>
						<textarea name="ecg"></textarea>
					</div>
					<div>
						<label>Echocardio Doppler:</label>
						<textarea name="ED"></textarea>
					</div>
					<div>
						<label>Traitement:</label>
						<textarea name="traitement"></textarea>
					</div>

				</fieldset>
				<button type="submit">Enregistrer les informations du patients</button>
			</form>
		</section>
		
	</main>
	<footer>
		<div class="data">
			<ul>
				<li><strong>Adresse :</strong> 1235 Rue NDONG Festin, 75000 Libreville</li>
				<li><strong>Téléphone :</strong> <a href="tel:+241074889920">+241 074 88 99 20</a></li>
				<li><strong>Email :</strong> <a href="mailto:contact@votrecabinet.com">contact@votrecabinet.com</a></li>
				<li><strong>Horaires :</strong> Lundi - Vendredi : 8h00 - 18h00</li>
			</ul>

			<ul>

				<li><a href="../../politique/mentions-legales.html" target="_blank">Mentions légales</a></li>
				<li><a href="../../politique/politique-confidentialite.html" target="_blank">Politique de confidentialité</a></li>
				<li><a href="../../politique/cookies.html" target="_blank">Politique des cookies</a></li>

			</ul>
		</div>


		<div class="copyR1">
			<a href="https://facebook.com/votrecabinet" target="_blank">Facebook</a>| 
			<a href="https://twitter.com/votrecabinet" target="_blank">Twitter</a> |
			<a href="https://instagram.com/votrecabinet" target="_blank">Instagram</a>
			|
			<a href="https://linkedin.com/votrecabinet" target="_blank">Linkedin</a>
		</div>

		<div class="copyR">
			<p>© 2025 Cabinet Médicalbox. Tous droits réservés.</p>
			<a href="mywebsite-8le5.onrender.com" target="_blank">By DevoTech</a>

		</div>
	</footer>
	<script src="../JS/script.js"></script>
</body>
</html>