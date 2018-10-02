<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?
        if(isset($cat)){
            echo $cat['title'];
        }
        else if(isset($oneTitleFilms,$id)){ 
            echo Mian::indivTitle($oneTitleFilms['name_ru'],$oneTitleFilms['year'],$oneTitleFilms['type']);
        }
        else if(isset($getOneTitlePerson)){
            echo Mian::indivTitle(false,false,false,$getOneTitlePerson['name_ru'],$getOneTitlePerson['name_eng']);
        }
        ?></title>

    <meta name="description" content="<?
                                        if(isset($cat)){
                                            echo mb_substr(strip_tags($cat['description']), 0, 199);
                                        }
                                        else if(isset($oneTitleFilms)){
                                            echo mb_substr(strip_tags($oneTitleFilms['description']), 0, 199);
                                        }
                                        ?>">
    <meta name="keywords" content="<?
                                    if(isset($cat)){
                                        echo mb_substr($cat['keywords'], 0, 199);
                                    }
                                    else if(isset($oneTitleFilms) || isset($getOneTitlePerson)){
                                        $pieces = explode("/", $oneTitleFilms['name_ru']);
                                        //print_r($pieces);
                                        $num = count($pieces);
                                        if($num>1){
                                            echo $pieces[0].', '.$pieces[1].', Смотреть онлайн '.$pieces[2].', '.$pieces[2].' смотреть онлайн бесплатно,  smotret online '.Mian::translit($pieces[0]).', smotret online '.$pieces['name_en'].', смотреть онлайн '.$pieces['name_en'].'в hd'.', сериалы онлайн, бесплатно, фильмы онлайн, дата выхода';
                                        }else{
                                            echo $pieces[0].', Смотреть онлайн '.$pieces[0].', '.$pieces[0].' смотреть онлайн бесплатно, smotret online '.Mian::translit($pieces[0]).', smotret online '.$pieces['name_en'].', смотреть онлайн '.$pieces['name_en'].'в hd'.', сериалы онлайн, бесплатно, фильмы онлайн, дата выхода';
                                        }
                                    }
                                    ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="yandex-verification" content="569fb772428d6968" />
    <link href="/template/html/hosoren/img/brand.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="/template/css/bootstrap.css">

    <link rel="stylesheet" href="/template/css/plugins.css">

    <link rel="stylesheet" href="/template/css/styles.css">
    
    <link rel="stylesheet" href="/template/css/mystyle.css<? echo "?".rand(2000,9999)?>">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="/template/js/vendor.js"></script>

    <script>
        window.SHOW_LOADING = false;
    </script>
</head>

