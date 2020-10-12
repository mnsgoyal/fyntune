var option_selection_array = [];
// $(document).on( "click", ".punters-btn", function() {
// 	$(this).next('.punter-picks').slideToggle('');
// 	$(this).toggleClass('active');
// 	var question_id = $(this).attr("data-question-id");
// });

$(document).on( "click", ".select-answer", function() {
	if(!$(this).hasClass('add-question'))
	{
		var question_id = $(this).attr("data-question-id");
		var option_id = $(this).attr("data-option-id");
		$(this).closest('.card-answer').find('.add-question').removeClass('add-question');
		$(this).toggleClass('add-question');
		get_selected_picks($(this),question_id,option_id);
	}
});

function get_selected_picks(self,question_id,option_id)
{
	$('.view-selections').addClass('show');
	$('.picks-info').addClass('show-selections');
	$('.page-container').addClass('show-selections-tip');

	var total_questions = $("#total_questions").val();
	var tip_count = 0;
	$(".select-answer.add-question" ).each(function() {
		tip_count++;
	});

	if(total_questions == tip_count)
	{
		$("#submit_tip").removeClass("light-gray-btn");
		$("#submit_tip").addClass('bonus-btn');
	}else{
		$("#submit_tip").removeClass('bonus-btn');
		$("#submit_tip").addClass("light-gray-btn");
	}
	picks_left = total_questions - tip_count;
	picks_left = (picks_left == 1)?picks_left+" question left":picks_left+" questions left";
	var questions_left_text = (total_questions == tip_count)?"<strong>"+total_questions+"/"+total_questions+" questions!</strong>":picks_left;
	$("#questions_left_text").html(questions_left_text);
}




//ADD TIP SELECTION
$(document).on( "click", "#submit_tip", function() {
	submit_tip(false);
});


function submit_tip(show_points)
{
	var user	= get_parameter_from_url('user');
	var user_submission_obj = {};
	$( ".add-question" ).each(function() {
		var question = $(this).attr("data-question-id");
		var option = $(this).attr("data-option-id");
		user_submission_obj[question] = option;
	});
	$.ajax({
		type: "POST",
		url: "submit-questions",
		dataType: 'json',
		cache:false,
		data: {user_submission:user_submission_obj,user:user},
		beforeSend: function()
		{
			$('.loading-picks').removeClass('submit-error');
			$('.loading-picks').removeClass('submit-picks');
			$('.submit_msg').text('Submitting your questions');
			$(".submit-loading").css('display','flex');
			$("body").addClass('show-modal');	
			$("#submit_tip").addClass("disabled");
		},
		success: function(data)
		{   
			console.log(data);
			if(data.status == 'success')
			{	
				$('.submit_msg').text(data.message);
				// goto result page
				setTimeout(function() {
					window.location.href = "my-result?user="+user;
				},2000);
				
			}
			else
			{   
				$('.loading-picks').addClass('submit-error');
				$('.submit_msg').text(data.message);
				setTimeout(function() {
					$('.loading-picks').removeClass('submit-error');
					$(".submit-loading").css('display','none');
					$("body").removeClass('show-modal');	
					$("#submit_tip").removeClass("disabled");
				}, 3000);
			}
		},
		error: function(data)
		{
			console.log(data);
		}
	});
}

//ADD TIP SELECTION
$(document).on( "click", "#enter_user", function() {
	$("#enter_user_model").css("display","block");
});

$(document).on( "click", ".go_back_btn", function() {
	$("#enter_user_model").css("display","none");
});
$(document).on( "click", ".continue_back_btn", function() {
	var user = $("#userid").val();
	if(user == "admin"){
		window.location.href = "scoreboard?user="+user;
	}else if(user != ""){
		window.location.href = "home?user="+user;
	} else{
		alert("Enter user");
	}
});
