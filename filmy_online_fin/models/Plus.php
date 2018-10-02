<?php


class Plus
{   





public static function db_edit_query($mysqli,$query){
        $result = $mysqli->query($query);
        return $result;
    }




public static function unic($post){

    $db = Db::getConnection();
    
    Ajax::db_edit_query($db,"TRUNCATE TABLE  `unic`");
    //$my_links=Ajax::select_array_key_db($db,"SELECT * FROM `unic`",'id_kp');

    //$select = Ajax::select_array_db($db,"SELECT * FROM `unic_films` WHERE admin=0 ");

    
   /*foreach ($select as $key => $value) {


   		$kinopoisk_id = addslashes($value['id_kp']);
        $type = addslashes($value['type']);
        $add_time = addslashes($value['add_time']);
        $episode_iframe_url = addslashes($value['episode_iframe_url']);
        $video_iframe_url = addslashes($value['video_iframe_url']);
        $translator = addslashes($value['translator']);
        $translator_id = addslashes($value['translator_id']);
        $iframe_url = addslashes($value['iframe_url']);
        $seasons_count = addslashes($value['seasons_count']);
        $episodes_count = addslashes($value['episodes_count']);
        $name_ru = addslashes($value['name_ru']);
        $name_eng = addslashes($value['name_eng']);

   		$rating_IMDB = addslashes($value['rating_imdb']);
   		$rating_kinopoisk = addslashes($value['rating_kp']);
   		$fac = addslashes($value['fact']);
   		$year = addslashes($value['year']);
   		$country = addslashes($value['country']);
   		$tagline = addslashes($value['slogon']);
   		$categories = addslashes($value['genre']);
   		$budget = addslashes($value['budget']);
   		$audience = addslashes($value['audience']);
   		$premiere_world = addslashes($value['premier']);
   		$premiere_RF = addslashes($value['premier_rus']);
   		$release_on_DVD = addslashes($value['reliz_dvd']);
   		$release_on_Blu_Ray = addslashes($value['reliz_bluray']);
   		$text = addslashes($value['description']);
   		$img_big_plus = addslashes($value['img_big_plus']);
   		$img_big = addslashes($value['poster_film_big']);
   		$img = addslashes($value['poster_film_small']);
   		$trailer = addslashes($value['trailer']);
   		$time = addslashes($value['time_film']);
   		$rating_IMDB = addslashes($value['studio']);
        $prov = addslashes($value['prov']);
        
	   	//if(!array_search($value['id_kp'],$my_links)){*/
	    $insert = Ajax::db_edit_query($db,"INSERT INTO `unic` (`id_kp`, `type`, `added_at`, `episode_iframe_url`, `video_iframe_url`, `translator`, `translator_id`, `iframe_url`, `seasons_count`, `episodes_count`, `name_ru`, `name_eng`,`admin`,`rating_imdb`,`rating_kp`,`fact`,`year`,`country`,`slogon`,`genre`,`budget`,`audience`,`premier`,`premier_rus`,`reliz_dvd`,`reliz_bluray`,`description`,`img_big_plus`,`poster_film_big`,`poster_film_small`,`trailer`,`time_film`,`studio`,`prov`) SELECT `id_kp`, `type`, `added_at`, `episode_iframe_url`, `video_iframe_url`, `translator`, `translator_id`, `iframe_url`, `seasons_count`, `episodes_count`, `name_ru`, `name_eng`,`admin`,`rating_imdb`,`rating_kp`,`fact`,`year`,`country`,`slogon`,`genre`,`budget`,`audience`,`premier`,`premier_rus`,`reliz_dvd`,`reliz_bluray`,`description`,`img_big_plus`,`poster_film_big`,`poster_film_small`,`trailer`,`time_film`,`studio`,`prov` FROM `unic_films`");


        /*INSERT INTO `unic` (`id`, `id_kp`, `type`, `added_at`, `episode_iframe_url`, `video_iframe_url`, `translator`, `translator_id`, `iframe_url`, `seasons_count`, `episodes_count`, `name_ru`, `name_eng`,`admin`,`rating_imdb`,`rating_kp`,`fact`,`year`,`country`,`slogon`,`genre`,`budget`,`audience`,`premier`,`premier_rus`,`reliz_dvd`,`reliz_bluray`,`description`,`img_big_plus`,`poster_film_big`,`poster_film_small`,`trailer`,`time_film`,`studio`,`prov`) VALUES (NULL, '$kinopoisk_id', '$type', '$add_time', '$episode_iframe_url', '$video_iframe_url', '$translator', '$translator_id', '$iframe_url', '$seasons_count', '$episodes_count', '$name_ru', '$name_eng','0', '$rating_IMDB', '$rating_kinopoisk', '$fac', '$year', '$country', '$tagline', '$categories', '$budget', '$audience', '$premiere_world', '$premiere_RF', '$release_on_DVD', '$release_on_Blu_Ray', '$text', '$img_big_plus', '$img_big', '$img', '$trailer', '$time', '$rating_IMDB', '$prov')*/
		    
	   // }


   //}
    
   	if($insert){
            $j=array("succ"=>"ДОбавленно Успешно");
                    echo json_encode(array_filter($j), JSON_UNESCAPED_UNICODE);
            }
    
}



public static function plusAddFilms($post){

    $db = Db::getConnection();
    $a = "http://moonwalk.cc/api/videos.json?kinopoisk_id=$post&api_token=aeafab871d4d90e5b932936f6190ea78";
    $test=file_get_contents($a);

    $json=json_decode($test);
    
    $my_links=Ajax::select_array_key_db($db,"SELECT * FROM `unic_films`",'id_kp');

    $name_ru = $json[0]->title_ru;
    $name_eng = $json[0]->title_en;
    $kinopoisk_id = $json[0]->kinopoisk_id;
    $world_art_id = $json[0]->world_art_id;
    $pornolab_id = $json[0]->pornolab_id;
    $token = $json[0]->token;
    $type = $json[0]->type;
    $camrip = $json[0]->camrip;
    $instream_ads = $json[0]->instream_ads;
    $iframe_url = $json[0]->iframe_url;
    $translator = $json[0]->translator;
    $translator_id = $json[0]->translator_id;
    $added_at = $json[0]->added_at;
    if(!array_search($kinopoisk_id,$my_links)){
    $insert = Ajax::db_edit_query($db,"INSERT INTO `unic_films` (`id`, `id_kp`, `type`, `added_at`, `episode_iframe_url`, `video_iframe_url`, `translator`, `translator_id`, `iframe_url`, `seasons_count`, `episodes_count`, `name_ru`, `name_eng`) VALUES (NULL, '$kinopoisk_id', '$type', '$add_time', '$episode_iframe_url', '$video_iframe_url', '$translator', '$translator_id', '$iframe_url', '$seasons_count', '$episodes_count', '$name_ru', '$name_eng')");
    }

    $j=array("succ"=>$succ,"id_kp"=>$post,"name_ru"=>$name_ru);
    echo json_encode(array_filter($j), JSON_UNESCAPED_UNICODE);
}






