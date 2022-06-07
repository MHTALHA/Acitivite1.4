<?php
include_once "db.php";
$articlesStatement = $db->prepare('SELECT * FROM articles');
$articlesStatement->execute();
$articles = $articlesStatement->fetchAll();
//print_r($articles);

usort($articles , function($article1, $article2) {
	
    return strtotime($article2['date_pub'])<=>	strtotime($article1['date_pub']);
});
//print_r($articles);


function getArticles($n=null){
 
    global $articles;
 
    foreach($articles as $article){
        if(strtotime($article['date_pub']) < time()){
            $tab[] = $article;
        }
    }
 
    if($n === null || $n >= count($tab)){
           $t = $tab;
    }
 
    if($n < count($tab)){
          for ($i=0; $i < $n ; $i++) { 
              $t[] = $tab[$i];
          }
      }  
 
      return $t;
      
    };


function deleteArticle($id){
    global $articles;
    global $db;
    $sqlQuery = 'DELETE FROM articles WHERE id=:id';

    $deleteArticle = $db->prepare($sqlQuery);
    $deleteArticle->execute([
       'id' => $id
    ]);
   
    header('Location: '.$rootUrl.'index.php');
}
//print_r(getArticles(6));


?>