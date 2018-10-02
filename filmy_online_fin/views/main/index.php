<?php include ROOT.'/views/layouts/header.php';?>

<div id="main">

            <section>





                <div class="main-slider-wrapper">
                    <div class="main-slider owl-carousel owl-carousel-inset">
                        <?php foreach($getSlaid as $value):?>
                        
                        <div class="main-slider-item" style="height:427px;">
                            <div class="main-slider-image">
                                <img src="<?=$value['img_big_plus']?>" alt="">
                            </div>

                            <div class="main-slider-text">
                                <div class="fp-table">
                                    <div class="fp-table-cell center">
                                        <div class="container">
                                            <h3>Смотреть онлайн</h3>
                                            <? if(strlen($value['name_ru'])<=10):?>
                                                        <h2 class="upper"><?=$value['name_ru']?><br>filmy-online.cc</h2>
                                                    <? elseif(strlen($value['name_ru'])>10 && strlen($value['name_ru'])<=20): ?>
                                                        <h2 class="upper" style="font-size:20px;"><?=$value['name_ru']?><br>filmy-online.cc</h2>
                                                    <? elseif(strlen($value['name_ru'])>20): ?>
                                                        <h2 class="upper" style="font-size:15px;"><?=$value['name_ru']?><br>filmy-online.cc</h2>
                                                    <? endif; ?>
                                            

                                            <div class="button">
                                                <a href="/movie/<?=$value['id_kp']?>/" class="btn btn-lg btn-primary margin-right-15">Смотреть сейчас</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php endforeach;?>
                        

                    </div>
                </div>

                <script>
                    $(function() {  aweMainSlider(); });
                </script>

            </section>
            <!-- /section -->

            <section class="border-bottom">
                <div class="container">
                    <div class="policy-wrapper">

                        <div class="row">

                           <?/* <div class="col-md-4 col-sm-4 col-xs-8">
                                <div class="policy">
                                    <div class="policy-icon">
                                        <i class="icon icon-dolar-circle"></i>
                                    </div>

                                    <div class="policy-text">
                                        <h4>100% Бесплатно</h4>
                                        <p>без смс</p>
                                    </div>
                                </div>
                                <!-- /.policy -->
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-8">
                                <div class="policy">
                                    <div class="policy-icon">
                                        <i class="icon icon-car"></i>
                                    </div>

                                    <div class="policy-text">
                                        <h4>Смотрите в любом месте</h4>
                                        <p>на любом устройстве</p>
                                    </div>
                                </div>
                                <!-- /.policy -->
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-8">
                                <div class="policy">
                                    <div class="policy-icon">
                                        <i class="icon icon-telephone"></i>
                                    </div>

                                    <div class="policy-text">
                                        <h4>24-hour</h4>
                                        <p>Онлайн</p>
                                    </div>
                                </div>
                                <!-- /.policy -->
                            </div>*/?>
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.policy-wrapper -->
                </div>
                <!-- /.container -->
            </section>
            <!-- /section -->

            <section>
                <div class="container">

                    <div class="home-products padding-vertical-60">
                        <div class="row">


                            <div class="col-md-12 col-sm-12">
                            <h3 class="headline">Фильмы последние новинки</h3>
                                <div class="products owl-carousel" data-items="3">
                                    <?php foreach($getSlaidComedy as $value):?>

                                    <div class="product product-grid">
                                        <div class="product-media">
                                            <div class="product-thumbnail">
                                                <a href="/<?=$value['type'].'/'.$value['id_kp']?>" title="">
                                                    <img src="<?=$value['poster_film_small']?>" alt="" class="current">
                                                    <img src="<?=$value['poster_film_small']?>" alt="">
                                                </a>
                                            </div>
                                            <!-- /.product-thumbnail -->


                                            <div class="product-hover">
                                                <div class="product-actions">
                                                    

                                                    <a href="/<?=$value['type'].'/'.$value['id_kp']?>" class="awe-button product-quick-whistlist" data-toggle="tooltip" title="Add to whistlist">
                                                        
                                                    </a>

                                                    <a  class="awe-button" data-toggle="tooltip" title="Quickview">
                                                        <i class="icon icon-eye"></i><i><?=$value['look']?></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- /.product-hover -->



                                        </div>
                                        <!-- /.product-media -->

                                        <div class="product-body">
                                            <h2 class="product-name">
                                                <a href="/<?=$value['type'].'/'.$value['id_kp']?>" title="Gin Lane Greenport Cotton Shirt"><?=$value['name_ru']?></a>
                                            </h2>
                                            <!-- /.product-product -->

                                            <div class="product-category">
                                                <span>
                                                <? $genre =  explode(",", $value['genre']); ?>
                                                <?=$genre[0]?>
                                                  
                                                </span>
                                            </div>
                                            <!-- /.product-category -->

                                            <div class="product-category">
                                                <span><?=$value['country']?></span>
                                            </div>
                                            <!-- /.product-price -->
                                        </div>
                                        <!-- /.product-body -->
                                    </div>
                                    <!-- /.product -->

                                    <?php endforeach;?>

                                </div>
                                <!-- ./products -->
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">

                            <div class="col-md-12 col-sm-12">
                            <h3 class="headline">Исторические фильмы</h3>
                                <div class="products owl-carousel" data-items="3">




                                    <?php foreach($getSlaidHistory as $value):?>
                                    <div class="product product-grid">
                                        <div class="product-media">
                                            <div class="product-thumbnail">
                                                <a href="/<?=$value['type'].'/'.$value['id_kp']?>" title="">
                                                    <img src="<?=$value['poster_film_small']?>" alt="" class="current">
                                                    <img src="<?=$value['poster_film_small']?>" alt="">
                                                </a>
                                            </div>
                                            <!-- /.product-thumbnail -->


                                            <div class="product-hover">
                                                <div class="product-actions">
                                                    

                                                    <a href="/<?=$value['type'].'/'.$value['id_kp']?>" class="awe-button product-quick-whistlist" data-toggle="tooltip" title="Add to whistlist">
                                                        
                                                    </a>

                                                    <a  class="awe-button" data-toggle="tooltip" title="Quickview">
                                                        <i class="icon icon-eye"></i><i><?=$value['look']?></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- /.product-hover -->



                                        </div>
                                        <!-- /.product-media -->

                                        <div class="product-body">
                                           <h2 class="product-name">
                                                <a href="/<?=$value['type'].'/'.$value['id_kp']?>" title="Gin Lane Greenport Cotton Shirt"><?=$value['name_ru']?></a>
                                            </h2>
                                            <!-- /.product-product -->

                                            <div class="product-category">
                                                <span>
                                                  <? $genre =  explode(",", $value['genre']); ?>
                                                  <?=$genre[0]?>
                                                </span>
                                            </div>
                                            <!-- /.product-category -->

                                            <div class="product-category">
                                                <span><?=$value['country']?></span>
                                            </div>
                                            <!-- /.product-price -->
                                        </div>
                                        <!-- /.product-body -->
                                    </div>
                                    <!-- /.product -->
                                    <?php endforeach;?>



                                </div>
                                <!-- ./products -->
                            </div>
                        </div>
                        <!-- /.row -->

           
                    </div>
                    <!-- /.home-products -->

                </div>
                <!-- /.container -->
            </section>
            <!-- /section -->



