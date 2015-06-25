jQuery(document).ready(function($){


	var savePermission = function(e){
		e.preventDefault();
		var url = $(this).attr('href');
		$.post(url,$('#submit-form').serialize(),function(data){
			var response = JSON.parse(data);
			if (response.status == "success")
			{
				$('#message-container').empty();
				var message_source = $('#message_source_success').clone().appendTo('#message-container');
				var message = response.message;
				
				$('#message-container').children().append(message);
				$('#message-container').show();
			}
			if (response.status == "error")
			{
				$('#message-container').empty();
				var message_source = $('#message_source_error').clone().appendTo('#message-container');
				var rpta = "";
				var message = response.message;
				$.each(message,function(key)
					{
						rpta+=message[key]+'<br/>';
					});
				$('#message-container').children().append(rpta);
				$('#message-container').show();
			}
			if (response.status == "info")
			{
				$('#message-container').empty();
				var message_source = $('#message_source_info').clone().appendTo('#message-container');
				var message = response.message;
				
				$('#message-container').children().append(message);
				$('#message-container').show();
			}
		});
	}

	$('.submitButton').click(function(e){
		e.preventDefault();
		var btn = $(this);

		var url = $(this).attr('href');
		$('#message-container').empty();
		var message_source = $('#message_source_info').clone().appendTo('#message-container');
		$('#message-container').children().append("Loading...");
		$('#message-container').show();

		$.post(url,$('#submit-form').serialize(),function(data){
			var response = JSON.parse(data);
			if (response.status == "success")
			{
				$('#message-container').empty();
				var message_source = $('#message_source_success').clone().appendTo('#message-container');
				var message = response.message;
				
				$('#message-container').children().append(message);
				$('#message-container').show();
			}
			if (response.status == "error")
			{
				$('#message-container').empty();
				var message_source = $('#message_source_error').clone().appendTo('#message-container');
				var rpta = "";
				var message = response.message;
				$.each(message,function(key)
					{
						rpta+=message[key]+'<br/>';
					});
				$('#message-container').children().append(rpta);
				$('#message-container').show();
			}
			if (response.status == "info")
			{
				$('#message-container').empty();
				var message_source = $('#message_source_info').clone().appendTo('#message-container');
				var message = response.message;
				
				$('#message-container').children().append(message);
				$('#message-container').show();
			}
		});
	});
	
	$('#ajax-table').on("click","#locationPaginate li a",function(e){
		e.preventDefault();
		var url = this.href;

		$.post(url,$('#search-form').serialize(),function(data){
			$('#ajax-table').html(data.html);
		});
	});

	$('#ajax-table-permissions').on("click","#locationPaginate li a",function(e){
		e.preventDefault();
		var url = this.href;

		$.post(url,$('#search-form').serialize(),function(data){
			$('#ajax-table-permissions').html(data.html);
		});
	});

	$('#ajax-table-users').on("click","#locationPaginate li a",function(e){
		e.preventDefault();
		var url = this.href;

		$.post(url,$('#search-form').serialize(),function(data){
			$('#ajax-table-users').html(data.html);
		});
	});

	$('#searchButton').click(function(e){
		e.preventDefault();
		var url = $('#submit-form').attr('action');

		$.post(url,$('#submit-form').serialize(),function(data){
			$('#ajax-table').html(data.html);

			$('.savePermission').click(savePermission);

		});
	});

	$('.searchPermissionsButton').click(function(e){
		e.preventDefault();
		var url = this.href;

		$.post(url,$('#submit-form').serialize(),function(data){
			$('#ajax-table-permissions').html(data.html);

			$('.savePermission').click(savePermission);

		});
	});

	$('.searchUsersButton').click(function(e){
		e.preventDefault();
		var url = this.href;

		$.post(url,$('#submit-form').serialize(),function(data){
			$('#ajax-table-users').html(data.html);
		});
	});

	$("input#url").keyup(function(){
		$.ajax({
			type 		: 	"POST",
			url 		: 	"/permission/getUrls",
			dataType 	: 	"json",
			data 		: 	{"url" : $("input#url").val()},
			success 	: 	function(msg){			
				$( "#url" ).autocomplete({source: msg,fillin:true});
			}
		});
	});

	$("input#usernamesearch").keyup(function(){
		$.ajax({
			type 		: 	"POST",
			url 		: 	"/group/getUsernames",
			dataType 	: 	"json",
			data 		: 	{"usernamesearch" : $("input#usernamesearch").val()},
			success 	: 	function(msg){			
				$( "#usernamesearch" ).autocomplete({source: msg,fillin:true});
			}
		});
	});

	$('.savePermission').click(savePermission);

		$('.deleteGroup').click(function(e){
		e.preventDefault();
		var url = $(this).attr('href');
		$.post(url,$('#submit-form').serialize(),function(data){
			var response = JSON.parse(data);
			if (response.status == "success")
			{
				$('#message-container').empty();
				var message_source = $('#message_source_success').clone().appendTo('#message-container');
				var message = response.message;
				
				$('#message-container').children().append(message);
				$('#message-container').show();
			}
			if (response.status == "error")
			{
				$('#message-container').empty();
				var message_source = $('#message_source_error').clone().appendTo('#message-container');
				var rpta = "";
				var message = response.message;
				$.each(message,function(key)
					{
						rpta+=message[key]+'<br/>';
					});
				$('#message-container').children().append(rpta);
				$('#message-container').show();
			}
			if (response.status == "info")
			{
				$('#message-container').empty();
				var message_source = $('#message_source_info').clone().appendTo('#message-container');
				var message = response.message;
				
				$('#message-container').children().append(message);
				$('#message-container').show();
			}
		});
		location.reload();
	});
});

jQuery(document).ready(function($){
	$('.datetimepicker1').datepicker({

		 dateFormat: "yy-mm-dd",
		 changeMonth: true,
		 changeYear: true,
	});
});

