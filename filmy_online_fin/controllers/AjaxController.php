<?php


class AjaxController {


	const SHOW_BY_DEFAULT = 20;



	


	public function actionIndex($id, $page = 1)
	{
			

		if(isset($_POST['search'])){
			$se = Search::ajaxMoreFilms($_POST['search']);
			$total = Search::getTotalProductsInSearch($_POST['search']);
            
		    $pagination = new Pagination($total, $page, Search::SHOW_BY_DEFAULT, 'page-');
		}


		return true;
	}



	public function actionJson($id)
	{
		$id = $_POST['add'];
		$db = Db::getConnection();
		//Ajax::db_edit_query($db,"TRUNCATE TABLE `all_films`");
		if(isset($_POST['add'])){

			while(!$select = Ajax::select_array_db($db,"SELECT * FROM `url_Json_BD` WHERE `id`='$id'")){
				$id++;
				$j=array("add"=>$id);
             	
			}
			
			if($select){
				foreach($select as $key=>$value){
	                 Ajax::addJson($db,$value['url_bd']);
	                 
	             }
	         }else{
	             	echo json_encode(array_filter($j), JSON_UNESCAPED_UNICODE);
	             }


		
		/*if($select = Ajax::select_array_db($db,"SELECT * FROM `url_Json_BD` WHERE `id`='$id' and `object` = '1' ")){
             foreach($select as $key=>$value){
                 Ajax::addJson($db,$value['url_bd']);
                 
             }
         
         }else{
             $prov['lol']="Завершенно";
             $j=array("prov"=>$prov);
             echo json_encode(array_filter($j), JSON_UNESCAPED_UNICODE);
         }*/



		}
			

		return true;
	}






	public function actionUnictable($id)
	{
		
		if($_POST['add']){

			$db = Db::getConnection();
			Ajax::select_query($db);
		}

		return true;
	}



	public function actionUnicfilms($id)
	{
		$post = $_POST['add'];
    	$db = Db::getConnection();
	    if($post){
	       
	        $line = Ajax::select_array_db($db,"SELECT * FROM `unic_id_kp` WHERE `id` = '$post'");
		      foreach($line as $k=>$v){  
		             
		                   $id_kp = $v['id_kp'];
		                   Ajax::gggg($db,$id_kp,$post);
		               
		       }     
	    }
	}



	
			
	public function actionPerson($id)
	{
		 $db = Db::getConnection();
		 $id = $_POST['add'];

		if($id){
						if($select = Ajax::select_array_db($db,"SELECT * FROM `unic_id_kp` WHERE `id` = '".$id."' ")){
			         	
			             foreach($select as $key=>$value){
			                Ajax::select_query2($db,$value['id_kp'],$id);
			                 
			             }
			           
			         }else{

			              $prov['lol']="Завершенно";
			              $j=array("prov"=>$prov);
			              echo json_encode(array_filter($j), JSON_UNESCAPED_UNICODE);
			         }
			    
			}



	}



	public function actionKp($id)
	{
		 $db = Db::getConnection();
		 $id = $_POST['add'];
		 
		if($id){
			$select = Ajax::select_line_db($db,"SELECT `id`,`id_kp` FROM `unic_films` WHERE `id` =".$id);
						if($select){
			         	
			             echo $select['id_kp'];
			           
			         }
			    
			}



	}


	

	
}

