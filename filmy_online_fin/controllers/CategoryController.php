<?php


class CategoryController {

	public function actionIndex($id, $page = 1)
	{

		
		$getMainCategory = Category::getMainCategory(' WHERE level = 0 OR level = 9 ');
		$limit = Category::getMoreFilms($id,$page);
		$cat = Category::getOneCat($id);
		$getCategoryLimit = Mian::getMainCategory('LIMIT 4');
		//echo $id;
		$total = Category::getTotalProductsInCategory($id);
		
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
		$getHeaderMultLook = Mian::getSlaid('WHERE genre LIKE "%мультф%"  OR genre LIKE "%анимац%"   ORDER BY look DESC LIMIT 4 ');
		$getHeaderTwoMult = Mian::getSlaid('WHERE genre LIKE "%мультф%"   OR genre LIKE "%анимац%"  ORDER BY look DESC LIMIT 2');
		/*конец*/

		/*Отбор данны в header где категории movie*/
		/*$getComedy = Mian::getSlaid('WHERE genre LIKE "%комед%"   AND country != "Япония" AND  year = "2017" LIMIT 4');
		$getHeaderComedyLook = Mian::getSlaid('WHERE genre LIKE "%комед%"    ORDER BY look DESC LIMIT 4 ');
		$getHeaderTwoComedy = Mian::getSlaid('WHERE genre LIKE "%комед%"    ORDER BY look DESC LIMIT 2');*/
		/*конец*/


		$getMainCategory = Mian::getMainCategory(' WHERE level = 0 OR level = 9 ');
		$getCategoryLimit = Mian::getMainCategory('LIMIT 4');
		
		$pagination = new Pagination($total, $page, Category::SHOW_BY_DEFAULT, 'page-');


		require_once(ROOT . '/views/category/index.php');

		return true;
	}













	public function actionView($id,$year=0,$page = 1)
	{
		$getMainCategory = Category::getMainCategory(' WHERE level = 0 OR level = 9 ');
		//echo $id;
		//echo "asdasdasdsa";
		$limit = Category::getMoreFilmsYears($id,$year,$page);


		$cat = Category::getOneCat($id);




		$getCategoryLimit = Mian::getMainCategory('LIMIT 4');
		//echo $id;
		$total = Category::getTotalProductsInCategoryYear($id,$year);
		
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
		$getHeaderMult = Mian::getSlaid('WHERE genre LIKE "%мультф%" OR genre LIKE "%анимац%" AND country != "Япония" AND  year = "2017" LIMIT 4');
		$getHeaderMultLook = Mian::getSlaid('WHERE genre LIKE "%мультф%" OR genre LIKE "%анимац%" ORDER BY look DESC LIMIT 4 ');
		$getHeaderTwoMult = Mian::getSlaid('WHERE genre LIKE "%мультф%" OR genre LIKE "%анимац%" ORDER BY look DESC LIMIT 2');
		/*конец*/

		/*Отбор данны в header где категории movie*/
		/*$getComedy = Mian::getSlaid('WHERE genre LIKE "%комед%"   AND country != "Япония" AND  year = "2017" LIMIT 4');
		$getHeaderComedyLook = Mian::getSlaid('WHERE genre LIKE "%комед%"    ORDER BY look DESC LIMIT 4 ');
		$getHeaderTwoComedy = Mian::getSlaid('WHERE genre LIKE "%комед%"    ORDER BY look DESC LIMIT 2');*/
		/*конец*/


		$getMainCategory = Mian::getMainCategory(' WHERE level = 0 OR level = 9 ');
		$getCategoryLimit = Mian::getMainCategory('LIMIT 4');
		
		$pagination = new Pagination($total, $page, Category::SHOW_BY_DEFAULT, 'page-');


		require_once(ROOT . '/views/category/index.php');

		return true;

	}

}

