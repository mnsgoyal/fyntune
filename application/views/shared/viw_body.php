<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $page_title; ?></title>
<!-- Load Links -->
<?php $this->load->view("shared/viw_links"); ?>
</head>
<body>
<!--Main Section Start-->
<div>
	<div class="main-section <?php echo $body_class; ?>">
		<!-- Load Navigation -->
		<div class="page-container">
			<?php $this->load->view("shared/viw_navigation"); ?>
			
			<section class="mid-wrapper" id="body_container">
				<?php 
					switch($page_name){
						case "home":
							$this->load->view("home/viw_home");
							break;
						case "my-questions":
							$this->load->view("my_questions/viw_my_questions");	
							break;
						case "my-result":
							$this->load->view("result/viw_results");
							break;
						case "scoreboard":
							$this->load->view("scoreboard/viw_scoreboard");
							break;		
					}
				?>
			</section>
			 <!--Loader Start-->
			<div class="loading-wrapper body_loader" style="display:none;"> 
				<div class="page-overlay"> 
					<div class="loader-ring"></div>
				</div>
			</div>			
			<!--Loader End---> 
			<!--Footer Start-->
			<footer class="footer">
		        <div class="powered_by">
		          	<figure>MCQ Demo</figure>
		        </div>
	      	</footer>
			<!--footer End-->
			
		</div>
		 <!--Main Section End-->
	</div>
	
	<!--Enter Popup Start--->
	<div class="modal user-enter-modal" style="display:none;" id="enter_user_model">
		<div class="modal-contenier">
			<div class="modal-body">
				<div class="popup-info confirm-modal">
					<div class="form-group">
					  <input type="text" class="form-control" id="userid" placeholder="Enter User:test001">
					</div>
					<div class="button-bar">
						<div class="button-bar-outer">
							<div class="col go_back_btn"><a href="javascript:void(0);" class="btn bdr-btn go_back">Go Back</a></div>
							<div class="col continue_back_btn"><a href="javascript:void(0);" class="btn bdr-btn">Submit</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-overlay"></div>
		</div>
	</div>
	<!--Enter Popup End--->
	
</div>
	<!--Main Section End-->
	<!--Footer--> 
	<?php $this->load->view("shared/viw_footer"); ?>
</body>
</html>
