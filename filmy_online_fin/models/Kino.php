<?php


class Kino
{
  
  public static function db_edit_query($mysqli,$query){
        $result = $mysqli->query($query);
        return $result;
    }


  public static function select_array_db($mysqli,$query){
        $array=array();
        
        $result = $mysqli->query($query);
        if($result){
                while($row = $result->fetch())
            {
                array_push($array,$row);
            }
            
            return $array;
        }
    }

  public static function resize($filename,$url) {
	// файл и новый размер
		$percent = 0.9;
		
		// тип содержимого
		//header('Content-Type: image/jpeg');

		// получение новых размеров
		list($width, $height) = getimagesize($filename);
		$new_width = $width * $percent;
		$new_height = $height * $percent;

		// ресэмплирование
		$image_p = imagecreatetruecolor($new_width, $new_height);
		$image = imagecreatefromjpeg($filename);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);


				// вывод
		imagejpeg($image_p, $imagePath = $_SERVER["DOCUMENT_ROOT"].'/copy/'.$url.'-copy.png');

		return $imagePath;

}

 public static function woterMark($filePath, $stampPath, $id_kp, $k) {
	if (!$filePath) {
		throw new Exception("Need path!", 1);
	} elseif (!$stampPath) {
		throw new Exception("Need 'stamp' path!", 1);
	}


		// Загрузка штампа и фото, для которого применяется водяной знак (называется штамп или печать)
	$stamp = imagecreatefrompng($stampPath);
	$im = imagecreatefromjpeg($filePath);

	// Установка полей для штампа и получение высоты/ширины штампа
	$marge_right = 2;
	$marge_bottom = 2;
	$sx = imagesx($stamp);
	$sy = imagesy($stamp);

	// Копирование изображения штампа на фотографию с помощью смещения края
	// и ширины фотографии для расчета позиционирования штампа. 
	// Слияние штампа с фотографией. Прозрачность 50%
	imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 20);
	$db = Db::getConnection();
	if($k=="plus"){
		// Сохранение фотографии в файл и освобождение памяти
		imagepng($im, $_SERVER["DOCUMENT_ROOT"].'/copy/plus-'.$id_kp.'_woter.png');
		$imgg = '/copy/plus-'.$id_kp.'_woter.png';
		$in = Ajax::db_edit_query($db,"UPDATE `unic_films` SET `img_big_plus` = '$imgg'  WHERE `id_kp` = '$id_kp' AND `prov`=0 ");
		$in1 = Ajax::db_edit_query($db,"UPDATE `unic` SET `img_big_plus` = '$imgg'  WHERE `id_kp` = '$id_kp' AND `prov`=0 ");
		//echo "UPDATE `unic` SET `img_big_plus` = '$imgg'  WHERE `id` = '$id'";
	}else if($k=="big"){
		// Сохранение фотографии в файл и освобождение памяти
		imagepng($im, $_SERVER["DOCUMENT_ROOT"].'/copy/big-'.$id_kp.'_woter.png');
		$imgg = '/copy/big-'.$id_kp.'_woter.png';
		$in2 = Ajax::db_edit_query($db,"UPDATE `unic_films` SET `poster_film_big` = '$imgg'  WHERE `id_kp` = '$id_kp' AND `prov`=0 ");
		$in3 = Ajax::db_edit_query($db,"UPDATE `unic` SET `poster_film_big` = '$imgg'  WHERE `id_kp` = '$id_kp' AND `prov`=0");
	}else if($k=="smal"){
		// Сохранение фотографии в файл и освобождение памяти
		imagepng($im, $_SERVER["DOCUMENT_ROOT"].'/copy/smal-'.$id_kp.'_woter.png');
		$imgg = '/copy/smal-'.$id_kp.'_woter.png';
		$in4 = Ajax::db_edit_query($db,"UPDATE `unic_films` SET `poster_film_small` = '$imgg'  WHERE `id_kp` = '$id_kp' AND `prov`=0 ");
		$in5 = Ajax::db_edit_query($db,"UPDATE `unic` SET `poster_film_small` = '$imgg'  WHERE `id_kp` = '$id_kp' AND `prov`=0 ");
	}
	
	
	imagedestroy($im);

	return true;
}

 public static function strataImage($resizedImagePath,$id_kp,$k){

 	$db = Db::getConnection();

	// Загрузка штампа и фото, для которого применяется водяной знак (называется штамп или печать)
	$im = imagecreatefromjpeg($resizedImagePath);

	// Сначала создаем наше изображение штампа вручную с помощью GD
	$stamp = imagecreatetruecolor(100, 25);
	//imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
	//imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
	imagestring($stamp, 2, 5, 5, 'filmy-online.cc', 0xFFFFFF);
	

	// Установка полей для штампа и получение высоты/ширины штампа
	$marge_right = 10;
	$marge_bottom = 10;
	$sx = imagesx($stamp);
	$sy = imagesy($stamp);

	// Слияние штампа с фотографией. Прозрачность 50%
	imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);

	
	/*if($k=="plus"){
		// Сохранение фотографии в файл и освобождение памяти
		imagepng($im, $_SERVER["DOCUMENT_ROOT"].'/copy/plus-'.$id_kp.'_strata.png');
		$imgg = '/copy/plus-'.$id_kp.'_strata.png';
		$in = Ajax::db_edit_query($db,"UPDATE `unic` SET `img_big_plus` = '$imgg'  WHERE `id_kp` = '$id_kp'");
		//echo "UPDATE `unic` SET `img_big_plus` = '$imgg'  WHERE `id` = '$id'";
	}else if($k=="big"){
		// Сохранение фотографии в файл и освобождение памяти
		imagepng($im, $_SERVER["DOCUMENT_ROOT"].'/copy/big-'.$id_kp.'_strata.png');
		$imgg = '/copy/big-'.$id_kp.'_strata.png';
		$in = Ajax::db_edit_query($db,"UPDATE `unic` SET `poster_film_big` = '$imgg'  WHERE `id_kp` = '$id_kp'");
	}else if($k=="smal"){
		// Сохранение фотографии в файл и освобождение памяти
		imagepng($im, $_SERVER["DOCUMENT_ROOT"].'/copy/smal-'.$id_kp.'_strata.png');
		$imgg = '/copy/smal-'.$id_kp.'_strata.png';
		$in = Ajax::db_edit_query($db,"UPDATE `unic` SET `poster_film_small` = '$imgg'  WHERE `id_kp` = '$id_kp'");
	}*/
	imagedestroy($im);
	return true;
}











 public static function getContent($url,$id,$id_kp) {
		
		foreach ($url as $key => $value) {
			
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $value);
				$fp = tmpfile();
				$metaDatas = stream_get_meta_data($fp);

				$filePath = $metaDatas['uri'];

				curl_setopt($ch, CURLOPT_FILE, $fp);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				
				
				$img = curl_exec($ch);
				$info = curl_getinfo($ch);
				$format = getimagesize($filePath);


				

				if($format['mime']!="image/jpeg" || !$format['mime']){
					
					$resizedImagePath = Kino::resize($_SERVER["DOCUMENT_ROOT"].'/original_images/no_poster.jpg',$value);

					//Kino::strataImage($resizedImagePath,$id_kp,$key);

					$cart = $_SERVER["DOCUMENT_ROOT"].'/template/html/hosoren/img/brand.png';
					Kino::woterMark($resizedImagePath,$cart,$id_kp,$key);
					//unlink($_SERVER["DOCUMENT_ROOT"].'/copy/'.$id_kp.'-copy.jpg');//удаление фалов

				}else{

					$resizedImagePath = Kino::resize($filePath,$id_kp);

					//Kino::strataImage($resizedImagePath,$id_kp,$key);

					$cart = $_SERVER["DOCUMENT_ROOT"].'/template/html/hosoren/img/brand.png';
					Kino::woterMark($resizedImagePath,$cart,$id_kp,$key);

					//unlink($_SERVER["DOCUMENT_ROOT"].'/copy/'.$id_kp.'-copy.jpg');//удаление файлов

				}
				//$db = Db::getConnection();
				//Ajax::db_edit_query($db,"UPDATE `unic_films` SET `prov`=1  WHERE `id_kp` = '$id_kp' AND `prov`=0 ");
				//Ajax::db_edit_query($db,"UPDATE `unic` SET `prov`=1  WHERE `id_kp` = '$id_kp' AND `prov`=0 ");
				$j=array("pos"=>$url, "id"=>$id, "header"=>$info,"uri"=>$filePath, "format"=>$format['mime']);

				$z  = array($j);

				curl_close($ch);
				
				fclose($fp);
		}

		/*if(isset($id_kp)){
			$db = Db::getConnection();
			$select = Kino::select_array_db($db,"SELECT * FROM `person` WHERE `id_kp` =".$id_kp); 
			print_r($select);
		}*/
		echo json_encode($j);
        return true;
    }

 
	

	

}