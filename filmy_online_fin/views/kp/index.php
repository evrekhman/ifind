<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">




<div class="container">
    <div class="row">
      <div class="col-md-4"><span>ввдите id фильма</span>

                    <form id="sendfrom" name="sform" class="form-horizontal" role="form">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">id_kp</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name= "id_kp" id="inputEmail3" value="" style="width:150px;" placeholder="enter id_kp">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">start</button>
                        </div>
                      </div>
                    </form>

      </div>
      <?/*<div class="col-md-4"><div id="sendd">send цикл</div></div>*/?>
      <div class="col-md-4"><span>с какой цифры начинается цикл</span>

                    <form id="sendCucle" name="sCycle" class="form-horizontal" role="form">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">id</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name= "id" id="inputEmail3" value="" style="width:150px;" placeholder="enter id">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">start Cycle</button>
                        </div>
                      </div>
                    </form>

      </div>
      <div class="col-md-4"><span>добавить фильм</span>

                    <form id="add_films" name="addmyfilms" class="form-horizontal" role="form">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">id</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name= "add_films" id="inputEmail3" value="" style="width:150px;" placeholder="enter id_kp films">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">add film</button>
                        </div>
                      </div>
                    </form>
                    <div id="addInfo"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4"><span>Добавляются только  уники admin=0</span>

                    <form id="unic" name="unic" class="form-horizontal" role="form">
                      <div class="form-group">
                        
                      </div>
                      
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">start</button>
                        </div>
                      </div>
                    </form>

      </div>
      
    </div>
</div>



<div id="container">
    
</div>
<div id="title-film"></div>
<div id="film-actor"></div>
<div id="oldContainer"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
var count = 0;
var summ = 0;
var dataStart = new Date()
var id = 325;
var iframe = '';
var timeOut = 3500; 
var kinopoisk_id = 0;
var genres = []; 
var index = 0;
var limit = 80;

