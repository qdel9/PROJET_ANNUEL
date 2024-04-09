<?php
// Traitement de la soumission du formulaire d'ajout de photo
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {
    // Gérer le téléchargement de la photo
    $uploadDir = 'images'; // Dossier où seront stockées les photos
    $uploadFile = $uploadDir . basename($_FILES['photo']['name']);

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
        echo "La photo a été téléchargée avec succès.";
    } else {
        echo "La photo ne s'est pas telechargee.";
    }
}
?>



    <h1>Gestion des Photos</h1>

    <!-- Formulaire pour ajouter une nouvelle photo -->
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="photo" accept="image/*">
        <button type="submit">Télécharger</button>
    </form>

    <!-- Affichage des photos existantes -->
    <h2>Photos existantes :</h2>
    <ul>
        <?php
        // Afficher toutes les photos existantes dans le dossier d'uploads
        $photos = glob('images/*');
        foreach ($photos as $photo) {
            echo '<li><img src="' . $photo . '" alt="Photo"></li>';
        }
        ?>
    </ul>
