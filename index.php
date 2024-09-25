<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Réponses du Formulaire</title>

  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/styles.css" rel="stylesheet">
</head>
<body>

  <div class="container mt-5 fade-in">
    <h1 class="text-center">Réponses du Formulaire</h1>

    <div class="row">
      <?php
      // URL du fichier CSV
      $csvUrl = 'https://docs.google.com/spreadsheets/d/15J_7NFWp0pbTJcG_xZGB_5NHA3WRk9fNUgpTk46TyJk/pub?output=csv';

      // Récupérer le contenu du CSV
      if (($handle = fopen($csvUrl, 'r')) !== false) {
        // Lire les en-têtes de colonne
        $headers = fgetcsv($handle, 1000, ",");

        // Lire les données ligne par ligne
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
          echo '<div class="col-md-4">';
          echo '<div class="card">';
          echo '<div class="card-body">';

          echo '<div class="card-content">';
          foreach ($data as $index => $cell) {
            if ($index < 3) { // Limiter à trois champs pour l'aperçu
              $header = htmlspecialchars($headers[$index]);
              $cellContent = htmlspecialchars(html_entity_decode($cell));
              echo '<p><strong>' . $header . ':</strong> ' . $cellContent . '</p>';
            }
          }
          echo '</div>';

          echo '<span class="read-more" onclick="showMore(this)">Lire plus</span>';
          echo '<span class="read-less" onclick="showLess(this)" style="display:none;">Lire moins</span>';

          echo '<div class="full-content">';
          foreach ($data as $index => $cell) {
            if ($index >= 3) { // Les autres champs au-delà de trois
              $header = htmlspecialchars($headers[$index]);
              $cellContent = htmlspecialchars(html_entity_decode($cell));
              echo '<p><strong>' . $header . ':</strong> ' . $cellContent . '</p>';
            }
          }
          echo '</div>';

          echo '</div>';
          echo '</div>';
          echo '</div>';
        }

        fclose($handle);
      } else {
        echo '<div class="alert alert-danger text-center">Erreur lors du chargement des données.</div>';
      }
      ?>
    </div>
  </div>

  <footer>
    <p>&copy; 2024 - Affichage des réponses du formulaire. Tous droits réservés.</p>
  </footer>

  <!-- jQuery (nécessaire pour Bootstrap JS) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Custom JS -->
  <script src="js/scripts.js"></script>
</body>
</html>
