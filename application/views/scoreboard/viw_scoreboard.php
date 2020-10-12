<div class="title-card">
  <div class="title-outer">
    <div class="title-container">
      <div class="title-inner">
        <h2 class="page-title">Scoreboard</h2>
      </div>
    </div>
  </div>
</div>
<div class="container">
	<div class="block scoreboard-wedget">
		<div class="content-wrap">
			<div class="scoreboard-mid mid-content">
			
			<div class="row">
			  <div class="col-sm-4">
			  	<div class="form-group">
			  		<label for="user_search">Search:</label>
				  <input type="text" class="form-control" id="user_search" value="<?php echo (isset($_GET['user_search'])) ? $_GET['user_search'] : '';?>" placeholder="Search by user">
				</div>
			  </div>
			  <div class="col-sm-3">
			  	<div class="form-group">
			  		<label for="search_user"></label>
			  		<button type="button" class="btn btn-info" id="search_user" >Search</button>
				</div>
			  </div>
			  <div class="col-sm-5">
			  	<div class="form-group">
			  		<?php $selected =  (isset($_GET['sort'])) ? $_GET['sort'] : '';?>
				  <label for="scoreboard_sort">Sort by Score:</label>
				  <select class="form-control" id="scoreboard_sort">
				    <option value="" <?php echo ($selected == "")?"selected":""; ?> >--select--</option>
				    <option value="desc" <?php echo ($selected == "desc")?"selected":""; ?> >Highest to Lowest</option>
				    <option value="asc" <?php echo ($selected == "asc")?"selected":""; ?> >Lowest to Highest</option>
				  </select>
				</div>
			  </div>

			</div>
				<div class="scoreboard-info" id="scoreboard_records">
					<?php $this->load->view("scoreboard/viw_scoreboard_ajax"); ?>
				</div>
				 
			</div>
		</div>
		
	</div>
</div>
<input type="hidden" id="user" name="user" value="<?php echo (isset($_GET['user'])) ? $_GET['user'] : '';?>">
<input type="hidden" id="page" name="page" value="<?php echo (isset($_GET['page'])) ? $_GET['page'] : '';?>">
<input type="hidden" id="base_url" name="base_url" value="<?php echo base_url('scoreboard');?>">