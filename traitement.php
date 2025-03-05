<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $access=new pdo("mysql:host=localhost;dbname=hospital_db;charset=utf8", "root", "");
    
    $access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

} catch (Exception $e) 
{
$e->getMessage();
}

if (isset($_POST['valide'])) {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $profession = $_POST['profession'];
    $adresse = $_POST['adresse'];
    $groupe_sanguin = $_POST['groupe_sanguin'];
    $motif = $_POST['motif'];

    // Préparer la requête d'insertion
    $requete = $access->prepare("INSERT INTO patients (nom, prenom, date_naissance, email, telephone, profession, groupe_sanguin, adresse, motif) VALUES (:nom, :prenom, :date_naissance, :email, :telephone, :profession, :groupe_sanguin, :adresse, :motif)");
    
    // Exécuter la requête avec les données du formulaire
    $requete->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'date_naissance' => $date,  // Renommé pour correspondre à la colonne SQL
        'email' => $email,
        'telephone' => $telephone,
        'profession' => $profession,
        'adresse' => $adresse,
        'groupe_sanguin' => $groupe_sanguin,
        'motif' => $motif
    ));

    // Redirection après succès
    
    header("Location: patient.php");
    exit(); // Bonne pratique pour s'assurer que le script s'arrête ici
}







