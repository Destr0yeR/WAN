var opciones=["DNI","PASAPORTE","CRNT. EXTR"];
$('.documento').autocomplete({
	source:opciones
});
var vuelta=true;
var participantes=2;
var $elemt=$('<div class="formulario"><div class="desplegable"><h4></h4></div><form class="form-horizontal" role="form"><div class="form-group  "><label class="control-label col-sm-2 " >*Tipo de Documento:</label><div class="col-sm-10"><input name="t_doc" type="text" class="form-control documento" required> </div></div><div class="form-group "><label class="control-label col-sm-2 " for="pwd">*N° Documento:</label><div class="col-sm-10"><input name="n_doc" type="text" class="form-control" placeholder="Ingrese el numero:" required></div></div><div class="form-group "><label class="control-label col-sm-2 " >*Nombres:</label><div class="col-sm-10"><input name="nombre" type="text" class="form-control"  required ></div></div><div class="form-group "><label class="control-label col-sm-2 " >*Apellido Paterno:</label><div class="col-sm-10"><input required type="text" class="form-control"  ></div></div><div class="form-group "><label class="control-label col-sm-2 " >*Apellido Materno:</label><div class="col-sm-10"><input required type="text" class="form-control"  ></div></div><div class="form-group"><label class="control-label col-sm-2 " >*Sexo:</label><div class="radio"><label><input type="radio" name="sex" checked="checked">Masculino</label><label><input name="sex" type="radio" >Femenino</label></div>				  		</div><div class="form-group"><label class="control-label col-sm-2" >Telefono:</label><div class="col-sm-10"><input type="text" class="form-control"  ></div></div><div class="form-group"><label class="control-label col-sm-2" >Em@il:</label><div class="col-sm-10"><input type="email" class="form-control"  ></div></div><div class="form-group"><label class="control-label col-sm-2" >R.U.C.:</label><div class="col-sm-10"><input type="text" class="form-control"  ></div></div><div class="form-group"><div class="col-sm-offset-2 col-sm-10"><input type="submit" class="btn btn-default" onclick="validar(this)"></div></div></form></div>');
$(document).ready(function() {
	if(vuelta){
		llenar("#vuelta");
	}
	llenar("#ida");

});
function llenar(text){
	var $total=$(text);
	for(i=0;i<participantes;i++){
		$('h4',$elemt).text("Pasajero N°0"+(i+1));
		$total.append($elemt.clone(	));
	}
}
function validar(elemento){
	console.log($(elemento).parents('.form-horizontal').children());

}
$('.conjunto').on('click','.desplegable',function(){
	$(this).siblings().toggle();
});


					