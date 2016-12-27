jQuery(document).ready(function($) {
	// header menu 
	$('ul.sub-menu').addClass('dropdown-menu');
	$('li.dropdown > a').append('<span class="caret"></span>');
	$('li.dropdown > a').attr({
		'class': 'dropdown-toggle',
		'data-toggle': 'dropdown',
		'role' : 'button',
		'aria-haspopup' : 'true',
		'aria-expanded' : 'false'
	});
	// Form
	var current_fs, next_fs, previous_fs; //fieldsets
	var left, opacity, scale; //fieldset properties which we will animate
	var animating; //flag to prevent quick multi-click glitches
	$(".next").click(function(){
		if(animating) return false;
		animating = true;
		
		current_fs = $(this).parent();
		next_fs = $(this).parent().next();
		
		//show the next fieldset
		next_fs.show(); 
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale current_fs down to 80%
				scale = 1 - (1 - now) * 0.2;
				//2. bring next_fs from the right(50%)
				left = (now * 50)+"%";
				//3. increase opacity of next_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({'transform': 'scale('+scale+')','position':'relative'});
				next_fs.css({'left': left, 'opacity': opacity ,'position':'aboslute'});
			}, 
			duration: 800, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	});

	$(".previous").click(function(){
		if(animating) return false;
		animating = true;
		
		current_fs = $(this).parent();
		previous_fs = $(this).parent().prev();
		
		//show the previous fieldset
		previous_fs.show(); 
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale previous_fs from 80% to 100%
				scale = 0.8 + (1 - now) * 0.2;
				//2. take current_fs to the right(50%) - from 0%
				left = ((1-now) * 50)+"%";
				//3. increase opacity of previous_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({'left': left,'position':'relative'});
				previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity,'position':'aboslute'});
			}, 
			duration: 800, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	});

	$(".submit").click(function(){
		return false;
	});


	$("#company_headquarter").select2({
	  	placeholder: "Select Headquarters"
	});
	$("#company_founder").select2({
	  	placeholder: "Select Founders"
	});
	$("#company_category").select2({
	  	placeholder: "Select Categories"
	});
	$("#company_type").select2({
	  	placeholder: "Select Company Type"
	});
	$("#company_investment_size").select2({
	  	placeholder: "Select Investment Size"
	});
	$("#company_sector").select2({
	  	placeholder: "Select Sectors"
	});
	$("#company_region").select2({
	  	placeholder: "Select Regions"
	});
	$('#company_current_team').select2({
		placeholder: "Select Current Team"
	})
	$('#company_board_member').select2({
		placeholder: "Select Board Member"
	})
	$('#company_sub_organization').select2({
		placeholder: "Select Sub Organization"
	})
	$('#company_competitor').select2({
		placeholder: "Select Competitiors"
	})
	$('#company_past_team').select2({
		placeholder: "Select Past Team"
	})
	$('#company_top_gratuate').select2({
		placeholder: "Select Past Team"
	})
	$('#company_product').select2({
		placeholder: "Select Products"
	})
	$('#company_partners').select2({
		placeholder: "Select Partners"
	})
	$('#company_awards').select2({
		placeholder: "Select Awards"
	})
});