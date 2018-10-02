
<?php include ROOT.'/views/layouts/header.php';?>

<section class="container">
   <div class="movie-header"> 
   

<div class="top-info">
<div class="production"><?=$getMainFilms['country']?>, <?=$getMainFilms['year']?></div>
<h1 class="title"><?=$getMainFilms['name_ru']?></h1>
</div>

<div class="rating-movie">
<span class="value"><?=round($getMainFilms['rating_kp'], 1)?></span>
<span class="count">30 830 оценок</span>
</div>

<span class="media-btn hidden-xs">Постеры и кадры</span>
    
    <img src="<?=$getMainFilms['img_big_plus']?>" class="img-responsive" />

<div class="film-poster-full" style="background-image: url(<?=$getMainFilms['img_big_plus']?>)"></div>


    <div class="poster-cover"></div>


<div class="bottom-btn">
<a href="#trailer" data-toggle="modal" class="trailer">Трейлер</a>
<a id="film" data-toggle="modal" class="video"><i class="material-icons">play_arrow</i> Смотреть бесплатно</a>
</div>


</div>
</section>



<section class="about-movie">
     <div class="row">

<div class="container">


<!-- Start :: About film left -->
<div class="col-md-3 col-xs-12">
    <div class="about-left">
        <img alt="#" src="<?=$getMainFilms['poster_film_small']?>" title="#">
        <div class="org-title">
            <h2 style="font-size: 20px;"><?=$getMainFilms['name_ru']?></h2>
        </div>

        <table class="film-info">
            <tbody>
            <? if($getMainFilms['year']!='') {?>

                <tr class="film-info__row">
                    <td class="film-info__type">
                        Год производства
                    </td>
                    <td class="film-info__value">
                        <?=$getMainFilms['year']?>
                    </td>
                </tr>
            <? }?>

            <? if($getMainFilms['country']!='') {?>
                <tr class="film-info__row">
                    <td class="film-info__type">
                        Страна
                    </td>
                    <td class="film-info__value">
                        <?=$getMainFilms['country']?>
                    </td>
                </tr>
            <? }?>

            <? if($getMainFilms['premier']!='') {?>
                <tr class="film-info__row">
                    <td class="film-info__type">
                        Премьера в мире
                    </td>
                    <td class="film-info__value">
                        <?=$getMainFilms['premier']?>
                    </td>
                </tr>
            <? }?>

            <? if($getMainFilms['premier_rus']!='') {?>
                <tr class="film-info__row">
                    <td class="film-info__type">
                        Премьера в России
                    </td>
                    <td class="film-info__value">
                        <?=$getMainFilms['premier_rus']?>
                    </td>
                </tr>

            <? }?>

            <? if($getMainFilms['budget']!='') {?>
                <tr class="film-info__row">
                    <td class="film-info__type">
                        Бюджет
                    </td>
                    <td class="film-info__value">
                        <?=$getMainFilms['budget']?>
                    </td>
                </tr>
            <? }?>

            <? if($getMainFilms['age_limit']!='') {?>
                <tr class="film-info__row">
                    <td class="film-info__type">
                        Возраст
                    </td>
                    <td class="film-info__value">
                        <?=$getMainFilms['age_limit']?>
                    </td>
                </tr>
            <? }?>

            <? if($getMainFilms['time_film']!='') {?>
                <tr class="film-info__row">
                    <td class="film-info__type">
                        Время
                    </td>
                    <td class="film-info__value">
                        <?=$getMainFilms['time_film']?>
                    </td>
                </tr>
            <? }?>

            <? if($getMainFilms['rating_imdb']!='') {?>
                <tr class="film-info__row">
                    <td class="film-info__type">
                        IMDb
                    </td>
                    <td class="film-info__value">
                        <?=$getMainFilms['rating_imdb']?>
                    </td>
                </tr>
            <? } ?>
            </tbody>
        </table>

        <?/*<div class="more-info">
            <a href="#more-info" rel="nofollow">Вся информация</a>
        </div>*/?>
    </div>
