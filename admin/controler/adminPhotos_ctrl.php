<?php
$articleRepo=new ArticleRepository();
$articles=$articleRepo->listArticles();
//A FAIRE -> Inserer images si SubmitNewPhoto est set.

/* 
1-Photo Model : id, name, photo, article_id
2-Photo repo : createPhoto + listPhoto
3- ici -> gestion set + msg erreurs

// dans partie generale , faire un join pour lier l'article et les photos correspondante
//boucler pour recup photos
*/