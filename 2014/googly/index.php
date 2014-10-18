	<?php 	session_start();?>
	<!DOCTYPE html>
	<html>
	  <head>
	    <title>Drishti:Googly</title>
	    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
	    <meta charset="utf-8">
	    <style>
	      html, body, #map-canvas {
	        margin: 0;
	        padding: 0;
	        height: 100%;
	      }
	    </style>
	    <style>
            #map-canvas { position: relative; }
         #countdown { position: absolute; top: 10px; right: 10px; z-index: 99; width: 100px; }
        
        </style>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	    <script src="http://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	   <script src="js/jquery.msgBox.js" type="text/javascript"></script>
		<link href="css/msgBoxLight.css" rel="stylesheet" type="text/css">
	    <script language="javascript" src="js/infobubble.js"></script>
	    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" />
        <link rel="stylesheet" href="css/jquery.countdown.css" />
        <script src="js/jquery.countdown.js"></script>
		<?php 	include('src/base.php');
			include_once('src/config.php');
		 	$count = 0;
		 	if(!isset($_SESSION['done'])&&!isset($_SESSION['loggedin'])){
		 		header("location:src/login.php");
		 	}
		 	else{
		 	if($_SESSION['loggedin']==false){
		 		header("location:src/login.php");
		 	}
		 }
		 	$js_array = json_encode($coord_array);
		 	
	echo '<script>
	var coord_array = '; echo $js_array; echo ';
	var delay = 1; //  length of delay in seconds 
	var directionsDisplay;
	var directionsService = new google.maps.DirectionsService();
	var strtloc = new google.maps.LatLng( ';
		Print($_SESSION['start_lat']);
		echo', ';
		Print($_SESSION['start_lon']);
		echo');
		var destloc = new google.maps.LatLng(';Print($lat); echo', '; Print($lon);
		echo');';
	echo 'var marker; 
	var coords = new Array();
	var title ;
	var liftoffTime = new Date('; Print( ($_SESSION['start']+3600)*1000);
	echo ');
	var fromtime= new Date('; Print( ($_SESSION['start'] )*1000);
	echo ');
	
	var level = '; 
	Print($lvlno); echo';
function finito(){
			window.location.href = "src/final2.php?action=timeover";
		}
		function getServer(){
			 var time = null; 
    			$.ajax({url: "src/serTime.php", 
    	             		   async: false, dataType: "text", 
        			   success: function(text) { 
        			   time = new Date(text*1000); 
        			}, error: function(http, message, exc) { 
           			 time = new Date(); 
   		 }}); 
    		return time; 			
		}	
	$(function () {
	$(\'#countdown\').countdown({until: liftoffTime,serverSync:getServer , format: \'MS\',onExpiry: finito});
	});
	var question = "<b>'; Print($question); echo'</b>";
	var invokecount =0;
	var  infoBubble = new InfoBubble({
          maxWidth: 1000
        });
		var htmlval =\'<form id="ans"> <br>Answer:<input type="text" name="answer" id = "ans_field">\'
       				 +\'<button id= "submit_btn" onclick = "ajax_help();return false;">Submit</button><br></form>\';
       	var responseval = \'<br><p id="responds"></p>\';
        var div = document.createElement(\'DIV\');
        div.innerHTML = question+htmlval+responseval;
        var div2 = document.createElement(\'DIV\');
        div2.setAttribute("id", "div2");
        infoBubble.addTab(\'Question\', div);
        infoBubble.addTab(\'Clues\', div2);
		var map;

		function ajax_help(){
        if($("#ans_field").val()==="") //simple validation
        {
            alert("Please enter some text!");
            return false;
        }
        
        var answer =  $("#ans_field").val();
        var lvl = level;

         //post variables
        jQuery.ajax({
            type: "POST", 
            url: "src/process.php", 
            dataType:"text", 
            data:{answer:answer,level:lvl}, 
            success:function(response){
            $("#responds").empty().append(response);
            $("#ans_field").val(""); //empty text field after successful submission
            if(response.search("Congrats")>-1){
            	setTimeout("location.href = \'src/finish_googly.php\';",1000);
            }
            else if(response.search("Sorry")==-1){
            	setTimeout("location.href = \'index.php\';",1000);
            }
            },
            error:function (xhr, ajaxOptions, thrownError){
            	alert("Sorry.Error connecting to database.");
            }
        });
}

	 function changeText(){

	 	$(\'#pre_load\').show();
	jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "src/clues.php", 
            dataType:"text", 
            data:{level:level}, 
            success:function(response){
            	$(\'#pre_load\').hide();
           div2.innerHTML = "";	   	
		div2.innerHTML=response;		
		//var to = setTimeout("changeText()",delay*1000); 
		
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert("ajax error!"); //throw any errors
            }
        });
	   	
	}

	function initialize() {
		directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true,draggable:false});
		invokecount = 0;
	  var mapOptions = {
	    zoom: 13,
	    center: strtloc,
	    mapTypeId: google.maps.MapTypeId.ROADMAP
	  };
	  map = new google.maps.Map(document.getElementById(\'map-canvas\'),
	      mapOptions);
	  directionsDisplay.setMap(map);
	  calcRoute();
	  changeText();

	}
 
	function makeMarker( position, character, title ,isdestination ) {
		if(!isdestination){
			 new google.maps.Marker({
  			position: position,
  			map: map,
 			icon:  new google.maps.MarkerImage("https://chart.googleapis.com/chart?chst=d_map_pin_letter_withshadow&chld="+character+"|51ACE8|002EB8"),
  			title: title
		 });
	}
	else{
		 	marker = new google.maps.Marker({
	    	position: position,
	   		map: map,
	    	title: \'Click to get question\'
	  });
		 	google.maps.event.addListener(marker, \'click\', function() {
	    if (!infoBubble.isOpen()) {	    
	    	changeText();	
            infoBubble.open(map, marker);
        }
        	 map.setZoom(10);
            	map.setCenter(marker.getPosition());
	});
}
}
function calcRoute() {
	var waypts = [];
	coords.push(strtloc);
	if (level>1){
  var selectedMode = "DRIVING";
  /*if(level<11){
  for (var i=0;i<coord_array.length;i++) {
  	coords.push(new google.maps.LatLng(coord_array[i][ \'lat\' ], coord_array[i][ \'longitude\' ]));
  	waypts.push({location:coords[i+1],stopover:true});
  } }
  else{console.log("its "+level);
  		var j=0;
  		var temp=0;
  		for (var i=0;i<coord_array.length;) {
  			if(i>=2&&temp<(level-10)){
  				temp++;
  				i++;
  				continue;
  				
  			}
  	coords.push(new google.maps.LatLng(coord_array[i][ \'lat\' ], coord_array[i][ \'longitude\' ]));
  	waypts.push({location:coords[j+1],stopover:true});
  	j++;
  	i++;
  }
  }*/
  coords.push(destloc);
  var request = {
      origin: map.getCenter(),
      destination: destloc,
      avoidTolls :false,
      optimizeWaypoints: false,
      travelMode: google.maps.TravelMode[selectedMode]
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
      var route = response.routes[0];
      for (var i = 0; i < route.legs.length; i++) {
   				makeMarker( coords[i],String.fromCharCode(\'A\'.charCodeAt() + i) , route.legs[i].start_address,false);
 		 } 
 		 		
				makeMarker( coords[i],String.fromCharCode(\'A\'.charCodeAt() + i), route.legs[i-1].end_address,true);    	 		
   			 } 
  });
	}
	else{
		makeMarker( coords[0]," ", " ",true); 
	}
}
	google.maps.event.addDomListener(window, \'load\', initialize);
	    </script>';
	    ?>
	  </head>
	  <body>
	  
	    <div id="map-canvas"></div>
	    <div id="wrap">
	   <div id="countdown" ></div>
	   </div>
	   <div id="pre_load">
	   	

	   </div>

	   <style type="text/css">
	   #pre_load{
	   	z-index: 999;
	   	width: 100%;
	   	height: 100%;
	   	background: red;
	   	position: fixed;
	   	display: none;
	   }
	   </style>
	  </body>
	  
	</html>