<!-- Баннер --><?/*
<div class="container">
   <div class="banner">
      <!--noindex--><a href="#" rel="nofollow" target="_blank"><img src="/template/banner.jpg" alt="" title="" width="728" height="90"></a><!--/noindex-->
   </div>
</div>*/?>
<!-- Баннер -->




<!-- Start :: Лучшие фильмы онлайн 2017 -->
<section>
                <div class="container">
<div class="movie-block">
   <h3 class="headline">Премьеры мирового кинопроката 2017</h3>
   <div class="block-sort">
      <a id="all_new" class="mdl-button">Все новинки</a>
      <a id="top_film" class="mdl-button">Фильмы</a>
      <a id="top_serial" class="mdl-button">Сериалы</a>
      <a id="top_mult" class="mdl-button">Мультфильмы</a>
   </div>
   <div class="relative">
      <ul class="movie-block-items">
      


<? foreach ($arr as $key => $value) {
    ?><li class="film-toggle">
         <div class="movie-item">
            <div class="film-info-slide" style="z-index: 4; width: 0px; left: 0px; right: auto; box-shadow: 2px 0px 8px 0px rgba(0, 0, 0, 0);">

               <div class="film-about-txt">
                  <span>
                  <?=$value['description']?>
                  </span>
               </div>

               <div class="clearfix film-about-param">
                  <div class="user-score-c">  
                     <span class="d-gray-f">
                     <span class="ratingbal">0</span>
                     <button class="mdl-button mdl-js-button mdl-button--icon updateRating">
                     <i class="material-icons ">favorite</i>
                     </button>
                     </span>
                     <span class="d-gray-f">
                     <button class="mdl-button mdl-js-button mdl-button--icon updateCollection">
                     <i class="material-icons ">bookmark</i>
                     </button>
                     </span>
                     <span class="d-gray-f">
                     <button class="mdl-button mdl-js-button mdl-button--icon updateLookLater">
                     <i class="material-icons ">access_time</i>
                     </button>          
                     </span>
                  </div>
                  <div class="crititc-score-c f-left">
                     <div>
                        <span><?=$value['rating_kp']?></span> КиноПоиск
                     </div>
                     <div>
                        <span><?=$value['rating_imdb']?></span> IMDB
                     </div>
                  </div>
               </div>
            </div>
            <a href="/movie/<?=$value['id_kp']?>" class="film-img-link film-img-background film-img" style="background-image: url(<?=$value['poster_film_small']?>); z-index: 4; box-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0); transform: scale(1);"></a>
         </div>
         <div class="film-content">
            <p class="film-title">
               <a class="film-_title-link" href="/movie/<?=$value['id_kp']?>">
               <?=$value['name_ru']?>
               </a>
            </p>
            <p class="film-info">
               <span class="film-content-year"><?=$value['year']?></span>
               <span class="film-content-genre">
               <? $genre =  explode(",", $value['genre']); ?>
               <?=$genre[0]?>
                 
               </span>
               <span class="film-content-country"><?=$value['country']?></span>
            </p>
         </div>
      </li><?
} ?>


























      </ul>
   </div>
