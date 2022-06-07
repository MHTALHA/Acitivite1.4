<?php
include_once("header.php");
?>
<?php include_once("utils.php"); ?>
<?php if(isset($_GET['id'])) {
deleteArticle($_GET['id']);
}
?>


<?php $articles=getArticles() ;?>
<?php foreach($articles as $article):?>
    <div class="card" style="width: 60rem; text-align:center;margin:3px auto; ">
  <div class="card-body">
    <h5 class="card-title">Title : <?php echo $article['titre'] ?></h5>
    <h6 class="card-subtitle mb-2 text-muted">Auteur :<?php echo $article['auteur'] ?></h6>
    <h6 class="card-subtitle mb-2 text-muted">Date de publication : <?php echo $article['date_pub'] ?></h6>
    <p class="card-text">Description: <?php echo $article['texte'] ?></p>
    <a type="submit" name="delete" class="btn btn-danger" href="index.php?id=<?php echo $article['id']?>" >Delete</a>
  </div>
</div>

    <?php endforeach ?>


<?php
include_once("footer.php");
?>