<?php $messages = array('http://sphotos-g.ak.fbcdn.net/hphotos-ak-ash3/150414_160974120722903_1638888760_n.jpg',
 'http://sphotos-a.ak.fbcdn.net/hphotos-ak-ash3/69616_160974107389571_458850850_n.jpg',
  'http://sphotos-h.ak.fbcdn.net/hphotos-ak-prn1/66941_160974140722901_526293990_n.jpg',
  'http://sphotos-b.ak.fbcdn.net/hphotos-ak-prn1/11362_160974130722902_571746839_n.jpg',
  'http://sphotos-f.ak.fbcdn.net/hphotos-ak-ash3/544150_160974164056232_445223774_n.jpg',
  'http://sphotos-d.ak.fbcdn.net/hphotos-ak-ash3/559840_160974177389564_1520272621_n.jpg',
  );

  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MindSweeper | Treasure Hunt for first Years </title>
    
    <meta name="author" content="Pranav" >

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
	<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Jim+Nightshade|Rosario);
	.c6{width:50%}
	.holer{
	background: #fbfcfc;
	border-radius: 4px;
	-webkit-box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
	margin-top: 130px;	
}
.s3 a
{
	text-decoration:none;
	font-family:'Open Sans';
}

.s3{margin-left:25%}

 .rules_box
 {
 	width:65%;
 	margin-left:13%;
 	margin-right:17.5%;
 	text-align:justify;
 	font-size:16px;
 	padding:50px;
 	background:#fff;
 	font-family:'Rosario', cursive;
 	color:#000;
 }
 
 
	</style>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
    <![endif]-->


