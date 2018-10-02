<?php


class Category
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
		
		$cat = Category::getOneCat($id);
		
		$url =  $_SERVER['REQUEST_URI'];
	    $ansArray = explode("/", $url);

	    
		
		$page = intval($page);            
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        //echo $offset.'off';
        $newsList = array();
        $db = Db::getConnection();

		if ($cat['sinonims'] ) {

			//$year = $ansArray[3];
			//echo $cat['sinonims'].'/'.$year;
			
			
			
			
			
            if($cat['level'] == '0'){
            	$ulsov = 'WHERE admin != 1 AND genre LIKE "%'.$cat['sinonims'].'%" LIMIT '.self::SHOW_BY_DEFAULT. ' OFFSET '. $offset;	
            }else if($cat['level'] == '9'){
            	$ulsov = 'WHERE admin != 1 AND country LIKE "%'.$cat['sinonims'].'%" LIMIT '.self::SHOW_BY_DEFAULT. ' OFFSET '. $offset;
            }else if($cat['level'] == '2'){
            	$ulsov = 'WHERE admin != 1 AND year LIKE "'.$cat['sinonims'].'" LIMIT '.self::SHOW_BY_DEFAULT. ' OFFSET '. $offset;
            }else if($cat['level'] == '3'){
            	$ulsov = 'WHERE  admin != 1 AND  type LIKE "'.$cat['sinonims'].'" LIMIT '.self::SHOW_BY_DEFAULT. ' OFFSET '. $offset;
            }



			$result = $db->query('SELECT * FROM `unic`'.$ulsov);


			while($row = $result->fetch()) {
				
				array_push($newsList, $row);
			}

			return $newsList;
		}


	}





	public static function getMoreFilmsYears($id,$year,$page = 1)
	{
		
		$cat = Category::getOneCat($id);
		
		$url =  $_SERVER['REQUEST_URI'];
	    $ansArray = explode("/", $url);

	    
		
		$page = intval($page);            
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        //echo $offset.'off';
        $newsList = array();
        $db = Db::getConnection();

		if ($cat['sinonims'] ) {

			if(!$ansArray[3]){
				$year = '';
			}else{
			$year = $ansArray[3];
			}
			//echo $cat['sinonims'].'/'.$year;
			
			
			
			
			
            if($cat['level'] == '0'){
            	$ulsov = 'WHERE admin != 1 AND  genre LIKE "%'.$cat['sinonims'].'%" AND year LIKE "'.$year.'" LIMIT '.self::SHOW_BY_DEFAULT. ' OFFSET '. $offset;	
            }else if($cat['level'] == '9'){
            	$ulsov = 'WHERE admin != 1 AND  country LIKE "%'.$cat['sinonims'].'%" AND year LIKE "'.$year.'"  LIMIT '.self::SHOW_BY_DEFAULT. ' OFFSET '. $offset;
            }else if($cat['level'] == '2'){
            	$ulsov = 'WHERE admin != 1 AND  year LIKE "'.$cat['sinonims'].'" AND year LIKE "'.$year.'"  LIMIT '.self::SHOW_BY_DEFAULT. ' OFFSET '. $offset;
            }else if($cat['level'] == '3'){
            	$ulsov = 'WHERE admin != 1 AND  type LIKE "'.$cat['sinonims'].'" AND year LIKE "'.$year.'"  LIMIT '.self::SHOW_BY_DEFAULT. ' OFFSET '. $offset;
            	//echo $ulsov;
            }



			$result = $db->query('SELECT * FROM `unic`'.$ulsov);


			while($row = $result->fetch()) {
				
				array_push($newsList, $row);
			}

			return $newsList;
		}


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




	public static function getTotalProductsInCategory($id)
    {
        $db = Db::getConnection();

        $cat = Category::getOneCat($id);

        if($cat['level'] == '0'){
        	$ulsov = 'WHERE admin != 1 AND  genre LIKE "%'.$cat['sinonims'].'%"';	
        }else if($cat['level'] == '9'){
        	$ulsov = 'WHERE  admin != 1 AND country LIKE "%'.$cat['sinonims'].'%"';
        }else if($cat['level'] == '2'){
        	$ulsov = 'WHERE  admin != 1 AND year LIKE "'.$cat['sinonims'].'"';
        }else if($cat['level'] == '3'){
        	$ulsov = 'WHERE  admin != 1 AND type LIKE "'.$cat['sinonims'].'"';
        }

        $result = $db->query('SELECT count(id_kp) AS count FROM `unic`'.$ulsov);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }



    public static function getTotalProductsInCategoryYear($id,$year)
    {
        $db = Db::getConnection();

        $cat = Category::getOneCat($id);


        	if($cat['level'] == '0'){
            	$ulsov = 'WHERE admin != 1 AND  genre LIKE "%'.$cat['sinonims'].'%" AND year LIKE "'.$year.'"';	
            }else if($cat['level'] == '9'){
            	$ulsov = 'WHERE admin != 1 AND  country LIKE "%'.$cat['sinonims'].'%" AND year LIKE "'.$year.'"';
            }else if($cat['level'] == '2'){
            	$ulsov = 'WHERE  admin != 1 AND year LIKE "'.$cat['sinonims'].'" AND year LIKE "'.$year.'"';
            }else if($cat['level'] == '3'){
            	$ulsov = 'WHERE  admin != 1 AND type LIKE "'.$cat['sinonims'].'" AND year LIKE "'.$year.'"';
            	//echo $ulsov;
            }

        $result = $db->query('SELECT count(id_kp) AS count FROM `unic`'.$ulsov);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }

}