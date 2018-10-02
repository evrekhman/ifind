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



function plusInit(formData,url){
    
   
  var  sites=location.host, url = 'http://'+sites+'/zzz/parse';
    var xml = getXmlHttpRequest();

              getXmlLoad("POST",formData,url,xml,function(xml){
                console.log(xml.responseText);
                var y = JSON.parse(xml.responseText);

                //console.log(y);
                
                $('#contentPars')[0].append('<p style="color:black;">'+y.header.url+'</p>');
                
                 $z = y.id;
                                 $g = parseInt($z)+1;
                                 console.log($g);
                 if($g>0)
                 {
                                 var formData=new FormData();
                                 formData.append('add',$g);
                                 plusInit(formData,url);
                 }


              });
    
}



function parserKino(){
	var  sites=location.host, url = 'http://'+sites+'/zzz/parse';
	var form = document.forms.parskp;
	

	addHandler(form,"submit", function(e){
		
          var cc = $('#add_id')[0].value;
         console.log($('#add_id')[0].value);

		      var xml = getXmlHttpRequest();
          var formData = new FormData();
          formData.append("add",cc);
          getXmlLoad("POST",formData,url,xml,function(xml){
            
              plusInit(formData,url);
          });
        
		e.preventDefault();
	});

}