</div>
<!-- End :: About film left -->


<!-- Start :: About film center -->
<div class="col-md-6 col-xs-12">
   <div class="about-center">
      <div class="movie-tags">
         <? if($arr_genre = explode(",", $getMainFilms['genre'])){
            foreach ($arr_genre as $key => $value) {
              ?>
                <a href=""><?=$value?></a>
              <?
            }
          }else{
          ?>
              <a href=""><?=$getMainFilms['genre']?></a>

         <? } ?>
         
      </div>
      <p class="movie-desc"><?=$getMainFilms['description']?></p>
      <?/*<div class="banner">
         <!--noindex--><a href="#" rel="nofollow" target="_blank"><img src="/template/banner.jpg" alt="" title="" width="728" height="90"></a><!--/noindex-->
      </div>*/?>
      <? if($getMainFilms['fact']!=''){?>
      <div class="movie-facts">
         <h5>Факты</h5>
         <div class="movie-facts-box">
            <? 
            if(strlen($getMainFilms['fact'])>300){
              mb_internal_encoding("UTF-8");
              $arr_fact = explode("&", mb_substr($getMainFilms['fact'], 0, 300));
                foreach ($arr_fact as $key => $value) {
                 ?>
                  <p><span class="facts-i"><i class="material-icons">info_outline</i></span><?=$value?></p>
                 <?
                }
            }else{

                foreach ($arr_fact as $key => $value) {
                 ?>
                  <p><span class="facts-i"><i class="material-icons">info_outline</i></span><?=$value?></p>
                 <?
                }
            }
            
            ?>
            
            
            <a href="#more-facts" data-toggle="modal" class="more-facts" rel="nofollow">Все факты</a>
         </div>
      </div>
      <? } ?>
   </div>
</div>
<!-- End :: About film center -->

<!-- Start :: About film right -->
<div class="col-md-3 col-xs-12">
   <div class="about-right">

<div class="about-right-box persons">
   <div class="headline">Режиссёр</div>
   <div class="box-contetn">

<!-- Sart :: Content item directos -->
      <?
            foreach ($rejes as $key => $value) {
              ?>
              <!-- Sart :: Content item directos -->
              <div class="persons actor">
                 <a class="person-photo" href="#">
                    <?/*<img alt="<?=$value['name_ru']?>" src="<?=$value['img']?>">*/?>
                    <div class="person__photo-border">
                    </div>
                 </a>
                 <div class="person-info">
                    <div class="person-name">
                       <a href="/name/<?=$value['id_person']?>"><?=$value['name_ru']?></a>
                    </div>
                    <span class="person-other"><?=$value['name_eng']?></span>
                 </div>
               </div>
              <?
            }

         ?>
<!-- End :: Content item directos -->

   </div>
</div>

 <? //echo count($person); ?>

       <?/* $num = 5; ?>
         <?foreach ($person as $key => $value) {
          
              /*for ($i=0; $i < 5; $i++) { 
                echo count($person[$i]);
              }*/
              
/*
              
             if($value['id_section']=="Актеры"){
                    echo count($person);
                    
                    //echo $key.'<br>';
                    echo $value['name_ru'].'<br>';  
                  continue;
                  
              }

         } */?>
<div class="about-right-box mt persons">
   <div class="headline">В ролях</div>
   <div class="box-contetn">
         <?
            foreach ($actor as $key => $value) {
              ?>
              <!-- Sart :: Content item directos -->
              <div class="persons actor">
                 <a class="person-photo" href="#">
                    <?/*<img alt="<?=$value['name_ru']?>" src="<?=$value['img']?>">*/?>
                    <div class="person__photo-border">
                    </div>
                 </a>
                 
                 <div class="person-info">
                    <div class="person-name">
                       <a href="/name/<?=$value['id_person']?>"><?=$value['name_ru']?></a>
                    </div>
                    <span class="person-other"><?=$value['name_eng']?></span>
                 </div>
               </div>
              <?
            }

         ?>
