<?php include ROOT.'/views/layouts/header.php';?>

            <section>
                <div class="container">

                    <div class="home-trending padding-vertical-50">
                        <div class="section-header center">
                        	<h1><?=$cat['name'].' онлайн бесплатно'?></h1>
                            <h2 class="upper margin-bottom-20"><?='Подборка лучших онлайн '.$cat['name']?></h2>
                            <p>Найденно результатов <?=$total?></p>
                        </div>
                        
<div class="products scroll">
                        <div class="row">
							<?php foreach($limit as $value):?>
                            
                            
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
                                                    
                                                       
                                                        <p class="margin-bottom-50"><?=$value['description']?></p>
                                                        <a href="/<?=$value['type'].'/'.$value['id_kp']?>" class="btn btn-sm btn-outline btn-white">Смотреть онлайн</a>

                                                    </div>
                                                    <a  class="awe-button " data-toggle="tooltip" title="Quickview">
                                                        <i class="icon icon-eye"></i><i><?=$value['look']?></i>
                                                    </a>
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
                    </div>
                    <!-- /.home-trending -->
                    <!--Пагинация-->
						<div class="row">
			                <div class="col-md-2">
			                    
			                </div>
			                <div class="col-md-8">
			                    <div class="pag">
			                        <?=$pagination->get(); ?>
			                    </div>
			                </div>
			                <div class="col-md-2">
			                    
			                </div>
			            </div>
                </div>
                <!-- /.container -->

            </section>
            <!-- /section -->

           


            
<?php include ROOT.'/views/layouts/footer.php';?>