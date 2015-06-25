jQuery(document).ready(function($){
	$("#countries").change(function(){
		var country = $(this).val();
		var base_path = $("#base_path").val();
		$("#cities").prop('disabled',true);
		if(country != 0)
		{
			$.ajax({
				url: base_path+"/country/"+country+"/cities",
				success: function(resp){
					$("#cities").html(resp);
					$("#cities").prop('disabled', false);
					$("#airports").html('<option value="0">Seleccione un Aeropuerto</option>');
					$("#airports").prop('disabled',true);
				}
			});
		}
		else
		{
			$("#cities").html('<option value="0">Seleccione una Ciudad</option>');
			$("#cities").prop('disabled',true);
		}
		$("#airports").html('<option value="0">Seleccione un Aeropuerto</option>');
		$("#airports").prop('disabled',true);


	});

	$("#cities").change(function(){
		var country = $(this).val();
		var base_path = $("#base_path").val();
		$("#airports").prop('disabled',true);
		if(country != 0)
		{
			$.ajax({
				url: base_path+"/city/"+country+"/airports",
				success: function(resp){
					$("#airports").html(resp);
					$("#airports").prop('disabled',false);
				}
			});
		}
		else
		{
			$("#airports").html('<option value="0">Seleccione un Aeropuerto</option>');
			$("#airports").prop('disabled',true);
		}


	});




	//////

	$("#countries2").change(function(){
		var country = $(this).val();
		var base_path = $("#base_path").val();
		$("#cities2").prop('disabled',true);
		if(country != 0)
		{
			$.ajax({
				url: base_path+"/country/"+country+"/cities",
				success: function(resp){
					$("#cities2").html(resp);
					$("#cities2").prop('disabled', false);
					$("#airports2").html('<option value="0">Seleccione un Aeropuerto</option>');
					$("#airports2").prop('disabled',true);
				}
			});
		}
		else
		{
			$("#cities2").html('<option value="0">Seleccione una Ciudad</option>');
			$("#cities2").prop('disabled',true);
		}
		$("#airports2").html('<option value="0">Seleccione un Aeropuerto</option>');
		$("#airports2").prop('disabled',true);


	});

	$("#cities2").change(function(){
		var country = $(this).val();
		var base_path = $("#base_path").val();
		$("#airports2").prop('disabled',true);
		if(country != 0)
		{
			$.ajax({
				url: base_path+"/city/"+country+"/airports",
				success: function(resp){
					$("#airports2").html(resp);
					$("#airports2").prop('disabled',false);
				}
			});
		}
		else
		{
			$("#airports2").html('<option value="0">Seleccione un Aeropuerto</option>');
			$("#airports2").prop('disabled',true);
		}


	});
});