<!-- End :: Content item directos -->

   </div>
</div>

<div class="more-actors">
<a href="#more-actors" data-toggle="modal">Вся съемочная группа</a>
</div>

   </div>
</div>

</div>


     </div>
</section>
















<section>
                <div class="container">

                    <div class="home-trending padding-vertical-50">
                        <div class="section-header center">
                          
                            <h3 class="upper margin-bottom-20">Похожие фильмы и сериалы на "<?=$getMainFilms['name_ru']?>"</h3'>
                        </div>
                        
<div class="products scroll">
                        <div class="row">
              <?php foreach($getSimilarFilms as $value):?>
                            
                            
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
                                                    
                                                       
                                                        <p class="margin-bottom-50"><?=$value['genre']?></p>
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
            
                </div>
                <!-- /.container -->

            </section>
            <!-- /section -->

























<!-- End :: About film right -->


<!-- Modal video -->
<div class="modal fade" id="myModal">
    <div class="modal-header">
        <button aria-hidden="true" class="close" data-dismiss="modal" type="button"><i class="material-icons">close</i></button>
    </div>

    <div class="modal-dialog">


          <select id="mounth">
              <option value="hide">Выбрать плеер</option>
              <option value="" rel="icon-temperature">Плеер #1</option>
              <option value="february">Плеер #2</option>
          </select> 

        
    </div>
</div>

<!-- Modal video -->






<!-- Modal trailer -->
<div class="modal fade" id="trailer">
    <div class="modal-header">
        <button aria-hidden="true" class="close" data-dismiss="modal" type="button"><i class="material-icons">close</i></button>
    </div>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                <iframe width="540" data-trailer-id="t344887" id="movie-trailer" height="304" frameborder="0" src="<?=$getMainFilms['trailer']?>" allowfullscreen="1"> </iframe>
                    
                    
                </div>

                
            </div>
        </div>
    </div>
</div>

<!-- Modal trailer -->



<!-- Start :: More facts -->
<div class="modal fade" id="more-facts">
    <div class="modal-header">
        <button aria-hidden="true" class="close" data-dismiss="modal" type="button"><i class="material-icons">close</i></button>
    </div>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">


                <div class="modal-movie-info">

                    <div class="head">
                        <h3 class="col-md-8 col-xs-12">
                            <?=$getMainFilms['name_ru']?><br>
                            <small><?=$getMainFilms['name_eng']?></small>
                        </h3>

    
                    </div>

<div class="movie-facts">

         <div class="movie-facts-box">

            <? 
              $arr_fact = explode("&", $getMainFilms['fact']);
              foreach ($arr_fact as $key => $value) {
               ?>
                <p><span class="facts-i"><i class="material-icons">info_outline</i></span><?=$value?></p>
               <?
              }
            ?>
            
         </div>
      </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End :: More facts modla -->



<!-- Start :: More facts -->
<div class="modal fade" id="more-actors">
    <div class="modal-header">
        <button aria-hidden="true" class="close" data-dismiss="modal" type="button"><i class="material-icons">close</i></button>
    </div>

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">


                <div class="modal-movie-info">

                    <div class="head">
                        <h3 class="col-md-8 col-xs-12">
                            <?=$getMainFilms['name_ru']?><br>
                            <small><?=$getMainFilms['name_eng']?></small>
                        </h3>

    
                    </div>

<div class="modal-persons"> 

<? if(!empty($directorAll)){?>
<div class="about-right-box persons">

   <div class="headline">Режиссёр</div>
   <div class="box-contetn">

<!-- Sart :: Content item directos -->
      <?
            foreach ($directorAll as $key => $value) {
              ?>
              <!-- Sart :: Content item directos -->
              <div class="persons actor">
                 <a class="person-photo" href="#">
                    <?/*<img alt="<?=$value['name_ru']?>" src="<?=$value['img']?>">*/?>
                    <div class="person__photo-border">
                    </div>
                 </a>
                 <div class="person-info">
                    <div class="person-name">
                       <a href="/name/<?=$value['id_person']?>"><?=$value['name_ru']?></a>
                    </div>
                    <span class="person-other"><?=$value['name_eng']?></span>
                 </div>
               </div>
              <?
            }

         ?>
<!-- End :: Content item directos -->

   </div>
</div>
<? }?>

