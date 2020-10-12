<div class="container">
	<div class="block home-wedget">
		<div class="how-to-play">
			<div class="enter-outer">
				<h2>
					<span>Read Me First</span> 
					<!-- <a href="" class="btn primary-btn tnc-btn">Terms & Conditions</a>--> 
				</h2>
				<div class="enter-steps">
					<ul>
						<li>
							<div class="steps-detail">
								<p>#1. Enter user (One user One Chance)</p>
							</div>
						</li>
						<li>
							<div class="steps-detail">
								<p>#2. Select answer for 10 Questions</p>
							</div>
						</li>
						<li>
							<div class="steps-detail">
								<p>#3. Difficulty Level : <b style="color:#795548;">Hard</b> | <b style="color:#009688;">Medium</b> | <b style="color:#F44336;">Easy</b></p>
							</div>
						</li>
						<li>
							<div class="steps-detail">
								<p>#4. Get your result</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php if($user != ""){?>
		<div class="play-now-bar">
			<a href="<?php echo $button_link; ?>" class="btn primary-btn play_now_btn"><?php echo $button_text; ?></a> 
		</div>
	<?php }else{?>
		<div class="play-now-bar">
		<a href="javascript:void(0);" class="btn primary-btn play_now_btn" id="enter_user"><?php echo $button_text; ?></a> 
		</div>
	<?php }?>	
	
</div>