<body>
    <div id="wrapper">

        <header id="header" class="awe-menubar-header">
            <nav class="awemenu-nav" data-responsive-width="1200">
                <div class="container">
                    <div class="awemenu-container">


                    <div class="navbar-header">
                            <ul class="navbar-icons">

                                <? if(isset($_SESSION['admin'])):?>
                                <li class="menubar-account">
                                    <a href="#" title="" class="awemenu-icon">
                                        <i class="icon icon-user-circle"></i>
                                        <span class="awe-hidden-text">Account</span>
                                    </a>

                                    <ul class="submenu megamenu">
                                        <li>
                                            <div class="container-fluid">
                                                <div class="header-account">
                                                    <div class="header-account-avatar">
                                                        <a href="/zzz" title="">
                                                            <img src="/template/html/hosoren/img/samples/avatars/customers/1.jpg" alt="" class="img-circle">
                                                        </a>
                                                    </div>

                                                    <div class="header-account-username">
                                                        <h4><a href="/zzz"><?=$_SESSION['admin']?></a></h4>
                                                    </div>

                                                    <ul>
                                                        <li><a href="/zzz/parse">Перейти в парсинг</a>
                                                        </li>
                                                        <li><a href="/zzz">Перейти в кабинет</a>
                                                        </li>
                                                        <li><a href="/zzz/logout">выйти</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menubar-wishlist">
                                    <a href="#" title="" class="awemenu-icon">
                                        <i class="icon icon-star"></i>
                                        <span class="awe-hidden-text">Wishlist</span>
                                    </a>

                                    <ul class="submenu megamenu">
                                        <li>
                                            <div class="container-fluid">
                                                <ul class="whishlist">

                                                    <li>
                                                        <div class="whishlist-item">
                                                            <div class="product-image">
                                                                <a href="#" title="">
                                                                    <img src="/template/html/hosoren/img/samples/products/cart/1.jpg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="product-body">
                                                                <div class="whishlist-name">
                                                                    <h3><a href="#" title="">Gin Lane Greenport Cotton Shirt</a></h3>
                                                                </div>

                                                                <div class="whishlist-price">
                                                                    <span>Price:</span>
                                                                    <strong>$120</strong>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <a href="#" title="" class="remove">
                                                            <i class="icon icon-remove"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <div class="whishlist-item">
                                                            <div class="product-image">
                                                                <a href="#" title="">
                                                                    <img src="/template/html/hosoren/img/samples/products/cart/2.jpg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="product-body">
                                                                <div class="whishlist-name">
                                                                    <h3><a href="#" title="">Gin Lane Greenport Cotton Shirt</a></h3>
                                                                </div>

                                                                <div class="whishlist-price">
                                                                    <span>Price:</span>
                                                                    <strong>$120</strong>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <a href="#" title="" class="remove">
                                                            <i class="icon icon-remove"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <div class="whishlist-item">
                                                            <div class="product-image">
                                                                <a href="#" title="">
                                                                    <img src="/template/html/hosoren/img/samples/products/cart/3.jpg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="product-body">
                                                                <div class="whishlist-name">
                                                                    <h3><a href="#" title="">Gin Lane Greenport Cotton Shirt</a></h3>
                                                                </div>

                                                                <div class="whishlist-price">
                                                                    <span>Price:</span>
                                                                    <strong>$120</strong>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <a href="#" title="" class="remove">
                                                            <i class="icon icon-remove"></i>
                                                        </a>
                                                    </li>

                                                </ul>

                                                <hr>

                                                <div class="whishlist-action">
                                                    <a href="#" title="" class="btn btn-dark btn-lg btn-outline btn-block">View Wishlist</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                <li class="menubar-cart">
                                    <a href="#" title="" class="awemenu-icon menu-shopping-cart">
                                        <i class="icon icon-shopping-bag"></i>
                                        <span class="awe-hidden-text">Cart</span>

                                        <span class="cart-number">2</span>
                                    </a>

                                    <ul class="submenu megamenu">
                                        <li>
                                            <div class="container-fluid">

                                                <ul class="whishlist">

                                                    <li>
                                                        <div class="whishlist-item">
                                                            <div class="product-image">
                                                                <a href="#" title="">
                                                                    <img src="/template/html/hosoren/img/samples/products/cart/1.jpg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="product-body">
                                                                <div class="whishlist-name">
                                                                    <h3><a href="#" title="">Gin Lane Greenport Cotton Shirt</a></h3>
                                                                </div>

                                                                <div class="whishlist-price">
                                                                    <span>Price:</span>
                                                                    <strong>$120</strong>
                                                                </div>

                                                                <div class="whishlist-quantity">
                                                                    <span>Quantity:</span>
                                                                    <span>1</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <a href="#" title="" class="remove">
                                                            <i class="icon icon-remove"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <div class="whishlist-item">
                                                            <div class="product-image">
                                                                <a href="#" title="">
                                                                    <img src="/template/html/hosoren/img/samples/products/cart/2.jpg" alt="">
                                                                </a>
                                                            </div>

                                                            <div class="product-body">
                                                                <div class="whishlist-name">
                                                                    <h3><a href="#" title="">Gin Lane Greenport Cotton Shirt</a></h3>
                                                                </div>

                                                                <div class="whishlist-price">
                                                                    <span>Price:</span>
                                                                    <strong>$120</strong>
                                                                </div>

                                                                <div class="whishlist-quantity">
                                                                    <span>Quantity:</span>
                                                                    <span>1</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <a href="#" title="" class="remove">
                                                            <i class="icon icon-remove"></i>
                                                        </a>
                                                    </li>

                                                </ul>

                                                <div class="menu-cart-total">
                                                    <span>Total</span>
                                                    <span class="price">$180</span>
                                                </div>

                                                <div class="cart-action">
                                                    <a href="#" title="" class="btn btn-lg btn-dark btn-outline btn-block">View cart</a>
                                                    <a href="#" title="" class="btn btn-lg btn-primary btn-block">Proceed To Checkout</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>


                            </ul>


                        <? endif ?>





                            <ul class="navbar-search ">
                                <li>
                                    <a href="#" title="" class="awemenu-icon awe-menubar-search" id="open-search-form">
                                        <span class="sr-only">Search</span>
                                        <span class="icon icon-search"></span>
                                    </a>

                                    <div class="menubar-search-form" id="menubar-search-form">
                                        <form action="/search" method="POST">
                                            <input type="text" name="search" class="form-control sendSearch" placeholder="найти фильм" autocomplete="off">
                                            <div class="menubar-search-buttons">
                                                <input type="submit" name="submit" value="Найти" class="btn btn-sm btn-white"/>
                                                <button type="button" class="btn btn-sm btn-white" id="close-search-form">
                                                    <span class="icon icon-remove"></span>
                                                </button>
                                            </div>
                                        </form>
                                        <div id="add_result"></div>
                                    </div>
                                    
                                    <!-- /.menubar-search-form -->
                                </li>
                                
                            </ul>
                        </div>
                        
                        <div class="awe-logo">
                            <a href="/" title="">
                                <img src="/template/html/hosoren/img/logo.png" alt="">
                            </a>
                        </div>
                        <!-- /.awe-logo -->

                        <ul class="awemenu awemenu-right">
                            <li class="awemenu-item">
                                <a href="/category/movie" title="">
                                    <span>Фильмы</span>
                                </a>

                                <?/*<ul class="awemenu-submenu awemenu-megamenu" data-width="100%" data-animation="fadeup">
                                    <li class="awemenu-megamenu-item">
                                        <div class="container-fluid">
                                            <div class="awemenu-megamenu-wrapper">

                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <h2 class="upper">Топ</h2>

                                                        <ul class="super">
                                                            <li><a href="/category/movie/2017" title="">2017</a>
                                                            </li>
                                                            <li><a href="/category/movie/2016" title="">2016</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3">
														<h2 class="upper">Фильмы Топ просмотры</h2>
                                                        <ul class="sublist">
                                                            <?php foreach($getHeaderMovieLook as $val):?>
																<li>
																	<a href="/<?=$val['type'].'/'.$val['id_kp']?>" title=""><?=$val['name_ru']?></a>
																</li>
															<?php endforeach?>    
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3">
														<h2 class="upper">Новинки</h2>
                                                        <ul class="sublist">
                                                        <?php foreach($getHeaderMovie as $val):?>
																<li>
																	<a href="/<?=$val['type'].'/'.$val['id_kp']?>" title=""><?=$val['name_ru']?></a>
																</li>
															<?php endforeach?>    
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3">


													<?php foreach($getHeaderTwoMovie as $val):?>
                                                        
                                                        <div class="awe-media inline margin-bottom-25">
                                                            <div class="awe-media-image">
                                                                <a href="/<?=$val['type'].'/'.$val['id_kp']?>" title="">
                                                                    <img style="height:133px;width:120px;" src="<?=$val['poster_film_small']?>" alt="">
                                                                </a>
                                                            </div>
                                                            <h4 class="awe-media-title medium upper">
                                                            <a href="/<?=$val['type'].'/'.$val['id_kp']?>" title="">смотреть сейчас</a>
                                                        </h4>
                                                        </div>
                                                    <?php endforeach?>

                                                    </div>
                                                </div>

                                                <div class="bottom-link">
                                                    <a href="/category/movie" class="btn btn-lg btn-dark btn-outline">
                                                        <span>Перейти в раздел</span>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                </ul>*/?>
                            </li>

                            <li class="awemenu-item">
                                <a href="/category/serial" title="">
                                    <span>Сериалы</span>
                                </a>

                                <?/*<ul class="awemenu-submenu awemenu-megamenu" data-width="100%" data-animation="fadeup">
                                    <li class="awemenu-megamenu-item">
                                        <div class="container-fluid">
                                            <div class="awemenu-megamenu-wrapper">

                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <h2 class="upper">ТОП</h2>

                                                        <ul class="super">
                                                            <li><a href="/category/serial/2017" title="">2017</a>
                                                            </li>
                                                            <li><a href="/category/serial/2016" title="">2016</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3">
														<h2 class="upper">Сериалы Топ просмотры</h2>
                                                        <ul class="sublist">
                                                        <?php foreach($getHeaderSerialLook as $val):?>
																<li>
																	<a href="/<?=$val['type'].'/'.$val['id_kp']?>" title=""><?=$val['name_ru']?></a>
																</li>
															<?php endforeach?>    
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3">
														<h2 class="upper">Новинки</h2>
                                                        <ul class="sublist">
                                                        <?php foreach($getHeaderSerial as $val):?>
																<li>
																	<a href="/<?=$val['type'].'/'.$val['id_kp']?>" title=""><?=$val['name_ru']?></a>
																</li>
															<?php endforeach?>    
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <?php foreach($getHeaderTwoSerial as $val):?>
                                                        
                                                            <div class="awe-media inline margin-bottom-25">
                                                                <div class="awe-media-image">
                                                                    <a href="/<?=$val['type'].'/'.$val['id_kp']?>" title="">
                                                                        <img style="height:133px;width:120px;" src="<?=$val['poster_film_small']?>" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="awe-media-title medium upper">
                                                                <a href="/<?=$val['type'].'/'.$val['id_kp']?>" title="">смотреть сейчас</a>
                                                            </h4>
                                                            </div>
                                                        <?php endforeach?>
                                                    </div>
                                                </div>

                                                <div class="bottom-link">
                                                    <a href="/category/serial" class="btn btn-lg btn-dark btn-outline">
                                                        <span>Перейти в раздел</span>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                </ul>*/?>
                            </li>

                            <li class="awemenu-item">
                                <a href="/category/mulytfilymy" title="">
                                    <span>Мультфильмы</span>
                                </a>

                                <?/*<ul class="awemenu-submenu awemenu-megamenu" data-width="100%" data-animation="fadeup">
                                    <li class="awemenu-megamenu-item">
                                        <div class="container-fluid">
                                            <div class="awemenu-megamenu-wrapper">

                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <h2 class="upper">ТОП фильмы по годам</h2>

                                                        <ul class="super">
                                                            <li><a href="/category/mulytfilymy/2017" title="">2017</a>
                                                            </li>
                                                            <li><a href="/category/mulytfilymy/2016" title="">2016</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3">
														<h2 class="upper">Мультфильмы Топ просмотры</h2>
                                                        <ul class="sublist">
                                                        <?php foreach($getHeaderMultLook as $val):?>
																<li>
																	<a href="/<?=$val['type'].'/'.$val['id_kp']?>" title=""><?=$val['name_ru']?></a>
																</li>
															<?php endforeach?>    
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3">
														<h2 class="upper">Новинки</h2>
                                                        <ul class="sublist">
                                                        <?php foreach($getHeaderMult as $val):?>
																<li>
																	<a href="/<?=$val['type'].'/'.$val['id_kp']?>" title=""><?=$val['name_ru']?></a>
																</li>
															<?php endforeach?>    
                                                        </ul>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <?php foreach($getHeaderTwoMult as $val):?>
                                                        
                                                            <div class="awe-media inline margin-bottom-25">
                                                                <div class="awe-media-image">
                                                                    <a href="/<?=$val['type'].'/'.$val['id_kp']?>" title="">
                                                                        <img style="height:133px;width:120px;" src="<?=$val['poster_film_small']?>" alt="">
                                                                    </a>
                                                                </div>
                                                                <h4 class="awe-media-title medium upper">
                                                                <a href="/<?=$val['type'].'/'.$val['id_kp']?>" title="">смотреть сейчас</a>
                                                            </h4>
                                                            </div>
                                                        <?php endforeach?>
                                                    </div>
                                                </div>

                                                <div class="bottom-link">
                                                    <a href="/category/mulytfilymy" class="btn btn-lg btn-dark btn-outline">
                                                        <span>Перейти в раздел</span>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </li>
                                </ul>*/?>
                            </li>

                            <li class="awemenu-item">
                                <a  title="">Все Категории</a>

                                <ul class="awemenu-submenu awemenu-megamenu" data-width="100%" data-animation="fadeup">
                                    <li class="awemenu-megamenu-item">
                                        <div class="container-fluid">

                                            <div class="row" >
                                            <?php foreach($getMainCategory as $value):?>
                                                
                                                <div class="col-lg-3">
                                                    <ul class="list-unstyled">
                                                        <li class="awemenu-item">
                                                            <a href="/category/<?=$value['okon']?>" title=""><?=$value['name']?></a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            <?php 
                                                    endforeach;
                                            ?>
                                                
                                            </div>

                                        </div>
                                    </li>
                                </ul>
                            </li>

                            

                        </ul>
                        <!-- /.awemenu -->
                    </div>
                </div>
                <!-- /.container -->

            </nav>
            <!-- /.awe-menubar -->

            
        </header>
        <!-- /.awe-menubar-header -->

