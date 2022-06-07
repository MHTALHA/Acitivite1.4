<?php include_once("header.php") ?>


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

//array();
$articles[] = array(); // create empty array

$myFile = "articles.json";

if(isset($_POST["submit"])){
if((isset($_POST["titre"])) && (isset($_POST["auteur"])) && (isset($_POST["date"]) )&& (isset($_POST["date"])) && (isset($_POST["description"]))){
    if(!empty($_POST["titre"]) && !empty($_POST["auteur"]) && !empty($_POST["date"])&& !empty($_POST["date"]) && !empty($_POST["description"])){
        try
        {
          //Get form data
          $formdata = array(
           'id'=>$_REQUEST['id'],
           'titre'=> htmlspecialchars($_POST['titre']), 
           'auteur' => htmlspecialchars($_POST['auteur']),
           'date'=> $_POST['date'], 
           'description'=> strip_tags($_POST['description']) 
           
          );
       
       
         //Get data from existing json file
          $jsondata = file_get_contents($myFile);
       //print_r($jsondata)."<br/>";
          // converts json data into array
          $articles = json_decode($jsondata, true);
        //print_r($articles)."<br/>";
          // Push article data to array
          array_push($articles,$formdata);
       
          //Convert updated array to JSON
          $jsondata = json_encode($articles, JSON_PRETTY_PRINT);
       
          //write json data into data.json file
          if(file_put_contents($myFile, $jsondata)) {
           echo "<div class='alert alert-success' role='alert'>
           JSON file a été créée avec succée...!
         </div>";
         print_r($jsondata);
           }
          else 
               echo "error";
       
          }
       
           catch (Exception $e) {
               echo 'Caught exception: ',  $e->getMessage(), "\n";
         }
        
    }
}
};



   ?>

                <form  action="" method="POST" >
                <input type="hidden" name="id" value="<?php echo  $id=uniqid();?>" />
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
                        <label for="description" class="col-md-2 col-form-label">Description</label>
                        <div class="col-md-10">
                            <textarea class="form-control"  name="description" placeholder="" rows="12"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-md-2 col-md-10">
                        <button type="submit" name="submit" class="btn btn-primary">Publier</button>
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