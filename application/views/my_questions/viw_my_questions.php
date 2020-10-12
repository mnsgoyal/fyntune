<div class="title-card">
	<div class="title-outer">
		<div class="title-container">
			<div class="title-inner">
				<h2 class="page-title"><?php echo $page_title; ?></h2>
			</div>
        </div>
	</div>
</div>
<div class="container">
	<div class="block my-picks-wedget">
		<div class="content-wrap">
			<div class="picks-info mid-content">
				<div class="picks-listing">
					<ul class="picks-list">
						<?php if(!empty($questions_list))
								{
									$total_questions = 0;
									foreach($questions_list as $question_no => $questions)
									{ 
										if(isset($questions->question))
										{	
										$total_questions++;
									?>
									<li>
										<div class="picks-card  question_card_<?php echo $question_no; ?>" data-option-selections="" data-question-id="<?php echo $question_no; ?>">
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
											<div class="picks-card-outer" style="background-color: <?php echo $question_difficulty;?>">
												<div class="question-title">
													<span><?php echo $questions->category;?></span>
												</div>
												<div class="pick-question-block">
													<div class="card-question">
														<h3><?php echo $questions->question; ?></h3>
													</div>
												</div>
												<div class="answer-block">
														<div class="card-answer card_answer_<?php echo $question_no; ?>">
															<?php foreach($questions->all_options as $options) { ?>
																<div class="col">
																	<a class="select-answer  option_card_<?php echo $options; ?> " href="javascript:void(0);" data-option-id="<?php echo $options; ?>" data-question-id="<?php echo $question_no; ?>" data-option-selection=""><span><?php echo $options; ?></span><div class="checkbox circle-check">
																		<input type="radio">
																		<label></label>
																	</div></a>
																	
																</div>									
															<?php } ?>
														</div>
													
												</div>
											</div>
										</div>
									</li>
						<?php } } } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Submiting Picks Popup Start--->
<div class="submit-loading" style="display:none;"> 
	<!--submit-error-->
	<div class="loader loading-picks"> <i class="icon icon-ok-1 mcq-checkmark"></i> <i class="icon crose mcq-cross"></i>
		<div class="cricle-loading">
			<div class="loader-ring"></div>
		</div>
		<span class='submit_msg'>Submitting your questions</span> 
	</div>
</div>
<div id="tip_selection_btn">
	<div class="view-selections">
		<div class="selection-bar">
			<div class="col"> 
				<a href="javascript:void(0);" class="btn primary-btn submit-pick-btn" id="submit_tip">
					<small id="questions_left_text"></small>
					<span>submit</span>
				</a>
			</div>
		</div>
	</div>
</div>
<input type="hidden" id="total_questions" value="<?php echo $total_questions; ?>" />