<? if(!empty($actorAll)){?>
<div class="about-right-box persons">
   <div class="headline">Актеры</div>
   <div class="box-contetn">

<!-- Sart :: Content item directos -->
      <?
            foreach ($actorAll as $key => $value) {
              ?>
              <!-- Sart :: Content item directos -->
              <div class="persons actor">
                 <a class="person-photo" href="#">
                    <?/*<img alt="<?=$value['name_ru']?>" src="<?=$value['img']?>">*/?>
                    <div class="person__photo-border">
                    </div>
                 </a>
                 <div class="person-info">
                    <div class="person-name">
                       <a href="/name/<?=$value['id_person']?>"><?=$value['name_ru']?></a>
                    </div>
                    <span class="person-other"><?=$value['name_eng']?></span>
                 </div>
               </div>
              <?
            }

         ?>
<!-- End :: Content item directos -->

   </div>
</div>
<? }?>


<? if(!empty($produsAll)){?>
<div class="about-right-box persons">
   <div class="headline">Продюсер</div>
   <div class="box-contetn">

<!-- Sart :: Content item directos -->
      <?
            foreach ($produsAll as $key => $value) {
              ?>
              <!-- Sart :: Content item directos -->
              <div class="persons actor">
                 <a class="person-photo" href="#">
                    <?/*<img alt="<?=$value['name_ru']?>" src="<?=$value['img']?>">*/?>
                    <div class="person__photo-border">
                    </div>
                 </a>
                 <div class="person-info">
                    <div class="person-name">
                       <a href="/name/<?=$value['id_person']?>"><?=$value['name_ru']?></a>
                    </div>
                    <span class="person-other"><?=$value['name_eng']?></span>
                 </div>
               </div>
              <?
            }

         ?>
<!-- End :: Content item directos -->

   </div>
</div>
<? }?>


<? if(!empty($screenwriterAll)){?>
<div class="about-right-box persons">
   <div class="headline">Сценаристы</div>
   <div class="box-contetn">

<!-- Sart :: Content item directos -->
      <?
            foreach ($screenwriterAll as $key => $value) {
              ?>
              <!-- Sart :: Content item directos -->
              <div class="persons actor">
                 <a class="person-photo" href="#">
                    <?/*<img alt="<?=$value['name_ru']?>" src="<?=$value['img']?>">*/?>
                    <div class="person__photo-border">
                    </div>
                 </a>
                 <div class="person-info">
                    <div class="person-name">
                       <a href="/name/<?=$value['id_person']?>"><?=$value['name_ru']?></a>
                    </div>
                    <span class="person-other"><?=$value['name_eng']?></span>
                 </div>
               </div>
              <?
            }

         ?>
<!-- End :: Content item directos -->

   </div>
</div>
<? }?>


<? if(!empty($asWellAsAll)){?>
<div class="about-right-box persons">
   <div class="headline">А также</div>
   <div class="box-contetn">

<!-- Sart :: Content item directos -->
      <?
            foreach ($asWellAsAll as $key => $value) {
              ?>
              <!-- Sart :: Content item directos -->
              <div class="persons actor">
                 <a class="person-photo" href="#">
                    <?/*<img alt="<?=$value['name_ru']?>" src="<?=$value['img']?>">*/?>
                    <div class="person__photo-border">
                    </div>
                 </a>
                 <div class="person-info">
                    <div class="person-name">
                       <a href="/name/<?=$value['id_person']?>"><?=$value['name_ru']?></a>
                    </div>
                    <span class="person-other"><?=$value['name_eng']?></span>
                 </div>
               </div>
              <?
            }

         ?>
<!-- End :: Content item directos -->

   </div>
</div>
<? }?>



