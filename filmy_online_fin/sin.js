

var indexFilmMoon = localStorage.indexFilmMoon ? localStorage.indexFilmMoon : 0;
indexFilmMoon = parseInt(indexFilmMoon);
var filmsError = [];
var arrayFilms = [];
var disabledDow = false;
var property_id = 0;

$(function(){
	$('#indexFilmMoon').val(indexFilmMoon);
	
})




// ArrayFilmsS - сериалы
// ArrayFilmsM - фильмы
// var arrayFilms = ArrayFilmsS;
// var arrayFilms = ArrayFilmsM;


// Загружаем массив фильмов или сериалов с сайта http://moonwalk.co/
var loadArrayFilms = function(url, idProperty) {

	$('.loader').removeClass('hide');
	filmsError = [];
	arrayFilms = [];
	disabledDow = false;
	property_id = idProperty;
	
	$('#load-status-parse-load-array').html('');

	//if(type == 'films') {
	var request = $.ajax({
		url: url,
		method: "GET",
		dataType: "json",
		cache: false,
		headers: { 
				'X-Api-Key': xapikay,
				'Authorization' : user.apiKey
			}
	});
	request.done(function( data ) {
		console.log(data.length);
		//console.log(data)
		arrayFilms = data;
		disabledDow = true;
		$('.loader').addClass('hide');
		$('.getFilmByKpIdStart').attr('disabled', false);

		$('#load-status-parse-load-array').html("Загружен массив с URL: " + url + "<br/> Количество фильмов: " + data.length + "<br/> ID свойства: " + property_id);
	});
	request.fail(function( jqXHR, textStatus ) {
		alert('Не могу загрузить массив фильмов');
		$('.loader').addClass('hide');
	});
}


var stopGetFilmByKpIdStart = function(param) {
	param = param || false;
	disabledDow = param;
}



var getFilmByKpIdStart = function(index){
	index = parseInt(index);
	localStorage.indexFilmMoon = index;
	indexFilmMoon = index;
	
	if(arrayFilms.length > index && disabledDow == true)
		getFilmByKpId(arrayFilms[index]);

	else if(disabledDow != true)
		alert('Загрузите массив фильмов')
	else
		alert('Нету больше фильмов в массиве')
}

var getFilmByKpId = function (array, loadGalleryForFilm) {
	
		loadGalleryForFilm = loadGalleryForFilm || false;

		$('.text-status-gal').text('Запрашиваем фильм');
		$('.loader').removeClass('hide');
		var request = $.ajax({
			url: "/api/filmByKpId/"+array.kinopoisk_id,
			method: "GET",
			dataType: "json",
			cache: false,
			headers: { 
				'X-Api-Key': xapikay,
				'Authorization' : user.apiKey
			}
		});
		request.done(function( data ) {
			$('.loader').addClass('hide');
			if(data.error == false) {
				
				if(loadGalleryForFilm){

					// Загружаем галерею для фильма
					loadGalleryFilm(array.kinopoisk_id, data.film.id).then(function(res){
						showMessage({
							'message' : res,
							'type' : 'message'
						})
						addedPropertyMoon(data.film.id, array);
					
					}, function(err){
						// Добавили в массив битых фильмов
						$('.loader').addClass('hide');
						filmsError.push(array.kinopoisk_id);
						alert("Ошибка при загружке галереи: "+err);
					})

					
				} else {
					addedPropertyMoon(data.film.id, array);
				}
				
			
			} else {
				filmsError.push(array.kinopoisk_id);
				// И снова на проверку фильма
				indexFilmMoon = parseInt(indexFilmMoon) + 1;
				if(indexFilmMoon < arrayFilms.length) {
					localStorage.indexFilmMoon = indexFilmMoon;
					$('#indexFilmMoon').val(indexFilmMoon);
					getFilmByKpId(arrayFilms[indexFilmMoon]);
				} else {
					alert('Все как вроде')
					console.log(JSON.stringify(filmsError));
				}

				showMessage({
					'message' : 'Фильма нет, добавлен в массив',
					'type' : 'error'
				})
			}
		});
		request.fail(function( jqXHR, textStatus ) {
			$('.loader').addClass('hide');

			showMessage({
				'message' : 'Фильма нет, отправляем на его загрузку',
				'type' : 'error'
			})

			// И снова на проверку фильма
			if(indexFilmMoon < arrayFilms.length) {
				localStorage.indexFilmMoon = indexFilmMoon;
				$('#indexFilmMoon').val(indexFilmMoon);

				if(array.kinopoisk_id != 0 && typeof array.kinopoisk_id != "undefined"){
					loadFilmNew(array.kinopoisk_id).then(function(){
						// Если фильм загружен, то перезапускаем функцию
						getFilmByKpId(array, true);
					}, function(error){
						// Добавили в массив битых фильмов
						$('.loader').addClass('hide');
						filmsError.push(array.kinopoisk_id);
						alert('Какая то ошибка при загрузке фильма')
					});
				} else {
					// Условие если кривой ID кинопоиска
					indexFilmMoon = parseInt(indexFilmMoon) + 1;
					localStorage.indexFilmMoon = indexFilmMoon;
					$('#indexFilmMoon').val(indexFilmMoon);
					getFilmByKpId(arrayFilms[indexFilmMoon]);
					
				}
				
			} else {
				alert('Все как вроде')
			}
		});

	

}






