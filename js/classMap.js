class map {
	
	constructor(){
		this.urlAjax = "/tests/testAjax.php";
		this.afficheMap();
	}

	afficheMap(){

		var map = L.map('map');

		L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			maxZoom: 18,
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
				'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/streets-v11',
			tileSize: 512,
			zoomOffset: -1
		}).addTo(map);

		window.localStorage.setItem("coucou" , 123456)
		console.log(window.localStorage.getItem("coucou"))

		map.on('locationfound', (e)=>{
			this.onLocationFound(e , map)
		});
		map.on('locationerror', this.onLocationError);
		map.on('locationfound' , (e)=>{
			this.ajax(e,map);
		})

		map.locate({setView: true, maxZoom: 40});

	}

	onLocationFound(e , map) {
		var radius = e.accuracy / 5;

		L.marker(e.latlng).addTo(map)
			.bindPopup("You are within " + radius + " meters from this point").openPopup();

		L.circle(e.latlng, radius).addTo(map);
	}

	addMarquer(map , lat , lng){
		L.marker([lat, lng]).addTo(map)
			.bindPopup("Marker en pluas " );
	}

	 onLocationError(e) {
		alert(e.message);
	}

	ajax(e , map){

		let form = {
			lat : e.latlng.lat,
			lng : e.latlng.lng,
		}

		$.post(this.urlAjax , form , (data)=>{
			console.log(data);
			this.addMarquer(map , data.lat , data.lng)
		},"json")
	}
}