<?php
// Connexion à la base de données (à adapter selon votre configuration)
$pdo = new PDO('mysql:host=localhost;dbname=votre_base_de_donnees', 'votre_utilisateur', 'votre_mot_de_passe');

// Récupérer les données de journalisation depuis la base de données
function getLogs($sort = 'timestamp') {
    global $pdo;
    $sql = "SELECT * FROM logs ORDER BY $sort DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Fonction pour mettre à jour les données de journalisation dans la base de données
function updateLog($id, $data) {
    global $pdo;
    $sql = "UPDATE logs SET ip_address = :ip_address, page_url = :page_url, user_agent = :user_agent WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array_merge($data, [':id' => $id]));
}

// Fonction pour supprimer une entrée de journalisation de la base de données
function deleteLog($id) {
    global $pdo;
    $sql = "DELETE FROM logs WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
}
?>

<!-- Affichage des données dans un tableau HTML -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Adresse IP</th>
            <th>URL de la page</th>
            <th>Agent utilisateur</th>
            <th>Date et heure</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($logs as $log): ?>
        <tr>
            <td><?php echo $log['id']; ?></td>
            <td><?php echo $log['ip_address']; ?></td>
            <td><?php echo $log['page_url']; ?></td>
            <td><?php echo $log['user_agent']; ?></td>
            <td><?php echo $log['timestamp']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Boutons de tri -->
<div>
    <button onclick="sortLogs('timestamp')">Trier par Date</button>
    <button onclick="sortLogs('ip_address')">Trier par IP</button>
    <button onclick="sortLogs('page_url')">Trier par URL</button>
</div>
<!-- Bouton de modification -->
<button onclick="editLog(<?php echo $log['id']; ?>)">Modifier</button>
<!-- Bouton de suppression -->
<button onclick="deleteLog(<?php echo $log['id']; ?>)">Supprimer</button>