var addedPropertyMoon = function(film_id, array){
	$('.text-status-gal').html( $('.text-status-gal').text() + '<br/> Обновляем фильм в БД');

	var film = {
		'property_id': property_id,
		'text': array.iframe_url
	}

	console.log(film);

	if(!buttonBusy) {
		buttonBusy = true;
		$('.loader').removeClass('hide');
		var request = $.ajax({
			url: "/api/films/"+film_id+"/property",
			method: "POST",
			data: film,
			dataType: "json",
			cache: false,
			headers: { 
				'X-Api-Key': xapikay,
				'Authorization' : user.apiKey
			}
		});
		request.done(function( data ) {

			console.log(data);

			$('.loader').addClass('hide');
			if(data.error != true) {
				buttonBusy = false;
				showMessage({
					'message' : data.message
				})


				if(disabledDow == true) {
					// И снова на проверку фильма
					indexFilmMoon = parseInt(indexFilmMoon) + 1;
					if(indexFilmMoon < arrayFilms.length) {
						localStorage.indexFilmMoon = indexFilmMoon;
						$('#indexFilmMoon').val(indexFilmMoon);
						getFilmByKpId(arrayFilms[indexFilmMoon]);
					} else {
						alert('Все как вроде')
						console.log(JSON.stringify(filmsError));
					}
				} else {
					showMessage({
						'message' : 'Остановили',
						'type' : 'message'
					})
				}

			} else {
				buttonBusy = false;
				showMessage({
					'message' : data.message,
					'type' : 'error'
				})
			}
		});
		request.fail(function( jqXHR, textStatus ) {

			console.log(jqXHR);
			console.log(textStatus);

			$('.loader').addClass('hide');
			var message = textStatus
			if(jqXHR.responseText.length < 300) {
				var responseText = JSON.parse(jqXHR.responseText);
				if(typeof responseText.message != "undefined") 
					message = responseText.message;
			}
			
			showMessage({
				'message' : message,
				'type' : 'error'
			})
			buttonBusy = false;
		});			
	}	
}





/* ----------------- Для синонимайзера ---------------- */
// /api/filmDate/:film_id

var getSynonym = function(index){
	index =  parseInt(index) || 0;
	localStorage.indexFilmMoon = index;
	$('#indexFilmMoon').val(index);

	if(typeof arrayFilms[index] != "undefined" && arrayFilms[index].story && arrayFilms[index].story.trim() != "" && disabledDow){
		$('.loader').removeClass('hide');

		$('.text-status-gal').text('Запрашиваем фильм');
		//$('.loader').removeClass('hide');
		
		var requestFilm = $.ajax({
			url: "/api/filmByKpId/"+parseInt(arrayFilms[index].kinopoisk_id),
			method: "GET",
			dataType: "json",
			cache: false,
			headers: { 
				'X-Api-Key': xapikay,
				'Authorization' : user.apiKey
			}
		});
		requestFilm.done(function( dataFilm ) {

			if(dataFilm.error == false) {
				// ----------
				var request = $.ajax({
					url: '/api/synonym?word='+arrayFilms[index].story,
					method: "GET",
					dataType: "json",
					cache: false,
					headers: {
							'X-Api-Key': xapikay,
							'Authorization' : user.apiKey
						}
				});
				request.done(function( data ) {
					console.log(data);
					$('.loader').addClass('hide');
					if(data.error == false){

						var updateText = data.text;
						addedPropertySynonym(dataFilm.film.id, updateText, index);
					
					} else {
						alert(" !- ERROR synonym -! ");
					}
						
				});
				request.fail(function( jqXHR, textStatus ) {
					$('.loader').addClass('hide');
					alert('Не могу получить синонимы');
				});
				// ----------
			}
			
		});
		requestFilm.fail(function( jqXHR, textStatus ) {
			console.log("Фильма нет КиноПоиск ID: " + arrayFilms[index].kinopoisk_id);
			$('.loader').addClass('hide');
			getSynonym(index + 1);
		});
			
	} else if (typeof arrayFilms[index + 1] != "undefined" && disabledDow){
		getSynonym(index + 1);
	} else {
		alert("Вроде как все!");
	}
}


var addedPropertySynonym = function(film_id, text, index){
	index =  parseInt(index) || 0;
	$('.text-status-gal').html( $('.text-status-gal').text() + '<br/> Обновляем фильм в БД');

	var film = {
		'property_id': property_id,
		'text': text
	}

	//console.log(film);

	if(!buttonBusy) {
		buttonBusy = true;
		$('.loader').removeClass('hide');
		var request = $.ajax({
			url: "/api/films/"+film_id+"/property",
			method: "POST",
			data: film,
			dataType: "json",
			cache: false,
			headers: { 
				'X-Api-Key': xapikay,
				'Authorization' : user.apiKey
			}
		});
		request.done(function( data ) {
			console.log(film_id)
			console.log(data);
			$('.loader').addClass('hide');	
			buttonBusy = false;

			// Обновляем дату фильма и отправляем скрипт на следующий
			updateDateFilm(film_id);
			setTimeout(function(){
				getSynonym(index + 1);
			}, 3500);
			
		});
		request.fail(function( jqXHR, textStatus ) {

			console.log(jqXHR);
			console.log(textStatus);

			$('.loader').addClass('hide');
			var message = textStatus
			showMessage({
				'message' : message,
				'type' : 'error'
			})
			buttonBusy = false;
		});			
	}	
}


/* ----------------- END Для синонимайзера ---------------- */




