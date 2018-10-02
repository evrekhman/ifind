<?php


class Mian
{




	function __construct() {
        /*Отбор данны в header где категории movie*/
		$getHeaderMovie = Mian::getSlaid('WHERE admin != 1 AND  type="movie"   AND country != "Япония"  LIMIT 4');
		$getHeaderMovieLook = Mian::getSlaid('WHERE admin != 1 AND  type="movie"    ORDER BY look DESC LIMIT 4 ');
		$getHeaderTwoMovie = Mian::getSlaid('WHERE admin != 1 AND  type="movie"    ORDER BY look DESC  LIMIT 2');
		/*конец*/

		/*Отбор данны в header где категории serial*/
		$getHeaderSerial = Mian::getSlaid('WHERE admin != 1 AND  type="serial"   AND country != "Япония" LIMIT 4');
		$getHeaderSerialLook = Mian::getSlaid('WHERE admin != 1 AND  type="serial"    ORDER BY look DESC LIMIT 4 ');
		$getHeaderTwoSerial = Mian::getSlaid('WHERE admin != 1 AND  type="serial"    ORDER BY look DESC  LIMIT 2');
		/*конец*/

		/*Отбор данны в header где категории мултф*/
		$getHeaderMult = Mian::getSlaid('WHERE admin != 1 AND  genre LIKE "%мультф%"   AND country != "Япония" LIMIT 4');
		$getHeaderMultLook = Mian::getSlaid('WHERE admin != 1 AND  genre LIKE "%мультф%"    ORDER BY look DESC LIMIT 4 ');
		$getHeaderTwoMult = Mian::getSlaid('WHERE admin != 1 AND  genre LIKE "%мультф%"    ORDER BY look DESC LIMIT 2');
		/*конец*/

		/*Отбор данны в header где категории movie*/
		$getComedy = Mian::getSlaid('WHERE admin != 1 AND  genre LIKE "%комед%"   AND country != "Япония" LIMIT 4');
		$getHeaderComedyLook = Mian::getSlaid('WHERE admin != 1 AND  genre LIKE "%комед%"    ORDER BY look DESC LIMIT 4 ');
		$getHeaderTwoComedy = Mian::getSlaid('WHERE admin != 1 AND  genre LIKE "%комед%"    ORDER BY look DESC LIMIT 2');
		/*конец*/
   }

	/** Returns single news items with specified id
	* @rapam integer &id
	*/

	public static function getNewsItemByID($id)
	{
		$id = intval($id);

		if ($id) {

			$db = Db::getConnection();
			$result = $db->query('SELECT * FROM `user` WHERE id=' . $id);

			
			$result->setFetchMode(PDO::FETCH_ASSOC);

			$newsItem = $result->fetch();

			return $newsItem;
		}

	}


	

	/**
	* Returns an array of news items
	*/
	public static function getNewsList() {


		$db = Db::getConnection();
		$newsList = array();

		$result = $db->query('SELECT * FROM `user` ORDER BY id ASC LIMIT 10');

		$i = 0;
		while($row = $result->fetch()) {
			array_push($newsList, $row);
		}

		return $newsList;
	
}

	public static function getSlaid($uslov) {


			$db = Db::getConnection();
			$newsList = array();

			$result = $db->query('SELECT * FROM `unic`'.$uslov);

			$i = 0;
			while($row = $result->fetch()) {
				array_push($newsList, $row);
			}

			return $newsList;
		
	}
	
	
		public static function getMainFilms() {


			$db = Db::getConnection();
			$newsList = array();

			$result = $db->query('SELECT * FROM `unic` WHERE admin != 1 AND  slaid=0 AND poster_film_big!="" AND rating_imdb >= 8 AND country != "Япония" LIMIT 100');

			$i = 0;
			while($row = $result->fetch()) {
				array_push($newsList, $row);
			}

			return $newsList;
		
	}
	
		public static function getMainCategory($uslov) {


			$db = Db::getConnection();
			$newsList = array();

			$result = $db->query('SELECT * FROM `cat_films`'.$uslov);

			$i = 0;
			while($row = $result->fetch()) {
				array_push($newsList, $row);
			}

			return $newsList;
		
	}	


	public static function getOneTitle($uslov) {


			if (isset($uslov)) {

			$db = Db::getConnection();
			$result = $db->query('SELECT * FROM `unic` WHERE admin != 1 AND  id_kp=' . $uslov);

			
			$result->setFetchMode(PDO::FETCH_ASSOC);

			$newsItem = $result->fetch();

			return $newsItem;
		}
		
	}


	public static function getOneTitlePerson($uslov) {


			if (isset($uslov)) {

			$db = Db::getConnection();
			$result = $db->query('SELECT DISTINCT `id_person`,`name_ru`,`name_eng`,`id_section` FROM `person` WHERE `id_person`=' . $uslov);

			
			$result->setFetchMode(PDO::FETCH_ASSOC);

			$newsItem = $result->fetch();

			return $newsItem;
		}
		
	}

	public static function translit($str) {
    $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я',' – ',':','(',')');
    $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya','-','','','');
    return str_replace($rus, $lat, $str);
  }


 	public static function indivTitle($a=false,$b=false,$request=false,$person=false,$personEng=false){

        if($request=="serial" and $b!=='2017'){
            return  $a.'смотреть онлайн все сезоны';
        }else if($request=="serial" and $b=='2017'){
            return $a.' смотреть онлайн все сезоны 2017';
        }
        else if($request=="movie"){
            return $a.' '.$b.' смотреть онлайн';
        }
        else if($request=="null"){
            return $a.' смотреть онлайн '.$b;
        }
        else if($person && $personEng==""){
        	return $person.' фильмы онлайн , фильмы с участием '.$person;
        }
        else if($person!=="" && $personEng!==""){
        	return $person.' ('.$personEng.') фильмы онлайн , фильмы с участием '.$person;
        }
        else{
        	return $a.' смотреть онлайн '.$b;
        }
}



	public static function admin($a,$b){
			if(isset($a,$b)){
				
					$db = Db::getConnection();

					$newsList = array();
					

					$result = $db->query('SELECT * FROM `user` WHERE email="'.$a.'" AND password = "'.$b.'" ');
					if($result){
					$i = 0;
					$row = $result->fetch();
						

						
						$_SESSION['admin'] = $row['name'];

					
						return true;
					}else{

				       	$newsList = array_push($newsList, array('1'=>'не правильно'));

				    }



				
	        }
	}


	public static function getTopFilms($uslov){
			$db = Db::getConnection();
			$newsList = array();

			$result = $db->query('SELECT * FROM `unic`'.$uslov);

			$i = 0;
			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				array_push($newsList, $row);
			}

			return $newsList;
	}



}