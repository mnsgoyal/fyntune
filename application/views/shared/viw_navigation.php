<!--Header Start-->
<header class="header">
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">MCQ DEMO</a>
	    </div>
	    <ul class="nav navbar-nav">
			<?php if($user == "admin") {?>
				<li class="<?php echo ($page_name == "scoreboard")?"active":''; ?>" id="scoreboard" data-title="Scoreboard" data-page-name="scoreboard"><a href="scoreboard?user=<?php echo $user;?>">Scoreboard</a></li>
			<?php }else{?>
				<li class="<?php echo ($page_name == "home")?"active":''; ?>" id="home" data-title="Home" data-page-name="home-info-content"><a href="home?user=<?php echo $user;?>">Home</a></li>
			<?php if(!$is_user_played && $user != ""){?>
				<li class="<?php echo ($page_name == "my-questions")?"active":''; ?>" id="my-questions" data-title="My Questions" data-page-name="my-questions"><a href="my-questions?user=<?php echo $user;?>">My Questions</a></li> 
			<?php }elseif($user != ""){?>
				<li class="<?php echo ($page_name == "my-result")?"active":''; ?>" id="my-result" data-title="My Result" data-page-name="my-result"><a href="my-result?user=<?php echo $user;?>">My Result</a></li> 
			<?php }}?>
			<?php if($user != "") {?>
				<li ><a href="home">Logout</a></li> 
			<?php }?>			
	    </ul>
	  </div>
	</nav>
</header>
<!--Header End-->
