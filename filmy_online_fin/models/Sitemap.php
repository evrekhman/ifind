<?php


class Sitemap
{

	public static function translit($str) {
    $rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я',' – ',':','(',')');
    $lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya','-','','','');
    return str_replace($rus, $lat, $str);
  }

	public static function select_array_db($mysqli,$query){
    	$array=array();
    
	    $result = $mysqli->query($query);
	    if($result){
	            while($row = $result->fetch())
	        {
	            array_push($array,$row);
	        }
	        //$result->free();
	        return $array;
	    }
	}
	

	public static function getSetup($mysqli)
	{
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$level=$_SERVER['DOCUMENT_ROOT'];
		$mysqli = Db::getConnection();
		$site='http://filmy-online.cc/';
	
		$array=array();

		array_push($array,$site);


		$sinonimsCAT=Sitemap::select_array_db($mysqli,"SELECT * FROM `cat_films` WHERE `level`!=1");

		foreach($sinonimsCAT as $value){
		    $cat=$value['okon'];
		    $itog_key.="\n<url>\n<loc>\n".$site.'category/'.$cat.'/'."\n</loc>\n<priority>\n1.0\n</priority>\n</url>";
		}

		$sinonimsURL=Sitemap::select_array_db($mysqli,"SELECT  `id_kp`,`type`,`priority` FROM `unic` WHERE `admin`!=1");

		foreach($sinonimsURL as $valueURL){
		    $traURL=Sitemap::translit($valueURL['id_kp']);
		    $typeURL=$valueURL['type'];
		    if($typeURL!=""){
				$itog_key.="\n<url>\n<loc>\n".$site.$typeURL.'/'.$traURL.'/'."\n</loc>\n<priority>\n";
				if($valueURL['priority']=='1'){$itog_key.="1.0";}else{$itog_key.="1.0";}
				$itog_key.="\n</priority>\n</url>";
		    }
		    if($typeURL==""){
				$itog_key.="\n<url>\n<loc>\n".$site.'movie/'.$traURL.'/'."\n</loc>\n<priority>\n";
				if($valueURL['priority']=='1'){$itog_key.="1.0";}else{$itog_key.="1.0";}
				$itog_key.="\n</priority>\n</url>";    
		    }
		}





		$itog_key='<?xml version="1.0" encoding="utf-8"?>
		<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'.$itog_key."</urlset>";

		echo '<textarea cols="50" rows="20">'.implode("\n",$array).'</textarea>';


		$file = 'sitemap.xml';
		file_put_contents($file, $itog_key);





	}


	



}