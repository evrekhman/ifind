<?php


class Article
{

	/** Returns single news items with specified id
	* @rapam integer &id
	*/


	public static function getLimitCat($id)
	{
		
         $newsList = array();
		if (isset($id)) {

			$db = Db::getConnection();

			if($arr_genre = explode(",", $id)){
				//print_r($arr_genre);
	            foreach ($arr_genre as $key => $value) {
	            	//mb_internal_encoding("UTF-8");
	           		//$val = mb_substr($value, 0,5);
	           		//echo $val;
	           		$result = $db->query("SELECT * FROM `cat_films` WHERE `sinonims` LIKE '%$value%' ");
	           		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				
							array_push($newsList, $row);
						}

			         
	               }
          	}else{
          			
          			$result = $db->query("SELECT * FROM `cat_films` WHERE `sinonims` LIKE '%$id%' ");
          			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				
							array_push($newsList, $row);
						}

			         
          	}

         	
          	return $newsList;
             
		}

	}


	public static function getSimilarFilm($id)
	{
		
		if (isset($id)) {

			//print_r($id);
			
			$db = Db::getConnection();
			$num = count($id);
			$newsList = array();
			for ($i=0; $i < $num; $i++) { 
				if($arr_genre = explode(",", $id[$i]['sinonims'])){

		            foreach ($arr_genre as $key => $value) {
		           		
		           		$result = $db->query("SELECT * FROM `unic` WHERE `genre` LIKE '%$value%' limit 4");
		           		while($row = $result->fetch(PDO::FETCH_ASSOC)) {
								
								array_push($newsList, $row);
							}

				         return $newsList;
		               }
	          	}
			}
			
			



		}

	}



	public static function getOneFilms($id)
	{
		//$id = intval($id);

		if (isset($id)) {

			$db = Db::getConnection();
			$result = $db->query('SELECT * FROM `unic` WHERE  admin != 1 AND id_kp=' . $id);

			
			$result->setFetchMode(PDO::FETCH_ASSOC);

			$newsItem = $result->fetch();

			return $newsItem;
		}

	}



	public static function looking($id)
	{
		$look = Article::getOneFilms($id);
		$num = $look['look'] + 1;

		if (isset($id)) {

			$db = Db::getConnection();
			$result = $db->query('UPDATE `unic` SET `look`= "'.$num.'" WHERE `id_kp` = "'.$id.'" ');

			
			
		}

	}



	public static function getPerson($id)
	{
		//$id = intval($id);

		if (isset($id)) {
			$newsList = array();
			$db = Db::getConnection();
			$result = $db->query('SELECT * FROM `person` WHERE `id_kp`  LIKE "'.$id.'"');

			
			while($row = $result->fetch()) {
				
				array_push($newsList, $row);
			}

			return $newsList;
		}

	}

	/**
	* Returns an array of news items
	*/
	public static function getNewsList() {


		$db = Db::getConnection();
		$newsList = array();

		$result = $db->query('SELECT * FROM user ORDER BY id ASC LIMIT 10');

		$i = 0;
		while($row = $result->fetch()) {
			$newsList[$i]['id'] = $row['id'];
			//$newsList[$i]['title'] = $row['title'];
			//$newsList[$i]['date'] = $row['date'];
			//$newsList[$i]['author_name'] = $row['author_name'];
			//$newsList[$i]['short_content'] = $row['short_content'];
			$i++;
		}

		return $newsList;
	
}

	public static function getSlaid() {


			$db = Db::getConnection();
			$newsList = array();

			$result = $db->query('SELECT * FROM `unic` WHERE admin != 1 AND slaid=0 AND poster_film_big!="" AND rating_imdb >= 8 AND country != "Япония" LIMIT 4');

			$i = 0;
			while($row = $result->fetch()) {
				$newsList[$i]['id'] = $row['id'];
				$newsList[$i]['name_ru'] = $row['name_ru'];
				$newsList[$i]['poster_film_big'] = $row['poster_film_big'];
				$newsList[$i]['type'] = $row['type'];
				//$newsList[$i]['short_content'] = $row['short_content'];
				$i++;
			}

			return $newsList;
		
	}
	
	
		public static function getMainFilms() {


			$db = Db::getConnection();
			$newsList = array();

			$result = $db->query('SELECT * FROM `unic` WHERE admin != 1 AND slaid=0 AND poster_film_big!="" AND rating_imdb >= 8 AND country != "Япония" LIMIT 100');

			$i = 0;
			while($row = $result->fetch()) {
				$newsList[$i]['id'] = $row['id'];
				$newsList[$i]['name_ru'] = $row['name_ru'];
				$newsList[$i]['poster_film_big'] = $row['poster_film_big'];
				//$newsList[$i]['author_name'] = $row['author_name'];
				//$newsList[$i]['short_content'] = $row['short_content'];
				$i++;
			}

			return $newsList;
		
	}
	
		public static function getMainCategory($uslov) {


			$db = Db::getConnection();
			$newsList = array();

			$result = $db->query('SELECT * FROM `unic`'.$uslov);

			$i = 0;
			while($row = $result->fetch()) {
				$newsList[$i]['id'] = $row['id'];
				$newsList[$i]['name_ru'] = $row['name'];
				//$newsList[$i]['poster_film_big'] = $row['poster_film_big'];
				//$newsList[$i]['author_name'] = $row['author_name'];
				//$newsList[$i]['short_content'] = $row['short_content'];
				$i++;
			}

			return $newsList;
		
	}	



	public static function insertAdmin($uslov=false,$uslov2=false,$id=false)
	{
		

		

			$db = Db::getConnection();
			if(isset($uslov) || isset($uslov2)){
				$result = $db->query('UPDATE `unic` SET '.$uslov.$uslov2.' WHERE `id_kp` = "'.$id.'"');
			}
			
			
			//echo 'UPDATE `unic` SET '.$uslov.$uslov2.' WHERE `id_kp` = "'.$id.'"';

			//echo 'UPDATE `unic` SET `description` = "'.$text.'" WHERE `id_kp` = "'.$id.'"';
			
			if(!$result){
				return false;
			}

			
		

	}




	/*public static function insertAdmin($id=false,$text=false,$big=false,$small=false)
	{
		

		

			$db = Db::getConnection();
			if(isset($_POST['big']) || isset($_POST['small'])){
				$result = $db->query('UPDATE `unic` SET `poster_film_big` = "'.$big.'", `poster_film_small` = "'.$small.'" WHERE `id_kp` = "'.$id.'"');
			}
			else if(isset($_POST['text'])){
				$result = $db->query('UPDATE `unic` SET `description` = "'.$text.'" WHERE `id_kp` = "'.$id.'"');
			}
			
			//echo 'UPDATE `unic` SET `poster_film_big` = "'.$big.'" OR `poster_film_small` = "'.$small.'" WHERE `id_kp` = "'.$id.'"';

			//echo 'UPDATE `unic` SET `description` = "'.$text.'" WHERE `id_kp` = "'.$id.'"';
			
			if(isset($result)){
				return true;
			}else{
				return false;
			}

			
		

	}*/


	public static function getOnePerson($id)
	{
		//$id = intval($id);

		if (isset($id)) {
			$newsList = array();
			$db = Db::getConnection();
			$result = $db->query("SELECT DISTINCT name_ru,id_person,id_section,name_eng
									FROM person
									WHERE `id_person`  LIKE '".$id."'");

				
			
			$result->setFetchMode(PDO::FETCH_ASSOC);

			$newsItem = $result->fetch();

			return $newsItem;
		}

	}

	public static function getPersonLimit($id,$limit)
	{
		//$id = intval($id);

		if (isset($id)) {
			$newsList = array();
			$db = Db::getConnection();
			$result = $db->query("SELECT DISTINCT name_ru,id_person
									FROM person
									WHERE `id_kp`  LIKE '".$id."'".$limit);

				//SELECT * FROM `person` WHERE `id_kp`  LIKE '".$id."'".$limit);
			//echo "SELECT * FROM `person` WHERE `id_kp`  LIKE '".$id."'";
			
			while($row = $result->fetch()) {
				
				array_push($newsList, $row);
			}

			return $newsList;
		}

	}





	public static function getIdperson($id)
	{
		//$id = intval($id);

		if (isset($id)) {
			$newsList = array();
			$db = Db::getConnection();
			$result = $db->query('SELECT * FROM `person` WHERE `kp_id_person`  LIKE "'.$id.'"');

			
			while($row = $result->fetch()) {
				
				array_push($newsList, $row);
			}

			return $newsList;
		}

	}


	public static function oneId($id)
	{
		
		if (isset($id)) {
			$newsList = array();
			$db = Db::getConnection();

			$sql = 'SELECT DISTINCT person.id_kp, person.id_person, person.id_section, unic.id_kp, unic.name_ru, unic.type, unic.poster_film_small 
				FROM person LEFT JOIN unic
				 ON person.id_kp = unic.id_kp 
				 WHERE person.id_person = "'.$id.'" ';

			$result = $db->query($sql);

			while($row = $result->fetch(PDO::FETCH_ASSOC)) {
				
				array_push($newsList, $row);
			}

			return $newsList;
		}

	}

	public static function getFilms($id)
	{
		//$id = intval($id);

		if (isset($id)) {
			$newsList = array();
			$db = Db::getConnection();
			$result = $db->query('SELECT * FROM `unic` WHERE admin != 1 AND `id_kp`  LIKE "'.$id.'"');

			
			while($row = $result->fetch()) {
				
				array_push($newsList, $row);
			}

			return $newsList;
		}

	}






}