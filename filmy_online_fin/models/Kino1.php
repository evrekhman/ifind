<?php


class Kino
{

	public static function getCurl($url){
				//$url = "https://www.kinopoisk.ru/film/690593/cast";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//CURLOPT_CONNECTTIMEOUT_MS
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 350);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);//если посставить 0 или закоментить  то будут заголовки перед редиректом
		$arr = array(
			'Upgrade-Insecure-Request: 1',
			'X-DevTools-Emulate-Network-Conditions-Client-Id: 2d796fbb-8658-4ef9-86a0-d8536fa71efb',
			'User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36',
			'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
			'Accept-Encoding: gzip, deflate, br',
			'Accept-Language: ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
			'Cookie: mobile=no; _ym_uid=1502526825587536245; yandexuid=1211098921501761237; refresh_yandexuid=1211098921501761237; fuid01=598ebd6d50386c1b.1XCTyjSJjaHru7wC0XC6toOZ7OQEp6lYLVT1yhTXqGVYsA4tAfDw4qskzeafBYEuiIluCfXdt1UcPU1bo04S_2yLI3gWxcC9eqW_23ygdjOczjk-N-lQo1negzfwN9HO; disable_alert_feature=61; my_perpages=%5B%5D; awfs=1; Session_id=3%3A1502735965.5.0.1502735965970%3A2paXJQ%3A11A.0%7C1110000014250357.-1.0%7C30%3A165120.19142.wygt0AOTVLUSSlzw8CyRr7XEifs; noflash=false; _ym_isad=2; _ym_visorc_22663942=b; user_country=kz; tc=5171; last_visit=2017-08-15+20%3A12%3A59;'
			);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $arr);
		curl_setopt($ch,CURLOPT_ENCODING, '');
        curl_setopt( $ch, CURLOPT_COOKIESESSION, true );
		curl_setopt( $ch, CURLOPT_COOKIEJAR, './cookies.txt' );
		curl_setopt( $ch, CURLOPT_COOKIEFILE, './cookies.txt' );

        	/*ОТПРАВКА в файл ЗАГОЛОВКОВ*/

         $fOut = fopen($_SERVER["DOCUMENT_ROOT"].'/'.'curl_out.txt', "w" );
         curl_setopt ($ch, CURLOPT_VERBOSE, 1);
         curl_setopt ($ch, CURLOPT_STDERR, $fOut );
         	/*END ОТПРАВКА в файл ЗАГОЛОВКОВ*/
         $body = curl_exec($ch);
         curl_close($ch);
         return $body;

	}
	#вытскивает список фильмов с актёра
	public static function getListFilmPerson($urlMain=false){

		 $body1 = Kino::getCurl($urlMain);
		 print_r($body1);
         $html1 = iconv("windows-1251","utf-8", $body1);
		
		 preg_match_all('~<span class="name"><a href=".+-([0-9]+)\/"~', $html1, $matPerson);
		 preg_match_all('~<div class="headersAmplua" id="(.*)">~', $html1, $matJob);
         //print_r($matPerson[1]);
         return $matPerson[1];
	}

	public static function getContent($urlMain){
		
		 $body = Kino::getCurl($urlMain);

         $html = iconv("windows-1251","utf-8", $body);
         
         
          preg_match_all('~\<div.+?class=(\"name\").+?\>(.*)\<\/div\>~', $html, $matches);
          preg_match_all('~\<div class="name"><a href="(.*?)">~', $html, $matUrl);

          foreach ($matUrl[1] as $key => $value) {

          	$urlPerson = $value;
          	
          	
          }
         
         Kino::getListFilmPerson("https://www.kinopoisk.ru/name/248443/");
         //print_r($body1);
        
         //echo json_encode(array('main' => $matches[2], 'matUrl' => $matUrl[1] ));
		
        return true;
    }
	

	

}