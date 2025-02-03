<?php 

require_once '../process/connectDB.php';

// Récupérer toutes les dates disponibles dans la base de données
$queryDates = $db->query("SELECT DISTINCT DATE(created_at) AS date FROM ficheData ORDER BY date DESC");
$datesDisponibles = $queryDates->fetchAll(PDO::FETCH_ASSOC);

// Récupérer la date sélectionnée ou la plus récente par défaut
$dateSelected = $_POST['date'] ?? ($datesDisponibles[0]['date'] ?? null);

// Récupération des patients enregistrés à la date sélectionnée
$queryPatients = $db->prepare("SELECT * FROM ficheData WHERE DATE(created_at) = :date");
$queryPatients->execute(['date' => $dateSelected]);
$patients = $queryPatients->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Medical Bloc - Informations patients</title>
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
	<link rel="stylesheet" type="text/css" href="../CSS/info.css">

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
			<a href="save.php">Enregistrer un patient</a>
			<a href="export.php">Exporter un ficher</a>
			<a href="info.php"  id="active">Informations patients</a>
			<a href="about.php">À propos du cabinet</a>
			<a href="logout.php">Se deconnecter</a>

		</nav>
		<div class="button-menu">
			<h2>Menu</h2>
		</div>
	</header>
	<div class="menu">
			<a href="../index.html">Acceuil</a>
			<a href="save.php">Enregistrer un patient</a>
			<a href="export.php">Exporter un ficher</a>
			<a href="info.php"  id="active">Informations patients</a>
			<a href="about.php">À propos du cabinet</a>
			<a href="logout.php">Se deconnecter</a>
		</div>

	<main>
		<section class="home">
			<a href="../index.html">acceuil></a><a href="info.php">informations patients</a>
		</section>

		<section class="home1">
			<h2>Sélectionnez la date d'enregistrement</h2>
		</section>


		<section>
			<form method="POST">
				<label for="date">Sélectionnez une date :</label>
				<select name="date" id="date" required>
					<?php foreach ($datesDisponibles as $date): ?>
						<option value="<?= htmlspecialchars($date['date']) ?>" 
							<?= $date['date'] === $dateSelected ? 'selected' : '' ?>>
							<?= htmlspecialchars($date['date']) ?>
						</option>
					<?php endforeach; ?>
				</select>
				<button type="submit">Rechercher</button>
			</form>
		</section>

		<section class="home1">
			<h3>Liste des patients enregistrer.</h3>
		</section>

		<section>
			<div id="patients">
        <?php if (!empty($patients)): ?>
            <?php foreach ($patients as $patient): ?>
                <div class="patient">
                    <p><strong>Nom :</strong> <?= htmlspecialchars($patient['nom']) ?></p>
                    <p><strong>Prénom :</strong> <?= htmlspecialchars($patient['prenom']) ?></p>
                    <p><strong>Date de naissance :</strong> <?= htmlspecialchars($patient['date_naissance']) ?></p>

                    <button type="button" onclick="toggleDetails(<?= $patient['id'] ?>)">Voir plus</button>

                    <div class="details" id="details-<?= $patient['id'] ?>">
                        <p><strong>Nationalité :</strong> <?= htmlspecialchars($patient['nationalite']) ?></p>
                        <p><strong>Sexe :</strong> <?= htmlspecialchars($patient['sexe']) ?></p>
                        <p><strong>État civil :</strong> <?= htmlspecialchars($patient['etat_civil']) ?></p>
                        <p><strong>Profession :</strong> <?= htmlspecialchars($patient['profession'] ?? 'Non renseignée') ?></p>
                        <p><strong>Téléphone :</strong> <?= htmlspecialchars($patient['telephone'] ?? 'Non renseigné') ?></p>
                        <p><strong>Motif de consultation :</strong> <?= htmlspecialchars($patient['motif_consultation']) ?></p>
                        <p><strong>Antécédents :</strong> <?= htmlspecialchars($patient['atcd'] ?? 'Aucun') ?></p>
                        <p><strong>Traitement :</strong> <?= htmlspecialchars($patient['traitement'] ?? 'Aucun') ?></p>
                    </div>
                    
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun patient enregistré à cette date.</p>
        <?php endif; ?>
    </div>
		</section>
		
	</main>
	<footer>
		<div class="divider2"></div>

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