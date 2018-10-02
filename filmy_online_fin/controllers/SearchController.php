<?php


class SearchController {


	const SHOW_BY_DEFAULT = 20;







	public function actionIndex($nameUrl, $page = 1)
	{
		

		$cat = Search::getOneCat($id ='search');

		/*Отбор данны в header где категории movie*/
		$getHeaderMovie = Mian::getSlaid('WHERE admin != 1 AND  type="movie"  AND admin != 1 AND country != "Япония" AND  year = "2017" LIMIT 4');
		$getHeaderMovieLook = Mian::getSlaid('WHERE admin != 1 AND  type="movie"  AND admin != 1  ORDER BY look DESC LIMIT 4 ');
		$getHeaderTwoMovie = Mian::getSlaid('WHERE admin != 1 AND  type="movie"  AND admin != 1  ORDER BY look DESC  LIMIT 2');
		/*конец*/

		/*Отбор данны в header где категории serial*/
		$getHeaderSerial = Mian::getSlaid('WHERE admin != 1 AND  type="serial" AND admin != 1  AND country != "Япония" AND  year = "2017" LIMIT 4');
		$getHeaderSerialLook = Mian::getSlaid('WHERE admin != 1 AND  type="serial"   AND admin != 1 ORDER BY look DESC LIMIT 4 ');
		$getHeaderTwoSerial = Mian::getSlaid('WHERE admin != 1 AND  type="serial"  AND admin != 1  ORDER BY look DESC  LIMIT 2');
		/*конец*/

		/*Отбор данны в header где категории мултф*/
		$getHeaderMult = Mian::getSlaid('WHERE admin != 1 AND  genre LIKE "%мультф%"  AND admin != 1 AND country != "Япония" AND  year = "2017" LIMIT 4');
		$getHeaderMultLook = Mian::getSlaid('WHERE admin != 1 AND  genre LIKE "%мультф%"  AND admin != 1  ORDER BY look DESC LIMIT 4 ');
		$getHeaderTwoMult = Mian::getSlaid('WHERE admin != 1 AND  genre LIKE "%мультф%"  AND admin != 1  ORDER BY look DESC LIMIT 2');
		/*конец*/

		/*Отбор данны в header где категории movie*/
		$getComedy = Mian::getSlaid('WHERE admin != 1 AND  genre LIKE "%комед%" AND admin != 1  AND country != "Япония" AND  year = "2017" LIMIT 4');
		$getHeaderComedyLook = Mian::getSlaid('WHERE admin != 1 AND  genre LIKE "%комед%" AND admin != 1   ORDER BY look DESC LIMIT 4 ');
		$getHeaderTwoComedy = Mian::getSlaid('WHERE admin != 1 AND  genre LIKE "%комед%"  AND admin != 1  ORDER BY look DESC LIMIT 2');
		/*конец*/


		$getMainCategory = Mian::getMainCategory(' WHERE level = 0 OR level = 9 ');
		$getCategoryLimit = Mian::getMainCategory('LIMIT 4');



			$url =  urldecode($_SERVER['REQUEST_URI']);

	    	$ansArray = explode("/", $url);
	    	
	    	
	    	
	    	
			
			$getMainCategory = Category::getMainCategory(false);

			if(!empty($_POST['search'])){
			
					$bbb = $_POST['search'];
					
			}
			else if($ansArray['2']){

					$bbb = $ansArray['2'];
					
			}
			
			
            
		    		
					$search = Search::getMoreFilms($bbb,$page);
					$total = Search::getTotalProductsInSearch($bbb);
					$pagination = new Pagination($total, $page, Search::SHOW_BY_DEFAULT, 'page-');


					require_once(ROOT . '/views/search/index.php');






			


		
		

		return true;
	}

	public function actionView($id)
	{
		if ($id) {
			$newsItem = Search::getNewsItemByID($id);

			require_once(ROOT . '/views/main/view.php');


		}

		return true;

	}

}

