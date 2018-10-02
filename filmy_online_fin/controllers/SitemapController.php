<?php


class SitemapController {

	public function actionIndex()
	{

		$db = Db::getConnection();
		Sitemap::getSetup($db);

		require_once(ROOT . '/views/sitemap/index.php');

		return true;
	}




}

