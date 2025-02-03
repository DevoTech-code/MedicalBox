<?php

session_start();

require_once 'connectDB.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Récupération des données patients
  $name = htmlspecialchars(trim($_POST['name']));
  $prenom = htmlspecialchars(trim($_POST['prenom']));
  $date_naissance = htmlspecialchars(trim($_POST['birth']));
  $nationalite = htmlspecialchars(trim($_POST['nationalite']));
  $sexe = htmlspecialchars(trim($_POST['sexe']));
  $etat_civil = htmlspecialchars(trim($_POST['etat_civil']));
  $profession = htmlspecialchars(trim($_POST['Profession']));
  $tel = htmlspecialchars(trim($_POST['tel']));
  $poids = floatval($_POST['poids']);
  $taille = floatval($_POST['taille']);
  $tourT = floatval($_POST['tourT']);
  $bml = floatval($_POST['bml']);
  $motif = htmlspecialchars(trim($_POST['motif']));
  $hta = htmlspecialchars(trim($_POST['hta']));
  $obesite = htmlspecialchars(trim($_POST['obesite']));
  $heredite = htmlspecialchars(trim($_POST['heredite']));
  $diabete = htmlspecialchars(trim($_POST['diabete']));
  $tabac = htmlspecialchars(trim($_POST['tabac']));
  $sedentarite = htmlspecialchars(trim($_POST['sedentarite']));
  $atcd = htmlspecialchars(trim($_POST['atcd']));
  $allergie = htmlspecialchars(trim($_POST['allergie']));
  $medicaments = htmlspecialchars(trim($_POST['medicaments']));
  $date_releve = htmlspecialchars(trim($_POST['date']));
  $Tablepas = intval($_POST['pas']);
  $Tablepad = intval($_POST['pad']);
  $Tablefc = intval($_POST['fc']);
  $Tabletemperature = floatval($_POST['temperature']);
  $syndrome = htmlspecialchars(trim($_POST['syndrome']));
  $hypotheseDiag = htmlspecialchars(trim($_POST['HD']));
  $ecg = htmlspecialchars(trim($_POST['ecg']));
  $echocardio = htmlspecialchars(trim($_POST['ED']));
  $traitement = htmlspecialchars(trim($_POST['traitement']));

        // Préparation de la requête
  $sql = "INSERT INTO ficheData (
    nom, prenom, date_naissance, nationalite, sexe, etat_civil, profession, telephone, 
    poids, taille, tour_taille, bmi, motif_consultation, hta, obesite, heredite, diabete, 
    tabac, sedentarite, atcd, allergie, medicaments, date_releve, pas, pad, fc, 
    temperature, syndrome, hypothese_diag, ecg, echocardio, traitement
    ) VALUES (
    :nom, :prenom, :date_naissance, :nationalite, :sexe, :etat_civil, :profession, :telephone, 
    :poids, :taille, :tour_taille, :bmi, :motif_consultation, :hta, :obesite, :heredite, :diabete, 
    :tabac, :sedentarite, :atcd, :allergie, :medicaments, :date_releve, :pas, :pad, :fc, 
    :temperature, :syndrome, :hypothese_diag, :ecg, :echocardio, :traitement
  )";

    $stmt = $db->prepare($sql);

        // Exécution de la requête
    $stmt->execute([
      ':nom' => $name,
      ':prenom' => $prenom,
      ':date_naissance' => $date_naissance,
      ':nationalite' => $nationalite,
      ':sexe' => $sexe,
      ':etat_civil' => $etat_civil,
      ':profession' => $profession,
      ':telephone' => $tel,
      ':poids' => $poids,
      ':taille' => $taille,
      ':tour_taille' => $tourT,
      ':bmi' => $bml,
      ':motif_consultation' => $motif,
      ':hta' => $hta,
      ':obesite' => $obesite,
      ':heredite' => $heredite,
      ':diabete' => $diabete,
      ':tabac' => $tabac,
      ':sedentarite' => $sedentarite,
      ':atcd' => $atcd,
      ':allergie' => $allergie,
      ':medicaments' => $medicaments,
      ':date_releve' => $date_releve,
      ':pas' => $Tablepas,
      ':pad' => $Tablepad,
      ':fc' => $Tablefc,
      ':temperature' => $Tabletemperature,
      ':syndrome' => $syndrome,
      ':hypothese_diag' => $hypotheseDiag,
      ':ecg' => $ecg,
      ':echocardio' => $echocardio,
      ':traitement' => $traitement,
    ]);

        // Vérification et redirection
    if ($stmt->rowCount() > 0) {
      $_SESSION['save_in'] = "Enregistrement réussi.";
      header("Location: ../PHP/save.php");
      exit;
    } else {
      $_SESSION['save_out'] = "Erreur lors de l'enregistrement.";
      header("Location: ../PHP/save.php");
      exit;
    }
  }
