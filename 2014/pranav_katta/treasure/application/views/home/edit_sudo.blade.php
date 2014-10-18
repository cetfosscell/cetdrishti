<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.0/css/bootstrap-combined.min.css" rel="stylesheet">
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/stl.css">
</head>
<body>

	<div class="container">
		<div class="masthead">
			<ul class="nav nav-pills pull-right">
				<li ><a href="sudo">Home</a></li>
				<li class="active"><a href="/sudo/upedit">Edit question</a></li>
			</ul>
			<h3 class="muted">Project name</h3>
		</div>
		<hr>
		<div class="row">
			<?php if (Session::has('done')) {?>
			<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Well done!</strong> You successfully Uploaded  the question
            </div>
            <?php } Session::forget('done'); ?>

			<?php echo Form::open_for_files('/sudo/upedit', 'POST', array('class' =>'form-horizontal span7 upload_q' , )); ?>

				<h3>editquestion </h3>
				<div class="control-group">
					<label class="control-label" for="level">Level</label>
					<div class="controls">
						<input type="text" class="span5" id="level" name="level" placeholder="level">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="question">Question</label>
					<div class="controls">
						<textarea  id="question" class="span5" name="question" value=""></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="answer">Answer</label>
					<div class="controls">
						<input type="text" class="span5" id="answer" name="answer" placeholder="Answer">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="photo">Image</label>
					<div class="controls">
						<input type="text" class="span5"  name="image" >
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="html">HTML to insert</label>
					<div class="controls">
						<textarea  class="span5" id="html" name="html"><!--  --></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="hash">Hashtag</label>
					<div class="controls">
						<input type="text" class="span5"  name="hash" >
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						
						<button type="submit" class="btn btn-large btn-success">Upload Question</button>
					</div>
				</div>
			{{Form::close()}}
			
				
			
		</div>
		

	</div>

</body>
</html>