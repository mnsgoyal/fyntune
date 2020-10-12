<div class="title-card">
	<div class="title-outer">
		<div class="title-container">
			<div class="title-inner">
				<h2 class="page-title">My Results</h2>
				<div class="my-points" id="points_heading">
					<div class="points-outer">
						<p><i class="icon mcq-win-place2"></i><span>Total Correct Answer : </span><strong><?php echo isset($total_score) ? $total_score : ''; ?></strong></p>
					</div>
				</div>
			</div>
		</div>
		<?php if(!empty($week_info["weeks"]) && isset($current_event_details->user_id) && $current_event_details->user_id !="") { ?>
			<div class="result-filter">
				<div class="select-filter">
					<?php if(count($week_info["weeks"]) > 1) { ?>
					<div class="custom-select"> 
						<span class="select-span" id="selected_group"><?php echo (!empty($week_info["weeks"]))?$current_event_details->group_name:""; ?></span>
						<select id="week_result">
							<?php foreach($week_info["weeks"] as $weeks) { ?>
								<option value="<?php echo $weeks->group_id; ?>" <?php echo ($group_id == $weeks->group_id)?"selected":"";?> data-group-type="<?php echo $weeks->group_type; ?>"><?php echo $weeks->group_name; ?></option>
							<?php } ?>
						</select>
					</div>
					<?php } else { ?>
						<span class="select-span" id="selected_group"><?php echo (!empty($week_info["weeks"]))?$current_event_details->group_name:""; ?></span>
					<?php } ?>
				</div>
			</div>
		<?php }  ?>
	</div>
</div>
<div class="container"> 	
	<div class="results-info">
		<div class="results-listing">
			<ul class="picks-list">
				<?php 
				foreach($user_result as $questions)
				{ 
					if(isset($questions->question))
					{	?>
						<li class="<?php echo (strtolower($questions->result) == "win")?"win-question":"loss-question" ?>">
							<?php 
							$question_difficulty = "";
							if($questions->difficulty == "hard"){
								$question_difficulty = "#795548";
							}else if($questions->difficulty == "medium"){
								$question_difficulty = "#009688";
							}else{
								$question_difficulty = "#F44336";
							}
							?>
							<div class="picks-card" style="background-color: <?php echo $question_difficulty;?>">
								<?php if(isset($questions->category)) { ?>
									<div class="question-title">
										<span><?php echo $questions->category;?></span>
									</div>
								<?php } ?>	
								<div class="picks-card-outer">
									<div class="pick-question-block">
										<div class="card-question">
											<h3><?php echo $questions->question; ?></h3>
										</div>
									</div>
									<div class="card-answer">

										<?php 

											$questions->options = unserialize($questions->all_options);
											foreach($questions->options as $options) 
											{	
												$result_html = $answer_class =  $tip_class = "";
												if(isset($questions->correct_answer) && !empty($questions->correct_answer)) 
												{ 
													if(isset($questions->status) && $questions->status == 1)
													{
														$win_loss_text = "Incorrect";
														$tip_class =  "loss-question";
														if(strtolower($questions->result) == "win")
														{
															$win_loss_text = "Correct";
															$tip_class =  "win-question";
														}
														
														$win_loss_point = (isset($questions->result) && $questions->result != "NULL")?$questions->result:"loss";
														if($questions->status == 1){
															$answer_class = "add-question";
														}
													}
													if($questions->status == 1 &&  $questions->user_selection == $options) 
													{
														
														$result_html = '<div class="result-tooltip">
															<div class="tooltip-outer">
																<span class="center">'.$win_loss_text.'</span> 
															</div>
														</div>';														
														}
												} ?>
											<div class="col <?php //echo $tip_class; ?>">
												<a class="<?php echo $answer_class; ?>" href="javascript:void(0);">
													<?php echo $result_html; ?>
													<?php echo $options; ?>
												</a>
											</div>
										<?php }  ?>
								</div>			
										
							</div>
						</li>
				<?php } }  ?>
			</ul>			
		</div>
	</div>
</div>
	
	


