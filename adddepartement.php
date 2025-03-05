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
    $nom_departement = $_POST['nom_departement'];
    $service = $_POST['service'];

    // Préparer la requête d'insertion
    $requete = $access->prepare("INSERT INTO doctors (nom, prenom, date_naissance, telephone, adresse, email, departement) VALUES (:nom, :prenom, :date_naissance, :telephone, :adresse, :email, :departement)");
    
    // Exécuter la requête avec les données du formulaire
    $requete->execute(array(
        'nom_departement' => $nom_departement,
        'service' => $service
    ));

    // Redirection après succès
    header("Location: adddoctor.html");
    exit(); // Bonne pratique pour s'assurer que le script s'arrête ici
}







