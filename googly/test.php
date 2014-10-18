<?php
<script type="text/javascript">
$(document).ready(function() {
    //##### Add record when Add Record Button is clicked #########
    $("#ans").submit( function(e) {
        
        e.preventDefault();
        
        if($("#ans_field").val()==="") //simple validation
        {
            alert("Please enter some text!");
            return false;
        }
        
        var answer =  $("#ans_field").val();
        var lvl = level;

         //post variables
        
        jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "process.php", //Where to make Ajax calls
            dataType:"text", // Data type, HTML, json etc.
            data:{answer:answer,level:lvl}, //post variables
            success:function(response){
            $('#responds').empty().append(response);
            $("#ans_field").val(""); //empty text field after successful submission
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError); //throw any errors
            }
        });
    });
});

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
            type: "POST", // HTTP method POST or GET
            url: "process.php", //Where to make Ajax calls
            dataType:"text", // Data type, HTML, json etc.
            data:{answer:answer,level:lvl}, //post variables
            success:function(response){
            $("#responds").empty().append(response);
            $("#ans_field").val(""); //empty text field after successful submission
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError); //throw any errors
            }
        });
}
function changeText(){
	jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "clues.php", //Where to make Ajax calls
            dataType:"text", // Data type, HTML, json etc.
            data:{level:lvl}, //post variables
            success:function(response){
           div2.innerHTML = "";	   	
		div2.innerHTML=response;		
		if(Print($_SESSION['clue']) == 4){
			window.clearTimeout (to);
		}
		
		else { 
			 var to = setTimeout("changeText()",delay*1000); 
			
		}
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError); //throw any errors
            }
        });
	   	
	}
	 if(level<11){
  for (var i=0;i<coord_array.length;i++) {
  	coords.push(new google.maps.LatLng(coord_array[i][ \'lat\' ], coord_array[i][ \'longitude\' ]));
  	waypts.push({location:coords[i+1],stopover:true});
  } }
  else{console.log("its 11");
  		var j=0;
  		for (var i=0;i<coord_array.length;i+=2) {
  	coords.push(new google.maps.LatLng(coord_array[i][ \'lat\' ], coord_array[i][ \'longitude\' ]));
  	waypts.push({location:coords[j],stopover:true});
  	j++;
  }
  }
</script>
?>

37.774910 -122.452110

35.759, 139.713
