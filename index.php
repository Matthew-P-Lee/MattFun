<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0; font-family:Arial }
      #header { height: 10%; width:100%; border-bottom: solid 3px black; float: top; padding: 5px; background-color: #ccc}
      #map_canvas { height: 100%; width:80%; float: right }
      #sidebar { height: 100%; width:20%; float: left; border-right: solid 1px black;background-color: #eee;}
	  #city_list { margin: 2%; }
	  
	</style>
	<script type="text/javascript" src="http://vistaseeker.homelinux.org:8080/~matthew/jquery-ui/jquery-1.7.1.js"></script>          
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAEff45I4hswq9zaXT6eiAt8jkx9h-DMEY&sensor=false"></script>
    <script type="text/javascript">
	
	function initialize() {
	
		//grab some lat long data 
		$.getJSON("http://vistaseeker.homelinux.org:8080/~matthew/MattFun/LatLong.php",function(latLongJSON) {
			
			var myOptions = {
				zoom: 3,
				center: new google.maps.LatLng(0, 0),
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			
			var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

			for (var x  = 0; x < latLongJSON.length;x++)
			{
				if (latLongJSON[x].city.length > 0)
				{
					//append the list in the sidebar
					$("#city_list").append("<li>" + latLongJSON[x].city);
				
					var myLatlng = 
						new google.maps.LatLng(latLongJSON[x].latitude,latLongJSON[x].longitude);
				
					//drop a marker
					var marker = new google.maps.Marker({
						position: myLatlng,
						map: map,
						title:latLongJSON[x].city
					});
				}
			}
		});
	}
	  
    </script>
  </head>
  <body onload="initialize()">
    <div id="header" >Fun With Maps</div>
    <div id="sidebar" >
		<ul id="city_list"></ul>
	</div>
    <div id="map_canvas" ></div>
  </body>
</html>
