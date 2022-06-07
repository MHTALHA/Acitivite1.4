<?php
include_once("header.php");
?>
<?php include_once("utils.php"); ?>
<?php if(isset($_GET['id'])) {
deleteArticle($_GET['id']);
}
?>
<?php include_once("db.php");?>
<?php 
//creating records into the database commentaires
if ( isset($_POST['submit_comment'])) {
    
    $sqlQuery = 'INSERT INTO commentaires(visiteur, text_comment,comment_date,id_article) VALUES (:visiteur,:text_comment,:comment_date,:id_article)';
    
    $insertComment= $db->prepare($sqlQuery);
    
    $insertComment->execute([
        'visiteur' => $_POST['visiteur'],
        'text_comment' => $_POST['comment'],
        'comment_date'=> $_POST['comment_date'],
        'id_article' => $_POST['id_article'], 
    ]);
}

?>

<?php //print_r($commentaires) ?>
<?php $articles=getArticles() ;?>
<?php foreach($articles as $article):?>
    <div class="card" style="width: 60rem; text-align:center;margin:3px auto; ">
        <div class="card-body">
            <h5 class="card-title">Title : <?php echo $article['titre'] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">Auteur :<?php echo $article['auteur'] ?></h6>
            <h6 class="card-subtitle mb-2 text-muted">Date de publication : <?php echo $article['date_pub'] ?></h6>
            <p class="card-text">Description: <?php echo $article['texte'] ?></p>
            <a type="submit" name="delete" class="btn btn-danger" href="index.php?id=<?php echo $article['id']?>" >Delete</a><br/>
            
        </div>
        <div class="card-body">
         <h6 class="card-subtitle mb-2 text-muted">Commentaires: </h6>
        </div>

<?php 

$commentStatement = $db->prepare('SELECT * FROM commentaires WHERE id_article=:id');
$commentStatement->execute([
    'id'=>$article['id']
]);
$commentaires = $commentStatement->fetchAll();

?>
  <?php if($commentaires):?>
  <?php foreach($commentaires as $commentaire):?>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div  class="card-body">
                        <p class="card-title"><?php echo $commentaire['visiteur'] ?>: <?php echo $commentaire['text_comment'] ?></p>
                        <p><?php echo $commentaire['comment_date'] ?></p>
                </div>
            </div>
        </div>
    </div>
   
    
  <?php endforeach ?>
  <?php endif;?>
  <div class="card-footer">
        <form action="" method="POST" >
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Add your comment !</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
            </div>
            <div class="mb-3">
                <label for="namecomment" class="form-label">Your name</label>
                <input type="text" class="form-control" name="visiteur" >
            </div>
                
                <input type="hidden" name="comment_date" value="<?php echo  date('Y-m-d');?>" />
                <input type="hidden" name="id_article" value="<?php echo  $article['id'];?>" />

            <button type="submit" name="submit_comment" class="btn btn-primary" >Submit comment</button>
        </form>
  </div>
</div>

    <?php endforeach ?>


<?php
include_once("footer.php");
?>