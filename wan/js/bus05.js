var opciones=["DNI","PASAPORTE","CRNT. EXTR"];
$('.documento').autocomplete({
	source:opciones
});
var vuelta=false;
var participantes=2;
$(document).ready(function() {
	if(vuelta){
		llenar("#vuelta");
	}
	llenar("#ida");

});
function llenar(text){
	var $total=$(text);
	//.load('formulario.html').load('formulario.html')
	for(i=0;i<participantes;i++){
		$.get("formulario.html", function(data){
    $('#ida').html(data);
});
	}
}
function validar(elemento){
	console.log($(elemento).parents('.form-horizontal').children());

}
$('.conjunto').on('click','.desplegable',function(){
	$(this).siblings().toggle();
});


					