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
function getXmlLoad(getPost,e,urlval,xml,func){
                    
                
                    xml.onreadystatechange = function() {


                        if (this.status == 200 && this.readyState == 4) {
                             func(xml);         
                        } else {
                          console.log("error " + this.status);
                          
                        }



                    }
                    
                    xml.open(getPost, urlval, true);
                    xml.send(e);
                    
                
            }




function searchd(){
    
    var  sites=location.host, url = 'http://'+sites+'/search/ajax';
    var inPut = $(".sendSearch")[0];


    addHandler(inPut,"keyup",function(){
       if(inPut.value.length > 2){

          var val = inPut.value;
           var xml = getXmlHttpRequest();
         
            var formData = new FormData ();
            formData.append('search', val);

            var l=val.length;

            if(l>2){
               if(inPut.value !== ""){


                  getXmlLoad("POST",formData,url,xml,function(xml){
                                   var y = JSON.parse(xml.responseText);
                                   var text = '';
                                   
                                  for (var i = 0; i < y.length; i++) {
                                        text += '<div><img style="height:50px;" src="'+y[i].poster+'"><a href="/movie/'+y[i].id+'">'+y[i].name+'</a></div>';
                                    }

                                  $('#add_result')[0].innerHTML = text;
                                            
                  });
               }
             }      
          
       }
   });
   
   
   
}


function addTopFilms(resp){
  var genre = resp.genre;

  var arr = genre.split(',');

  addFilm = '<li class="film-toggle">'+
                                     '<div class="movie-item">'+
                                        '<div class="film-info-slide" style="z-index: 4; width: 0px; left: 0px; right: auto; box-shadow: 2px 0px 8px 0px rgba(0, 0, 0, 0);">'+
                                        '<div class="film-about-txt">'+
                                              '<span>'+
                                              resp.description+
                                              '</span>'+
                                           '</div>'+
                                           '<div class="clearfix film-about-param">'+
                                              '<div class="user-score-c">'+
                                                 '<span class="d-gray-f">'+
                                                 '<span class="ratingbal">0</span>'+
                                                 '<button class="mdl-button mdl-js-button mdl-button--icon updateRating">'+
                                                 '<i class="material-icons ">favorite</i>'+
                                                 '</button>'+
                                                 '</span>'+
                                                 '<span class="d-gray-f">'+
                                                 '<button class="mdl-button mdl-js-button mdl-button--icon updateCollection">'+
                                                 '<i class="material-icons ">bookmark</i>'+
                                                 '</button>'+
                                                 '</span>'+
                                                 '<span class="d-gray-f">'+
                                                 '<button class="mdl-button mdl-js-button mdl-button--icon updateLookLater">'+
                                                 '<i class="material-icons ">access_time</i>'+
                                                 '</button>'+          
                                                 '</span>'+
                                              '</div>'+
                                              '<div class="crititc-score-c f-left">'+
                                                 '<div>'+
                                                    '<span>'+resp.rating_kp+'</span> КиноПоиск'+
                                                 '</div>'+
                                                 '<div>'+
                                                    '<span>'+resp.rating_imdb+'</span> IMDB'+
                                                 '</div>'+
                                              '</div>'+
                                           '</div>'+
                                        '</div>'+
                                        '<a href="/movie/'+resp.id_kp+'" class="film-img-link film-img-background film-img" style="background-image: url('+resp.poster_film_small+'); z-index: 4; box-shadow: 0px 0px 8px 0px rgba(0, 0, 0, 0); transform: scale(1);"></a>'+
                                     '</div>'+
                                     '<div class="film-content">'+
                                        '<p class="film-title">'+
                                           '<a class="film-_title-link" href="/movie/'+resp.id_kp+'">'+
                                           resp.name_ru+
                                           '</a>'+
                                        '</p>'+
                                        '<p class="film-info">'+
                                           '<span class="film-content-year">'+resp.year+'</span> '+
                                           '<span class="film-content-genre">'+arr[0]+'</span> '+
                                           '<span class="film-content-country">'+resp.country+'</span> '+
                                        '</p>'+
                                     '</div>'+
                                  '</li>';
                                  //console.log(addFilm);
                                  
                                  $('.movie-block-items')[0].insertAdjacentHTML("afterBegin",addFilm);//;innerHTML += addFilm;


}

var  url = '/post/films';

addHandler($('#all_new')[0],"click",function(){
  
   var addFilm;
   $('.movie-block-items')[0].innerHTML = '';
   var xml = getXmlHttpRequest();
   var formData = new FormData ();
   formData.append('post', 1);
  getXmlLoad("POST",formData,url,xml,function(xml){
                var y = JSON.parse(xml.responseText);   
                
                for(var key in y){
                  console.log(y[key]);
                   addTopFilms(y[key])
                                   
                }
               
  });
});
addHandler($('#top_film')[0],"click",function(){
  var addFilm;
  $('.movie-block-items')[0].innerHTML = '';
  var xml = getXmlHttpRequest();
  var formData = new FormData ();
  formData.append('post', 2);
  getXmlLoad("POST",formData,url,xml,function(xml){
                 var y = JSON.parse(xml.responseText);   
                
                for(var key in y){
                  console.log(y[key]);
                   addTopFilms(y[key])
                                   
                }           
  });
});
addHandler($('#top_serial')[0],"click",function(){
  var addFilm;
  $('.movie-block-items')[0].innerHTML = '';
  var xml = getXmlHttpRequest();
  var formData = new FormData ();
  formData.append('post', 3);
  getXmlLoad("POST",formData,url,xml,function(xml){
                  var y = JSON.parse(xml.responseText);   
                
                for(var key in y){
                  console.log(y[key]);
                   addTopFilms(y[key])
                                   
                }                              
    });
});
addHandler($('#top_mult')[0],"click",function(){
  var addFilm;
  $('.movie-block-items')[0].innerHTML = '';
  var xml = getXmlHttpRequest();
  var formData = new FormData ();
  formData.append('post', 4);
  getXmlLoad("POST",formData,url,xml,function(xml){
                    var y = JSON.parse(xml.responseText);   
                
                for(var key in y){
                  console.log(y[key]);
                   addTopFilms(y[key])
                                   
                }
                              
    });
});