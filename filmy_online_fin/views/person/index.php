<?php include ROOT.'/views/layouts/header.php';?>
<?  
    
/*echo "<pre>";
    print_r($oneId);
echo "</pre>";*/
   
?>
<section>
                <div class="container">

                    <div class="home-trending padding-vertical-50">
                    <div class="section-header center">
                        	<h1><?=$onPerson['name_ru']?></h1>
                            <h2 class="upper margin-bottom-20"><?=$onPerson['name_eng']?></h2>
                            <p><?=$onPerson['id_section']?></p>
                    </div>
                    
                        
<div class="products scroll">
                        <div class="row">
							<?php foreach($oneId as $value):?>
                            
                            
                            <div class="col-md-3 col-sm-2 col-xs-6 mobill2">
                                <div class="awe-media home-cate-media">
                                    <div class="awe-media-header">
                                        <div class="awe-media-image">

                                            <? if($value['poster_film_small']!=''): ?>

                                                    <img id="siz2" src="<?=$value['poster_film_small']?>" alt="" class="current">

                                                <? elseif($value['poster_film_small']!=''): ?>

                                                    <img id="siz2" src="<?=$value['poster_film_small']?>" alt="" class="current">

                                                <? elseif($value['poster_film_small'] =='' && $value['poster_film_small'] == ''): ?>

                                                    <img id="siz2" src="http://akogda.net/uploads/posts/2016-04/1461191478_1-noposter.jpg" alt="" class="current">

                                                <?endif;?>
                                        </div>
                                        <!-- /.awe-media-image -->

                                        <div class="awe-media-overlay overlay-dark-50 fullpage">
                                            <div class="content">
                                                <a href="/<?=$value['type'].'/'.$value['id_kp']?>" >
                                                <div class="fp-table text-left">
                                                    <div class="fp-table-cell">
                                                    
                                                       <a href="/movie/835877">
                                                    
                                                       
		                                                        <p class="margin-bottom-50">
																	<?=$value['id_section']?>
																</p>
                                                        </a>
                                                        
                                                        <a href="/<?=$value['type'].'/'.$value['id_kp']?>" class="btn btn-sm btn-outline btn-white">Смотреть онлайн</a>

                                                    </div>
                                                    
                                                </div>
                                                
                                                </a>
                                            </div>
                                        </div>
                                        <!-- /.awe-media-overlay -->

                                    </div>
                                    <!-- /.awe-media-header -->
                                </div>
                                <!-- /.awe-media -->
                                <h3 class="product-name">
                                    <a href="/<?=$value['type'].'/'.$value['id_kp']?>" title="Gin Lane Greenport Cotton Shirt"><?=$value['name_ru']?></a>
                                </h3>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                                
							<?php endforeach;?>
                           </div>

                        
                        <!-- /.row -->


                        
</div>
</section>
<?/* foreach($newsItem as $value){?>
    <? echo $value['id_kp'].'<br>'; ?>
<? }*/?>
<?php include ROOT.'/views/layouts/footer.php';?>