<? if(!empty($OperatorAll)){?>
<div class="about-right-box persons">
   <div class="headline">Оператор</div>
   <div class="box-contetn">

<!-- Sart :: Content item directos -->
      <?
            foreach ($OperatorAll as $key => $value) {
              ?>
              <!-- Sart :: Content item directos -->
              <div class="persons actor">
                 <a class="person-photo" href="#">
                    <?/*<img alt="<?=$value['name_ru']?>" src="<?=$value['img']?>">*/?>
                    <div class="person__photo-border">
                    </div>
                 </a>
                 <div class="person-info">
                    <div class="person-name">
                       <a href="/name/<?=$value['id_person']?>"><?=$value['name_ru']?></a>
                    </div>
                    <span class="person-other"><?=$value['name_eng']?></span>
                 </div>
               </div>
              <?
            }

         ?>
<!-- End :: Content item directos -->

   </div>
</div>
<? }?>

<? if(!empty($ComposerAll)){?>
<div class="about-right-box persons">
   <div class="headline">Композитор</div>
   <div class="box-contetn">

<!-- Sart :: Content item directos -->
      <?
            foreach ($ComposerAll as $key => $value) {
              ?>
              <!-- Sart :: Content item directos -->
              <div class="persons actor">
                 <a class="person-photo" href="#">
                    <?/*<img alt="<?=$value['name_ru']?>" src="<?=$value['img']?>">*/?>
                    <div class="person__photo-border">
                    </div>
                 </a>
                 <div class="person-info">
                    <div class="person-name">
                       <a href="/name/<?=$value['id_person']?>"><?=$value['name_ru']?></a>
                    </div>
                    <span class="person-other"><?=$value['name_eng']?></span>
                 </div>
               </div>
              <?
            }

         ?>
<!-- End :: Content item directos -->

   </div>
</div>
<? }?>


<? if(!empty($EditorsAll)){?>
<div class="about-right-box persons">
   <div class="headline">Монтажеры</div>
   <div class="box-contetn">

<!-- Sart :: Content item directos -->
      <?
            foreach ($EditorsAll as $key => $value) {
              ?>
              <!-- Sart :: Content item directos -->
              <div class="persons actor">
                 <a class="person-photo" href="#">
                    <?/*<img alt="<?=$value['name_ru']?>" src="<?=$value['img']?>">*/?>
                    <div class="person__photo-border">
                    </div>
                 </a>
                 <div class="person-info">
                    <div class="person-name">
                       <a href="/name/<?=$value['id_person']?>"><?=$value['name_ru']?></a>
                    </div>
                    <span class="person-other"><?=$value['name_eng']?></span>
                 </div>
               </div>
              <?
            }

         ?>
<!-- End :: Content item directos -->

   </div>
</div>
<? }?>



</div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End :: More actors -->

     
<?php include ROOT.'/views/layouts/footer.php';?>
<script type="text/javascript">
  var url =  location.pathname;
  var path = url.split("/");
  $.get(
      "/film/"+path[2],
      {
        id: path[2]
        
      },
      onAjaxSuccess
    );
     
    function onAjaxSuccess(data)
    {
        $(document).on('click','#film', function(e){
            var respon = JSON.parse(data);
            
            
            var ifr = respon.iframe.split(",");
            var iframe = '<button type="button" id="zaebal" class="btn btn-link">Закрыть</button></button><iframe id="pl" class="cloz" src="'+ifr[0]+'" frameborder="0" allowfullscreen="" webkitallowfullscreen=""mozallowfullscreen="" oallowfullscreen="" msallowfullscreen=""></iframe>';

            
            console.log(ifr);
            
            $(".container")[1].innerHTML += iframe;
        });
        

        


    }
    $(document).on('click','#zaebal', function(){
        $('#zaebal').remove();
        $('.cloz').remove();
    });
    
    

    
</script>