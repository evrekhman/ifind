<?php include ROOT.'/views/layouts/header.php';?>
<? //print_r($search); ?>
            <section>
                <div class="container">

                    <div class="home-trending padding-vertical-50">
                        <div class="section-header center">
                            <h2 class="upper margin-bottom-20"><?=$bbb?></h2>
                            <p>Найдено результатов <?=$total?></p>
                        </div>
                        
<div class="products scroll">
                        <div class="row">
							<?php foreach($search as $value):?>
                            
                            
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
                                                    <? if(strlen($value['name_ru'])<=10):?>
                                                        <h2 class="upper"><?=$value['name_ru']?></h2>
                                                    <? elseif(strlen($value['name_ru'])>10 && strlen($value['name_ru'])<=20): ?>
                                                        <h2 class="upper" style="font-size:20px;"><?=$value['name_ru']?></h2>
                                                    <? elseif(strlen($value['name_ru'])>20 && strlen($value['name_ru'])<=90): ?>
                                                        <h2 class="upper" style="font-size:15px;"><?=$value['name_ru']?></h2>
                                                    <? endif; ?>
                                                       
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
                                <h2 class="product-name">
                                    <a href="/<?=$value['type'].'/'.$value['id']?>" title="Gin Lane Greenport Cotton Shirt"><?=$value['name_ru']?></a>
                                    <br><a><?=$value['year']?><a>
                                </h2>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                                
							<?php endforeach;?>
                           </div>

                        
                        <!-- /.row -->


                        
</div>
                    </div>
                    <!-- /.home-trending -->
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