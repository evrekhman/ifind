<!DOCTYPE html>
<html class="no-js" lang="">

<head>

    


    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?
        if(isset($cat)){echo $cat['title'];}
        else if(isset($oneTitleFilms,$id)){ echo Mian::indivTitle($oneTitleFilms['name_ru'],$oneTitleFilms['year'],$oneTitleFilms['type']);}
        ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <link rel="stylesheet" href="/template/css/bootstrap.css">


    <link rel="stylesheet" href="/template/css/styles.css<? echo "?".rand(2000,9999)?>">
    
    <link rel="stylesheet" href="/template/css/mystyle.css<? echo "?".rand(2000,9999)?>">

    <script src="/template/js/vendor.js"></script>

</head>

<body>

    


    <div id="wrapper">

      