</div>

</div>
</section>
<!-- End :: Лучшие фильмы онлайн 2017 -->




<!-- Start :: Описание -->
<section class="description-meta">
   <div class="container">
      <h1>Смотрите фильмы онлайн бесплатно в хорошем качестве на filmy-online.cc</h1>
      <p>Погрязнув в череде томных дней, современные обыватели забывают о необходимости своевременного отдыха и чрезвычайной важности эмоциональной нагрузки. Бесконечный поток однообразных будней может выбить почву из-под ног и вызвать нервное расстройство или срывы, ведь недаром специалисты в области медицинских исследований заверяют широкую общественность, что главным недугом двадцать первого века будет депрессия.</p>

      <p>Что бы избавиться от депрессии мы предлагаем Вам смотреть фильмы онлайн 2017.</p>

      <p>Но человеческая цивилизация еще полтора столетия назад получило панацею, которой по силам развеять хандру и поднять настроение, подарив целый каскад положительных впечатлений. Имя этому чудодейственному средству – кинематограф. Кино интересовало людей на протяжении всего существования. Величайшее из искусств отличная альтернатива скучным вечерам, заканчивающихся тем, что спать ложились люди очень рано. Но с появлением киноискусства жизнь стала куда интереснее.</p>

      <p>Наиболее доступное развлечение - киноновинки 2017 смотреть онлайн бесплатно в hd 720</p>

      <p>Братья Люмьер привнесли в жизни потомков явление, покорившее сердца миллионов киноманов в самых отдаленных уголках необъятного земного шара. Вне зависимости от социального статуса и возрастной категории люди не представляют своего существования без замечательной возможности увидеть <strong>кино новинки 2017 уже вышедшие смотреть онлайн в hd 720 бесплатно</strong>, наслаждаясь знакомством с уникальными историями и непредсказуемыми сюжетными линиями. А в эпоху технического прогресса новинки кино способны похвастаться не только умелой актерской игрой и увлекательным сценарием, но и невероятными по размаху визуальными эффектами, поражающими людское воображение своей реалистичностью и масштабностью.</p>

      <p>Кинематограф зародился в начале прошлого века, и с каждым годом популярность этого чудесного явления только возрастала, и так вплоть до наших дней, когда без замечательной возможности <strong>лучшие новинки кино 2017 смотреть бесплатно в хорошем качестве hd 1080</strong> невозможно представить качественное времяпровождение. Посетители нашего онлайн-кинотеатра могут погрузиться в удивительный мир, не покидая стен собственного дома. На бескрайних просторах данного ресурса возможно отыскать киноленты на самый изысканный вкус – гигантское хранилище позволяет почувствовать свободу выбора.</p>

      <p>Нет нужды совершать обременительные траты на поход в кинотеатр в компании друзей или вместе с семьей, или же отстаивать километровые очередях в кассу. Свободный доступ к фильмотеке колоссальных размеров подразумевает, что вам не нужно терпеть соседство незнакомцев - куда удобнее <strong>лучшие фильмы 2016-2017 года смотреть бесплатно в хорошем качестве</strong> только с теми, кто вам близок. Став постоянным посетителем нашего кинопортала, вы сумеете сэкономить заработанные средства на более важные статьи семейного бюджета.</p>

      <p>Зарубежные фильмы 2017 года которые уже вышли доступны каждому желающему</p>

      <p>Страсть к величайшему из направлений искусства имеет и ряд недостатков, основное из которых затратность производства. Режиссеры применяют при создании очередного шедевра дорогостоящие компьютерные технологии и приглашают к участию в съемочном процессе звезд мировой величины, требующими гонорары со многими нолями. Все вышеперечисленное прямо пропорционально отражается на стоимости билетов в кинотеатры, по причине чего далеко не каждый киноман может позволить себе посещение премьерных показов каждой ожидаемой премьеры, невзирая на тот факт, что увидеть <strong>фильмы 2017 список лучших фильмов которые уже можно посмотреть</strong>, желает практически каждый человек. Это вынуждает искать альтернативные способы ознакомления, которых не так уж и много.</p>

      <p>Главным преимуществом нашего виртуального кинозала в полнейшем отсутствии необходимости длительного скачивания необходимой картины, что позволить не засорять жесткий диск – увидеть <strong>фильмы 2017 которые уже можно посмотреть в хорошем качестве hd 720</strong> можно без внесения даже минимальной платы или отправки дорогостоящих смс-сообщений на подозрительные номера. Сэкономленные деньги лучше потратить на оплату счетов за интернет, которым можно пользоваться и в иных целях. Опытная команда журналистов и профессиональные программисты тщательно отслеживают последние тенденции на кинематографическом рынке, чтобы кинолюбители своевременно получали достоверную информацию из первых уст и могли скрашивать свой досуг – требуется лишь выбрать заинтересовавшее полотно и нажать кнопку «play».</p>
                    
   </div>
</section>
<!-- End :: Описание -->
 
</div>

<?php include ROOT.'/views/layouts/footer.php';?>