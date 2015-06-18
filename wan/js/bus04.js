/*
se definiran ciertas variables como la cantidad de zonas de manera vertical
******	******	******	****** 	
******	******	******	******
******	******	******	******

******	******	******	******
******	******	******	******
******	******	******	******

Por ejemplo ahi se definen 6 asientos por fila y 3 filas por zona, a su vez se definen 2 zonas de manera vertical
*/
var ast=2;
var ast_i=[];
var ast_v=[];
var recorridos=["a1","b2","c3"];
var vistos=0;
var cnt_ast=6;
var cnt_filas=5;
var cnt_zns=2;
var recorrido=0;
var asientos=180;
var m=0;
var $it_icon=$('<span class="ast_icn"></span>');
var $it_txt=$('<span class="ast_txt"></span>');
var $av_it=$('<div class="asiento icn_efect  "></div>');
$av_it.append($it_icon).append($it_txt);
var $av_fl=$('<div class="filas"></div>');
var $av_zn=$('<div class="zona"></div>');
var $av_grp=$('<div class="grupo"></div>');
var vuelta=true;
$(document).ready(function() {
	if(vuelta){
		llenar("#vuelta");
	}
	llenar("#ida");

});
function llenar(cont){
	var $total=$(cont);
	$act_zn=$av_zn.clone().append();
	var zona=true;
	var k=cnt_zns-1;
	$act_grp=$av_grp.clone().append();
	while(zona){
		j=cnt_filas
		var $act_zn=$av_zn.clone().append();
		while(j--){
			var i=cnt_ast;
			var $act_fl=$av_fl.clone().append();
			while(i--){

				var nom=codigo(recorrido+1);
				$it_txt.text(nom);
				if(recorridos[vistos]==nom){
					vistos++;
					$it_icon.removeClass().addClass('ast_icn icon-squared-cross')
				}
				else{
					$it_icon.removeClass().addClass('ast_icn icon-squared-plus')
				}
				$act_fl.append($av_it.clone().append())	;
				recorrido++;
				if(recorrido==asientos){
					i=0;
					j=0;
					zona=false;
				}
			}
			$act_zn.append($act_fl.append());
		}
		$act_grp.append($act_zn.clone().append());
		if(!k--){
			k=cnt_zns-1;
			$total.append($act_grp.append());
			$act_grp=$av_grp.clone().append();
		}		
	}
	recorrido=0;
	vistos=0;
	

}
function codigo(numero){
	var b_z=cnt_zns*cnt_filas*cnt_ast;
	var caracteres=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
	var nm_n=0;
	switch(numero%cnt_ast){
		case 0: nm_c=5; nm_n=-1;break;
		case 1: nm_c=0; break;
		case 2: nm_c=1; break;
		case 3: nm_c=2; break;
		case 4: nm_c=3; break;
		case 5: nm_c=4;break;
	}
	if(numero%b_z==0){
		nm_c=nm_c-cnt_ast;
	}
	nm_c=nm_c+parseInt(numero/b_z)*cnt_ast;
	nm_n=nm_n+parseInt(numero/cnt_ast)+1-(parseInt(nm_c/6)*cnt_filas*cnt_zns);
	var numeracion=caracteres[nm_c]+""+nm_n;
	return numeracion;
}
$('.avion').on("click",'.ast_icn',function(){
	var $items=$(this);
	if(!$items.hasClass('icon-squared-cross')){
		var tipo=($items.parents('.avion').attr('id')=="ida");
		var texto=$items.siblings('.ast_txt').text();
		var accion;
		if($items.hasClass('icon-squared-plus')){
			$items.removeClass('icon-squared-plus');
			$items.addClass('icon-squared-minus');
			accion=true;
		}
		else{
			$items.removeClass('icon-squared-minus');
			$items.addClass('icon-squared-plus');
			accion=false;
		}
		seleccion(tipo,texto,accion);
	}
});
function seleccion(bol,texto,accion){
	if(accion){
		if(bol){
			ast_i.push(texto);
		}
		else{
			ast_v.push(texto);
		}
	}
	else{
		buscar(bol,texto);
	}
}
function buscar (bol,texto){
	var iterador;
	if(bol){
		iterador=ast_i;
	}
	else{
		iterador=ast_v;
	}
	console.log("D");
	for(var f in iterador){
		if(iterador[f]==texto){
			iterador.splice(f,1);
			break;
		}
	}
}
function validar(){
	if(!(ast_i.length==ast && ast_v.length==ast)){
		alert("Error, escoga adecuadamente la cantidad de asientos"+ast);
	}
	else{
		alert("Sus asientos son: "+ast_i+"-"+ast_v);
	}
}