<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <title>Googly:CETDrishti</title>

  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="57x57" href="/images/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/images/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/images/apple-touch-icon-114x114.png">

  <link rel="stylesheet" href="../css/style.css">
  <!--[if lt IE 9]>
    <script src="js/shiv.js"></script>
  <![endif]-->
  <?php
    if (isset($_SESSION['loggedin'])){
      if($_SESSION['loggedin']==true){
      header("location:rules.php");
    }
  }


  ?>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="../js/vendor/custom.modernizr.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
      $("#sub_btn").click(function(e){
        e.preventDefault();
         var user =  $("#username").val();
        var pass = $("#password").val();
         //post variables
        jQuery.ajax({
            type: "POST", 
            url: "init.php", 
            dataType:"text", 
            data:{user:user,pass:pass}, 
            success:function(response){
              if(response.search("Success")>-1){
              setTimeout("location.href = 'rules.php';",1000);
            }
            else if(response.search("Admin")>-1){
              setTimeout("location.href = 'admin.php';",1000);
            }
            else{
            $("#responds").empty().append(response);
            $("#password").val(""); //empty text field after successful submission
          }
            
            },
            error:function (xhr, ajaxOptions, thrownError){
              alert("Sorry.Error connecting to database.");
            }
        });
      });
  });
      
        </script>
</head>
<body>
<div id="site-container" class="grid">
        
  <div class="section row">
          <div class="c10 s1 logo">
            <img src="../img/Googlelogo.png" class="c6">
          </div>
          <form class="c4 s4 login-form">
            <input type="text" class="c12  inpu" name="name" id="username" required placeholder="User Name">
            <input type="password" class="c12  inpu" id="password" name="password" required placeholder="Password">
            <p class = "c12" id="responds" ></p>
            <input type="submit" class="c12  sub" name="submit" id ="sub_btn" value="Login">
          </form>

      

  </div> <!--/section or clear -->

</div>

</body>
</html>
