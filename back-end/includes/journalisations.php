<?php
// Connexion à la base de données (à adapter selon votre configuration)
$pdo = new PDO('mysql:host=localhost;dbname=votre_base_de_donnees', 'votre_utilisateur', 'votre_mot_de_passe');

// Fonction pour obtenir l'adresse IP du visiteur
function getIPAddress() {
    // Si l'adresse IP est définie
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    // Sinon, si l'adresse IP est envoyée en-tête par le proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    // Sinon, utiliser l'adresse IP directe
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// Enregistrer les données de journalisation
$ip_address = getIPAddress();
$page_url = $_SERVER['REQUEST_URI'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$timestamp = date('Y-m-d H:i:s');

$sql = "INSERT INTO logs (ip_address, page_url, user_agent, timestamp) VALUES (:ip_address, :page_url, :user_agent, :timestamp)";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    ':ip_address' => $ip_address,
    ':page_url' => $page_url,
    ':user_agent' => $user_agent,
    ':timestamp' => $timestamp
));
?>
