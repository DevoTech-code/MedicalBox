<?php 
// affiche les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$host = 'localhost';
$dbname = 'medicalbox';
$username = 'root';
$password = '';


//infos serveur distant
// $host = 'sql212.infinityfree.com';
// $dbname = 'if0_38125758_medicalbox';
// $username = 'if0_38125758';
// $password = 'yKCEBeRkh4yq';


try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}



?>
