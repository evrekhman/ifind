<?php



class ArticleController {

	public function actionIndex($id)
	{
		







		$newsList = array();

		$getMainCategory = Mian::getMainCategory(false);
		$person = Article::getPerson($id);
		//print_r($person);
		Article::looking($id);


		$actor = Article::getPersonLimit($id,"AND `id_section` = 'Актеры' LIMIT 4");
		$rejes = Article::getPersonLimit($id,"AND `id_section` = 'Режиссер' LIMIT 4");
		$produs = Article::getPersonLimit($id,"AND `id_section` = 'Продюсер' LIMIT 4");


		$actorAll = Article::getPersonLimit($id,"AND `id_section` = 'Актеры'");
		$directorAll = Article::getPersonLimit($id,"AND `id_section` = 'Режиссер'");
		$produsAll = Article::getPersonLimit($id,"AND `id_section` = 'Продюсер'");
		$screenwriterAll = Article::getPersonLimit($id,"AND `id_section` = 'Сценаристы'");
		$asWellAsAll = Article::getPersonLimit($id,"AND `id_section` = 'А также'");
		$OperatorAll = Article::getPersonLimit($id,"AND `id_section` = 'Оператор'");
		$ComposerAll = Article::getPersonLimit($id,"AND `id_section` = 'Композитор'");
		$EditorsAll = Article::getPersonLimit($id,"AND `id_section` = 'Монтажеры'");


		/*Отбор данны в header где категории movie*/
		$getHeaderMovie = Mian::getSlaid('WHERE type="movie"   AND country != "Япония" AND  year = "2017" LIMIT 4');
		$getHeaderMovieLook = Mian::getSlaid('WHERE type="movie"    ORDER BY look DESC LIMIT 4 ');
		$getHeaderTwoMovie = Mian::getSlaid('WHERE type="movie"    ORDER BY look DESC  LIMIT 2');
		/*конец*/

		/*Отбор данны в header где категории serial*/
		$getHeaderSerial = Mian::getSlaid('WHERE type="serial"   AND country != "Япония" AND  year = "2017" LIMIT 4');
		$getHeaderSerialLook = Mian::getSlaid('WHERE type="serial"    ORDER BY look DESC LIMIT 4 ');
		$getHeaderTwoSerial = Mian::getSlaid('WHERE type="serial"    ORDER BY look DESC  LIMIT 2');
		/*конец*/

		/*Отбор данны в header где категории мултф*/
		$getHeaderMult = Mian::getSlaid('WHERE genre LIKE "%мультф%" OR genre LIKE "%анимац%"  AND country != "Япония" AND  year = "2017" LIMIT 4');
		$getHeaderMultLook = Mian::getSlaid('WHERE genre LIKE "%мультф%" OR genre LIKE "%анимац%"  ORDER BY look DESC LIMIT 4 ');
		$getHeaderTwoMult = Mian::getSlaid('WHERE genre LIKE "%мультф%" OR genre LIKE "%анимац%"  ORDER BY look DESC LIMIT 2');
		/*конец*/

		/*Отбор данны в header где категории movie*/
		/*$getComedy = Mian::getSlaid('WHERE genre LIKE "%комед%"   AND country != "Япония" AND  year = "2017" LIMIT 4');
		$getHeaderComedyLook = Mian::getSlaid('WHERE genre LIKE "%комед%"    ORDER BY look DESC LIMIT 4 ');
		$getHeaderTwoComedy = Mian::getSlaid('WHERE genre LIKE "%комед%"    ORDER BY look DESC LIMIT 2');*/
		/*конец*/


		$getMainCategory = Mian::getMainCategory(' WHERE level = 0 OR level = 9 ');
		$getCategoryLimit = Mian::getMainCategory('LIMIT 4');
		
		$oneTitleFilms = Mian::getOneTitle($id);
		

		if(isset($_POST['big']) || isset($_POST['small']) ){

			$big = addslashes($_POST['big']);
			$small = addslashes($_POST['small']);
			$id = addslashes($_POST['idFilm']);

			

			$oneTitleFilms = Article::insertAdmin( '`poster_film_big` = "'.$big.'"', ', `poster_film_small` = "'.$small.'"', $id);
			if(isset($oneTitleFilms)){
				header("Location /");
			}
			

		}else if(isset($_POST['text'])){

			$text = addslashes($_POST['text']);
			$id = addslashes($_POST['idFilm']);

			
			$oneTitleFilms = Article::insertAdmin('`description` = "'.$text.'", `priority` ="1" ', false, $id);
			if(isset($oneTitleFilms)){
				header("Location /");
			}

			
		}
		$getMainFilms = Article::getOneFilms($id);
		$getSimilarCat = Article::getLimitCat($getMainFilms['genre']);
		$getSimilarFilms = Article::getSimilarFilm($getSimilarCat);
		/*echo "<pre>";
		print_r($getSimilarCat);
		echo "</pre>";*/
		


		
		if(empty($getMainFilms))
		{
			header("Location /");

		}
		else
		{
			require_once(ROOT . '/views/article/index.php');
		}
		
		

		return true;
	}

	public function actionView($id)
	{
		if ($id) {
			$newsItem = Mian::getNewsItemByID($id);

			require_once(ROOT . '/views/main/view.php');


		}

		return true;

	}


	public function actionPerson($id)
	{
		$getOneTitlePerson = Mian::getOneTitlePerson($id);
		if ($id) {

			$onPerson = Article::getOnePerson($id);
			$oneId = Article::oneId($id);

			require_once(ROOT . '/views/person/index.php');


		}

		return true;

	}


	public function actionFilm($id)
	{
		if ($id) {
			
			$id = $_GET['id'];
			$oneId = Article::getFilms($id);

			
			

			$j=array("iframe"=>$oneId[0]['iframe_url'], "id"=>$oneId[0]['id_kp']);
        	echo json_encode(array_filter($j), JSON_UNESCAPED_UNICODE);

		}

		return true;

	}

}

