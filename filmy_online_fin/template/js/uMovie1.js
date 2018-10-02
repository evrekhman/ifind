

function sendPost55(url,formData){
            var xml = getXmlHttpRequest();
            console.log(url);
                xml.onload = xml.onerror = function() {
                    if(xml.status==200){
                      var y = JSON.parse(xml.responseText);
                      console.log(y);
                     
                                $(".addInfo4").prepend('<p style="color:black;">'+y.kp+'<p>');
                              
                               $(".addInfo4").prepend('<p style="color:black;">'+y.test+'<p>');
                               //$(".addInfo4").prepend('<p style="color:black;"><h1>'+y.innn+'</h1><p>');
                              
                                 $z = y.id;
                                 $g = parseInt($z)+1;
                                 var formData=new FormData();
                                 formData.append('add',$g);
                                 sendPost55(url,formData);
                      
                    }
                }
                xml.open("POST",url,true);
                xml.send(formData);
            
                
            
        }

function sendPost(url,formData){


            var xml = getXmlHttpRequest();

                xml.onload = xml.onerror = function() {
                    if(xml.status==200){
                       
                       var y = JSON.parse(xml.responseText);
                       console.log(y);
                       


                       
                       if(y.lol)
                        {
                        $(".addInfo").prepend('<p style="color:black;">'+y.lol+'<p>');
                            
                        }else  if(y.mov){
                            var b = y.mov.length;
                        }
                        else if(y.mov.serial){
                            var b = y.mov.length;
                        }
                        
                        
                        for (i = 0; i < b; i++) {
                            //console.log(y.mov);
                           $(".addInfo").prepend('<p style="color:red;">'+y.mov[i].title+'<p>');
                          
                        }
                        
                        
                        $(".addInfo").prepend('<p style="color:black;">Парсинг начался'+y.tst+'<p>');
                        
                        if(y.succ)
                        {
                        $(".addInfo").prepend('<p style="color:black;">'+y.succ+'<p>');
                        }
                        
                       
                        $g = parseInt(y.add)+1;
                        if($g>0)
                              {
                                formData.append('add',$g);
                                sendPost(url,formData);
                                

                              }
                        
                    }else{
                        console.log("error");
                    }
                }
                xml.open("POST",url,true);
                xml.send(formData);
            
                
            
        }

function sendPostUpdateIndiv(url,formData){
            var xml = getXmlHttpRequest();
            
                xml.onload = xml.onerror = function() {
                    if(xml.status==200){
                      var y = JSON.parse(xml.responseText);
                      console.log(y);
                     // console.log(y.id);
                      console.log(y.test);
                      
                     
                                $(".addInfo3").prepend('<p style="color:black;">'+y.kp+'<p>');
                              
                               $(".addInfo3").prepend('<p style="color:black;">'+y.test+'<p>');
                              
                                 $z = y.id;
                                 $g = parseInt($z)+1;
								 if($g>0)
								 {
                                 var formData=new FormData();
                                 formData.append('add',$g);
                                 sendPostUpdateIndiv(url,formData);
								 }
                    }
                }
                xml.open("POST",url,true);
                xml.send(formData);
            
                
            
        }

function sendPostCreatIndiv(url,formData){
            var xml = getXmlHttpRequest();
            
                xml.onload = xml.onerror = function() {
                    if(xml.status==200){
                       var y = JSON.parse(xml.responseText);
                       //console.log(y);
                        $(".addInfo2").prepend('<p style="color:red;"><h1>'+y.t1.kp+'</h1><p>');
                        $(".addInfo2").prepend('<p style="color:green;"><h1>'+y.t2.kp+'</h1><p>');
                    }else{
                        console.log('error');
                    }
                }
                xml.open("POST",url,true);
                xml.send(formData);
            
                
            
        }
//allJsonUrl.php - добаление все json - url с таблицы SELECT * FROM `url_Json_BD` .
var insetJson = $('.parsJson')[0];
addHandler(insetJson,"click", function(){
    
   
    var url = '/search/ajax/url/json';
    var formData = new FormData ();
    
        formData.append('add', 1);
        
        sendPost(url,formData);
});



//creatUnicFilms.php - создаёт из все дабвленных фильмом -  уникальные(типа из 50 тыс фильмов, создает 27 тыс уникальных)
var insetJson1 = $('.creatJson')[0];
addHandler(insetJson1,"click", function(){
    var url = '/search/ajax/url/unictable';
    var formData = new FormData ();
    formData.append('add', 1);
    
        sendPostCreatIndiv(url,formData);
});




//updateAllFilms.php - из большой таблиицы вытаскивает данные и переносит в таблицу уникальных фильмов добаляет iframe_url name_ru итд
var insetJson = $('.insertJson4')[0];
var vv = $('.vv')[0];
addHandler(insetJson,"click", function(){
    var sites=location.host,  url = '/search/ajax/url/unicfilms';
	console.log(sites);
    var formData = new FormData ();
    formData.append('add', vv.value);
    
        sendPost55(url,formData);
});






//upGetmovieCC.php - обнавляет в уникальную таблицу и таблицу с актерами и таблицу со скринами из Getmovie.сс
var insetJson = $('.insertJson')[0];
var vl = $('.vl')[0];
//vl.value = '';
addHandler(insetJson,"click", function(){
    var sites=location.host,  url = '/search/ajax/url/person';
    var formData = new FormData ();
	console.log(vl.value);
    formData.append('add', vl.value);
    
        sendPostUpdateIndiv(url,formData);
});



//addJson();//allJsonUrl.php - добаление все json - url с таблицы SELECT * FROM `url_Json_BD` .
//creatIndiv();//creatUnicFilms.php - создаёт из все дабвленных фильмом -  уникальные(типа из 50 тыс фильмов, создает 27 тыс уникальных)
//unicIndiv();//updateAllFilms.php - из большой таблиицы вытаскивает данные и переносит в таблицу уникальных фильмов добаляет iframe_url name_ru итд
//updateIndiv();//upGetmovieCC.php - обнавляет в уникальную таблицу и таблицу с актерами и таблицу со скринами из Getmovie.сс

   
