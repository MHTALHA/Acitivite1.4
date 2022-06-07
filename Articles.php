<?php
include_once("header.php");
?>
<?php include_once("utils.php"); ?>
<?php $articles=getArticles() ;?>
<?php foreach($articles as $article):?>
    <div class="card" style="width: 60rem; text-align:center;margin:3px auto; ">
  <div class="card-body">
    <h5 class="card-title">Title : <?php echo $article['titre'] ?></h5>
    <h6 class="card-subtitle mb-2 text-muted">Auteur :<?php echo $article['auteur'] ?></h6>
    <h6 class="card-subtitle mb-2 text-muted">Date de publication : <?php echo $article['date'] ?></h6>
    <p class="card-text">Description: <?php echo $article['description'] ?></p>
    <button  name="delete" class="btn btn-danger" id="<?php echo $article['id']?>">Delete</button>
  </div>
</div>

    <?php endforeach ?>
    <?php 
    if(isset($_REQUEST['id'])){
      deleteArticle($_REQUEST['id']);
      echo "delete";
    }
    
    ?>

<?php
include_once("footer.php");
?>