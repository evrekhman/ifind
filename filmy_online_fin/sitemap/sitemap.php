<?php
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
$level=$_SERVER['DOCUMENT_ROOT'];
$mysqli = Db::getConnection();
$site='http://ifind.su/';

function select_array_db($mysqli,$query){
    $array=array();
    
    $result = $mysqli->query($query);
    if($result){
            while($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            array_push($array,$row);
        }
        $result->free();
        return $array;
    }
}


$array=array();

array_push($array,$site);


$sinonimsCAT=select_array_db($mysqli,"SELECT * FROM `cat_films` WHERE `level`!=1");

foreach($sinonimsCAT as $value){
    $tra=translit($value[sinonims]);
    $itog_key.="\n<url>\n<loc>\n".$site.$tra.'/'."\n</loc>\n<priority>\n1.0\n</priority>\n</url>";
}

$sinonimsURL=select_array_db($mysqli,"SELECT  `id`,`type`,`priority` FROM `new3_all_total`");

foreach($sinonimsURL as $valueURL){
    $traURL=translit($valueURL[id]);
    $typeURL=$valueURL[type];
    if($typeURL!=""){
		$itog_key.="\n<url>\n<loc>\n".$site.$typeURL.'/'.$traURL.'/'."\n</loc>\n<priority>\n";
		if($valueURL[priority]=='1'){$itog_key.="1.0";}else{$itog_key.="0.9";}
		$itog_key.="\n</priority>\n</url>";
    }
    if($typeURL==""){
		$itog_key.="\n<url>\n<loc>\n".$site.'movie/'.$traURL.'/'."\n</loc>\n<priority>\n";
		if($valueURL[priority]=='1'){$itog_key.="1.0";}else{$itog_key.="0.9";}
		$itog_key.="\n</priority>\n</url>";    
    }
}





$itog_key='<?xml version="1.0" encoding="utf-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'.$itog_key."</urlset>";

echo '<textarea cols="50" rows="20">'.implode("\n",$array).'</textarea>';


$file = 'sitemap.xml';
file_put_contents($file, $itog_key);




?>