<?php


class Search
{

	const SHOW_BY_DEFAULT = 20;

	public static function getOneCat($id)
	{
		//$id = intval($id);
		//public $id;
		if ($id) {

			$db = Db::getConnection();
			$sql = 'SELECT * FROM cat_films WHERE okon=:id';
			$result = $db->prepare($sql);
			$result->bindParam(':id', $id, PDO::PARAM_STR);
			
			$result->setFetchMode(PDO::FETCH_ASSOC);

			$result->execute();

			return $result->fetch();
		}

	}



	public static function getMoreFilms($id,$page = 1)
	{
		
		
		$page = intval($page);            
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;


		if ($id) {


			$newsList = array();
			$db = Db::getConnection();
			$result = $db->query('SELECT * FROM `unic` WHERE  admin != 1 AND  name_ru LIKE "%'.$id.'%" 	ORDER BY look DESC LIMIT '.self::SHOW_BY_DEFAULT. ' OFFSET '. $offset);
			
			
			
			

			while($row = $result->fetch()) {
				
				array_push($newsList, $row);
			}

			return $newsList;
		}


	}



	public static function ajaxMoreFilms($id)
	{
		
		

		

		if (preg_match("/^[ -\_0-9a-zа-яё]+$/iu",$id)) {
			$iii = addslashes($id);
			$newsList = array();
			$db = Db::getConnection();
			$result = $db->query('SELECT * FROM `unic` 
									WHERE admin != 1 AND  name_ru LIKE "%'.$iii.'%" AND admin != 1
									LIMIT 5');
			

			while($row = $result->fetch()) {
				
				array_push($newsList, $row);
			}

			$array=array();
			 
			foreach($newsList as $k=>$v){
			        
					 $id = $v['id_kp'];
					 $type = $v['type'];
					 $poster = $v['poster_film_small'];
					 $name = $v['name_ru'];
        			 
    			     array_push($array,array('id'=>$id, 'type'=>$type, 'poster'=>$poster, 'name'=>$name ));

    			     //$films[] = {$v['id_kp'],$v['type'],$v['poster_film_small'],$v['name_ru']};	

			 }

			echo json_encode(array_filter($array), JSON_UNESCAPED_UNICODE);
		}


	}




	public static function getMainSearch($uslov) {


			$db = Db::getConnection();
			$newsList = array();

			$result = $db->query('SELECT * FROM `cat_films`'.$uslov);

			$i = 0;
			while($row = $result->fetch()) {
				$newsList[$i]['id_kp'] = $row['id_kp'];
				$newsList[$i]['name'] = $row['name'];
				$newsList[$i]['okon'] = $row['okon'];
				//$newsList[$i]['author_name'] = $row['author_name'];
				//$newsList[$i]['short_content'] = $row['short_content'];
				$i++;
			}

			return $newsList;
		
	}




	public static function getTotalProductsInSearch($id)
    {
        $db = Db::getConnection();

        

        $result = $db->query('SELECT count(id_kp) AS count FROM `unic` WHERE  admin != 1 AND  name_ru LIKE "%'.$id.'%"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }


    

}