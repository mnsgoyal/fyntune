<?php if(isset($users_score) && count($users_score) > 0){ 
 ?>
	<div class="leader-info">
		<div class="scoreboard-table">
			<div class="table-outer">
				<div class="table-container">
					<table>
						<thead>
							<tr>
								<th>USER NAME</th>
								<th>Score</th>
							</tr>
						</thead>
						<tbody id="scoreboard_tbody">
							<?php foreach($users_score as $user_score)
								{ ?>
									<tr class="" data-count="<?php echo $scoreboard_count; ?>">
										<td><?php echo $user_score->user_id;?></td>
										<td><?php echo $user_score->score;?></td>
									</tr>
									
								<?php } ?>
						</tbody>
					</table>
					
				</div>

			</div>
			<p><?php echo $links; ?></p> 
		</div>

	</div>
<?php } else { ?>
<div class="no-msg-content">
    <div class="no-msg-outer">
        <h2>No Record Found</h2>
        
</div>
<?php }  ?>
