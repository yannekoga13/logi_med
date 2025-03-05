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
    $date_naissance = $_POST['date_naissance'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $departement = $_POST['departement'];

    // Préparer la requête d'insertion
    $requete = $access->prepare("INSERT INTO doctors (nom, prenom, date_naissance, telephone, adresse, email, departement) VALUES (:nom, :prenom, :date_naissance, :telephone, :adresse, :email, :departement)");
    
    // Exécuter la requête avec les données du formulaire
    $requete->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'date_naissance' => $date_naissance,  // Renommé pour correspondre à la colonne SQL
        'telephone' => $telephone,
        'adresse' => $adresse,
        'email' => $email,
        'departement'=>$departement,
    ));

    // Redirection après succès
    header("Location: adddoctor.html");
    exit(); // Bonne pratique pour s'assurer que le script s'arrête ici
}







