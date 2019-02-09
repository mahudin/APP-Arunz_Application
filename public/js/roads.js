
$(document).ready(function(){

	var x=new google.maps.LatLng(52.395715,4.888916);
	var stavanger=new google.maps.LatLng(50.0748035,19.9236513);
	var amsterdam=new google.maps.LatLng(52.395715,4.888916);
	var london=new google.maps.LatLng(51.508742,-0.120850);

	function initialize() {
  		var mapProp = {
    			center:new google.maps.LatLng(51.508742,-0.120850),
    			zoom:5,
    			mapTypeId:google.maps.MapTypeId.ROADMAP
  		};
  		var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
		var myTrip=[stavanger,amsterdam,london];
		var flightPath=new google.maps.Polyline({
  			path:myTrip,
  			strokeColor:"#0000FF",
  			strokeOpacity:0.8,
  			strokeWeight:2
  		});
		flightPath.setMap(map);
	}

	google.maps.event.addDomListener(window, 'load', initialize);
});