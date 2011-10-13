var map;
var markersArray = [];

$(document).ready(function() {

	// Fancybox	
	$("#openGmaps").fancybox({
		onComplete	:	function() {
			google.maps.event.trigger(map, "resize");
		},	
		'titlePosition'		: 'over',
		'transitionIn'		: 'linear',
		'transitionOut'		: 'swing',
		'href': '#gmaps'
	});
	
	// close fancybox
	$(".save").click(function(){
		console.log(markersArray);
		$.fancybox.close();
		return false;		
	})
	
	// remove all markers
	$(".delete").click(function(){
		deleteOverlays();
		console.log("DELTED");
	});	  
	
	// load Google Maps
	initializeMaps();
	
	// add listener to buttons
	$(".button").click(function(){
		$(".button").removeClass("active");
		$(this).addClass("active");
	});
});


function initializeMaps() {
	var orangeScene = new google.maps.LatLng(55.6248, 12.068);
	var myOptions = {
		zoom: 16,
		center: orangeScene,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	
	// add stored markers
	// dummy variable - should come from database
	var markers = [
		{"coordinates":[55.6220, 12.0800],
		"type":"red"},
		{"coordinates":[55.6320, 12.0800],
		"type":"red"},
		{"coordinates":[55.6220, 12.0900],
		"type":"blue"}];	
	storedMarkers(markers);

	// add roskilde image overlay	
	var imageBounds = new google.maps.LatLngBounds(
		new google.maps.LatLng(55.6179, 12.0698), // bund, venstre
		new google.maps.LatLng(55.6249, 12.0935)  // top, højre
	);		
	var roskildeMap = new google.maps.GroundOverlay("/img/gmaps/turkey.svg",imageBounds);
	roskildeMap.setMap(map);			

	// add click listener
	google.maps.event.addListener(roskildeMap, 'click', function(event) {
		
		var currentMarkerType = $(".button.active").attr("id");				
		addMarker(event.latLng, currentMarkerType);		
	});    			
}

  
// add marker
function addMarker(location, markerType) {

	// determine type
	if(markerType == "blue"){
		var icon = '/img/gmaps/blue-dot.png';
		var title = "I'm blue dabendidabendar";
	}else{
		var icon = '/img/gmaps/red-dot.png';
		var title = "Reddish!";
	}
	
	// add marker to map
	marker = new google.maps.Marker({
		draggable:true,
		position: location,
		title: title,    
		map: map,
		icon: icon
	    
	});
	
	// add marker to array
	markersArray.push(marker);
  
}

function storedMarkers(markers){	
	$.each(markers, function(key, marker) {
		var position = new google.maps.LatLng(marker["coordinates"][0], marker["coordinates"][1]);
		addMarker(position, marker["type"]);
	});
}

// Deletes all markers in the array by removing references to them
function deleteOverlays() {
	if (markersArray) {
		for (i in markersArray) {
			markersArray[i].setMap(null);
		}
		markersArray.length = 0;
	}
}  