<!-- fb javscr -->
<div id="fb-root"></div>
     <script type="text/javascript">
       var button;

            var po_checker =0;
            var messager ="Mind Sweeper!!!"
            <?php if(Auth::user()->level==1){ ?>
            
            messager = "Mind Sweeper !!! Treasure Hunt for first years";
            
            <?php }else{ ?>
            
             messager = "Crossed Level "+{{Auth::user()->level-1}}+" In Mind Sweeper" ;
            
            <?php } ?>
            
            window.fbAsyncInit = function() {
                FB.init({ appId: '353718588071348', //change the appId to your appId
                    status: true, 
                    cookie: true,
                    xfbml: true,
                    oauth: true});

               showLoader(true);
               
               function updateButton(response) {
                    button       =   document.getElementById('fb-auth');
                    
                    if (response.authResponse) {
                        //user is already logged in and connected
                        FB.api('/me', function(info) {
                            login(response, info);
                        });
                        
                        button.onclick = function() {
                            FB.logout(function(response) {
                                logout(response);
                            });
                            
                       
                        
                        };
                    } else {
                        //user is not connected to your app or logged out
                        button.innerHTML = '';
                        button.onclick = function() {
                            showLoader(true);
                            FB.login(function(response) {
                                if (response.authResponse) {
                                    FB.api('/me', function(info) {
                                        login(response, info);
                                    });	   
                                } else {
                                    //user cancelled login or did not grant authorization
                                    showLoader(false);
                                }
                            }, {scope:'email,user_birthday,status_update,publish_stream,user_about_me'});  	
                        }
                    }
                }
                
                // run once with current status and whenever the status changes
                FB.getLoginStatus(updateButton);
                FB.Event.subscribe('auth.statusChange', updateButton);	
            };
            (function() {
                var e = document.createElement('script'); e.async = true;
                e.src = document.location.protocol 
                    + '//connect.facebook.net/en_US/all.js';
                document.getElementById('fb-root').appendChild(e);
            }());
            
            
            function login(response, info){
                if (response.authResponse) {
                    var accessToken                                 =   response.authResponse.accessToken;
                    button.innerHTML                               = '';
                    showLoader(false);
                    document.getElementById('other').style.display = "block";
                    if(po_checker === 0){
                    graphStreamPublish();
                    po_checker =1;
                    };
                }
            }
        
            function logout(response){
                
                document.getElementById('debug').innerHTML     =   "";
                document.getElementById('other').style.display =   "none";
                showLoader(false);
            }

            //stream publish method
            function streamPublish(name, description, hrefTitle, hrefLink, userPrompt){
                showLoader(true);
                FB.ui(
                {
                    method: 'stream.publish',
                    message: '',
                    attachment: {
                        name: name,
                        caption: '',
                        description: (description),
                        href: hrefLink
                    },
                    action_links: [
                        { text: hrefTitle, href: hrefLink }
                    ],
                    user_prompt_message: userPrompt
                },
                function(response) {
                    showLoader(false);
                });

            }
            
            

            function graphStreamPublish(){
                showLoader(true);
                
                FB.api('/me/feed', 'post', 
                    { 
                        message     : messager,
                        link        : 'http://brainstrain.cetdrishti.com',
                        picture     : 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash3/t1/q74/s720x720/1797346_682444868473843_2082902314_n.jpg',
                        name        : 'MindSweeper 13',
                        description : 'Mind Sweeper !!! Treasure Hunt for 1st years'
                        
                }, 
                function(response) {
                    showLoader(false);
                    
                    if (!response || response.error) {
                        console.log('Error occured');
                    } else {
                        console.log('Post ID: ' + response.id);
                    }
                });
            }

            

            
            
            function showLoader(status){
                if (status)
                    document.getElementById('loader').style.display = 'block';
                else
                    document.getElementById('loader').style.display = 'none';
            }
            
            
            
            
        </script>


  </head>

  <body data-spy="scroll" data-target=".bs-docs-sidebar">
  
  <div id="fb-root"></div>
   

    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        
				
				
				
          <div class="nav-collapse collapse">
            <ul class="nav">
          <li>
           <?php if(Auth::user()->level==1){?>
<a href="http://brainstrain.cetdrishti.com" style="">Start The Hunt</a>  
          </li>
        <?php } ?>
       </ul>
          </div>
        </div>
      </div>
    </div>
    
    <?php if(Auth::user()->level==1){?>
    	
    	<div class="jumbotron masthead" style="margin-top:-40px;">
	<h1 style="font-family:'Jim Nightshade';">RULES</h1>
  	<div class="rules_box">
<ol>
<li>
  
</li><li>
      Only first year cetians having an active <b>facebook </b> account can be a participant.
</li><li>
    The participant's aim is to crack the levels as quickly as they can so as to place themselves at the top of the leaderboard.
</li>
<li>

     Sharing/disclosure of answers in anyform is strictly banned and those who indulge in the same will be disqualified without any prior notice and decision of admin panel will be final.

</li>

<li>
     The ONE who tops the board at the end of the hunt will be declared as WINNER
    </li><li>
    Answers for all levels will be  lower-case,alphanumeric without any special characters/spaces in      
      between.Sometimes URL change may be needed or you may have to download files to reach the answer.
     </li>
     <li>
    Hints can take anyform.You just need an open mind with good observations.It can be in URL,Source file or will be provided by admins in discussion form if needed.</li><li>
     Hacking will be a mere show off of your talent,but remember it is mighty easy for us to click the BAN button.
   </li><li>
     If Google is GOD,then MOD is google.

</li><li>
    So why still waiting,go start solving godspeed. GOOD LUCK .
    
  	
  	
</ol>
  	</div>
  	
</div>

    	
    
    <?php }else{ ?>
    <div class="c6 holer s3">

        
        <a href="/"  return false;"><img src="{{$messages[mt_rand(0,5)]}}"><h2>Correct Answer</h2></a>
      
      
    </div>
   <?php } ?>
    <div id="fb-auth"></div>
        <div id="loader" style="display:none">
        </div>

        
        <div id="other" style="display:none">   
        </div>
  </div>

</body>
</html>