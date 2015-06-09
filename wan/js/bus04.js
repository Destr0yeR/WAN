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

var recorridos=["a_1","b_2","c_3"];
var vistos=0;
var cnt_ast=6;
var cnt_filas=5;
var cnt_zns=2;
$(document).ready(function() {
	var recorrido=0;
	var asientos=180;
	var $total=$('.avion');
	var $it_icon=$('<span > <i class="ast_icn" ></i></span>');
	var $it_txt=$('<span class="ast_txt"></span>');
	var $av_it=$('<div class="asiento icn_efect "></div>');
	$av_it.append($it_icon).append($it_txt);
	var $av_fl=$('<div class="filas"></div>');
	var $av_zn=$('<div class="zona"></div>');

	//var $act_zn=$av_zn.append($av_fl);
	//var $act_fl=$av_fl;
	$act_zn=$av_zn.append();
	var zona=true;
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
		$total.append($act_zn.append());
	}
	
	
});
function codigo(numero){
	var b_z=cnt_zns*cnt_filas*cnt_ast;
	var caracteres=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
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
	var numeracion=caracteres[nm_c]+"_"+nm_n;
	return numeracion;
}
$('.asiento').on("click",function(){

	var $items=$('span i',this);
	if($items.hasClass('icon-squared-plus')){
		$items.removeClass('icon-squared-plus');
		$items.addClass('icon-squared-minus');
	}
	else{
		$items.removeClass('icon-squared-minus');
		$items.addClass('icon-squared-plus');
	}
});
/*
*/
