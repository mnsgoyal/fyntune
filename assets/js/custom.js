function get_parameter_from_url(name) 
{
    name = name.replace(/[\[\]]/g, "\\$&");
	var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(window.location.href);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}



$("#scoreboard_sort").change(function(){
	var base_url = $("#base_url").val();
	var page = $("#page").val();
	var user = $("#user").val();
	var scoreboard_sort = $("#scoreboard_sort").val();
	var user_search = $("#user_search").val();
	var query_string = "?user="+user;
	
	if(user_search!=""){
		query_string = query_string + "&user_search="+user_search;
	}
	if(scoreboard_sort!=""){
		query_string = query_string + "&sort="+scoreboard_sort;
	}
  window.location.href = base_url+query_string;
});
$("#search_user").click(function(){
	var base_url = $("#base_url").val();
	var page = $("#page").val();
	var user = $("#user").val();
	var scoreboard_sort = $("#scoreboard_sort").val();
	var user_search = $("#user_search").val();
	var query_string = "?user="+user;
	
	if(user_search!=""){
		query_string = query_string + "&user_search="+user_search;
	}
	if(scoreboard_sort!=""){
		query_string = query_string + "&sort="+scoreboard_sort;
	}
  window.location.href = base_url+query_string;
});