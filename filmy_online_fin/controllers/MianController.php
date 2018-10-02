<?php


class MianController {

	public function actionIndex()
	{
		
		$newsList = array();
		$getMainFilms = Mian::getMainFilms();

		$cat = Category::getOneCat($id ='main');

		$getSlaid = Mian::getSlaid('WHERE admin != 1 AND year=2017 AND prov=1 ORDER BY id ASC LIMIT 15');

		$getSlaidComedy = Mian::getSlaid('WHERE  poster_film_big!="" AND admin != 1 AND country != "Япония" AND year=2017 LIMIT 15');//'WHERE  poster_film_big!="" AND admin != 1 AND country != "Япония" AND genre = "комедия" LIMIT 15'
		$getSlaidHistory = Mian::getSlaid('WHERE poster_film_big!=""  AND admin != 1 AND country != "Япония" AND type="serial" LIMIT 15');

		$getSlaidSerial = Mian::getSlaid('WHERE slaid=0 AND poster_film_big!=""  AND admin != 1 AND country != "Япония" AND type LIKE "%serial%"  LIMIT 15');

		$getSlaidMovie = Mian::getSlaid('WHERE  admin != 1  ORDER BY look DESC LIMIT 8');

		$getSlaidMult = Mian::getSlaid('WHERE slaid=0 AND poster_film_big!="" AND admin != 1 AND country != "Япония" AND genre LIKE "%мультфильм%"  LIMIT 8');

		$getSlaidNew = Mian::getSlaid('WHERE slaid=0 AND poster_film_big!=""  AND admin != 1 AND country != "Япония" AND  year = "2017" LIMIT 8');


		/*Отбор данны в header где категории movie*/
		$getHeaderMovie = Mian::getSlaid('WHERE type="movie"  AND admin != 1 AND country != "Япония" LIMIT 5');
		$getHeaderMovieLook = Mian::getSlaid('WHERE type="movie"  AND admin != 1  ORDER BY look DESC LIMIT 5 ');
		$getHeaderTwoMovie = Mian::getSlaid('WHERE type="movie"  AND admin != 1  ORDER BY look DESC  LIMIT 2');
		/*конец*/

		/*Отбор данны в header где категории serial*/
		$getHeaderSerial = Mian::getSlaid('WHERE type="serial"  AND admin != 1 AND country != "Япония" LIMIT 5');
		$getHeaderSerialLook = Mian::getSlaid('WHERE type="serial"  AND admin != 1  ORDER BY look DESC LIMIT 5 ');
		$getHeaderTwoSerial = Mian::getSlaid('WHERE type="serial"  AND admin != 1  ORDER BY look DESC  LIMIT 2');
		/*конец*/

		/*Отбор данны в header где категории мултф*/
		$getHeaderMult = Mian::getSlaid('WHERE genre LIKE "%мультф%" OR genre LIKE "%анимац%"  AND admin != 1 AND country != "Япония" LIMIT 5');
		$getHeaderMultLook = Mian::getSlaid('WHERE genre LIKE "%мультф%" OR genre LIKE "%анимац%" AND admin != 1  ORDER BY look DESC LIMIT 5 ');
		$getHeaderTwoMult = Mian::getSlaid('WHERE genre LIKE "%мультф%" OR genre LIKE "%анимац%" AND admin != 1   ORDER BY look DESC LIMIT 2');
		/*конец*/

		/*Отбор данны в header где категории movie*/
		/*$getComedy = Mian::getSlaid('WHERE genre LIKE "%комед%"  AND admin != 1 AND country != "Япония" AND  year = "2017" LIMIT 5');
		$getHeaderComedyLook = Mian::getSlaid('WHERE genre LIKE "%комед%"  AND admin != 1  ORDER BY look DESC LIMIT 5 ');
		$getHeaderTwoComedy = Mian::getSlaid('WHERE genre LIKE "%комед%"  AND admin != 1  ORDER BY look DESC LIMIT 2');*/
		/*конец*/


		$getMainCategory = Mian::getMainCategory(' WHERE level = 0 OR level = 9 ');
		$getCategoryLimit = Mian::getMainCategory('LIMIT 15');
		
		$arr = Mian::getTopFilms('WHERE slaid=0 AND poster_film_big!=""  AND admin != 1 AND country != "Япония"  LIMIT 10');
		
		require_once(ROOT . '/views/main/index.php');

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

	public function actionGetfilms($post)
	{
		//print_r($_POST);
		if ($_POST['post']==1) {
			
			$arr = Mian::getTopFilms('WHERE slaid=0 AND poster_film_big!="" AND admin != 1 AND country != "Япония" LIMIT 10');
			//$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

			echo json_encode($arr);
		}
		if ($_POST['post']==2) {
			
			$arr = Mian::getTopFilms('WHERE `type`="movie" AND admin != 1 LIMIT 10');
			echo json_encode($arr);
		}
		if ($_POST['post']==3) {
			
			$arr = Mian::getTopFilms('WHERE `type`="serial" AND admin != 1 LIMIT 10');
			echo json_encode($arr);
		}
		if ($_POST['post']==4) {
			
			$arr = Mian::getTopFilms('WHERE genre LIKE "%анимац%" AND admin != 1 LIMIT 10');
			echo json_encode($arr);
		}
		return true;

	}





	function actionAbout(){
		require_once(ROOT . '/views/about/index.php');
	}

}

