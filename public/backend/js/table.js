jQuery(document).ready(function($){
	$('#name').keyup(function(e){
		e.preventDefault();
		$('#search').click();
	});

	$('#search-form').submit(function(e){
		e.preventDefault();
	});

	$('#search').click(function(e){
	    e.preventDefault();
	    var url = $('#search-form').attr('action');
	    $.post(url,$('#search-form').serialize(),function(data){
	   		$('#ajax-table').html(data.html);
		});
	});

	$('#ajax-table').on("click","#paginate li a",function(e){
	    e.preventDefault();
	    var url = this.href;
	
	    console.log(url);
	
	    $.post(url,$('#search-form').serialize(),function(data){
	      $('#ajax-table').html(data.html);
	    });	  
	});

	
	$('.glyphicon').tooltip();
});