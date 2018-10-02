<?php


class AdminController {

	public function actionIndex()
	{
		if(isset($_POST['email'], $_POST['password'])){
			//print_r($_POST);

			$arr = Mian::admin($_POST['email'],$_POST['password']);
			//print_r($arr);
		}
		
		require_once(ROOT . '/views/admin/index.php');

		return true;
	}


	public function actionLogout()
	{
		
		unset($_SESSION['admin']);



		header("Location /");
	}



	/*public function actionView()
	{
		
		
		require_once(ROOT . '/views/cabinet/index.php');

		return true;
	}*/


	public function actionKino()
	{
		
		
		require_once(ROOT . '/views/cabinet/index.php');

		return true;
	}


	public function actionDowimg()
	{
		
		
		require_once(ROOT . '/views/dowimg/index.php');

		return true;
	}


	public function actionParskino()
	{
		
		$db = Db::getConnection();
		$post = $_POST['add'];
		//echo $post;
	if($post){
						$arr = array();
			         
			         	if($select = Ajax::select_array_db($db,"SELECT * FROM `unic` WHERE `id` = '".$post."' ")){
				             foreach($select as $key=>$value){
				             	$ara = array("plus"=>$value['img_big_plus'], "big"=>$value['poster_film_big'], "smal"=>$value['poster_film_small']);
				             	
				             	Kino::getContent($ara,$post,$value['id_kp']);
				               
				             }
						}else{
							$plus = $post+1;
							$select = Ajax::select_array_db($db,"SELECT * FROM `unic` WHERE `id` = '".$plus."' ");
							$ara = array("plus"=>$value['img_big_plus'], "big"=>$value['poster_film_big'], "smal"=>$value['poster_film_small']);
							
							foreach($select as $key=>$value){
				             	
				                Kino::getContent($ara,$post,$value['id_kp']);
				               
				             }
						}
		
	}

	return true;

	}


	public function actionPlus(){


		require_once(ROOT . '/views/kp/index.php');

		return true;
	}

	public function actionAjax($a,$b){

		
		if($_POST){
			
			$post = $_POST;
			$db = Db::getConnection();
			Plus::plusKinoParser($post);
		}

		return true;
	}


	public function actionUnic($a,$b){

		
		if($_POST){
			
			$post = $_POST;
			$db = Db::getConnection();
			Plus::unic($post);
		}

		return true;
	}




	public function actionAddfilm($id)
	{
		 $db = Db::getConnection();
		 $id = $_POST['id_kp'];
		 Plus::plusAddFilms($id);



	}



}
