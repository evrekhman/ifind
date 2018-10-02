<?php


class Ajax
{   
    


    public static function db_edit_query($mysqli,$query){
        $result = $mysqli->query($query);
        return $result;
    }

    public static function select_array_key_db($mysqli,$query,$key){
        $array=array();
        
        $result = $mysqli->query($query);
        if($result){
                while($row = $result->fetch())
            {
                array_push($array,$row[$key]);
            }
            
            return $array;
        }
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


    public static function select_line_db($mysqli,$query){
    $result = $mysqli->query($query);
        if($result){
            $row = $result->fetch();
            
            return $row;
        }
    }







    public static function addJson($db,$a){//1. allJsonUrl.php - добаление всеx json - url с таблицы SELECT * FROM `url_Json_BD` .

        $test=file_get_contents($a);

        $json=json_decode($test);

        $my_links=Ajax::select_array_key_db($db,"SELECT * FROM `unic_films`",'id_kp');
        
        //echo "ok";
        if($json->updates)
        {

            $value = $json->updates;
            $con = count($value);
            for($i=0; $i<$con; $i++){
                if(!$value[$i]->serial->title_ru){
                    $arrayMovie[]=array("title"=>$value[$i]->title_ru);
                }else{
                    $arrayMovie[]=array("title"=>$value[$i]->serial->title_ru);
                }
            }
        }

        else if($json->report->movies)
        {
            $value = $json->report->movies;
            $con = count($value);

            for($i=0; $i<$con; $i++){
                $arrayMovie[]=array("title"=>$value[$i]->title_ru);
            }
        }
        else if($json->report->serials)
        {
            $value = $json->report->serials;
            $con = count($value);

            for($i=0; $i<$con; $i++){
                $arrayMovie[]=array("title"=>$value[$i]->title_ru);
            }
        }
        else if($json)
        {
            $value = $json;
            $con = count($value);
            $con = count($value);
            for($i=0; $i<$con; $i++){
                $arrayMovie[]=array("title"=>$value[$i]->title);
            }
        }


        for($i=0; $i<$con; $i++){
            if($json->updates){
                $val = $json->updates;
                $tst = $a;
                //$afdgdfg['val']=$value;
                $value=$json->updates;
                $add_time=addslashes($value[$i]->added_at);
                $episode_iframe_url=addslashes($value[$i]->episode_iframe_url);
                $video_iframe_url=addslashes($value[$i]->video_iframe_url);
                if(!$value[$i]->serial){

                    $name_ru = addslashes($value[$i]->title_ru);
                    $name_eng = addslashes($value[$i]->title_en);
                    $token = addslashes($value[$i]->token);
                    $type = addslashes($value[$i]->type);
                    $kinopoisk_id = addslashes($value[$i]->kinopoisk_id);
                    $translator = addslashes($value[$i]->translator);
                    $translator_id = addslashes($value[$i]->translator_id);
                    $iframe_url = addslashes($value[$i]->iframe_url);
                    $seasons_count = addslashes($value[$i]->seasons_count);
                    $episodes_count = addslashes($value[$i]->episodes_count);
                }else{

                    $name_ru = addslashes($value[$i]->serial->title_ru);
                    $name_eng = addslashes($value[$i]->serial->title_en);
                    $token = addslashes($value[$i]->serial->token);
                    $type = addslashes($value[$i]->serial->type);
                    $kinopoisk_id = addslashes($value[$i]->serial->kinopoisk_id);
                    $translator = addslashes($value[$i]->serial->translator);
                    $translator_id = addslashes($value[$i]->serial->translator_id);
                    $iframe_url = addslashes($value[$i]->serial->iframe_url);
                    $seasons_count = addslashes($value[$i]->serial->seasons_count);
                    $episodes_count = addslashes($value[$i]->serial->episodes_count);
                }

            }
            else if($json->report->movies){
                $value=$json->report->movies;
                $val = $json->report->movies;
                $tst = $a;
                $name_ru = addslashes($value[$i]->title_ru);
                $name_eng = addslashes($value[$i]->title_en);
                $token = addslashes($value[$i]->token);
                $type = addslashes($value[$i]->type);
                $kinopoisk_id = addslashes($value[$i]->kinopoisk_id);
                $translator = addslashes($value[$i]->translator);
                $translator_id = addslashes($value[$i]->translator_id);
                $iframe_url = addslashes($value[$i]->iframe_url);
                $seasons_count = addslashes($value[$i]->seasons_count);
                $episodes_count = addslashes($value[$i]->episodes_count);
            }
            else if($json->report->serials){
                $tst = $a;
                $value=$json->report->serials;
                $val = $json->report->serials;
                $name_ru = addslashes($value[$i]->title_ru);
                $name_eng = addslashes($value[$i]->title_en);
                $token = addslashes($value[$i]->token);
                $type = addslashes($value[$i]->type);
                $kinopoisk_id = addslashes($value[$i]->kinopoisk_id);
                $translator = addslashes($value[$i]->translator);
                $translator_id = addslashes($value[$i]->translator_id);
                $iframe_url = addslashes($value[$i]->iframe_url);
                $seasons_count = addslashes($value[$i]->seasons_count);
                $episodes_count = addslashes($value[$i]->episodes_count);
            }
            else if($json){
                $tst = $a;
                $value=$json;
                $val = $json;
                $name_ru = addslashes($value[$i]->title);
                $name_eng = addslashes($value[$i]->title_orig);
                if(!$value[$i]->iframe_url){
                    preg_match_all('/film\/([0-9]+)/', $value[$i]->kp_link, $matches, PREG_SET_ORDER, 0);
                    $kinopoisk_id = addslashes($matches[0][1]);
                    $iframe_url = addslashes($value[$i]->player_link)
                    ;
                }else{
                    $token = addslashes($value[$i]->token);
                    $type = addslashes($value[$i]->type);
                    $kinopoisk_id = addslashes($value[$i]->kinopoisk_id);
                    $translator = addslashes($value[$i]->translator);
                    $translator_id = addslashes($value[$i]->translator_id);
                    $iframe_url = addslashes($value[$i]->iframe_url);
                    $seasons_count = addslashes($value[$i]->seasons_count);
                    $episodes_count = addslashes($value[$i]->episodes_count);
                }
            }

            //добавляются только фильмы которых нет в таблицы all_films
            if(!array_search($kinopoisk_id,$my_links)){

                

                $insert = Ajax::db_edit_query($db,"INSERT INTO `all_films` (`id`, `id_kp`, `type`, `added_at`, `episode_iframe_url`, `video_iframe_url`, `translator`, `translator_id`, `iframe_url`, `seasons_count`, `episodes_count`, `name_ru`, `name_eng`, `year`) VALUES (NULL, '$kinopoisk_id', '$type', '$add_time', '$episode_iframe_url', '$video_iframe_url', '$translator', '$translator_id', '$iframe_url', '$seasons_count', '$episodes_count', '$name_ru', '$name_eng', '$year')");

                
                $ggg[] =  count($kinopoisk_id);
           }
        }

        if($insert){
            $succ="УСПЕШНО ДОБАВЛЕННО В БАЗУ";
        }else{
            $lol="НЕ ДОБАВЛЕННО В БД";
        }
        //array_push($arrayMovie,$prov);
        $j=array("mov"=>$arrayMovie,"succ"=>$succ,"lol"=>$lol,"add"=>$_POST['add'],"tst"=>$tst,"consol"=>$nameCon);
        echo json_encode(array_filter($j), JSON_UNESCAPED_UNICODE);

    }








        public static function select_query($mysqli){//2. creatUnicFilms.php - создаёт из всеx дабвленных фильмом -  уникальные(типа из 50 тыс фильмов, создает 27 тыс уникальных).
    
                    $arr = Ajax::select_array_db($mysqli,"SELECT DISTINCT `id_kp` FROM `all_films`");
                    //$my_links=Ajax::select_array_key_db($db,"SELECT * FROM `all_films`",'id_kp');
                    //Ajax::db_edit_query($mysqli,"TRUNCATE TABLE `unic_films`");
                    Ajax::db_edit_query($mysqli,"TRUNCATE TABLE `unic_id_kp`");
                    foreach($arr as $value){
                        if($value['id_kp']!=""){
                                $a=$value['id_kp'];
                                $b='http://getmovie.cc/api/kinopoisk.json?id='.$a.'&token=f80d90ef19257ec943226b51581edc88';
                           $arrInt= Ajax::db_edit_query($mysqli,"INSERT INTO `unic_id_kp` (`id_kp`, `url`) VALUES ('$a','$b')");
                           if($arrInt){
                               $v['kp']="Создана таблица индивидуальная unic_id_kp";
                           }else{
                               $v['kp']=$value['kp'].'не добавленно <br>';
                           }
                        }
                    }
                    $res = Ajax::select_array_db($mysqli,"SELECT * FROM `unic_id_kp`");
        
                    foreach($res as $key=>$value){
                        //echo $value['id_kp'].'<br>';
                        $kp = $value['id_kp'];
                        $in = Ajax::db_edit_query($mysqli,"INSERT INTO `unic_films` (id_kp) VALUES ($kp)");
                        if($in){
                             $c['kp']="Создана таблица индивидуальная unic_films";
                        }else{
                            $c['kp']=$value['id_kp'].'не добавленно <br>';
                        }
                    }
                    $j = array("t1"=>$v,"t2"=>$c);
                    echo json_encode(array_filter($j), JSON_UNESCAPED_UNICODE);
            }














public static  function gggg($mysqli,$id_kp,$post){// 3. updateAllFilms.php - из большой таблиицы вытаскивает данные и переносит в таблицу уникальных фильмов добаляет iframe_url name_ru итд.
                
                $sell = Ajax::select_array_db($mysqli,"SELECT * FROM `all_films` WHERE `id_kp` =".$id_kp);

                //echo  "SELECT * FROM `new2_all_total` WHERE `id` =".$id_kp;
                //$mysqlG = select_array_key_db($mysqli,"SELECT * FROM `new_all_total`",'name_ru');
                $array = array();
                foreach($sell as $kk=>$vv)
                {
                    if($vv[name_ru]!=""){
                        $name_ru = addslashes($vv[name_ru]);
                    }
                    if($vv[name_eng]!=""){
                        $name_en = addslashes($vv[name_eng]);
                    }
                    if($vv[seasons_count]!=""){
                        $seasons_count = addslashes($vv[seasons_count]);
                    }
                    if($vv[episodes_count]!=""){
                        $episodes_count = addslashes($vv[episodes_count]);
                    }
                    if($vv[translator]!=""){
                        $translator = addslashes($vv[translator]);
                    }
                    /*if($vv[kinopoisk_id]!=""){
                        $kinopoisk_id = addslashes($vv[kinopoisk_id]);
                        //echo $kinopoisk_id;
                    }*/
                    if($vv[episode_iframe_url]!=""){
                        $episode_iframe_url = addslashes($vv[episode_iframe_url]);
                    }
                    if($vv[video_iframe_url]!=""){
                        $video_iframe_url = addslashes($vv[video_iframe_url]);
                    }
                    if($vv[added_at]!=""){
                        $added_at = addslashes($vv[added_at]);
                    }
                    if($vv[id_kp]!=""){
                        $id_kp = addslashes($vv[id_kp]);
                        
                    }
                    if($vv[type]!=""){
                        $type = addslashes($vv[type]);
                    }
                    if($vv[iframe_url]!=""){
                        $rrr = addslashes($vv[iframe_url]);
                        
                    }
                    array_push($array,$rrr); 
                    $unic = array_unique($array);           
                }

                    //print_r($array);
                    $comma_separated = implode(",", $unic);
                    //if(!array_search($name_ru,$mysqlG)){
                    $in = Ajax::db_edit_query($mysqli,"UPDATE `unic_films` SET `iframe_url` = '$comma_separated', `name_ru` = '$name_ru', `name_eng` = '$name_eng', `seasons_count` = '$seasons_count', `episodes_count` = '$episodes_count', `translator` = '$translator', `episode_iframe_url` = '$episode_iframe_url', `video_iframe_url` = '$video_iframe_url', `added_at` = '$added_at', `id_kp` = '$id_kp', `type` = '$type'  WHERE `id_kp` = '$id_kp'");
                   // }
                       
                        if($in){
                                $kp = $kinopoisk_id;
                               
                                $test = $name_ru;
                                $data = $added_at;
                                //,"id_kp"=>$id_kp
                                 $j = array("id"=>$post,"kp"=>$kp,"test"=>$test,"data"=>$added_at,"rrr"=>$unic);
                                echo json_encode(array_filter($j), JSON_UNESCAPED_UNICODE);
                            }else{
                                  $prov['lol']="Не добавленно в БД `new3_all_total`{$post}";
                                  $j=array("id"=>$post,"prov"=>$prov);
                                echo json_encode(array_filter($j), JSON_UNESCAPED_UNICODE);
                            }
            
            
    }















public static function select_query2($mysqli,$a,$id){//4. upGetmovieCC.php - обнавляет в уникальную таблицу и таблицу с актерами и таблицу со скринами из Getmovie.сс
    
                            //echo "ok";
                            //$my_links=Ajax::select_array_key_db($db,"SELECT * FROM `unic_films`",'id_kp');


                            $b=file_get_contents("http://getmovie.cc/api/kinopoisk.json?id=$a&token=037313259a17be837be3bd04a51bf678");
                            $json1=json_decode($b);
                            $year = addslashes($json1->year);
                            $country = addslashes($json1->country);
                            $slogon = addslashes($json1->slogon);
                            $genre = addslashes($json1->genre);
                            $budget = addslashes($json1->budget);
                            $fees_usa = addslashes($json1->fees_usa);
                            $fees_world = addslashes($json1->fees_world);
                            $fees_rus = addslashes($json1->fees_rus);
                            $audience = addslashes($json1->audience);
                            $premier = addslashes($json1->premier);
                            $premier_rus = addslashes($json1->premier_rus);
                            $reliz_dvd = addslashes($json1->reliz_dvd);
                            $reliz_bluray = addslashes($json1->reliz_bluray);
                            $description = addslashes($json1->description);
                            $trivia = addslashes($json1->trivia);
                            $trivia_blooper = addslashes($json1->trivia_blooper);
                            $poster_film_big = addslashes($json1->poster_film_big);
                            $poster_film_small = addslashes($json1->poster_film_small);
                            $trailer = addslashes($json1->trailer);
                            $trailer_duration = addslashes($json1->trailer_duration);
                            $rate_pg = addslashes($json1->rate_pg);
                            $age_limit = addslashes($json1->age_limit);
                            $time_film = addslashes($json1->time_film);
                            $imdb = addslashes($json1->rating->imdb);
                            $kp_rating = addslashes($json1->rating->kp_rating);
                            $studio = addslashes($json1->studio);
                        $upDate = Ajax::db_edit_query($mysqli,"UPDATE `unic_films` SET `rating_imdb` = '$imdb', `rating_kp` = '$kp_rating', `year` = '$year', `country` = '$country', `slogon` = '$slogon', `genre` = '$genre', `budget` = '$budget', `fees_usa` = '$fees_usa', `fees_world` = '$fees_world', `audience` = '$audience', `premier` = '$premier', `premier_rus` = '$premier_rus', `reliz_dvd` = '$reliz_dvd', `reliz_bluray` = '$reliz_bluray', `description` = '$description', `poster_film_big` = '$poster_film_big', `poster_film_small` = '$poster_film_small', `trailer` = '$trailer', `trailer_duration` = '$trailer_duration', `rate_pg` = '$rate_pg', `rate_pg_img` = '', `rate_pg_desc` = '', `age_limit` = '', `time_film` = '$time_film', `studio` = '$studio', `admin`='0' WHERE `admin`!=0 AND `id_kp` =".$a);
                        
                      // $test =  $a;
                       
                       $b=count($json1->screen_film);
             
             $afdgdfg['kinopoisk_id']=gettype($json1->screen_film);
             
                 /*for($i=0;$i<$b;$i++){
                     $screen = addslashes($json1->screen_film[$i]->preview);
                     $inserts = Ajax::db_edit_query($mysqli,"INSERT INTO `new2_screen_films` (`id`, `id_kp`, `screen_films`) VALUES (NULL, '$a', '$screen')");
                     if($inserts){
                         $afdgdfg['kinopoisk_id']=$a;
                     }
                     
                     
                 }*/

                 //if(!array_search($a,$my_links)){

                    foreach($json1->creators as $k=>$v){
             
             //$k = key($json1->creators);
             //$ara = $k;
             $test =  $k;
             if($k=='actor'){
                 $b=count($json1->creators->actor);
                 for($i=0;$i<$b;$i++){
                     $cret = 'Актеры в главных ролях';
                     $name_person_ru=addslashes($json1->creators->actor[$i]->name_person_ru);
                     $name_person_en=addslashes($json1->creators->actor[$i]->name_person_en);
                     $kp_id_person=addslashes($json1->creators->actor[$i]->kp_id_person);
                     $photos_person=addslashes($json1->creators->actor[$i]->photos_person);
                     $insert = Ajax::db_edit_query($mysqli,"INSERT INTO `person` (`id`, `id_kp`, `id_section`, `name_ru`, `name_eng`, `id_person`, `img`) VALUES (NULL, '$a', '$cret', '$name_person_ru', '$name_person_en', '$kp_id_person', '$photos_person')");
                     $ara="INSERT INTO `person` (`id`, `id_kp`, `id_section`, `name_ru`, `name_eng`, `id_person`, `img`) VALUES (NULL, '$a', '$cret', '$name_person_ru', '$name_person_en', '$kp_id_person', '$photos_person')";
                 }
             }
             if($k=='producer'){
                 $b=count($json1->creators->producer);
                 for($i=0;$i<$b;$i++){
                     $cret = 'Продюсер';
                     $name_person_ru=$json1->creators->producer[$i]->name_person_ru;
                     $name_person_en=$json1->creators->producer[$i]->name_person_en;
                     $kp_id_person=$json1->creators->producer[$i]->kp_id_person;
                     $photos_person=$json1->creators->producer[$i]->photos_person;
                     $insert = Ajax::db_edit_query($mysqli,"INSERT INTO `person` (`id`, `id_kp`, `id_section`, `name_ru`, `name_eng`, `id_person`, `img`) VALUES (NULL, '$a', '$cret', '$name_person_ru', '$name_person_en', '$kp_id_person', '$photos_person')");
                 }
             }
             if($k=='writer'){
                 $b=count($json1->creators->writer);
                 for($i=0;$i<$b;$i++){
                     $cret = 'Сценаристы';
                     $name_person_ru=$json1->creators->writer[$i]->name_person_ru;
                     $name_person_en=$json1->creators->writer[$i]->name_person_en;
                     $kp_id_person=$json1->creators->writer[$i]->kp_id_person;
                     $photos_person=$json1->creators->writer[$i]->photos_person;
                     $insert = Ajax::db_edit_query($mysqli,"INSERT INTO `person` (`id`, `id_kp`, `id_section`, `name_ru`, `name_eng`, `id_person`, `img`) VALUES (NULL, '$a', '$cret', '$name_person_ru', '$name_person_en', '$kp_id_person', '$photos_person')");
                 }
             }
             if($k=='operator'){
                 $b=count($json1->creators->operator);
                 for($i=0;$i<$b;$i++){
                     $cret = 'Оператор';
                     $name_person_ru=$json1->creators->operator[$i]->name_person_ru;
                     $name_person_en=$json1->creators->operator[$i]->name_person_en;
                     $kp_id_person=$json1->creators->operator[$i]->kp_id_person;
                     $photos_person=$json1->creators->operator[$i]->photos_person;
                     $insert = Ajax::db_edit_query($mysqli,"INSERT INTO `person` (`id`, `id_kp`, `id_section`, `name_ru`, `name_eng`, `id_person`, `img`) VALUES (NULL, '$a', '$cret', '$name_person_ru', '$name_person_en', '$kp_id_person', '$photos_person')");
                 }
             }
             if($k=='design'){
                 $b=count($json1->creators->design);
                 for($i=0;$i<$b;$i++){
                     $cret = 'Художники';
                     $name_person_ru=$json1->creators->design[$i]->name_person_ru;
                     $name_person_en=$json1->creators->design[$i]->name_person_en;
                     $kp_id_person=$json1->creators->design[$i]->kp_id_person;
                     $photos_person=$json1->creators->design[$i]->photos_person;
                     $insert = Ajax::db_edit_query($mysqli,"INSERT INTO `person` (`id`, `id_kp`, `id_section`, `name_ru`, `name_eng`, `id_person`, `img`) VALUES (NULL, '$a', '$cret', '$name_person_ru', '$name_person_en', '$kp_id_person', '$photos_person')");
                 }
             }
             if($k=='editor'){
                 $b=count($json1->creators->editor);
                 for($i=0;$i<$b;$i++){
                     $cret = 'Монтажеры';
                     $name_person_ru=$json1->creators->editor[$i]->name_person_ru;
                     $name_person_en=$json1->creators->editor[$i]->name_person_en;
                     $kp_id_person=$json1->creators->editor[$i]->kp_id_person;
                     $photos_person=$json1->creators->editor[$i]->photos_person;
                     $insert = Ajax::db_edit_query($mysqli,"INSERT INTO `person` (`id`, `id_kp`, `id_section`, `name_ru`, `name_eng`, `id_person`, `img`) VALUES (NULL, '$a', '$cret', '$name_person_ru', '$name_person_en', '$kp_id_person', '$photos_person')");
                 }
             }
             if($k=='director'){
                 $b=count($json1->creators->director);
                 for($i=0;$i<$b;$i++){
                     $cret = 'Режиссер';
                     $name_person_ru=$json1->creators->director[$i]->name_person_ru;
                     $name_person_en=$json1->creators->director[$i]->name_person_en;
                     $kp_id_person=$json1->creators->director[$i]->kp_id_person;
                     $photos_person=$json1->creators->director[$i]->photos_person;
                     $insert = Ajax::db_edit_query($mysqli,"INSERT INTO `person` (`id`, `id_kp`, `id_section`, `name_ru`, `name_eng`, `id_person`, `img`) VALUES (NULL, '$a', '$cret', '$name_person_ru', '$name_person_en', '$kp_id_person', '$photos_person')");
                 }
             }
             if($k=='voice_director'){
                 $b=count($json1->creators->voice_director);
                 for($i=0;$i<$b;$i++){
                     $cret = 'Режиссер дубляжа';
                     $name_person_ru=$json1->creators->voice_director[$i]->name_person_ru;
                     $name_person_en=$json1->creators->voice_director[$i]->name_person_en;
                     $kp_id_person=$json1->creators->voice_director[$i]->kp_id_person;
                     $photos_person=$json1->creators->voice_director[$i]->photos_person;
                     $insert = Ajax::db_edit_query($mysqli,"INSERT INTO `person` (`id`, `id_kp`, `id_section`, `name_ru`, `name_eng`, `id_person`, `img`) VALUES (NULL, '$a', '$cret', '$name_person_ru', '$name_person_en', '$kp_id_person', '$photos_person')");
                 }
             }
             if($k=='voice'){
                 $b=count($json1->creators->voice);
                 for($i=0;$i<$b;$i++){
                     $cret = 'Актеры дубляжа';
                     $name_person_ru=$json1->creators->voice[$i]->name_person_ru;
                     $name_person_en=$json1->creators->voice[$i]->name_person_en;
                     $kp_id_person=$json1->creators->voice[$i]->kp_id_person;
                     $photos_person=$json1->creators->voice[$i]->photos_person;
                     $insert = Ajax::db_edit_query($mysqli,"INSERT INTO `person` (`id`, `id_kp`, `id_section`, `name_ru`, `name_eng`, `id_person`, `img`) VALUES (NULL, '$a', '$cret', '$name_person_ru', '$name_person_en', '$kp_id_person', '$photos_person')");
                 }
             }
             if($k=='composer'){
                 $b=count($json1->creators->composer);
                 for($i=0;$i<$b;$i++){
                     $cret = 'Композитор';
                     $name_person_ru=$json1->creators->composer[$i]->name_person_ru;
                     $name_person_en=$json1->creators->composer[$i]->name_person_en;
                     $kp_id_person=$json1->creators->composer[$i]->kp_id_person;
                     $photos_person=$json1->creators->composer[$i]->photos_person;
                     $insert = Ajax::db_edit_query($mysqli,"INSERT INTO `person` (`id`, `id_kp`, `id_section`, `name_ru`, `name_eng`, `id_person`, `img`) VALUES (NULL, '$a', '$cret', '$name_person_ru', '$name_person_en', '$kp_id_person', '$photos_person')");
                 }
             }
             if($k=='translator'){
                 $b=count($json1->creators->translator);
                 for($i=0;$i<$b;$i++){
                     $cret = 'Переводчик';
                     $name_person_ru=$json1->creators->translator[$i]->name_person_ru;
                     $name_person_en=$json1->creators->translator[$i]->name_person_en;
                     $kp_id_person=$json1->creators->translator[$i]->kp_id_person;
                     $photos_person=$json1->creators->translator[$i]->photos_person;
                     $insert = Ajax::db_edit_query($mysqli,"INSERT INTO `person` (`id`, `id_kp`, `id_section`, `name_ru`, `name_eng`, `id_person`, `img`) VALUES (NULL, '$a', '$cret', '$name_person_ru', '$name_person_en', '$kp_id_person', '$photos_person')");
                 }
             }
             if($k=='preview'){
                 $b=count($json1->creators->preview);
                 for($i=0;$i<$b;$i++){
                     $cret = $k;
                     $name_person_ru=$json1->creators->preview[$i]->name_person_ru;
                     $name_person_en=$json1->creators->preview[$i]->name_person_en;
                     $kp_id_person=$json1->creators->preview[$i]->kp_id_person;
                     $photos_person=$json1->creators->preview[$i]->photos_person;
                     $insert = Ajax::db_edit_query($mysqli,"INSERT INTO `person` (`id`, `id_kp`, `id_section`, `name_ru`, `name_eng`, `id_person`, `img`) VALUES (NULL, '$a', '$cret', '$name_person_ru', '$name_person_en', '$kp_id_person', '$photos_person')");
                 }
             }
             
             
         }
                 
        
                       if($upDate){
                           $v="ПРОИЗВЕДЕН UPDATE";
                       }else{
                           $v=$value[kp].'не добавленно <br>';
                       }
                 
                $j = array("id"=>$id,"kp"=>$v,"test"=>$test,"ara"=>$ara);
                echo json_encode(array_filter($j), JSON_UNESCAPED_UNICODE);
}

























}