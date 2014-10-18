$(function()
{
    var ticker = function()
    {
        setTimeout(function(){
            $('#ticker li:first').animate( {marginTop: '-120px'}, 800, function()
            {
                $(this).detach().appendTo('ul#ticker').removeAttr('style');
            });
            ticker();
        }, 4000);
    };
    ticker();
});

var eve_name_array = [];
 
 function cart_click(e){
      e.preventDefault();
      $('#reg-form').modal();
      $("#reg-form").mCustomScrollbar("update");
      console.log("hi");
}

function indi_click (e) {
  e.preventDefault();
  $this=$(this);
  $evename = $("#reg-form").find("input#"+$this.data("eveid"));
  if($($evename).prop('checked') == false){
    $evename.prop("checked", true);
    alert("Event added to cart ! To confirm your registration , go to Cart and click on Register :)");
  }
}

function login_submit(e) {
  var $this=$(this);
  e.preventDefault();
  $email = $('#email_login').val();
  $password = $('#password_login').val();

  $.ajax({
            type: "POST",
            url: "login.inc.php",
            data:  { email:$email,pass:$password},
            success: function(data){
                if (data === "chill") {
                  alert("successfully logged in !");
                  location.reload();
                }else{
                  alert("Incorrect Username or Password")
                }
              },
        });
}
function register_post(e){
  var eve_id_array = [];

  $("#reg-form input[name='eventList[]']:checked:enabled").each(function()
  {
    $name_eve = $(this).val();

     eve_id_array.push($name_eve);
 });
   

   $.ajax({
            type: "POST",
            url: "eve_reg.php",
            data:  { json:eve_id_array },
            success: function(data){
              alert(data);
           }
        });



}

(function($){
  $(window).load(function(){
    $("#reg-form").mCustomScrollbar({
      theme:"dark",
      scrollButtons:{
        enable:true
      }
    });
  });
})(jQuery);




$(function() {

    $(".non-clickable").click(function(e){
      e.preventDefault();
      $("#registration_form").modal();
      return false;
    });

    // login button click
    $("#submit_login").click(login_submit);
    
if(evelist)
    for (var i = 0; i < evelist.length; i++) {
      console.log(evelist[i]);
      $("#reg-form input[name='eventList[]']").each(function()
      {
        $this = $(this);
        if ($this.attr("id") === evelist[i]) {
          $this.attr('checked', true);
        };
        
      });
    }





    $('.reg_submit').click(register_post);
     // Handler for .ready() called.


    $('.cart_icon').click(cart_click);


    $(".content-red").mCustomScrollbar({scrollButtons:{
          enable:true
        
        },
        theme:"dark"
        });

    /*events click handler starts here*/
    $(".work-sub-div").click(function(e){
      
    e.preventDefault();


    var $this=$(this);
    url=$this.attr("href");
    $('#loadingImg').show();
    

    $("#red-panelz .mCSB_container").load(url,function() {
    $('#loadingImg').hide();
    $(".work-sub-div").css("color","#fff");
    $this.css("color","#F5FF00");
            $(".content-red").mCustomScrollbar("update"); //update scrollbar according to newly loaded content
            $('#loadingImg').hide();
            
    });

    $(".content-red").mCustomScrollbar("update");

    });
/*events click handler endss here*/
  
    });

    // skroll intiation
var s = skrollr.init({
  edgeStrategy: 'set',
  render: function(data) {
  if(data.curTop === 900) {

      $('.events-sec-head').textEffect();
  }

  if (data.curTop === 2500) {
     $('.work-sec-head').textEffect();
   };
   if(data.curTop >= 900) {

    $('.900-hider').css("opacity","0");
  }
  if(data.curTop < 900) {

    $('.900-hider').css("opacity","1");
  }


}

});

skrollr.menu.init(s, {

  animate: true,

  easing: 'sqrt',

  duration: function(currentTop, targetTop) {
    return 2000;
  }
});

// other starts here

 $(window).load(function() {
  $("#red-panelz .mCSB_container").append("<img id=\"the_feat\" src=\"images/work/rishi.png\">");
    $('#loadingImg').hide();


    //load tabs
    (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();

    $("#blue-panel").mCustomScrollbar({
        scrollButtons:{
          enable:true
        }
    });

    

 
/*events click handler starts here*/
    $(".events-sub").click(function(e){
      

    e.preventDefault();


    var $this=$(this);
    url=$this.attr("href");
    $('#loadingImg').show();
    

    $("#blue-panel .mCSB_container").load(url,function() {
    $('#loadingImg').hide();
    $(".events-sub").css("color","#555");
    $this.css("color","rgb(0, 133, 255)");
            $("#blue-panel").mCustomScrollbar("update"); //update scrollbar according to newly loaded content
            $('#loadingImg').hide();
            
    });

    $("#blue-panel").mCustomScrollbar("update");


    });
/*events click handler endss here*/



        // modal fire ptions
        $.modal.defaults = {
  overlay: "#000",        // Overlay color
  opacity: 0.75,          // Overlay opacity
  zIndex: 999,              // Overlay z-index.
  escapeClose: true,      // Allows the user to close the modal by pressing `ESC`
  clickClose: true,       // Allows the user to close the modal by clicking the overlay
  closeText: 'Close',     // Text content for the close <a> tag.
  showClose: true,        // Shows a (X) icon/link in the top-right corner
  modalClass: "modal",    // CSS class added to the element being displayed in the modal.
  showSpinner: true       // Enable/disable the default spinner during AJAX requests.
};


//routing 
$("#site-content .item").click(function() {
  if ($.modal.AJAX_SUCCESS == 'modal:ajax:success') {
        console.log("jith");
      };
    
});


$('.events-sec-head').click(function() {


  $("#blue-panel .mCSB_container").html('');
  $("#blue-panel .mCSB_container").append("<img id=\"the_feat\" src=\"images/feat.png\">");
  $('#loadingImg').hide();
  $(".events-sub").css("color","#555");

   console.log("jith");
});


$('.work-sec-head ').click(function() {


  $("#red-panelz .mCSB_container").html('');
  $("#red-panelz .mCSB_container").append("<img id=\"the_feat\" src=\"images/work/rishi.png\">");
  $('#loadingImg').hide();
  $(".events-sub").css("color","#fff");

   console.log("jith");
});


});


$(function() {
    var cache = {};
    $( "#coll_reg" ).autocomplete({
      minLength: 7,
      source: function( request, response ) {
        var term = request.term;
        if ( term in cache ) {
          response( cache[ term ] );
          return;
        }
 
        $.getJSON( "coljson.php", request, function( data, status, xhr ) {
          cache[ term ] = data;
          response( data );
        });
      }
    });
  });
 