 public static function plusKinoParser($post){

    $db = Db::getConnection();
    if($test = $_POST['add']){
        $id_kp = $_POST['id_kp'];
        $my_links=Ajax::select_array_key_db($db,"SELECT * FROM `unic_films`",'id_kp');

        $selecttt = Ajax::select_array_db($db,"SELECT * FROM `unic_films` WHERE `id_kp`='$id_kp' ");

        $json=json_decode($test);
        //print_r($_POST['add']);
        if($json->title){
            $title = addslashes($json->title);
        }
        if($json->title_en){
            $title_en = addslashes($json->title_en);
        }
        if($json->img){
            $img = addslashes($json->img);
        }
        if($json->img_big){
            $img_big = addslashes($json->img_big);
        }
        if($json->img_big_plus){
            $img_big_plus = addslashes($json->img_big_plus);
        }
        if($json->text){
            $text = addslashes($json->text);
        }
        if($json->tags){
            $tags = addslashes($json->tags);
        }
        if($json->rating_IMDB){
            $rating_IMDB = addslashes($json->rating_IMDB);
        }
        if($json->rating_kinopoisk){
            $rating_kinopoisk = addslashes($json->rating_kinopoisk);
        }
        if($json->kinopoisk_id){
            $kinopoisk_id = addslashes($json->kinopoisk_id);
        }
        if($json->trailer){
            $trailer = addslashes($json->trailer);
        }
        if($json->categories){
            $categories = $json->categories;
            $categories = implode(",", $categories);
            $categories = addslashes($categories);
        }               
        if($json->properties){
            
            $bbb = $json->properties->facts;
            $fac = implode("&", $bbb);
            $fac = addslashes($fac);
            $tagline = addslashes($json->properties->tagline);
            $premiere_world = addslashes($json->properties->premiere_world);
            $premiere_RF = addslashes($json->properties->premiere_RF);
            $release_on_DVD = addslashes($json->properties->release_on_DVD);
            $release_on_Blu_Ray = addslashes($json->properties->release_on_Blu_Ray);
            $age_restrictions = addslashes($json->properties->age_restrictions);
            $MPAA_rating = addslashes($json->properties->MPAA_rating);
            $time = addslashes($json->properties->time);
            $year = addslashes($json->properties->year);
            $country = addslashes($json->properties->country);
            $genre = addslashes($json->properties->genre);
            $audience = addslashes($json->properties->audience);
            $budget = addslashes($json->properties->budget);
           
            //print_r($json->properties);

        }
        

        
        $insert = Plus::db_edit_query($db,"UPDATE `unic_films` SET `rating_imdb` = '$rating_IMDB', `rating_kp` = '$rating_kinopoisk', `fact` = '$fac', `year` = '$year', `country` = '$country', `slogon` = '$tagline', `genre` = '$categories', `budget` = '$budget', `fees_usa` = '', `fees_world` = '', `audience` = '$audience', `premier` = '$premiere_world', `premier_rus` = '$premiere_RF', `reliz_dvd` = '$release_on_DVD', `reliz_bluray` = '$release_on_Blu_Ray', `description` = '$text', `img_big_plus` = '$img_big_plus', `poster_film_big` = '$img_big', `poster_film_small` = '$img', `trailer` = '$trailer', `trailer_duration` = '', `rate_pg` = '', `rate_pg_img` = '', `rate_pg_desc` = '', `age_limit` = '', `time_film` = '$time', `studio` = '$rating_IMDB', `admin`='0' WHERE `id_kp` =".$id_kp);
        

        
        if($json->persons){
                foreach($json->persons as $k=>$v){
                 
                 if($k == "actors"){
                    
                     $b=count($json->persons->actors);
                     for($i=0;$i<$b;$i++){
                        
                         $cret = 'Актеры';
                         $name_person_ru=addslashes($json->persons->actors[$i]->name);
                         $name_person_en=addslashes($json->persons->actors[$i]->name_eng);
                         $kp_id_person=addslashes($json->persons->actors[$i]->id);
                         $photos_person=addslashes($json->persons->actors[$i]->img);
                         
                         $insert = Plus::db_edit_query($db,"INSERT INTO `person` (`id`, `id_kp`, `id_person`, `name_ru`, `name_eng`, `img`, `id_section`) VALUES (NULL, '$id_kp', '$kp_id_person', '$name_person_ru', '$name_person_en', '$photos_person', '$cret')");
                         
                     }
                 }

                 if($k=='producer'){
                 $b=count($json->persons->producer);
                 for($i=0;$i<$b;$i++){
                     
                     $cret = 'Продюсер';
                     $name_person_ru=addslashes($json->persons->producer[$i]->name);
                     $name_person_en=addslashes($json->persons->producer[$i]->name_eng);
                     $kp_id_person=addslashes($json->persons->producer[$i]->id);
                     $photos_person=addslashes($json->persons->producer[$i]->img);
                     $id_kp=addslashes($json->persons->producer[$i]->id_kp);
                     
                     $insert = Plus::db_edit_query($db,"INSERT INTO `person` (`id`, `id_kp`, `id_person`, `name_ru`, `name_eng`, `img`, `id_section`) VALUES (NULL, '$id_kp', '$kp_id_person', '$name_person_ru', '$name_person_en', '$photos_person', '$cret')");

                     
                    
                 }
             }
             if($k=='screenplay'){
                
                 $b=count($json->persons->screenplay);
                 for($i=0;$i<$b;$i++){
                     $cret = 'Сценаристы';
                     $name_person_ru=addslashes($json->persons->screenplay[$i]->name);
                     $name_person_en=addslashes($json->persons->screenplay[$i]->name_eng);
                     $kp_id_person=addslashes($json->persons->screenplay[$i]->id);
                     $photos_person=addslashes($json->persons->screenplay[$i]->img);
                     $id_kp=addslashes($json->persons->screenplay[$i]->id_kp);

                      $insert = Plus::db_edit_query($db,"INSERT INTO `person` (`id`, `id_kp`, `id_person`, `name_ru`, `name_eng`, `img`, `id_section`) VALUES (NULL, '$id_kp', '$kp_id_person', '$name_person_ru', '$name_person_en', '$photos_person', '$cret')");
                     
                 }
             }
             if($k=='operator'){
                
                 $b=count($json->persons->operator);
                 for($i=0;$i<$b;$i++){
                     $cret = 'Оператор';
                     $name_person_ru=addslashes($json->persons->operator[$i]->name);
                     $name_person_en=addslashes($json->persons->operator[$i]->name_eng);
                     $kp_id_person=addslashes($json->persons->operator[$i]->id);
                     $photos_person=addslashes($json->persons->operator[$i]->img);
                     $id_kp=addslashes($json->persons->operator[$i]->id_kp);

                      $insert = Plus::db_edit_query($db,"INSERT INTO `person` (`id`, `id_kp`, `id_person`, `name_ru`, `name_eng`, `img`, `id_section`) VALUES (NULL, '$id_kp', '$kp_id_person', '$name_person_ru', '$name_person_en', '$photos_person', '$cret')");
                     
                 }
             }
             if($k=='artist'){
                
                 $b=count($json->persons->artist);
                 for($i=0;$i<$b;$i++){
                    
                     $cret = 'Художники';
                     $name_person_ru=addslashes($json->persons->artist[$i]->name);
                     $name_person_en=addslashes($json->persons->artist[$i]->name_eng);
                     $kp_id_person=addslashes($json->persons->artist[$i]->id);
                     $photos_person=addslashes($json->persons->artist[$i]->img);
                     $id_kp=addslashes($json->persons->artist[$i]->id_kp);

                      $insert = Plus::db_edit_query($db,"INSERT INTO `person` (`id`, `id_kp`, `id_person`, `name_ru`, `name_eng`, `img`, `id_section`) VALUES (NULL, '$id_kp', '$kp_id_person', '$name_person_ru', '$name_person_en', '$photos_person', '$cret')");
                     
                 }
             }
             if($k=='installation'){
                 $b=count($json->persons->installation);
                 for($i=0;$i<$b;$i++){
                     
                     $cret = 'Монтажеры';
                     $name_person_ru=addslashes($json->persons->installation[$i]->name);
                     $name_person_en=addslashes($json->persons->installation[$i]->name_eng);
                     $kp_id_person=addslashes($json->persons->installation[$i]->id);
                     $photos_person=addslashes($json->persons->installation[$i]->img);
                     $id_kp=addslashes($json->persons->installation[$i]->id_kp);

                      $insert = Plus::db_edit_query($db,"INSERT INTO `person` (`id`, `id_kp`, `id_person`, `name_ru`, `name_eng`, `img`, `id_section`) VALUES (NULL, '$id_kp', '$kp_id_person', '$name_person_ru', '$name_person_en', '$photos_person', '$cret')");
                     
                 }
             }
             if($k=='director'){
                 $b=count($json->persons->director);
                 for($i=0;$i<$b;$i++){
                    
                     $cret = 'Режиссер';
                     $name_person_ru=addslashes($json->persons->director[$i]->name);
                     $name_person_en=addslashes($json->persons->director[$i]->name_eng);
                     $kp_id_person=addslashes($json->persons->director[$i]->id);
                     $photos_person=addslashes($json->persons->director[$i]->img);
                     $id_kp=addslashes($json->persons->director[$i]->id_kp);

                      $insert = Plus::db_edit_query($db,"INSERT INTO `person` (`id`, `id_kp`, `id_person`, `name_ru`, `name_eng`, `img`, `id_section`) VALUES (NULL, '$id_kp', '$kp_id_person', '$name_person_ru', '$name_person_en', '$photos_person', '$cret')");
                     
                 }
             }
            
             if($k=='composer'){
                 $b=count($json->persons->composer);
                 for($i=0;$i<$b;$i++){
                    
                     $cret = 'Композитор';
                     $name_person_ru=addslashes($json->persons->composer[$i]->name);
                     $name_person_en=addslashes($json->persons->composer[$i]->name_eng);
                     $kp_id_person=addslashes($json->persons->composer[$i]->id);
                     $photos_person=addslashes($json->persons->composer[$i]->img);
                     $id_kp=addslashes($json->persons->composer[$i]->id_kp);

                      $insert = Plus::db_edit_query($db,"INSERT INTO `person` (`id`, `id_kp`, `id_person`, `name_ru`, `name_eng`, `img`, `id_section`) VALUES (NULL, '$id_kp', '$kp_id_person', '$name_person_ru', '$name_person_en', '$photos_person', '$cret')");
                     
                 }
             }

             if($k=='other'){
                 $b=count($json->persons->other);
                 for($i=0;$i<$b;$i++){
                    
                     $cret = 'А также';
                     $name_person_ru=addslashes($json->persons->other[$i]->name);
                     $name_person_en=addslashes($json->persons->other[$i]->name_eng);
                     $kp_id_person=addslashes($json->persons->other[$i]->id);
                     $photos_person=addslashes($json->persons->other[$i]->img);
                     $id_kp=addslashes($json->persons->other[$i]->id_kp);

                      $insert = Plus::db_edit_query($db,"INSERT INTO `person` (`id`, `id_kp`, `id_person`, `name_ru`, `name_eng`, `img`, `id_section`) VALUES (NULL, '$id_kp', '$kp_id_person', '$name_person_ru', '$name_person_en', '$photos_person', '$cret')");
                    
                 }
             }
             
               
             }
        }
    
        if($insert){
            $j = array("title"=>$title, "person"=>$person, "trailer"=>$trailer);
            echo json_encode(array_filter($j));
        }
        

}
























    }               






















}