var Allgenres = [];
var Allcountry = [];
var Allyear = [];
var nameFolder = 27000;
function getXmlHttpRequest(){
    var xmlhttp;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

function addHandler(el,ev, func){
    try{
        el.addEventListener(ev, func, false);
    }catch(x){
        el.attachEvent("on"+ev, func);
    }
}

function getXmlLoad(getPost,e=false,urlval,xml,func){

                     xml.onload = function() {
                        if (this.status == 200) {
                            console.log("success");
                             func(xml);         
                        } else {
                          console.error("error " + this.statusText);
                        }
                    }

                    xml.onerror = function(){
                        console.error("ОШИБКА");
                    }
                    
                    xml.open(getPost, urlval, true);
                    xml.send(e);
    }

 //var kinopoisk_id = "464963";  
  
var LoadFilmClass = function() {
    this.film = {
        'title' : '',
        'title_en' : '',
        'img' : '',
        'img_big' : '',
        'img_big_plus' : '',
        'text' : '',
        'tags' : [],
        'rating_IMDB' : '',
        'rating_kinopoisk' : '',
        'kinopoisk_id' : '',
        'trailer' : '',
        'categories' : [],
        'properties' : {},
        'persons' : {},
        'year' : '',
        
    };

}






// Загружаем ключевые слова
LoadFilmClass.prototype.loadKeywords = function (kinopoisk_id,dt) {
    var film = this.film;
    return new Promise(function(resolve, reject) {
        
        $.get('http://www.kinopoisk.ru/film/'+kinopoisk_id+'/keywords/', function(data, status){
        

            $('#container').html('');
            if(status == 'success') {
                var html = data.split('<td id="block_left">');
                html = html[1].split('<!-- Правая сторона -->')
                html = html[0];
                html = html.replace(/<script/g, '<span class="script"');
                html = html.replace(/script>/g, 'span>');
                html = html.replace(/&nbsp;/g, ' ');
                $('#container').html(html);

                // Вытаскиваем ключевые слова
                if( typeof $('#container ul.keywordsList li').text() != 'undefined' && $('#container ul.keywordsList li').text() != ''){
                    $('#container ul.keywordsList li').each(function(index) {
                        var textKey = $(this).text().trim();
                        if(textKey.length < 35) {
                            if(index < 100) {
                                film.tags += textKey.trim() + ', ';
                            }
                        }
                    });
                }

                resolve(film);
            } else 
                reject('Error load film keywords');
        }).fail(function(error) {
            reject(film);
        });
        // });
        // request.fail(function( jqXHR, textStatus ) {
        //  reject(textStatus);
        // });

    });
}





















// Загружаем основу фильма
LoadFilmClass.prototype.loadFilm = function (kinopoisk_id) {
    var film = this.film;
    return new Promise(function(resolve, reject) {
        
        film.kinopoisk_id = kinopoisk_id;

        var url = 'http://www.kinopoisk.ru/film/'+kinopoisk_id+'/';
        $.get(url, function(data, status){

        
            
            if(status == 'success') {
                console.log(url);
                
                
                $('#oldContainer').html('');
                // Обрезаем всякий хлам
				var html = data.split('<div class="shadow shadow-restyle">');
				//html = html[1].split('<!-- shadow block -->');
				html = html[0];
				html = html.replace(/\/images\/film_big/g, "http://www.kinopoisk.ru/images/film_big");
				html = html.replace(/\/.\/images/g, "http://www.kinopoisk.ru/images/");
				html = html.replace(/<script/g, '<span class="script"');
				html = html.replace(/script>/g, 'span>');
				html = html.replace(/&nbsp;/g, ' ');
                $('#oldContainer').html(html);

                // Вытаскиваем название фильма
                 //film.title = $('#oldContainer #headerFilm .moviename-big').text();
                 film.title_en = $('#oldContainer #headerFilm span[itemprop=alternativeHeadline]').text().trim();
                 var tit = $('#oldContainer #headerFilm .moviename-big').text();
                 console.log(tit);
                 
                 if(tit.indexOf('(')){
                 	tit = tit.split('(');
					tit = tit[0];
					film.title = tit;
                 	
                 }else{
                 	film.title = $('#oldContainer #headerFilm .moviename-big').text();
                 }


                
	

                film.img = $('#wrap .popupBigImage img').attr('src');

                // Получаем картинку 
				if( typeof $('#oldContainer #photoBlock .film-img-box img').attr('src') != 'undefined'){
					var img = $('#photoBlock .film-img-box img').attr('src');
					
					film.img = img;


				}


				// Получаем большую картину 
				if( typeof $('#oldContainer #photoBlock .film-img-box .popupBigImage').attr('onclick') != 'undefined'){
					var imgBig = $('#oldContainer #photoBlock .film-img-box .popupBigImage').attr('onclick');
					imgBig = imgBig.split("openImgPopup('");
					imgBig = imgBig[1].split("')");
					if(imgBig.indexOf(',; return false') >= 0)
						imgBig = imgBig.split(',; return false'); imgBig = imgBig[0]
					var imgBigDownload = imgBig;
				
					
					film.img_big = imgBig;

					
				}

				film.trailer = $('#oldContainer iframe').attr('src');

                

                // Получаем описание фильма
                if( typeof $('#oldContainer #block_left_padtop ._reachbanner_ .brand_words').text() != 'undefined')
                    film.text = $('#block_left_padtop ._reachbanner_ .brand_words').text();

                if(film.text.length < 1)
                    film.text = 'Описание пока что отсутствует';

                // Получаем рейтинг кинопоиск
                if( typeof $('#oldContainer #block_rating .rating_ball').text() != 'undefined')
                    film.rating_kinopoisk = $('#block_rating .rating_ball').text().trim();
                
                // Получаем рейтинг IMDB
                if( typeof $('#oldContainer #block_rating .block_2 div:eq( 1 )').text() != 'undefined' && $('#oldContainer #block_rating .block_2 div:eq( 1 )').text().indexOf('IMDb') >= 0){
                    var rating_IMDB = $('#oldContainer #block_rating .block_2 div:eq( 1 )').text();
                    rating_IMDB = rating_IMDB.split("IMDb:");
                    rating_IMDB = rating_IMDB[1].split("(")
                    rating_IMDB = rating_IMDB[0].trim();

                    film.rating_IMDB = rating_IMDB;
                }
                var arr = [];
                // Получаем факты 
                if( typeof $('#oldContainer .trivsFactBlooper .trivia_slide .trivia').text() !=  'undefined' && $('#oldContainer .trivsFactBlooper .trivia_slide .trivia').text() != ''){
                    //film.properties.facts = [];
                    $('#oldContainer .trivsFactBlooper .trivia_slide .trivia').each(function(index) {
                        if(index < 30){
                            var textFact = $(this).find('.trivia_text').text();
                            if(textFact.indexOf('\n') >= 0)
                                textFact = textFact.replace(/\n/g, ' ');

                            arr.push(textFact);
                           
                            film.properties.facts = arr;
                            //film.properties.facts.push(textFact.trim());
                            //console.log(arr);

                        }
                    });
                }

                // Получаем количество наград 
                if( typeof $('#oldContainer #btn_award span.num').text() != 'undefined' && $('#oldContainer #btn_award span.num').text() != '')
                    film.properties.awards = $('#btn_award span.num').text();


                // Получаем свойства из таблицы в центре
                if( typeof $('#oldContainer #infoTable .info').text() !=  'undefined' && $('#oldContainer #infoTable .info').text() != ''){

                    $('#oldContainer #infoTable .info tr').each(function(index) {

                        var nameTr = $( this ).find('td').first().text().trim();
                        var trEl = $( this ).find('td:eq( 1 )');
                        var trValue = trEl.text().trim();
                        var trValueHtml = trEl.html();
                        //console.log(nameTr);
                        
                        switch (nameTr) {

                            case 'слоган': 
                                if(trValue != '-')
                                    film.properties.tagline = trValue;
                                else 
                                    film.properties.tagline = '';
                                break

                            case 'возраст': 
                                film.properties.age_restrictions = trValue;
                                break

                            case 'рейтинг MPAA': 
                                film.properties.MPAA_rating = trValue;
                                break

                            case 'время': 
                                film.properties.time = trValue;
                                break

                            case 'бюджет':  
                                film.properties.budget = trValue;
                                break
                            
                            case 'сборы в США': 
                                film.properties.charges_US = trValue;
                                if(trValue.indexOf('\n') >= 0){
                                    trValue = trValue.split('\n'); trValue = trValue[0];  film.properties.charges_US = trValue;
                                }
                                break
                            case 'сборы в мире': 
                                film.properties.fees_world = trValue;
                                if(trValue.indexOf('\n') >= 0){
                                    trValue = trValue.split('\n'); trValue = trValue[0];  film.properties.fees_world = trValue;
                                }
                                break
                            case 'зрители': 
                                film.properties.audience = trValue;
                                if(trEl.find('img').length > 1) {

                                    film.properties.audience = '';
                                    var fortrValue = trValue.split(',');

                                    trEl.find('img').each(function(index){
                                        film.properties.audience += $(this).attr('title') +': '+ fortrValue[index];

                                        if(index != fortrValue.length - 1)
                                            film.properties.audience += ', '
                                    })

                                } else {
                                    film.properties.audience = '';
                                    film.properties.audience = trEl.find('img').attr('title') +': '+ trValue;
                                }
                                break
                            case 'премьера (мир)': 
                                if(trValue.indexOf('...') >= 0)
                                    trValue =  trValue.replace(/\.\.\./g, '').trim();
                                
                                if(trValue[trValue.length-1] == ',')
                                    trValue = trValue.slice(0, -1); 
                                
                                film.properties.premiere_world = trValue.trim();
                                break
                            case 'премьера (РФ)': 
                                if(trValue.indexOf(',') >= 0){
                                    var trValueSplit = trValue.split(','); 
                                    trValue = trValueSplit[0]; 
                                }

                                if(trValue.indexOf('\n') >= 0){
                                    var trValueSplit = trValue.split('\n'); 
                                    trValue = trValueSplit[0]; 
                                }

                                film.properties.premiere_RF = trValue.trim();
                                break
                            case 'релиз на DVD': 
                                if(trValue.indexOf(',') >= 0)
                                    trValue = trValue.split(','); trValue = trValue[0];
                                
                                film.properties.release_on_DVD = trValue;
                                break
                            case 'релиз на Blu-Ray':                    
                                if(trValue.indexOf(',') >= 0)
                                    trValue = trValue.split(','); trValue = trValue[0];

                                film.properties.release_on_Blu_Ray = trValue;
                                break



                            case 'страна': 
                                if(trValue.indexOf(',') >= 0){
                                    
                                    film.properties.country = trValue;
                                }else{
                                    film.properties.country = trValue;
                                }
                                break


                            case 'жанр': 
                                if(trValue.indexOf(',') >= 0){
                                    //console.log(trValue);
                                    if(trValue.split('...')){
                                    var arr = trValue.split('...');
                                    
                                    film.properties.genre = arr[0];
                                    }else{
                                        film.properties.genre = trValue;
                                    }
                                }else{
                                    film.properties.genre = trValue;
                                    
                                    
                                }
                                break

                            case 'год': 
                                if(trValue.indexOf(' ') >= 0){
                                    if(trValue.split('(')){
                                        var arr = trValue.split('(');
                                        film.properties.year = arr[0].trim();
                                        film.properties.sesoan = arr[1].split(')')[0];
                                    }else{
                                        film.properties.year = trValue;
                                    }
                                }else{
                                    film.properties.year = trValue;
                                }
                                
                                
                                break


                            default:
                                nameTr = '';
                                break
                        }
                    });
                }

                resolve(film);
                console.log(film);
            } else 
                reject('Error load film');

        }).fail(function(error) {
                reject("error");
        });

        
    });
}

















// Загружаем Монтажников
LoadFilmClass.prototype.loadCastNewSite = function (kinopoisk_id,dt) {
    //var kinopoisk_id = "464963";
    var film = this.film;
    
    return new Promise(function(resolve, reject) {

        film.persons.director = [];         // Режиссёр
        film.persons.actors = [];           // Актёр
        film.persons.producer = [];         // Продюсер
        film.persons.screenplay = [];       // Сценарист
        film.persons.operator = [];         // Оператор
        film.persons.composer = [];         // Композитор
        film.persons.artist = [];           // Художник
        film.persons.installation = [];     // Монтажёр
        $('#film-actor').html("");

        var url = "http://plus.kinopoisk.ru/film/"+kinopoisk_id+"/details/cast/?nocookiesupport=yes";
        var lab = [];
        $.get(url, function(data, status){
         

                $('#film-actor')[0].innerHTML = data;
                
               if(status == 'success') {
               			var img = $('#film-actor .image__img')[0].src;

                        $('.button_movie-tag').each(function(e){
                            //var lable = $(this).find('.button_movie-tag .button__label').text();
                            //film.lable.push(lable.trim());
                            var text = $(this).find(' .button__label').text();
                            film.categories.push(text.trim());
                            
							//film.categories.join(',');

                            
                        });

                        film.img_big_plus = img;
                        
                        //film.text = $('.kinoisland_movie-description .kinoisland__content').text();
               			



                        
               			
                        $('#film-actor .kinoisland.popup__content-section').each(function(k,v){
                          
                            var title = $(this).find('.kinoisland__title').text().trim();
                            if(title == "") title = $(this).find('.actors-table__title_type_actors').text().trim();

                            var persons = [];
                            
                            $(this).find('.person').each(function(key,val){
                                var person = {};
                               person.img = $(this).find('.person__photo .person__photo-image').attr('src');

                               tit = $(this).find('.person__photo').attr('href').split('/');
                                tit = tit[2];
                                person.id = tit;

                                person.id_kp = kinopoisk_id;
                                
                               person.name = $(this).find('.person__info .person__info-name-wrap .person__info-name').text();
                               person.name_eng = $(this).find('.person__info .person__info-original-name').text();

                               persons.push(person);
                            });

                           
                            title.trim();
                            //console.log(title);

                            


                           // Режиссёр
                            if(title.indexOf("Режиссёр") > -1)
                                film.persons.director = persons;
                                
                            // Актёр
                            else if(title.indexOf("Актёр") > -1)
                                film.persons.actors = persons;
                                
                            // Продюсер
                            else if(title.indexOf("Продюсер") > -1)
                                film.persons.producer = persons;

                            // Сценарист
                            else if(title.indexOf("Сценарист") > -1)
                                film.persons.screenplay = persons;

                            // Оператор
                            else if(title.indexOf("Оператор") > -1)
                                film.persons.operator = persons;

                            // Композитор
                            else if(title.indexOf("Композитор") > -1)
                                film.persons.composer = persons;

                            // Художник
                            else if(title.indexOf("Художник") > -1)
                                film.persons.artist = persons;

                            // Монтажёр
                            else if(title.indexOf("Монтажёр") > -1)
                                film.persons.installation = persons;



                            // А так же
                            else if(title.indexOf("А также") > -1)
                                film.persons.other = persons;


                           
                          
                        });
                        
                        
                                
						
						resolve(film);
					   
						
                        $('#container').empty();
                        $("#oldContainer").empty();
                        $('#film-actor').empty();
					}else{
              
						reject(film);
				}
                            
    });
});
}










    //SEND FORM CYCLE
     var form = $('form[name="sCycle"]')[0];

addHandler(form, "submit", function(e){
        var id;
        var id_all_end;
        var timer = 0;
        var big='';

        
        function ob(){



		            if(id > id_all_end){
		                clearTimeout(timer);
		                return;
		            }
            		id++;
                    console.log(id);



            
             var getData = new LoadFilmClass();

             $.post(
                      "/get/kp",
                      {
                        add: id
                      },
                      onAjaxSuccess
                    );
                    function onAjaxSuccess(kinopoisk_id)
                    {
                        getData.loadFilm(kinopoisk_id).then(
              
                        data => getData.loadCastNewSite(kinopoisk_id,data).then(
                                            function(data){
                                                data = JSON.stringify(data);
                                                console.log(typeof data);
                                                $.post(
                                                      "/ajax/plus",
                                                      {
                                                        id_kp: kinopoisk_id,
                                                        add: data
                                                      },
                                                      onAjaxSuccess
                                                    );
                                                    function onAjaxSuccess(data)
                                                    {
                                                        var respon = JSON.parse(data);
                                                        console.log(respon);
                                                        console.log("yo yo");
                                                    }
                                                
                                            }
                                            ,
                                            statusText => alert(statusText)
                            )



                    ).catch(
                error=>console.log(error)
                );
                    }

			
			


		}
       		

            console.log("внешняя"+big);
            id = $(this).find('input[name="id"]')[0].value;//начальный ID
            console.log(id);
            if(id==""){
                alert("введите id");
            }
            
            id_all_end = 200; //конечный ID
            timer = setInterval(ob, 7000);
            e.preventDefault();  
    });











    //SEND FORM
    var form = $('form[name="sform"]')[0];

    addHandler(form, "submit", function(e){
       
            console.log($(this).find('input[name="id_kp"]')[0].value/*attr('value')*/);
            
             var getData = new LoadFilmClass();

             var kinopoisk_id = $(this).find('input[name="id_kp"]')[0].value;

            getData.loadFilm(kinopoisk_id).then(
              
                        data => getData.loadCastNewSite(kinopoisk_id,data).then(
                                            function(data){
                                                data = JSON.stringify(data);
                                                console.log(typeof data);
                                                $.post(
                                                      "/ajax/plus",
                                                      {
                                                        id_kp: kinopoisk_id,
                                                        add: data
                                                      },
                                                      onAjaxSuccess
                                                    );
                                                    function onAjaxSuccess(data)
                                                    {
                                                        var respon = JSON.parse(data);
                                                        console.log(respon);
                                                        console.log("yo yo");
                                                    }
                                                
                                            }
                                            ,
                                            statusText => alert(statusText)
                            )
                    ).catch(
                error=>console.log(error)
                );
       
          e.preventDefault();  
    });



    //добавляет фильм в БД
    var addform = $('form[name="addmyfilms"]')[0];
    
    addHandler(addform,"submit",function(e){
        
        var kinopoisk_id = $(this).find('input[name="add_films"]')[0].value;
        $.post(
              "/admin/addfilm",
              {
                id_kp: kinopoisk_id,
               
              },
              onAjaxSuccess
            );
            function onAjaxSuccess(data)
            {
                var respon = JSON.parse(data);
                console.log(respon);
                 $("#addInfo").prepend('<p style="color:red;">Добавлен фильм '+respon.name_ru+'<p>');
            }
        e.preventDefault();
    });


    //добавляет фильм в БД
    var addform = $('form[name="unic"]')[0];
    
    addHandler(addform,"submit",function(e){
        
        
        $.post(
              "/ajax/unic",
              {
                unic: 1,
               
              },
              onAjaxSuccess
            );
            function onAjaxSuccess(data)
            {
                var respon = JSON.parse(data);
                console.log(respon);
                 $("#addInfo").prepend('<p style="color:red;">Добавлен фильм '+respon.name_ru+'<p>');
            }
        e.preventDefault();
    });


















</script>