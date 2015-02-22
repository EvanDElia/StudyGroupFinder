<!DOCTYPE html>
<html>
<head>
<title>Groups</title>
	<meta charset="utf-8"> 
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="http://requirejs.org/docs/release/2.1.11/minified/require.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="groups.js"></script>
	<script type="text/javascript" src="http://jqueryrotate.googlecode.com/svn/trunk/jQueryRotate.js"></script>
	<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js"></script>
	<link rel="stylesheet" href="fancybox/source/jquery.fancyBox.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="form/view.css" media="all">
	<script>
	<?php
		$m = new MongoClient(); // connect
		$db = $m->selectDB("firstdb");
		$c = $db->selectCollection("groups");
		$cursor = $c->find();
		$cursor->next();
	?>
	var allGroups = [];
	function getAllGroups(){
		<?php
		foreach ($cursor as $current){
		?>
		var subject = "<?php echo((string)$current['subject']); ?>";
		var professor = "<?php echo((string)$current['professor']); ?>";
		var code = "<?php echo((string)$current['code']); ?>";
		var des = "<?php echo((string)$current['description']); ?>";
		var max = <?php echo((string)$current['maxMembers']); ?>;
		var cur = <?php echo((string)$current['members']); ?>;
		
		allGroups[allGroups.length] = new Group(subject, des, cur, max, professor, code);
		<?php
		}
		?>
		
		displayAllGroups();
	};
	
	function checkPostData(){
		<?php 
		if (!empty($_POST['element_1'])){
		$c->insert(array(
		'subject' => $_POST['element_2'], 
		'description' => $_POST['element_1'], 
		'maxMembers' => $_POST['element_4'], 
		'members' => 1,
		'professor' => $_POST['element_5'],
		'code' => $_POST['element_6']));
		$_POST['element_1'] = null;
		}
		?>
	};
	
	$(document).ready(function() {
		var allGroups = [];
		$("#fancy").fancybox({	
			'transitionIn': 'elastic',
			'cyclic': true,
			'callbackOnClose': function() {
		   $("#fancy_content").empty();
			  },
			'hideOnContentClick': false
		});
		
		checkPostData();
		getAllGroups();
	});
	</script>
	
</head>
<body>
<div id="header"><a href="search.html">search</a>
<a href="signup.html">signup/signin</a> 
<a href="User.html">User</a></div>
<div id="page-container">
		<h1 id="title">Groups</h1>
		<button id="create"><a id ="fancy" href="#form" target="_blank">Create A New Study Group</a></button>
		<div id="page-content">
		<table>
		<tbody>
		<tr>
			<th>Subject </th>
			<th>Name/Description</th>
			<th>Professor</th>
			<th>Course Number</th>
			<th>Size (Current / Possible) </th>
			<th>Open? </th>
		</tr>
		</tbody>
		</table>
		</div>
		
	<p id="footer"></p>
	
	<!--This is invisible -->
	<div id="form"><div id="main_body" >
	
	<img id="top" src="form/top.png" alt="">
	<div id="form_container">
	
		<h1 id="formHeader"><a>Group Form</a></h1>
		<form id="form_974218" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>New Group Form</h2>
			<p>Please fill out all of the below fields and then click Submit to create your new group. Click outside this box in order to cancel.</p>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">Group Name </label>
		<div>
			<input id="element_1" name="element_1" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Subject </label>
		<div>
		<select class="element select medium" id="element_2" name="element_2"> 
			<option value="" selected="selected"></option>
<option value="MTH" >MTH</option>
<option value="CSC" >CSC</option>
<option value="PHY" >PHY</option>
<option value="EEN" >EEN</option>

		</select>
		</div> 
		</li>		
		<li id="li_3" >
		<label class="description" for="element_3">Is this group for a specific class? </label>
		<span>
			<input id="element_3_1" name="element_3" class="element radio" type="radio" value="1" />
<label class="choice" for="element_3_1">Yes</label>
<input id="element_3_2" name="element_3" class="element radio" type="radio" value="2" />
<label class="choice" for="element_3_2">No</label>

		</span> 
		</li>		
		
		<li id="li_5" >
		<label class="description" for="element_5">Professor </label>
		<div>
			<input id="element_5" name="element_5" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		<li id="li_6" >
		<label class="description" for="element_6">Class Code </label>
		<div>
			<input id="element_6" name="element_6" class="element text medium" type="text" maxlength="255" value=""/> 
		</div>
		
		<li id="li_4" >
		<label class="description" for="element_4">Max # of Members </label>
		<div>
		<select class="element select medium" id="element_4" name="element_4"> 
			<option value="" selected="selected"></option>
<option value="5" >5</option>
<option value="10" >10</option>
<option value="15" >15</option>
<option value="20" >20</option>
<option value="30" >30</option>

		</select>
		</div> 
		</li>
			
				<li class="buttons">
			    <input type="hidden" name="form_id" value="974218" />
			    
				<button class="button_text"  name="submit" value="Submit" onclick="createNewGroup()" >Create</button>
		</li>
			</ul>
		</form>	
		<div id="footer">
			Generated by <a href="http://www.phpform.org">pForm</a>
		</div>
	</div>
	<img id="bottom" src="form/bottom.png" alt="">
	</div></div>
</div>

</body>
</html>


