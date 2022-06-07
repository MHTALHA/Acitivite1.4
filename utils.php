<?php

$articles_json = file_get_contents("articles.json");
$articles = json_decode($articles_json, true);
// $articles = [
// [
// 'titre' => 'article1',
// 'texte' => 'ceci est le texte de article 1',
// 'auteur' => 'auteur1',
// 'date' => '12-10-2020'
// ],
// [
// 'titre' => 'article2',
// 'texte' => 'ceci est le texte de article 1',
// 'auteur' => 'auteur1',
// 'date' => '12-11-2021'
// ],
// [
// 'titre' => 'article3',
// 'texte' => 'ceci est le texte de article 2',
// 'auteur' => 'auteur2',
// 'date' => '24-03-2010'
// ],
// [
// 'titre' => 'article4',
// 'texte' => 'ceci est le texte de article3',
// 'auteur' => 'auteur3',
// 'date' => '07-01-2025'
// ],
// [
//     'titre' => 'article4',
//     'texte' => 'ceci est le texte de article 4',
//     'auteur' => 'auteur4',
//     'date' => '12-04-2017'
//     ],
// ];

usort($articles , function($article1, $article2) {
	
    return strtotime($article2['date'])<=>	strtotime($article1['date']);
});
//print_r($articles);


function getArticles($n=null){
 
    global $articles;
 
    foreach($articles as $article){
        if(strtotime($article['date']) < time()){
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

//print_r(getArticles(6));

function deleteArticle($id){
    global $articles;
    foreach ($articles as $key => $id) {
        if (in_array('id', $id)) {
            unset($articles[$key]);
        }
    }
    $articles = json_encode($articles);
    file_put_contents('articles.json', $articles);
}

?>