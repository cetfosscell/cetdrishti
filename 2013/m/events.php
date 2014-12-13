<?php 

require_once 'idi.php';

	//get the id of post
	
	if(isset($_GET["id"])) {
		$id = $_GET["id"];
	}
	
	// make the connection
	
	ORM::configure('mysql:host=localhost;dbname=cetdriss_drishti');
	ORM::configure('username', 'cetdriss_pranav');
	ORM::configure('password', 'kindappan123');
	
	// connected
	
	$event= ORM::for_table('events')->where('eve_sname', $id )->find_one();
	$managers=ORM::for_table('stud_reg')->where('event', $event->id )->find_many();
	include'header.php';
?>
<div id="new-styles">
  <h2 class="page-header">
  <?php echo $event->name; ?>
  </h2>
  <div class="row">
  
	  Total Prize&nbsp;&nbsp;: <?php
						$prize=$event->prize1+$event->prize2;
						if($event->prize1!=0)
						 echo "Rs. ".$prize ;
						else
						 echo "Will be updated soon";
						 ?>
    <div class="span4">
      <h4><a href="#rotated-flipped">Description</a></h4>
      <div class="well well-transparent">
        <?php echo $event->descr ?>
      </div>
    </div>
    <div class="span4">
      <h4><a href="#stacked">Rules</a></h4>
      <div class="well well-transparent">
       
        <?php echo $event->eve_format ?>
      </div>
    </div>
    <?php	if($event->group==7 || $event->id==26){?>	
    <div class="span4">
      <h4><a href="#stacked">Problem Statement</a></h4>
      <div class="well well-transparent">
       
        <?php echo $event->pbm_stat ?>
      </div>
    </div>	
    <?php }?>
    <div class="span4">
      <h4><a href="#bulleted-lists">Contact</a></h4>
      <div class="well well-transparent">
       <?php 
					foreach($managers as $man)
					{?>
					<b><?php
						echo $man->fname;
						echo " ";
						echo $man->lname;
						?>
					</b>
					<br>
					<?php
						echo $man->email_drs;?>
					
					<br>+91-
					<?php
						echo $man->mob;?>
					
					<br>
					<?php	
					}
				?>
      </div>
    </div>
  </div>
</div>


   




    <!-- Footer
    ================================================== -->
    <footer class="footer">
      <div class="container">
              <p>&copy;Copyright Drishti</p>
			</div>
    </footer>

<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>
    <script src="assets/js/bootstrap-affix.js"></script>

    <script src="assets/js/holder/holder.js"></script>
    <script src="assets/js/google-code-prettify/prettify.js"></script>

    <script src="assets/js/application.js"></script>


  </body>
</html>