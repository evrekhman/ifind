<?php
return array(
	'about' => 'mian/about',
	'name/([0-9]+)' => 'article/person/$1',
	'news/([0-9]+)' => 'news/view/$1',
	'news' => 'news/index', 
	'sitemap/setup' => 'sitemap/index',
	//'category/([a-zA-z]+)/([0-9]+)|(page-([0-9]+))/page-([0-9]+)' => 'category/view/$1/$2/$3',
	'category/([a-zA-z]+)/([0-9]+)/page-([0-9]+)' => 'category/view/$1/$2/$3',
	'category/([a-zA-z]+)/([0-9]+)' => 'category/view/$1/$2',
	'category/([a-zA-z]+)/page-([0-9]+)' => 'category/index/$1/$2',
	'category/([a-zA-zа-яА-я0-9]+)' => 'category/index/$1',

	'film/([0-9]+)' => 'article/film/$1',
	'movie/([0-9]+)' => 'article/index/$1',
	'serial/([0-9]+)' => 'article/index/$1',
	'xxx'=>'xxx/index',//отдельная страничка для счетчиков
	'search/ajax/url/json' => 'ajax/json/$1/$2',//1. allJsonUrl.php - добаление всеx json - url с таблицы SELECT * FROM `url_Json_BD` .
	'search/ajax/url/unictable' => 'ajax/unictable/$1/$2',//2. creatUnicFilms.php - создаёт из всеx дабвленных фильмом -  уникальные(типа из 50 тыс фильмов, создает 27 тыс уникальных).
	'search/ajax/url/unicfilms' => 'ajax/unicfilms/$1/$2',//3. updateAllFilms.php - из большой таблиицы вытаскивает данные и переносит в таблицу уникальных фильмов добаляет iframe_url name_ru итд.




	'search/ajax/url/person' => 'ajax/person/$1/$2',//4. upGetmovieCC.php - обнавляет в уникальную таблицу и таблицу с актерами и таблицу со скринами из Getmovie.сс

	


	'search/ajax' => 'ajax/index/$1/$2',
	'get/kp' => 'ajax/kp/$1/$2',


	'search/([0-9A-Za-zА-Яа-яЁё]+)/page-([0-9]+)' => 'search/index/$1/$2',
	
	'search' => 'search/index/$1',

	'post/films' => 'mian/getfilms/$1',
	
	'admin/addfilm'=>'admin/addfilm',
	'zzz/logout' => 'admin/logout/',
	'zzz/plus' => 'admin/plus/$1/$2',
	'ajax/plus' => 'admin/ajax/$1/$2',
	'ajax/unic' => 'admin/unic/$1/$2',
	'zzz/parse' => 'admin/parskino',
	'zzz/kp' => 'admin/kino',
	'zzz/dowimg' => 'admin/dowimg',
	'zzz' => 'admin/index/',
	''=> 'mian/index'

	);