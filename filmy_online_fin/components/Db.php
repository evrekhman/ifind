<?php

class Db
{

		public static function getConnection()
		{
			$paramsPath = ROOT . '/config/db_params.php';
			$params = include($paramsPath);


			$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
			//, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
			$db = new PDO($dsn, $params['user'], $params['password']);

			$db->exec("set names utf8");

			return $db;
		}
}