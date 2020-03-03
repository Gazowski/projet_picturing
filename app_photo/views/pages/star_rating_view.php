<? php
défini ('BASEPATH') OU exit ('Aucun accès direct au script autorisé');
?>
<! DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8">
    <title> Construire un système de notation 5 étoiles dans CodeIgniter </title>

    <! - Bootstrap CSS ->
    <link href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel = "stylesheet">

    <! - Police géniale ->
    <link rel = "stylesheet" href = "http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <! - Bootstrap Star Rating CSS ->
    <link href = '<? = base_url ()?> assets / bootstrap-star-rating / css / star-rating.min.css' type = 'text / css' rel = 'stylesheet'>

    <! - CSS personnalisé ->
    <link href = "<? = base_url ()?> assets / style.css" rel = "stylesheet">

    <! - Bibliothèque jQuery ->
    <script src = '<? = base_url ()?> assets / js / jquery-3.3.1.js' type = 'text / javascript'> </script>

    <! - Bootstrap Star Rating JS ->
    <script src = '<? = base_url ()?> assets / bootstrap-star-rating / js / star-rating.min.js' type = 'text / javascript'> </script>

  </head>
  <body>

    <div class = 'content'>

      <! - Liste des articles ->
      <? php 
      foreach ($ messages comme $ post) {
        $ id = $ post ['id'];
        $ title = $ post ['title'];
        $ content = $ post ['content'];
        $ link = $ post ['lien'];
        $ rating = $ post ['rating']; // Note des utilisateurs sur un post
        $ moyennage = $ post ['moyennage']; // Note moyenne

      ?>
      <div class = "post">
        <h1> <a href='<?= $link ?> 'class =' ​​link 'target =' _ blank '> <? = $ title; ?> </a> </h1>
        <div class = "post-text">
          <? = $ content; ?>
        </div>
        <div class = "post-action">

          <! - Barre de notation ->
          <input id = "post _ <? = $ id?>" value = '<? = $ rating?>' class = "rating-loading ratingbar" data-min = "0" data-max = "5" data-step = "1">

          <! - Évaluation moyenne ->
          <div> Évaluation moyenne: <span id = 'averageagerating _ <? = $ id?>'> <? = $ averageagerating?> </span> </div>
        </div>
      </div>
      <? php
      }
      ?>

    </div>

    <! - Script ->
    <script type = 'text / javascript'>
    $ (document) .ready (fonction () {

      // Initialiser
      $ ('. ratingbar'). rating ({
        showCaption: false,
        showClear: false,
        taille: 'sm'
      });

      // Changement de notation
      $ ('. ratingbar'). on ('rating: change', fonction (événement, valeur, légende) {
        var id = this.id;
        var splitid = id.split ('_');
        var postid = splitid [1];

        $ .ajax ({
          url: '<? = base_url ()?> index.php / employee / updateRating',
          type: «poste»,
          data: {postid: postid, rating: value},
          succès: fonction (réponse) {
             $ ('# moyennage _' + postid) .text (réponse);
          }
        });
      });
    });
 
    </script>

  </body>
</html>