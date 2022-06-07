<?php include_once("header.php") ?>
<?php 
//connection to database
include_once("db.php")
?>
<?php 
//creating records into the database articles
if ( isset($_POST['submit'])) {
    if(!isset($_POST['titre'])||!isset($_POST['texte'])||!isset($_POST['auteur'])||!isset($_POST['date_pub'])){
        echo "<div class='alert alert-danger' role='alert'>
        Veuillez remplir le formulaire !
      </div>";
    }
    $sqlQuery = 'INSERT INTO articles(titre, texte, auteur, date_pub) VALUES (:titre, :texte, :auteur, :date_pub)';
    
    $insertArticle = $db->prepare($sqlQuery);
    
    $insertArticle->execute([
        'titre' => $_POST['titre'],
        'texte' => $_POST['texte'],
        'auteur' => $_POST['auteur'],
        'date_pub' => $_POST['date'], 
    ]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet"  href="style.css">
    <title>Document</title>
</head>
<body>
<?php include_once("header.php") ?>

<div class="row row-content">
           <div class="col-12">
              <h3>Add New Article</h3>
           </div>
            <div class="col-12 col-md-9">


<?php



   ?>

                <form  action="" method="POST" >
              
                    <div class="form-group row">
                        <label for="titre" class="col-md-2 col-form-label">Titre</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control"  name="titre" placeholder="taper le titre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="auteur" class="col-md-2 col-form-label">Auteur</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control"  name="auteur" placeholder="taper le nom d'auteur">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date" class="col-12 col-md-2 col-form-label">Date de publication</label>
                        <div class="col-5 col-md-3">
                            <input type="date" class="form-control"  name="date">
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label for="texte" class="col-md-2 col-form-label">Description</label>
                        <div class="col-md-10">
                            <textarea class="form-control"  name="texte" placeholder="" rows="12"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-md-2 col-md-10">
                        <input type="submit" name="submit" class="btn btn-primary" value='Publier'/>
                        </div>
                    </div>
                </form>
            </div>
             <div class="col-12 col-md">
            </div>
       </div>
    <?php include_once("footer.php") ?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/f4a86230e7.js" crossorigin="anonymous"></script>
</body>
</html>